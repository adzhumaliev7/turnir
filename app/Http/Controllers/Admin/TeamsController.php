<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\joinTurnaments;
use App\Http\Requests\Admin\StoreReportTeamRequest;
use App\Http\Requests\Admin\TeamStoreReuest;
use App\Models\Report;
use App\Models\Stage;
use App\Models\StagesGroup;
use App\Models\Team;
use App\Models\Log;
use App\Models\TeamsNetworks;
use App\Models\Tournament;
use App\Models\TournamentGroup;
use App\Models\TournamentGroupTeam;
use App\Models\TournamentMatches;
use App\Models\TournamentMatchesResult;
use App\Models\TournamentMembers;
use App\Models\Log_orders_team;
use App\Models\TournametsTeam;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
{
    public function show($teamId) {
         //Взять только нужные поля
      
         $team = Team::with([
            //            'logs' => function($q) { $q->orderBy('created_at', 'asc');}, 'bans' => function($q) {$q->orderBy('created_at', 'asc'); } ,
                            'teammates.turnir', 'teammates.user', 'teammatesTeam.user', 'сaptain', 'network',
                            'groups.tournamentMatchesResults.matche', 'groups.turnir', 'groups.stage', 'groups.group'
                        ])
                        ->findOrFail($teamId);
        
                    $countMathe = 0;
                    foreach($team->groups as $group) {
                        $countMathe += $group->tournamentMatchesResults->groupBy('match_id')->count();
                    }
            
            //        ВЫНЕСТИ В КОНФИГ
                    $userStatus = [
                        'verified' => 'верф',
                        'rejected' => 'отклонен',
                        'on_check' => ' на проверке',
                        'defauld' => 'Статус пуст',
                        'ban' => 'Забанен',
                        'null' => 'nll'
                    ];
            
                    $logs = $team->logsFull();
            
                    return view('admin.home.teams.show', compact('team', 'countMathe', 'userStatus', 'logs'));
        //return view('admin.home.teams.show', compact('team', 'countMathe', 'userStatus', 'log_ref'));
    }

    public function showMath($tournamentGroupTeamsId, Request $request){
        $tournamentGroupTeam = TournamentGroupTeam::findOrFail($tournamentGroupTeamsId)->load('team.сaptain', 'team.teammates.user', 'team.teammates.matches', 'group.matches', 'turnir', 'stage');
        $matches = TournamentMatches::where('tournament_id',  $tournamentGroupTeam->turnir->id)->where('stage_id', $tournamentGroupTeam->stage->id)->get();
        return view('admin.home.tournament.team', compact('tournamentGroupTeam','matches'));
    }

    public function create($turnirId, $groupId, Request $request) {
        $turnir =  Tournament::find($turnirId);
        $group = TournamentGroup::find($groupId);
        $stage = Stage::find($group->stage_id);

        $arr = [];
        foreach($stage->groups as $groupF) {
            foreach($groupF->tournamentGroupTeams->pluck('team_id')->toArray() as $team) {
                $arr[] =$team;
            }
        }

        $teams = TournametsTeam::where('status', 'accepted')->where('tournament_id', $turnirId)->whereNotIn('team_id', $arr)->with('team')->get();

        return view('admin.home.tournament.create_team_new', compact('turnir', 'teams', 'group', 'stage'));

    }

    public function store( TeamStoreReuest $request) {
        $data = $request->validated();

        $group = TournamentGroup::find($data['group_id']);
        $turnir =  $group->turnir;

        $insert = [];
        foreach ($data['teams'] ?? [] as $key => $match) {
            $insert[$key]['team_id'] =$match;
            $insert[$key]['tournament_id']   = $turnir->id;
            $insert[$key]['group_id'] = $group->id;
            $insert[$key]['stage_id'] = $group->stage_id;
        }
        $teams = TournamentGroupTeam::insert($insert);
        return response()->json(['url' => route('standings',[ $turnir->id, $group->stage_id, $group->id])]);
    }

    public function joinTournament($turnirId, $teamId, joinTurnaments $request)
    {
        $data = $request->validated();

        $turnir = Tournament::findOrFail($turnirId);
        $team = Team::findOrFail($teamId);

        $insert = [];
        foreach ($data['members'] as $member) {
            $insert[] = ['tournament_id' => $turnirId, 'team_id' => $teamId, 'user_id' =>$member];
        }

        TournamentMembers::insert($insert);
        TournametsTeam::create(['tournament_id' => $turnirId, 'team_id' => $teamId, 'status' => 'accepted',]);


        return redirect()->route('standings',[ $turnir->id]);
    }


    public function destroy($tournamentGroupTeamsId, Request $request){
        $tournamentGroupTeams = TournamentGroupTeam::findOrFail($tournamentGroupTeamsId);
        $tournamentGroupTeams->delete();

        return redirect()->back();
    }

    public function deleteOrder($tournametsTeamId, Request $request) {
        $order = TournametsTeam::findOrFail($tournametsTeamId);
        $order->tournamentsMembers()->where('tournament_id', $order->tournament_id)->delete();
        $order->delete();

        return redirect()->back();
    }

    public function getDataList(Request $request) {
        $TournametTeams = TournametsTeam::where('tournament_id', $request->get('turnirId'))->pluck('team_id');

        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $order = $request->input('columns.' . $request->input('order.0.column') . '.data');

        $sql = Team::with('сaptain', 'teammatesTeam.user')->whereNotIn('id',$TournametTeams)
            ->Where(function ($q) use ($search) {
                $q->OrWhere( 'name', 'LIKE',"%{$search}%");
                $q->OrWhere('id','LIKE',"%{$search}%");
                $q->OrWhereHas('сaptain', function (Builder $query) use ($search) {$query->where('name','LIKE',"%{$search}%");});
            });

        $totalFiltered = $sql->count();
        $teams = $sql->offset($start)->limit($limit)->orderBy($order == 'nameCapitane' ? 'name' : $order,$dir,$dir)->get();

        $data = [];
        foreach ($teams as $team) {
            $nestedData['id'] = $team->id;
            $nestedData['name'] = $team->name;
//            $nestedData['members'] = Tournament::getMembers($team->id) ?? [];
            $nestedData['members'] = $team->teammatesTeam->toArray() ?? [];
            $nestedData['nameCapitane'] = $team->сaptain->name ?? 'Нету капитана';
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


    public function getDataAllList(Request $request) {
        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $order = $request->input('columns.' . $request->input('order.0.column') . '.data');

        $sql = Team::with(['order.turnir', 'сaptain', 'teammatesTeam.user'])->select('team.*')->withCount('teammatesTeam', 'order')
            ->leftJoin('users', 'users.id', '=', 'team.user_id')
            ->when($order == 'lastDate', function ($query, $role) use ($dir) {
                return $query->orderBy(
                    TournametsTeam::select('created_at')->whereColumn('tournamets_team.team_id', 'team.id')->latest()->take(1),
                    $dir
                );
            })
            ->Where(function ($q) use ($search) {
                $q->OrWhere( 'team.name', 'LIKE',"%{$search}%");
                $q->OrWhere('team.id','LIKE',"%{$search}%");
                $q->OrWhereHas('сaptain', function (Builder $query) use ($search) {
                    $query->where('name','LIKE',"%{$search}%")->orWhere('email','LIKE',"%{$search}%");
                });
            });

        $totalFiltered = $sql->count();

        $as = ['teamLid' => 'users.name', 'emailTeamLid' => 'users.email', 'lastDate' => 'team.name'];
        $teams = $sql->offset($start)->limit($limit)->orderBy($as[$order] ?? $order, $dir)->get();

        $data = [];
        foreach ($teams as $team) {
            $nestedData['id'] = $team->id;
            $nestedData['name'] = $team->name;
            $nestedData['teammates_team_count'] = $team->teammates_team_count;
            $nestedData['lastDate'] = $team->order->last()->turnir->tournament_start ?? '';
            $nestedData['order_count'] = $team->order_count;
            $nestedData['teamLid'] = $team->сaptain->name ?? 'нет капитана';
            $nestedData['emailTeamLid'] = $team->сaptain->email ?? 'нет капитана';
            $nestedData['options'] = view('admin.home.inc.buttons', ['route' => ['show' => 'teams.show', 'ban' => 'teams.ban'], 'id' => $team->id, 'status' => $team->status])->render();
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
    public function ban(StoreReportTeamRequest $request) {

      
        $data = $request->validated();
        $data['log_type'] = 3;
        $team = Team::findOrFail($data['ban_id']);
        if ( $team->status == 1) {
            $team->status = 0;
            $team->bans()->create($data);
        }
        else {
            //$team->ban()->delete();
            $team->status = 1;
        }
        
        $team->save();
        return redirect()->back(); 
    }


}
