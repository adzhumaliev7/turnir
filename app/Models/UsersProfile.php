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
       $is_has = DB::table('users_profile2')->where('user_id', $id)->exists();
       if($is_has == true){
          $data['data'] = DB::table('users_profile2')->where('user_id', $id)->get();
          $data['status'] = DB::table('users_profile2')->where('user_id', $id)->value('status');
          return $data;
       }
       else {
          return NULL;
       }
     
   }
   public function delete_profile($id){
         DB::table('users')->where('id', $id)->delete();
           $is_has = DB::table('users_profile2')->where('user_id', $id)->exists();
            if($is_has == true){
                DB::table('users_profile2')->where('user_id', $id)->delete();
            }else '';
   }

    public function getTeamById($id){
       $is_has = DB::table('team_members')->where('user_id', $id)->exists();
       if($is_has == true){
         return DB::table('team_members')
            ->join('team','team_members.team_id','=','team.id')
            ->select('team_members.team_id','team_members.user_id', 'team.id', 'team.name')
            ->where('team_members.user_id', $id)
            ->get();
       }
       else {
          return NULL;
       }
   }
   public function getTournamentsById($id){
       $is_has = DB::table('tournaments_members')->where('user_id', $id)->exists();
      if($is_has == true){
        return DB::table('tournaments_members')
           ->join('team','tournaments_members.team_id','=','team.id')
           ->join('tournamets_team','tournaments_members.team_id','=','tournamets_team.team_id')
           ->join('tournaments','tournamets_team.tournament_id','=','tournaments.id')
           ->select('tournaments_members.team_id','tournaments_members.user_id', 'team.id', 'team.name','tournaments.name', 'tournaments.format', 'tournaments.id as tournaments_id', 'tournaments.tournament_start', 'tournaments.slot_kolvo','tournaments.country' ,'tournaments.timezone'  ,'tournaments.price', 'tournaments.active' )
           ->where('tournaments_members.user_id', $id)
           ->get();
      }
      else {
         return NULL;
      } 
      return  NULL;
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
      return DB::table('users_logo')->insert($data);
   }
   public static function getUserPhoto($id){
      return DB::table('users_logo')->select('photo')->where('user_id', $id)->value('photo');
   }
   
}
