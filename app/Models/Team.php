<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   // use HasFactory;

 public function getTeamById($id){
       $is_has = DB::table('team_members')->where('user_id', $id)->exists();
       if($is_has == true){
         return DB::table('team_members')
            ->join('team','team.id','=','team_members.team_id')
            ->where('team_members.user_id', $id)
            ->get();
       }
       else {
          return NULL;
       }
   }
    public function getTeamMembers($id){
       $is_has = DB::table('team')->where('user_id', $id)->exists();
       if($is_has == true){
         return DB::table('team')
            ->join('team_members','team_members.team_id','=','team.id')
            ->join('users_profile2','users_profile2.user_id','=','team_members.user_id')
            ->where('team.user_id', $id)
            ->get();
       }
       else {
          return NULL;
       }
   }

   public function createTeam($data){
       return DB::table('team')->insert($data);
    }
      public function addMembers($data){
       return DB::table('team_members')->insert($data);
    }
   
}
