<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TournametsTeam;
class Tournament extends Model
{

//Ахуенный код
protected $fillable = ['name'];

public function stages(){
  return $this->hasMany(Stage::class);
}

public function order() {
  return $this->hasMany(TournametsTeam::class);
}

public function members() {
  return $this->hasMany(TournamentMembers::class);
}

//.Ахуенный код





public static function getTournaments(){

  $tournaments = DB::table('tournaments')->where('status', 'save')
  ->orderBy('tournaments.id', 'desc')
  ->get();
  return $tournaments->count() ? $tournaments : null;

}
public static function createTournament($data){
return DB::table('tournaments')->insert($data);
}
public static function getTournamentById($id){

  $tournaments = DB::table('tournaments')->where('id', $id)->get();
  return $tournaments->count() ? $tournaments : null;
}

public static function getTeamById($id){

 return DB::table('team')->select('id')->where('user_id', $id)->first();

}
public static function joiToTournament($data){
return DB::table('tournamets_team')->insert($data);
}

public static function getTeams($tournament_id){

  $teams =  DB::table('tournamets_team')
  ->join('team', 'tournamets_team.team_id', '=', 'team.id')
  //->join('team_members', 'tournamets_team.team_id' , '=', 'team_members.team_id')
   ->select('team.name','team.user_id','tournamets_team.team_id','tournamets_team.status')
  ->where('tournamets_team.tournament_id', $tournament_id)->where('tournamets_team.status', 'accepted')->get();
  return $teams->count() ? $teams : null;
}
public static function teamsCount($id){

 return DB::table('tournamets_team')->where('tournament_id', $id)->where('status', 'accepted')->count();
}

public static function checkTeam($user_id){
  return  DB::table('team_members')->where('user_id', $user_id)->where('role', 'captain')->value('team_id');
}
public static function hasTeam($turnir_id, $team_id){

  return  DB::table('tournamets_team')->where('tournament_id', $turnir_id)->where('team_id', $team_id)->exists();

}
public static function getTeamStatus($turnir_id, $team_id){

  return  DB::table('tournamets_team')->where('tournament_id', $turnir_id)->where('team_id', $team_id)->value('status');

}
public static function getMembers($team_id)
{
 $memberes = DB::table('team_members')
 ->join('users', 'team_members.user_id' , '=' , 'users.id')

 //->leftJoin('tournaments_members', 'team_members.user_id' , '=' , 'tournaments_members.user_id')
->where('team_members.team_id', $team_id)->where('users.verified', 1)->where('users.status', null)
//     ->where('tournaments_members.user_id', null)
 /*      ->whereNotNull('users_profile2.game_id')
     ->whereNotNull('users_profile2.nickname')  */
 ->select('team_members.team_id', 'team_members.user_id', 'users.name','users.nickname','users.game_id' )
->get();
return $memberes->count() ? $memberes : null;
}
public static function test($id)
{
/*   return DB::table('table_1')
  ->leftJoin('table_2', 'table_1.name' , '=' , 'table_2.name')
  ->where('table_2.name', null)
  ->select('table_1.name' )
  ->get(); */
   return DB::table('table_1')
    ->leftJoin('table_2', 'table_1.name' , '=' , 'table_2.name')
    ->where('table_2.name', null)
    ->where(function($query, $id = 5) {
      $query->where('table_2.any_id' ,'!= ', $id)
        ->orWhereNull('table_2.any_id');
    })
    ->select('table_1.name' )
    ->get(); 
}

}
