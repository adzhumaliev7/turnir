<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   // use HasFactory;

   public function getTeamById($id)
   {
      $is_has = DB::table('team_members')->where('user_id', $id)->exists();
      if ($is_has == true) {
         return DB::table('team_members')
            ->join('team', 'team_members.team_id', '=', 'team.id')
            ->select('team_members.team_id', 'team_members.user_id', 'team.id', 'team.name','team.logo')
            ->where('team_members.user_id', $id)
            ->get();
      } else {
         return NULL;
      }
   }
   public function getTeamName($id)
   {
     
         return DB::table('team')->where('id', $id)->value('name');
 
   }
   public function getTeamMembers($id)
   {
      $is_has = DB::table('team_members')->where('team_id', $id)->exists();
      if ($is_has == true) {
         return DB::table('team_members')
            ->join('team', 'team_members.team_id', '=', 'team.id')
            ->join('users', 'team_members.user_id', '=', 'users.id')
            ->select('team_members.user_id', 'team_members.role', 'users.id', 'users.name')
            ->where('team_members.team_id', $id)
            ->get();
      } else {
         return NULL;
      }
   }
   public function getAllTeams()
   {
      return DB::table('team')->select('id', 'user_id')->get();
   }
   public function createTeam($data, $data_m, $user_id)
   {
      $has_team = DB::table('team')->where('user_id', $user_id)->exists();
      $is_team_members = DB::table('team_members')->where('user_id', $user_id)->exists();
      if ($has_team == false && $is_team_members == false) {
         $id = DB::table('team')->insertGetId($data);
         $data_m['team_id'] = $id;
         return DB::table('team_members')->insert($data_m);
      } else {
         return NULL;
      }
   }
   public function addMembers($data)
   {
      return DB::table('team_members')->insert($data);
   }

   public function deleteMember($id)
   {
      return DB::table('team_members')->where('user_id', $id)->delete();
   }
   public function addAdmin($id, $team_id)
   {
      DB::table('team')->where('role', 'captain')->where('id', $team_id)->update(['user_id' => $id]);
      DB::table('team_members')->where('team_id', $team_id)->where('role', 'captain')->update(['role' => 'member']);
      DB::table('team_members')->where('team_id', $team_id)->where('user_id', $id)->update(['role' => 'captain']);
   }
   public function exitTeam($id)
   {
      return DB::table('team_members')->where('user_id', $id)->delete();
   }

   public function deleteTeam($id)
   {
      DB::table('team_members')->where('team_id', $id)->delete();
      DB::table('team')->where('id', $id)->delete();
      DB::table('tournamets_team')->where('team_id', $id)->delete();
   }
   public function checkAdmin($id)
   {
      return  DB::table('team_members')->where('user_id', $id)->where('role', 'captain')->exists();
   }

   public static function getRating()
   {

      $is_has = DB::table('winners')->exists();
      if ($is_has == true) {
         return DB::table('winners')
            ->join('team', 'winners.team_id', '=', 'team.id')
            ->join('tournaments', 'winners.tournament_id', '=', 'tournaments.id')
            ->select('winners.id', 'winners.points', 'team.name', 'tournaments.tournament_start',  'tournaments.name as tournaments_name', 'tournaments.timezone')
            ->get();
      } else return null;
   }
   public static function ordersTeam($id,$data, $country)
   {
       DB::table('orders_team')->insert($data);
       DB::table('team')->where('id', $id)->update(['country' => $country]);
   }
   public static function setTeamNetworks($data){

      return DB::table('teams_networks')->insert($data);

   }
   public static function updateTeamNetworks($id, $data)
   {
      return DB::table('teams_networks')->where('team_id', $id)->update($data);
   }

   public static function getTeamNetworks($id){
      $is_has = DB::table('teams_networks')->where('team_id', $id)->exists();
      if ($is_has == true) {
      return DB::table('teams_networks')->where('team_id', $id)->get();
      } else return null;
   }

   public static function setLogo($id, $logo){
      return DB::table('team')->where('id', $id)->update(['logo'=>$logo]);
   }

   
}
