<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
  public static function getTournaments(){
     $is_has = DB::table('tournaments')->exists();
    if($is_has == true){
       return DB::table('tournaments')->select()->where('status', 'save')->get();
    }else return NULL;
    
   }
    public static function createTournament($data){
     return DB::table('tournaments')->insert($data);
   }
     public static function getTournamentById($id){
     return DB::table('tournaments')->where('id', $id)->get();
   }

   public static function getTeamById($id){
       $is_has = DB::table('team')->where('user_id', $id)->exists();
    if($is_has == true){
     return DB::table('team')->select('id')->where('user_id', $id)->first();
    }
    else return NULL;
   }
   public static function joiToTournament($data){
    return DB::table('tournamets_team')->insert($data);
   }
  
   public static function getTeams($tournament_id, $user_id){
       $is_has = DB::table('tournamets_team')->where('tournament_id', $tournament_id)->exists();
    if($is_has == true){
     return  DB::table('tournamets_team')
     ->join('team', 'tournamets_team.team_id', '=', 'team.id')
     //->join('team_members', 'tournamets_team.team_id' , '=', 'team_members.team_id')
      ->select('team.name','team.user_id','tournamets_team.team_id','tournamets_team.status')
     ->where('tournamets_team.tournament_id', $tournament_id)->get();
    }else return NULL;

  }

  public static function checkTeam($user_id){
    $has = DB::table('team_members')->where('user_id', $user_id)->exists();
      if($has == true){
     return  DB::table('team_members')->select('team_id', 'user_id', 'role')->where('user_id', $user_id)->first();
    }else  return NULL;
  }

  public static function getMembers($team_id)
  {
      return  DB::table('team_members')
      ->join('users', 'team_members.user_id' , '=' , 'users.id')
      ->join('users_profile2', 'team_members.user_id' , '=' , 'users_profile2.user_id')
      ->leftJoin('tournaments_members', 'team_members.user_id' , '=' , 'tournaments_members.user_id')
  
    ->where('team_members.team_id', $team_id)->where('users_profile2.status', 1)->where('tournaments_members.user_id', null)
      ->select('team_members.team_id', 'team_members.user_id', 'users.name', 'tournaments_members.user_id as tour_us_id')
     ->get();
  }
}
