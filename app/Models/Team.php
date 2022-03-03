<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   // use HasFactory;

   protected $table = 'team';


   public function сaptain( ) {
       return $this->hasOne(User::class, 'id', 'user_id');
   }

   public function teammates(){
       return $this->hasMany(TournamentMembers::class);
   }

   public static function getTeamById($id)
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
   public static function getLink($id)
   {
         return DB::table('team')->where('id', $id)->value('link');
   }
   public static function getTeamById2($id, $user_id)
   {
         return DB::table('team_members')
         ->join('team', 'team_members.team_id', '=', 'team.id')
         ->select('team_members.team_id', 'team_members.user_id', 'team.id', 'team.name', 'team.logo',  'team.link')
         ->where('team_members.team_id', $id)->where('team_members.user_id', $user_id)
         ->get();

   }
   public static function getTeamName($id)
   {
         return DB::table('team')->where('id', $id)->value('name');
   }
   public function getTeamMembers($id)
   {
     
         $members = DB::table('team_members')
            ->join('team', 'team_members.team_id', '=', 'team.id')
            ->join('users', 'team_members.user_id', '=', 'users.id')
            ->select('team_members.user_id', 'team_members.role','team_members.team_id', 'users.id', 'users.name')
            ->where('team_members.team_id', $id)
            ->get();
            return $members->count() ? $members : null;
   }

   public function createTeam($data, $data_m, $user_id)
   {
      $has_team = DB::table('team')->where('user_id', $user_id)->exists();
      //$is_team_members = DB::table('team_members')->where('user_id', $user_id)->exists();
      if ($has_team == false) {
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

   public function deleteMember($id,$team_id)
   {
      return DB::table('team_members')->where('user_id', $id)->where('team_id', $team_id)->delete();
   }
   public function addAdmin($id, $team_id)
   {
      DB::table('team')->where('role', 'captain')->where('id', $team_id)->update(['user_id' => $id]);
      DB::table('team_members')->where('team_id', $team_id)->where('role', 'captain')->update(['role' => 'member']);
      DB::table('team_members')->where('team_id', $team_id)->where('user_id', $id)->update(['role' => 'captain']);
   }
   public function exitTeam($id,$team_id)
   {
      return DB::table('team_members')->where('user_id', $id)->where('team_id', $team_id)->delete();
   }

   public function deleteTeam($id)
   {
      DB::table('team_members')->where('team_id', $id)->delete();
      DB::table('team')->where('id', $id)->delete();
       DB::table('tournamets_team')->where('team_id', $id)->delete();
    /*  DB::table('tournamets_members')->where('team_id', $id)->delete();
      DB::table('tournament_group_teams')->where('team_id', $id)->delete();
      DB::table('tournament_matches_results')->where('team_id', $id)->delete();
      DB::table('tournament_results')->where('team_id', $id)->delete(); */
   }
   public static function checkAdmin($id,$user_id)
   {
      return  DB::table('team_members')->where('team_id', $id)->where('user_id', $user_id)->where('role', 'captain')->exists();
   }

   public static function getRating()
   {

    
         $rating = DB::table('winners')
            ->join('team', 'winners.team_id', '=', 'team.id')
            ->join('tournaments', 'winners.tournament_id', '=', 'tournaments.id')
            ->select('winners.id', 'winners.points', 'team.name', 'tournaments.tournament_start',  'tournaments.name as tournaments_name', 'tournaments.timezone')
            ->get();
          return $rating->count() ? $rating : null;
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
     
      $networkws = DB::table('teams_networks')->where('team_id', $id)->get();
      return $networkws->count() ? $networkws : null;
     
   }

   public static function setLogo($id, $logo){
      return DB::table('team')->where('id', $id)->update(['logo'=>$logo]);
   }

   public static function getMatches($team_id){
     
      $tournaments = DB::table('tournamets_team')
      ->join('tournaments', 'tournamets_team.tournament_id' ,'=', 'tournaments.id')
     ->join('tournament_group_teams' ,'tournamets_team.team_id' ,'=' ,'tournament_group_teams.team_id')
      ->join('tournament_groups' ,'tournament_group_teams.group_id' ,'=' ,'tournament_groups.id')
      ->join('tournament_matches', 'tournament_matches.group_id', '=' ,'tournament_group_teams.id')
      ->join('stages', 'tournament_matches.stage_id', '=' ,'stages.id')
      ->select( 'tournaments.*','tournament_matches.login', 'tournament_matches.password',  'tournament_matches.match_name', 'tournament_groups.group_name', 'stages.stage_name')
     //->select( 'tournament_group_teams.team_id')
      ->where('tournamets_team.team_id', $team_id)
       ->get(); 
    return $tournaments->count() ? $tournaments : null; 
   } 
   public static function getTournaments($team_id){
     
      $tournaments = DB::table('tournamets_team')
      ->join('tournaments', 'tournamets_team.tournament_id' ,'=', 'tournaments.id')
      ->select( 'tournaments.*')
      ->where('tournamets_team.team_id', $team_id)->where('tournamets_team.status', 'accepted')
       ->get(); 
    return $tournaments->count() ? $tournaments : null; 
   } 
   public static function getUsersEmail($id)
   {
      return DB::table('users')->where('id', $id)->value('email');
   }
   public static function generateLink($id, $link)
   {
      return DB::table('team')->where('id', $id)->update(['link'=>$link]);
   }


}
