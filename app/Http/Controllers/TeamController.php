<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Mail\DeleteMemberMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class TeamController extends Controller
{
    public function index($id,$us)
    {
        $user_id = Auth::user()->id;
        $mail = Auth::user()->email;
        $data = Team::getTeamById2($id, $us);
        $link = Team::getLink($id);
        $countries = config('app.countries');
        $members = Team::getTeamMembers($id);
        $chek_admin = Team::checkAdmin($id, $user_id);
        $networks = Team::getTeamNetworks($id);
        $matches = Team::getMatches($id);
        $tournaments = Team::getTournaments($id);

        /*  $tournaments = Team::find($id)->order()->where('status', 'accepted')->with('turnir')->addSelect([
            'members' => User::select('name')
                ->join('tournaments_members', 'tournaments_members.user_id', '=', 'users.id')
                ->whereColumn('team_id', 'tournamets_team.team_id')
                ->whereColumn('tournaments_members.tournament_id', 'tournamets_team.tournament_id')
                ->select(DB::raw('GROUP_CONCAT(name)'))
                ->take(1),
        ])->get();  */
      // dd($tournaments);
        return view('main.team', [
            'data' => $data,
            'members' => $members,
            'team_id' => $id,
            'user_id' => $user_id,
            'chek_admin' => $chek_admin,
            'networks' => $networks,
            'countries' => $countries,
            'tournaments' => $tournaments,
            'matches' => $matches,
            'mail' => $mail,
            'link' => $link
        ]);
    }
    public function addMembers($link, $team_id)
    {
       $link_  = Team::getLink($team_id);
 
        if($link == $link_){
         $team = Team::getTeamName($team_id);
        $user_id = Auth::user()->id;
        $status = User::getUsersStatus($user_id);
        $data = array(
            'team_id' => $team_id,
            'user_id' => $user_id,
            'role' => 'member'
        );
        return view('main.join_to_team', [
            'team' => $team,
            'id' => $team_id, 
            'status' =>$status
        ]); }
        else 
    		abort('404');
    }

    public function generateLink($id, $user_id){

        $link_ =  base64_encode( Str::random(32));
        Team::generateLink($id, $link_);


        return redirect(route('team', [$id, $user_id]));
    }
    public function addMembersApply($id)
    {
        
        $user_id = Auth::user()->id;
        $data = array(
            'team_id' => $id,
            'user_id' => $user_id,
            'role' => 'member'
        );
        $status = Auth::user()->status;
        if ($status == null) {
            Team::addMembers($data);
            return redirect(route('team', [$id, $user_id]));
        } else
            return redirect()->back(); 
    }

    public function deleteMember($id,$team_id)
    {
        $user_id = Auth::user()->id;
        $email = Team::getUsersEmail($id);
      
        Mail::to($email)->send(new DeleteMemberMail($email));
        Team::deleteMember($id, $team_id);

        \Session::flash('flash_meassage_delete', 'Участник успешно удален');
        return redirect()->back();
    }
    public function addAdmin($id, $team_id, $oldadmin)
    {
        $team = Team::findOrFail($team_id);
        Team::addAdmin($id, $team_id);
      
        $team->logs()->create(['old_value' => $oldadmin, 'new_value' => $id, 'log_type' => 1]);
        return redirect()->back(); 
    }
    public function exitTeam($id, $team_id)
    {
        Team::exitTeam($id, $team_id);
        return redirect(route('profile'));
    }
    public function deleteTeam($id)
    {
         Team::deleteTeam($id);
        return redirect(route('profile')); 
    }

    public function ordersTeam($id, Request $request)
    {
        $user_id = Auth::user()->id;
        $data = array(
            'team_id' => $id,
            'name' => $request->input('name'),
        );
        $data['status'] = 0;
        $country = $request->input('country');

        Team::ordersTeam($id, $data, $country);
        \Session::flash('flash_meassage', 'Ваша заявка успешно отправлена');
        return redirect()->back();
    }

    public function addNetworks($id, Request $request)
    {
        $user_id = Auth::user()->id;
        $data = array(
            'team_id' => $id,
            'insta' => $request->input('insta'),
            'discord' => $request->input('discord'),
            'vk' => $request->input('vk'),
            'facebook' => $request->input('facebook'),
            'youtube' => $request->input('youtube'),
            'telegram' => $request->input('telegram')
        );
        Team::setTeamNetworks($data);
        return redirect()->back();
    }

    public function addNetworksUpdate($id, Request $request)
    {
        $user_id = Auth::user()->id;
        $data = array(
            'team_id' => $id,
            'insta' => $request->input('insta'),
            'discord' => $request->input('discord'),
            'vk' => $request->input('vk'),
            'facebook' => $request->input('facebook'),
            'youtube' => $request->input('youtube'),
            'telegram' => $request->input('telegram')
        );
        Team::updateTeamNetworks($id, $data);
        return redirect()->back();
    }

    public function setLogo($id, Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
            'logo' => 'image',
            // поддерживаемые MIME файла (image/jpeg, image/png)
            'logo' => 'mimetypes:image/jpeg,image/png',
        ]);
        $name = $request->file('logo');
        $path = '/uploads/storage/img/teamlogo';
        $file_name = $this->uploadFiles($name, $path);
        Team::setLogo($id, $file_name);
        return redirect()->back();
    }

    protected function uploadFiles($name, $path){
        $file_name = $name->getClientOriginalName();
       $type = $name->getClientOriginalExtension();
       if ($type == 'png') $file_type = '.png';
       elseif ($type == 'jpg') $file_type = '.jpg';
       else $file_type = '.jpeg';
       $file_name = md5($file_name) . $file_type;
       $file = $name;
       $file->move(public_path() . $path, $file_name); 
       return $file_name;
    }
}
