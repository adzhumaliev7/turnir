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
      
          $data['data'] = DB::table('users_profile2')->where('user_id', $id)->get();
          $data['status'] = DB::table('users_profile2')->where('user_id', $id)->value('status');
          $data['verification'] = DB::table('users_profile2')->where('user_id', $id)->value('verification');
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
   public static function getMatchesById($id, $status){
     
      $tournaments = DB::table('tournaments_members')
          ->join('tournaments', 'tournaments_members.tournament_id' ,'=', 'tournaments.id')
         ->join('tournament_group_teams' ,'tournaments_members.team_id' ,'=' ,'tournament_group_teams.team_id')
          ->join('tournament_groups' ,'tournament_group_teams.group_id' ,'=' ,'tournament_groups.id')
          ->join('tournament_matches', 'tournament_matches.group_id', '=' ,'tournament_group_teams.id')
          ->join('stages', 'tournament_matches.stage_id', '=' ,'stages.id')
          ->select( 'tournaments.*','tournament_matches.login', 'tournament_matches.password',  'tournament_matches.match_name', 'tournament_groups.group_name', 'stages.stage_name')
         //->select( 'tournament_group_teams.team_id')
          ->where('tournaments_members.user_id', $id)->where('tournaments.active', $status)->orderBy('tournament_matches.id', 'DESC')
           ->get(); 
        return $tournaments->count() ? $tournaments : null; 
        
  }

   public static function getTeamsCount($id){
      return DB::table('tournamets_team')->where('tournament_id', $id)->where('status', 'accepted')->count();
   }

   public function checkVerification($id){
       $is_has = DB::table('users_profile2')->where('user_id', $id)->where('verification', 'verified')->exists();
       if($is_has==true){
          return true;
       }
       else return false;
   
   }
   public static function updateProfile($id, $data)
   {
      return DB::table('users_profile2')->where('user_id', $id)->update($data);
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
   
}
