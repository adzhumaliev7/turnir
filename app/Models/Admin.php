<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   public static function getUsersCount()
   {
      $is_has = DB::table('users')->exists();
      if ($is_has == true) {
         return DB::table('users')->count();
      } else return NULL;
   }
   public static function getTeamsCount()
   {
      $is_has = DB::table('team')->exists();
      if ($is_has == true) {
         return DB::table('team')->count();
      } else return NULL;
   }
   public static function getEmail($team_id)
   {
      return DB::table('team')
         ->join('users_profile2', 'team.user_id', '=', 'users_profile2.user_id')
         ->select('users_profile2.email')
         ->where('team.id', 1)
         ->get();
   }


   public static function get()
   {
      $is_has = DB::table('users_profile2')->exists();
      if ($is_has == true) {
         return DB::table('users_profile2')
            ->join('users', 'users_profile2.user_id', '=', 'users.id')
            ->select('users_profile2.id', 'users_profile2.phone', 'users_profile2.fio', 'users_profile2.email', 'users_profile2.city', 'users_profile2.verification', 'users_profile2.user_id', 'users.status')->get();
      } else return NULL;
   }

   public static function getAllUsers()
   {
    
        $users = DB::table('users')
        ->join('team_members', 'users.id', '=', 'team_members.user_id')
         ->join('team', 'team_members.team_id', '=' , 'team.id')
         ->select('users.*', 'team.name as team_name')

         ->orderBy('users.id', 'desc')
         ->get();
         return $users->count() ? $users : null;
   }
   public static function getVerifiedUsers()
   {
    
        $users = DB::table('users')
       
         ->select('users.*')
         ->where('users.verification', 'verified')
         ->orderBy('users.id', 'desc')
         ->get();
         return $users->count() ? $users : null;
   }

   public static function getVerificationUsers()
   {
    
        $users = DB::table('users')
       
         ->select('users.*')
         ->where('users.verification', 'on_check')
         ->orderBy('users.id', 'desc')
         ->get();
         return $users->count() ? $users : null;
   }
   public static function blocked()
   {
    
        $users = DB::table('users')
       
         ->select('users.*')
         ->where('users.status', 'ban')
         ->orderBy('users.id', 'desc')
         ->get();
         return $users->count() ? $users : null;
   }
   public static function getModerators()
   {

   
      $moderators = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->select('id', 'email')
            ->where('role_id', 3)
            ->get();
         return $moderators->count() ? $moderators : null;
   }

   public static function delteModeratos($id)
   {
      $data['users'] = DB::table('users')->where('id', $id)->delete();
      $data['models'] = DB::table('model_has_roles')->where('model_id', $id)->delete();
   }

   public static function getTeams()
   {
      
         $teams =  DB::table('team')->select('id', 'name')->get();
         return $teams->count() ? $teams : null;
   }
   public static function getById($id)
   {
      $users= DB::table('users')->select( 'users.*')->where('users.id', $id)->get();
      
          return $users->count() ? $users : null;
   }
   public static function getLogBan($id)
   {
      $log_ban= DB::table('log_ban')->where('user_id', $id)->get();
          return $log_ban->count() ? $log_ban : null;
   }
   public static function getLogVerified($id)
   {
      $log_verified= DB::table('log_verified')->where('user_id', $id)->get();
      
          return $log_verified->count() ? $log_verified : null;
   }
   public static function getLogRejected($id)
   {
      $log_rejected= DB::table('log_verif_rejected')->where('user_id', $id)->get();
      
          return $log_rejected->count() ? $log_rejected : null;
   }
   public static function verified($id)
   {
      return DB::table('users')->where('id', $id)->update(['verification' => 'verified']);
   }
   public static function log_verified($data)
   {
      return DB::table('log_verified')->insert($data);
   }
   public static function rejected($id)
   {
      return DB::table('users')->where('id', $id)->update(['verification' => 'rejected']);
   }
   public static function log_rejected($data)
   {
      return DB::table('log_verif_rejected')->insert($data);
   }
   public static function getTournaments()
   {
     
         $tournaments =  DB::table('tournaments')->where('status', 'save')->get();
         return $tournaments->count() ? $tournaments : null;
   }

   public static function getTournamentsDraft()
   {
    
      $tournaments =   DB::table('tournaments')->where('status', 'draft')->get();
      return $tournaments->count() ? $tournaments : null;
   
   }

   public static function draftTournamentsActive($id)
   {
      return DB::table('tournaments')->where('id', $id)->update(['status' => 'save']);
   }
   public static function createTournament($data)
   {
      return DB::table('tournaments')->insert($data);
   }

   public static function getTournamentByID($id)
   {
      return DB::table('tournaments')->where('id', $id)->get();
   }
   public static function editTournament($id, $data)
   {
      return DB::table('tournaments')->where('id', $id)->update($data);
   }
   public static function tournamentDelete($id)
   {
      return DB::table('tournaments')->where('id', $id)->delete();
   }

   public static function getTournamentsTeams($tournament_id)
   {
      $is_has = DB::table('tournamets_team')->where('tournament_id', $tournament_id)->exists();
      if ($is_has == true) {
         return DB::table('tournamets_team')
            ->join('team', 'tournamets_team.team_id', '=', 'team.id')
            //->join('team_members', 'team.id' , '=', 'team_members.team_id')
            ->select('team.name', 'team.user_id', 'tournamets_team.team_id', 'tournamets_team.status', 'tournamets_team.tournament_id')
            ->where('tournamets_team.tournament_id', $tournament_id)->get();
      } else  return NULL;
   }
   public static function getTeamById($id)
   {
      return DB::table('team')->where('id', $id)->first();
   }
  
   public static function geTeamMembers($team_id, $tournament_id)
   {
      return DB::table('tournaments_members')
         ->join('users', 'tournaments_members.user_id', '=', 'users.id')
  
         ->select('users.name', 'users.id',  'users.game_id',  'users.nickname')
         ->where('tournaments_members.tournament_id', $tournament_id)->where('tournaments_members.team_id', $team_id)
         ->get();
   }
   public static function geTeamMembersUserid($team_id, $tournament_id)
   {
      return DB::table('tournaments_members')
         ->join('team_members', 'tournaments_members.team_id', '=', 'team_members.team_id')
        
        // ->select('team_members.user_id')
         ->where('tournaments_members.tournament_id', $tournament_id)->where('tournaments_members.team_id', $team_id)->where('team_members.role', 'captain')
         ->value('team_members.user_id');
   }


   public static function createHelp($data)
   {
      return DB::table('help')->insert($data);
   }
   public static function editHelp($id, $data)
   {
      return DB::table('help')->where('id', $id)->update($data);
   }
   public static function getHelp()
   {
     
         $help = DB::table('help')->select('id', 'title', 'description')->get();
         return $help->count() ? $help : null;
   }

   public static function getHelpById($id)
   {
      return DB::table('help')->select('id', 'title', 'description')->where('id', $id)->get();
   }

   public static function getUsersEmail($id)
   {
      return DB::table('users')->where('id', $id)->value('email');
   }

   public static function addBan($id)
   {
      return DB::table('users')->where('id', $id)->update(['status' => 'ban']);
   }
   public static function setLogBan($data)
   {
      return DB::table('log_ban')->insert($data);
   }
   public static function unblock($id)
   {
      return DB::table('users')->where('id', $id)->update(['status' => NULL]);
   }

   public static function getTeamCount($id)
   {
      //  $team_count =
      return DB::table('tournamets_team')->where('tournament_id', $id)->where('status', 'accepted')->count();
   }

   public static function applyTeam($id, $turnir_id)
   {

      return DB::table('tournamets_team')->where('team_id', $id)->update(['status' => 'accepted']);
   }
   public static function refuseTeam($id, $turnir_id)
   {
      DB::table('tournamets_team')->where('tournament_id', $turnir_id)->where('team_id', $id)->delete();
      DB::table('tournaments_members')->where('tournament_id', $turnir_id)->where('team_id', $id)->delete();
   }

   public static function getFeedback()
   {
         $feedback = DB::table('feedback')->select('fio', 'phone', 'email', 'description')->get();
         return $feedback->count() ? $feedback : null;
   }

   public static function start($turnir_id)
   {
      return DB::table('tournamets_team')
         ->select('tournament_id', 'team_id', 'group_id')
         ->where('tournament_id', $turnir_id)->where('status', 'accepted')->get();
   }

   public static function setStage_1($data)
   {
      return DB::table('stage_1')->insert($data);
   }

   public static function getStage_1($id)
   {
      return DB::table('stage_1')->select('tournament_id', 'team_id')->where('tournament_id', $id)->where('winner', 1)->get();
   }

   public static function setStage_2($turnir_id, $data)
   {
     

      return DB::table('stage_2')->insert($data);
   }

   public static function getStage_2($id)
   {
      return DB::table('stage_2')->select('tournament_id', 'team_id')->where('tournament_id', $id)->where('winner', 1)->get();
   }
   public static function getStage_3($id)
   {
      return DB::table('stage_3')->select('tournament_id', 'team_id', 'points')->where('tournament_id', $id)->where('winner', 1)->get();
   }

   public static function setStage_3($turnir_id, $data)
   {

      return DB::table('stage_3')->insert($data);
   }
   public static function setWinners($turnir_id, $data)
   {

      return DB::table('winners')->insert($data);
   }

   public static function stage_1($turnir_id)
   {
      $is_has = DB::table('stage_1')->exists();
      if ($is_has == true) {
         return DB::table('stage_1')
            ->join('team', 'stage_1.team_id', '=', 'team.id')
            ->join('tournaments', 'stage_1.tournament_id', '=', 'tournaments.id')
            ->select('stage_1.id', 'stage_1.group_id', 'stage_1.tournament_id', 'stage_1.team_id', 'stage_1.points', 'stage_1.winner',  'team.name as team_name', 'tournaments.name as tournaments_name')
            ->where('tournament_id', $turnir_id)
            ->get();
      } else return null;
   }
   public static function stage_2($turnir_id)
   {
      $is_has = DB::table('stage_2')->exists();
      if ($is_has == true) {
         return DB::table('stage_2')
            ->join('team', 'stage_2.team_id', '=', 'team.id')
            ->join('tournaments', 'stage_2.tournament_id', '=', 'tournaments.id')
            ->select('stage_2.id', 'stage_2.tournament_id', 'stage_2.team_id', 'stage_2.points', 'stage_2.winner',  'team.name as team_name', 'tournaments.name as tournaments_name')
            ->where('tournament_id', $turnir_id)
            ->get();
      } else return null;
   }
   public static function stage_3($turnir_id)
   {
      $is_has = DB::table('stage_3')->exists();
      if ($is_has == true) {
         return DB::table('stage_3')
            ->join('team', 'stage_3.team_id', '=', 'team.id')
            ->join('tournaments', 'stage_3.tournament_id', '=', 'tournaments.id')
            ->select('stage_3.id', 'stage_3.tournament_id', 'stage_3.team_id', 'stage_3.points', 'stage_3.winner',  'team.name as team_name', 'tournaments.name as tournaments_name')
            ->where('tournament_id', $turnir_id)
            ->get();
      } else return null;
   }
   public static function getWinners($turnir_id)
   {
      $is_has = DB::table('winners')->exists();
      if ($is_has == true) {
         return DB::table('winners')
            ->join('team', 'winners.team_id', '=', 'team.id')
            ->join('tournaments', 'winners.tournament_id', '=', 'tournaments.id')
            ->select('winners.id', 'winners.tournament_id', 'winners.team_id', 'winners.points', 'winners.winner',  'team.name as team_name', 'tournaments.name as tournaments_name')
            ->where('tournament_id', $turnir_id)->where('winner', 1)
            ->get();
      } else return null;
   }
   public static function changeTournamentStatus($turnir_id)
   {
      return DB::table('tournaments')->where('id', $turnir_id)->update(['active' => 0]);
   }
   /* public static function setPointsStage_1($turnir_id,$data){


     return DB::table('stage_1')->where('tournament_id', $turnir_id)->update($data);
   } */
   public static function setResults($turnir_id)
   {
   }

   public static function getOrders()
   {
      $is_has = DB::table('orders')->exists();
      if ($is_has == true) {
         return DB::table('orders')
         ->join('users', 'orders.user_id' , '=', 'users.id')
         ->select('orders.text', 'orders.user_id', 'orders.status', 'users.email', 'users.status as user_status' )
         ->orderBy('orders.status', 'desc')
         ->get();
      } else return null;
   }

   public static function ordersApply($id)
   {
       DB::table('users_profile2')->where('user_id', $id)->update(['status' => 1]);
       DB::table('orders')->where('user_id', $id)->update(['status' => 1]);
   }
   public static function ordersRejected($id)
   {
    //  DB::table('users_profile2')->where('user_id', $id)->update(['status' => 0]);
      DB::table('orders')->where('user_id', $id)->update(['status' => 2]);
   }

     public static function getOrdersTeam()
   {
   
         $orders = DB::table('orders_team')
      
         ->select('orders_team.name as new_name', 'orders_team.team_id', 'orders_team.status', 'orders_team.old_name')
         ->orderBy('orders_team.status', 'desc')
         ->get();
         return $orders->count() ? $orders : null;
   }
   public static function changeTeamName($id, $name)
   {
      DB::table('team')->where('id', $id)->update(['name' => $name]);
      DB::table('orders_team')->where('team_id', $id)->update(['status' => 1]);
   }
   public static function log_change_name($data)
   {
      DB::table('log_change_name')->insert($data);
     
   }
   public static function getTeamMembersEmail($id){
         return DB::table('team_members')
         ->join('users', 'team_members.user_id', '=' ,'users.id')
         ->select('users.email')
         ->where('team_members.team_id', $id)
         ->get();
   }
   public static function getTournamentsMembersEmail($id){
      return DB::table('tournaments_members')
      ->join('users', 'tournaments_members.user_id', '=' ,'users.id')
      ->select('users.email')
      ->where('tournaments_members.team_id', $id)
      ->get();
}
   public static function getTeamMembersEmailCaptain($id)
   {
      return DB::table('team_members')
      ->join('users', 'team_members.user_id', '=', 'users.id')

      ->where('team_members.team_id', $id)->where('team_members.role', 'captain')
         ->value('users.email');
   }
   public static function ordersTeamRejected($id)
   {
      //  DB::table('users_profile2')->where('user_id', $id)->update(['status' => 0]);
      DB::table('orders_team')->where('team_id', $id)->update(['status' => 2]);
   }

   public static function createStage($data){
      return DB::table('stages')->insert($data);
   }

   public static function createGroup($data){
      return DB::table('tournament_groups')->insertGetId( $data);
   }

   public static function createGroupTeams($data){
       dd($data, 1);
      return DB::table('tournament_group_teams')->insert($data);
   }

   public static function getStages($turnir_id){
      $is_has = DB::table('stages')->where('tournament_id', $turnir_id)->exists();
      if ($is_has == true) {
            return DB::table('stages')->where('tournament_id', $turnir_id)->get();
      }else return null;
   }

   public static function getGroups($turnir_id){

      $is_has = DB::table('tournament_groups')->where('tournament_id', $turnir_id)->exists();
      if ($is_has == true) {
            return DB::table('tournament_groups')
            ->where('tournament_id', $turnir_id)->get();
      }else return null;
   }

   public static function getGroupTeams($turnir_id){
      $is_has = DB::table('tournament_group_teams')->where('tournament_id', $turnir_id)->exists();
      if ($is_has == true) {
            return DB::table('tournament_group_teams')
            ->join('team', 'tournament_group_teams.team_id' , '=', 'team.id')

            ->select('team.name','tournament_group_teams.id', 'tournament_group_teams.kills_pts', 'tournament_group_teams.place_pts' ,  )
            ->where('tournament_id', $turnir_id)->get();
      }else return null;
   }

   public static function getTeamsByTurnirId($turnir_id){
      return DB::table('tournamets_team')
      ->join('team', 'tournamets_team.team_id', '=' , 'team.id')
      ->select('team.name', 'team.id')
      ->where('tournamets_team.tournament_id', $turnir_id)->where('tournamets_team.status' ,'accepted')->get();
   }
}
