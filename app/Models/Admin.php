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

   public static function getModerators()
   {

      $is_has = DB::table('model_has_roles')->where('role_id', 3)->exists();
      if ($is_has == true) {
         return DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->select('id', 'email')
            ->where('role_id', 3)
            ->get();
      } else return NULL;
   }

   public static function delteModeratos($id)
   {
      $data['users'] = DB::table('users')->where('id', $id)->delete();
      $data['models'] = DB::table('model_has_roles')->where('model_id', $id)->delete();
   }

   public static function getTeams()
   {
      $is_has = DB::table('team')->exists();
      if ($is_has == true) {
         return DB::table('team')->select('id', 'name')->get();
      } else return NULL;
   }
   public static function getById($id)
   {
      return DB::table('users_profile2')->where('id', $id)->get();
   }

   public static function verified($id)
   {
      return DB::table('users_profile2')->where('id', $id)->update(['verification' => 'verified']);
   }
   public static function rejected($id)
   {
      return DB::table('users_profile2')->where('id', $id)->update(['verification' => 'rejected']);
   }

   public static function getTournaments()
   {
      $is_has = DB::table('tournaments')->exists();
      if ($is_has == true) {
         return DB::table('tournaments')->select('id', 'name', 'country', 'tournament_start', 'games_time')->where('status', 'save')->get();
      } else return NULL;
   }

   public static function getTournamentsDraft()
   {
      $is_has = DB::table('tournaments')->exists();
      if ($is_has == true) {
         return DB::table('tournaments')->select('id', 'name', 'country', 'tournament_start', 'games_time')->where('status', 'draft')->get();
      } else return NULL;
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
   public static function geTeamMembers($tournament_id)
   {

      return DB::table('team_members')
         ->join('team', 'team_members.team_id', '=', 'team.id')
         ->join('users_profile2', 'team_members.user_id', '=', 'users_profile2.user_id')
         ->join('tournamets_team', 'team.id', '=', 'tournamets_team.team_id')
         ->join('tournaments', 'tournamets_team.tournament_id', '=', 'tournaments.id')
         ->select('team_members.user_id', 'users_profile2.login', 'team.name')
         ->where('tournamets_team.tournament_id', $tournament_id)->where('tournamets_team.status', 'processed')->get();
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
      $is_has = DB::table('help')->exists();
      if ($is_has == true) {
         return DB::table('help')->select('id', 'title', 'description')->get();
      } else return NULL;
   }

   public static function getHelpById($id)
   {
      return DB::table('help')->select('id', 'title', 'description')->where('id', $id)->get();
   }

   public static function getUsersEmail($id)
   {
      return DB::table('users')->select('email')->where('id', $id)->get();
   }

   public static function addBan($id)
   {
      return DB::table('users')->where('id', $id)->update(['status' => 'ban']);
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

      $count =  DB::table('tournamets_team')->where('tournament_id', $turnir_id)->where('status', 'accepted')->count();
      if ($count < 2) {
         $group_id = 1;
      }
      if ($count >= 2 && $count <= 4) {
         $group_id = 2;
      }
      if ($count >= 4 && $count <= 6) {
         $group_id = 3;
      }
      if ($count >= 6 && $count <= 8) {
         $group_id = 4;
      }
      return DB::table('tournamets_team')->where('team_id', $id)->update(['status' => 'accepted', 'group_id' => $group_id]);
   }
   public static function refuseTeam($id)
   {
      return DB::table('tournamets_team')->where('team_id', $id)->delete();
   }

   public function getFeedback()
   {
      $is_has = DB::table('feedback')->exists();
      if ($is_has == true) {
         return DB::table('feedback')->select('fio', 'phone', 'email', 'description')->get();
      } else return NULL;
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
      /* $count =  DB::table('stage_1')->where('tournament_id', $turnir_id)->where('winner', 1)->count();
      if ($count < 2) {
         $group_id = 1;
      }
      if ($count >= 2 && $count <= 4) {
         $group_id = 2;
      }
      if ($count >= 4 && $count <= 6) {
         $group_id = 3;
      }
      if ($count >= 6 && $count <= 8) {
         $group_id = 4;
      }
      $data['group_id'] = $group_id; */
     return DB::table('stage_2')->insert($data);
   }

   public static function getStage_2($id)
   {
      return DB::table('stage_2')->select('tournament_id', 'team_id')->where('tournament_id', $id)->where('winner', 1)->get();
   }

   public static function setStage_3($turnir_id, $data)
   {
      /* $count =  DB::table('stage_1')->where('tournament_id', $turnir_id)->where('winner', 1)->count();
      if ($count < 2) {
         $group_id = 1;
      }
      if ($count >= 2 && $count <= 4) {
         $group_id = 2;
      }
      if ($count >= 4 && $count <= 6) {
         $group_id = 3;
      }
      if ($count >= 6 && $count <= 8) {
         $group_id = 4;
      }
      $data['group_id'] = $group_id; */
      return DB::table('stage_3')->insert($data);
   }

   public static function stage_1($turnir_id){
      $is_has = DB::table('stage_1')->exists();
      if ($is_has == true) {
         return DB::table('stage_1')
         ->join('team', 'stage_1.team_id', '=' , 'team.id')
         ->join('tournaments', 'stage_1.tournament_id', '=' , 'tournaments.id')
         ->select('stage_1.group_id', 'stage_1.tournament_id','stage_1.points', 'stage_1.winner',  'team.name as team_name' , 'tournaments.name as tournaments_name')
         ->where('tournament_id', $turnir_id)
         ->get();
      }else return null;
   }  
   public static function stage_2($turnir_id)
   {
      $is_has = DB::table('stage_2')->exists();
      if ($is_has == true) {
         return DB::table('stage_2')
         ->join('team', 'stage_2.team_id', '=', 'team.id')
         ->join('tournaments', 'stage_2.tournament_id', '=', 'tournaments.id')
         ->select('stage_2.points', 'stage_2.tournament_id', 'stage_2.winner',  'team.name as team_name', 'tournaments.name as tournaments_name')
         ->where('tournament_id', $turnir_id)
         ->get();
      }else return null;   
   }
   public static function stage_3($turnir_id)
   {
      $is_has = DB::table('stage_3')->exists();
      if ($is_has == true) {
         return DB::table('stage_3')
         ->join('team', 'stage_3.team_id', '=', 'team.id')
         ->join('tournaments', 'stage_3.tournament_id', '=', 'tournaments.id')
         ->select('stage_3.points', 'stage_3.tournament_id', 'stage_3.winner',  'team.name as team_name', 'tournaments.name as tournaments_name')
         ->where('tournament_id', $turnir_id)
         ->get();
      }else return null;
   }
}
