<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index($id,$us)
    {
        $data = Team::getTeamById2($id, $us);
        foreach ($data as $key => $value) {
            $a = (array)$value;
            $team_id = $a['team_id'];
        }
        
        $countries = config('app.countries');
        $members = Team::getTeamMembers($team_id);
      
        $user_id = Auth::user()->id;
        $chek_admin = Team::checkAdmin($user_id);
        $networks = Team::getTeamNetworks($team_id);
        $tournaments = Team::getTournaments($team_id);
       
        return view('main.team', [
            'data' => $data,
            'members' => $members,
            'team_id' => $team_id,
            'user_id' => $user_id,
            'chek_admin' => $chek_admin,
            'networks' => $networks,
            'countries' => $countries,
            'tournaments' => $tournaments
        ]);
    }
    public function addMembers($id)
    {

        $team = Team::getTeamName($id);

        $user_id = Auth::user()->id;
        $data = array(
            'team_id' => $id,
            'user_id' => $user_id,
            'role' => 'member'
        );

        return view('main.join_to_team', [
            'team' => $team,
            'id' => $id
        ]);
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
            return redirect(route('profile'));
        } else
            return redirect(route('profile'));
    }

    public function deleteMember($id,$team_id)
    {
        Team::deleteMember($id, $team_id);
        return redirect(route('profile'));
    }
    public function addAdmin($id, $team_id)
    {

        Team::addAdmin($id, $team_id);
        return redirect(route('profile'));
    }
    public function exitTeam($id)
    {
        Team::exitTeam($id);
        return redirect(route('profile'));
    }
    public function deleteTeam($id)
    {
        Team::deleteTeam($id);
        return redirect(route('profile'));
    }

    public function ordersTeam($id, Request $request)
    {
        $data = array(
            'team_id' => $id,
            'name' => $request->input('name'),
        );
        $data['status'] = 0;
        $country = $request->input('country');

        Team::ordersTeam($id, $data, $country);
        return redirect(route('profile'));
    }

    public function addNetworks($id, Request $request)
    {

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
        //return redirect(route('team', $id));
    }

    public function addNetworksUpdate($id, Request $request)
    {

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
        //return redirect(route('team', $id));
    }

    public function setLogo($id, Request $request)
    {

        $request->validate([

            // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
            'logo' => 'image',

            // поддерживаемые MIME файла (image/jpeg, image/png)
            'logo' => 'mimetypes:image/jpeg,image/png',

        ]);

        $file_name = $request->file('logo')->getClientOriginalName();
        $type = $request->file('logo')->getClientOriginalExtension();
        if ($type == 'png') $file_type = '.png';
        else $file_type = '.jpeg';
        $file_name = md5($file_name) . $file_type;
        $file = $request->file('logo');
        $file->move(public_path() . '/uploads/storage/img/teamlogo', $file_name);
        Team::setLogo($id, $file_name);
    }
}
