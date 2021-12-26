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
         return DB::table('users_profile2')->where('user_id', $id)->get();
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
            ->join('tournamets_team','team_members.team_id','=','tournamets_team.team_id')
            ->join('tournaments','tournamets_team.tournament_id','=','tournaments.id')
            ->select('team_members.team_id','team_members.user_id', 'team.id', 'team.name','tournaments.name', 'tournaments.tournament_start' , 'tournaments.country' ,'tournaments.timezone'  ,'tournaments.price' )
            ->where('team_members.user_id', $id)
            ->get();
       }
       else {
          return NULL;
       }
   }

   public function checkVerification($id){
       $is_has = DB::table('users_profile2')->where('user_id', $id)->where('verification', 'verified')->exists();
       if($is_has==true){
          return true;
       }
       else return false;
   }
   
}
