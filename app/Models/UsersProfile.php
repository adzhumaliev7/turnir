<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersProfile extends Model
{
    public function saveProfile($data){
         $is_has = DB::table('users_profile2')->where('user_id', $data['user_id'])->exists();
         if($is_has==true){
            return DB::table('users_profile2')->where('user_id', $data['user_id'])->update($data);
         }else {
              return DB::table('users_profile2')->insert($data);
         }
    }

     public function getById($id){
      
        /*   $data['data'] = DB::table('users_profile2')
      
          ->where('user_id', $id)->get();
          $data['status'] = DB::table('users_profile2')->where('user_id', $id)->value('status');
          $data['verification'] = DB::table('users_profile2')->where('user_id', $id)->value('verification');
          return $data['data']->count() ? $data : null; */
          $data['data'] = DB::table('users')->where('id', $id)->get();
          $data['status'] = DB::table('users')->where('id', $id)->value('exist_status');
          $data['verification'] = DB::table('users')->where('id', $id)->value('verification');
          return $data['data']->count() ? $data : null;
   }
   public static function delete_profile($id){
         DB::table('users')->where('id', $id)->delete();
         DB::table('team_members')->where('user_id', $id)->delete();
         DB::table('tournaments_members')->where('user_id', $id)->delete();
         DB::table('users_logo')->where('user_id', $id)->delete();
           $is_has = DB::table('users_profile2')->where('user_id', $id)->exists();
            if($is_has == true){
                DB::table('users_profile2')->where('user_id', $id)->delete();
            }else '';
   }

    public function getTeamById($id){
      
         $team =  DB::table('team_members')
            ->join('team','team_members.team_id','=','team.id')
            ->select('team_members.team_id','team_members.user_id', 'team.id', 'team.name')
            ->where('team_members.user_id', $id)
            ->get();
          return $team->count() ? $team : null;
       
   }
   public static function getMatchesById($team_id,$id, $status){
     
    /*   $tournaments = DB::table('tournament_group_teams')
          ->leftjoin('tournaments', 'tournament_group_teams.tournament_id' ,'=', 'tournaments.id')
          ->join('tournament_groups' ,'tournament_group_teams.group_id' ,'=' ,'tournament_groups.id')
          ->join('tournament_matches', 'tournament_matches.group_id', '=' ,'tournament_group_teams.id')
          ->join('stages', 'tournament_matches.stage_id', '=' ,'stages.id')
          //->join('tournaments', 'stages.tournament_id', '=' ,'tournaments.id')
          ->select('tournaments.*','tournament_matches.login', 'tournament_matches.password',  'tournament_matches.match_name', 'tournament_groups.group_name', 'stages.stage_name', 'stages.tournament_id')
         //->select( 'tournament_group_teams.team_id')
          ->where('tournament_group_teams.team_id', $team_id)->where('tournaments.active', $status)->where('tournaments.status', 'save')
          //->groupBy('tournaments.name')
          ->orderBy('tournaments.name')
          ->orderBy('stages.stage_name', 'desc')
           ->get(); 
        return $tournaments->count() ? $tournaments : null;  */
          $tournaments = DB::table('tournament_group_teams')
          ->leftjoin('tournaments', 'tournament_group_teams.tournament_id' ,'=', 'tournaments.id')
          ->join('tournament_groups' ,'tournament_group_teams.group_id' ,'=' ,'tournament_groups.id')
          ->join('team' ,'tournament_group_teams.team_id' ,'=' ,'team.id')
          ->join('tournament_matches', 'tournament_group_teams.group_id', '=' ,'tournament_matches.group_id')
          ->join('stages', 'tournament_matches.stage_id', '=' ,'stages.id')
          ->select('tournaments.*','tournament_matches.login', 'tournament_matches.password', 'tournament_matches.date',  'tournament_matches.match_name', 'tournament_groups.group_name', 
          'stages.stage_name', 'stages.tournament_id', 'team.name as team_name')
        // ->select( 'tournament_group_teams.team_id')
          ->where('tournament_group_teams.team_id', $team_id)->where('tournaments.active', $status)->where('tournaments.status', 'save')
          ->orderBy('tournament_matches.date','desc')
          ->orderBy('tournaments.name')
          ->orderBy('stages.stage_name', 'desc')
           ->get(); 
        return $tournaments->count() ? $tournaments : null; 
        
  }

   public static function getTeamsCount($id){
      return DB::table('tournamets_team')->where('tournament_id', $id)->where('status', 'accepted')->count();
   }

   public function checkVerification($id){
       $is_has = DB::table('users')->where('id', $id)->where('verification', 'verified')->exists();
       if($is_has==true){
          return true;
       }
       else return false;
   
   }
   public static function updateProfile($id, $data)
   {
      return DB::table('users')->where('id', $id)->update($data);
   }
   public static function queryUpdate($data){
      return DB::table('orders')->insert($data);
   }

   public static function setUserPhoto($data){
     $is_has = DB::table('users_logo')->where('user_id', $data['user_id'])->exists();
         if($is_has==true){
      return DB::table('users_logo')->where('user_id', $data['user_id'])->update(['photo'=>$data['photo']]);
    }else  return DB::table('users_logo')->insert($data);
   }
   public static function getUserPhoto($id){
      return DB::table('users_logo')->select('photo')->where('user_id', $id)->value('photo');
   }

   public function checkTurnir($team_id){
      return DB::table('tournamets_team')
      ->leftJoin('tournaments','tournamets_team.tournament_id' , '=', 'tournaments.id')
      ->where('tournamets_team.team_id', $team_id)
      ->where('tournamets_team.status', 'accepted')
      ->where('tournaments.active',1)
      ->exists();
   }
   
}

