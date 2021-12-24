<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Admin extends Model
{
   public function getUsersCount(){
      $is_has = DB::table('users')->exists();
    if($is_has == true){
       return DB::table('users')->count();
    }
    else return NULL;
   }
     public function getTeamsCount(){
        $is_has = DB::table('team')->exists();
    if($is_has == true){
       return DB::table('team')->count();
    }else return NULL;
   }


   public function get(){
         $is_has = DB::table('users_profile2')->exists();
    if($is_has == true){
       return DB::table('users_profile2')
       ->join('users','users_profile2.user_id' ,'=', 'users.id' )
       ->select('users_profile2.id','users_profile2.phone','users_profile2.fio','users_profile2.email','users_profile2.city', 'users_profile2.verification','users_profile2.user_id', 'users.status')->get();
    }else return NULL;
   }

public function getModerators(){

       $is_has = DB::table('model_has_roles')->where('role_id', 3)->exists();
    if($is_has == true){
    return DB::table('users')
    ->join('model_has_roles', 'users.id', '=' ,'model_has_roles.model_id')
    ->select('id','email')
    ->where('role_id', 3)
    ->get();
     }
    else return NULL;
  }

      public function delteModeratos($id){
      $data['users'] = DB::table('users')->where('id', $id)->delete();
      $data['models'] = DB::table('model_has_roles')->where('model_id', $id)->delete();
   }

     public function getTeams(){
        $is_has = DB::table('team')->exists();
    if($is_has == true){
       return DB::table('team')->select('id','name')->get();
    }else return NULL;
   }
    public function getById($id){
       return DB::table('users_profile2')->where('id', $id)->get();
   }

   public function verified($id){
        return DB::table('users_profile2')->where('id', $id)->update(['verification' => 'verified']);
   }

   public function getTournaments(){
     $is_has = DB::table('tournaments')->exists();
    if($is_has == true){
       return DB::table('tournaments')->select('id','name','country','tournament_start','games_time')->get();
    }else return NULL;
   }
   public function createTournament($data){
     return DB::table('tournaments')->insert($data);
   }

     public function getTournamentByID($id){
     return DB::table('tournaments')->where('id', $id)->get();
   }
     public function editTournament($id, $data){
     return DB::table('tournaments')->where('id', $id)->update($data);
   }
    public function tournamentDelete($id){
     return DB::table('tournaments')->where('id', $id)->delete();
   }

    public function getTournamentsTeams($tournament_id){
       $is_has = DB::table('tournamets_team')->where('tournament_id', $tournament_id)->exists();
    if($is_has == true){
    return DB::table('tournamets_team')
     ->join('team', 'tournamets_team.team_id', '=', 'team.id')
     //->join('team_members', 'tournamets_team.team_id' , '=', 'team_members.team_id')
      ->select('team.name','team.user_id')
     ->where('tournamets_team.tournament_id', $tournament_id)->where('tournamets_team.status', 'processed')->get();
    }else  return NULL;

  }
   public function geTeamMembers($tournament_id){
    
    return DB::table('team_members')
     ->join('team', 'team_members.team_id', '=', 'team.id')
     ->join('users_profile2', 'team_members.user_id', '=', 'users_profile2.user_id')
     ->join('tournamets_team', 'team.id' , '=', 'tournamets_team.team_id')
     ->join('tournaments', 'tournamets_team.tournament_id' , '=', 'tournaments.id')
     ->select('team_members.user_id','users_profile2.login','team.name')
     ->where('tournamets_team.tournament_id', $tournament_id)->where('tournamets_team.status', 'processed')->get();
   

  }

    public function createHelp($data){
     return DB::table('help')->insert($data);
   }
   public function editHelp($id,$data){
     return DB::table('help')->where('id',$id)->update($data);
   }
     public function getHelp(){
     $is_has = DB::table('help')->exists();
    if($is_has == true){
       return DB::table('help')->select('id','title','description')->get();
    }else return NULL;
   }

   public function getHelpById($id){
   
       return DB::table('help')->select('id','title','description')->where('id', $id)->get();
    }

    public function addBan($id){
       return DB::table('users')->where('id', $id)->update(['status'=> 'ban']);
    }
     public function unblock($id){
       return DB::table('users')->where('id', $id)->update(['status' => NULL]);
    }
   

}
