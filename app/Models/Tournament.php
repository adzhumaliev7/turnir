<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TournametsTeam;
class Tournament extends Model
{

//Ахуенный код
  public function stages(){

    return $this->hasMany(Stage::class);

  }

  public function order() {
    return $this->hasMany(TournametsTeam::class);
}

//.Ахуенный код





public static function getTournaments(){
   
  $tournaments = DB::table('tournaments')->select()->where('status', 'save')->get();
  return $tournaments->count() ? $tournaments : null;

}
public static function createTournament($data){
return DB::table('tournaments')->insert($data);
}
public static function getTournamentById($id){
return DB::table('tournaments')->where('id', $id)->get();
}

public static function getTeamById($id){

 return DB::table('team')->select('id')->where('user_id', $id)->first();

}
public static function joiToTournament($data){
return DB::table('tournamets_team')->insert($data);
}

public static function getTeams($tournament_id, $user_id){

$teams =  DB::table('tournamets_team')
->join('team', 'tournamets_team.team_id', '=', 'team.id')
//->join('team_members', 'tournamets_team.team_id' , '=', 'team_members.team_id')
 ->select('team.name','team.user_id','tournamets_team.team_id','tournamets_team.status')
->where('tournamets_team.tournament_id', $tournament_id)->get();
return $teams->count() ? $teams : null;
}
public static function teamsCount($id){

 return DB::table('tournamets_team')->where('tournament_id', $id)->count();
}

public static function checkTeam($user_id){

return  DB::table('team_members')->select('team_id', 'user_id', 'role')->where('user_id', $user_id)->first();

}

public static function getMembers($team_id)
{
 $memberes = DB::table('team_members')
 ->join('users', 'team_members.user_id' , '=' , 'users.id')
 ->join('users_profile2', 'team_members.user_id' , '=' , 'users_profile2.user_id')
 ->leftJoin('tournaments_members', 'team_members.user_id' , '=' , 'tournaments_members.user_id')
->where('team_members.team_id', $team_id)->where('users.verified', 1)->where('tournaments_members.user_id', null)->whereNotNull('users_profile2.game_id')->whereNotNull('users_profile2.nickname')
 ->select('team_members.team_id', 'team_members.user_id', 'users.name', 'tournaments_members.user_id as tour_us_id')
->get();
return $memberes->count() ? $memberes : null;
}
}
