<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReportUserRequest;
use App\Mail\BanMail;
use App\Mail\RejectedVerifiedMail;
use App\Mail\UnblockMail;
use App\Models\Admin;
use App\Models\LogVerified;
use App\Models\Report;
use App\Models\Team;
use App\Models\TournametsTeam;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function ban(StoreReportUserRequest $request) {
        $data = $request->validated();

        $user = User::findOrFail($data['ban_id']);
        $status =  $user->status !='ban'  &&  $user->id != 1 ? 1: 0;

        if ($status == 1) {
            Mail::to($user->email)->send(new BanMail($user->email, $data['description']));
            $user->status = 'ban';

            $user->bans()->create($data);
        }
        else {
            Mail::to($user->email)->send(new UnblockMail($user->email));
            $user->status = NULL;
//            $user->bans()->delete();
        }
        $user->save();

        return redirect()->back();
    }


    public function verified($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->verification = 'verified';
        $user->save();
        $data=[
            'user_id' => $id,
            'moder_id' =>Auth::user()->name,
            'date' => Carbon::now(),
            'status' => 1
        ];
        LogVerified::create($data);
        return redirect()->to(route('allusers'));
    }

    public function rejected($id, Request $request)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        Mail::to($user->email)->send(new RejectedVerifiedMail($user->email, $data['description']));

        $user->verification = 'rejected';
        $user->save();
        $data= [
            'user_id' => $id,
            'moder_id' => Auth::user()->name,
            'description' => $data['description'],
            'date' => Carbon::now(),
        ];

        LogVerified::create($data);

        return redirect()->route('allusers');
    }

    public function getDataList(Request $request) {
        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $order = $request->input('columns.' . $request->input('order.0.column') . '.data');

        $filter = $request->get('verification', false);

        $sql = User::with('team')->select('users.*')
            ->when($filter, function ($query, $role) use($request, $filter) {
                return $query->where($filter[0], $filter[1]);
            })
            ->when($request->get('verification', false) == 'ban', function ($query, $role) use($request) {
                return $query->where('users.status', $request->get('verification', 'ban'));
            })
            ->leftJoin('team', 'team.user_id', '=', 'users.id')
            ->Where(function ($q) use ($search) {
                $q->OrWhere( 'users.id','LIKE',"%{$search}%");
                $q->OrWhere( 'users.name', 'LIKE',"%{$search}%");
                $q->OrWhere( 'users.nickname', 'LIKE',"%{$search}%");
                $q->OrWhere( 'users.email', 'LIKE',"%{$search}%");
                $q->OrWhere( 'game_id', 'LIKE',"%{$search}%");
                $q->OrWhereHas('team', function (Builder $query) use ($search) {$query->where('name','LIKE',"%{$search}%");});
            });

        $totalFiltered = $sql->count();

        $as = ['team' => 'team.name'];
        $users = $sql->offset($start)->limit($limit)->orderBy($as[$order]  ?? $order,$dir)->get();

        $data = [];
        foreach ($users as $user) {
            $status = "";
            $status .= $user->verified == 1 ? 'Активирован' : 'Зарегистрирован';
            $status .= '/';
            $status .= $user->nickname != null && $user->game_id != null ? 'Игровой' : 'Не игровой';


            $nestedData['id'] = $user->id;
            $nestedData['name'] = $user->name;
            $nestedData['nickname'] = $user->nickname;
            $nestedData['email'] = $user->email;
            $nestedData['status'] = $status;
            $nestedData['game_id'] = $user->game_id;
            $nestedData['team'] = $user->team->name ?? 'Нет команды';
            $nestedData['options'] = view('admin.home.inc.buttons', [
                'route' => ['show' => 'users_card', 'ban' => 'user.ban'],
                'id' => $user->id, 'status' => $user->status !='ban'  &&  $user->id != 1 ? 1: 0
                ])->render();
            $data[] = $nestedData;
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => $sql->get()->count(),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];

        return response()->json($json_data);
    }
}
