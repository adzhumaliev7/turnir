<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
class TeamController extends Controller
{
    public function index($id){
        $data=Team::getTeamById($id);
       
        foreach ($data as $key => $value) {
         $a=(array)$value;
         $team_id=$a['team_id'];
        }
        
        $members=Team::getTeamMembers($team_id);
        $user_id = Auth::user()->id;
        $chek_admin= Team::checkAdmin($user_id);
       
         return view('team',[
            'data'=>$data,
            'members'=>$members,
            'team_id'=>$team_id,
            'user_id'=>$user_id,
            'chek_admin'=>$chek_admin,
        ]); 
    }
    public function addMembers($id){
          $user_id = Auth::user()->id;
          $data=array(
              'team_id' => $id,
              'user_id'=>$user_id,
              'role'=>'member'
          );  
     Team::addMembers($data);
    return redirect(route('profile')); 
    }

    public function deleteMember($id){
        Team::deleteMember($id);        
         return redirect(route('profile')); 
    }
     public function addAdmin($id,$team_id){
       Team::addAdmin($id, $team_id);
    }
     public function exitTeam($id){
       Team::exitTeam($id);
       return redirect(route('profile'));
    }
   public function deleteTeam($id){
          Team::deleteTeam($id);
          return redirect(route('profile'));
   } 
}
