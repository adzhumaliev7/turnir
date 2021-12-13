<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
  public function getTournaments(){
     $is_has = DB::table('tournaments')->exists();
    if($is_has == true){
       return DB::table('tournaments')->select()->get();
    }else return NULL;
    
   }
    public function createTournament($data){
     return DB::table('tournaments')->insert($data);
   }
     public function getTournamentById($id){
     return DB::table('tournaments')->where('id', $id)->get();
   }

   public function getTeamById($id){
       $is_has = DB::table('team')->where('user_id', $id)->exists();
    if($is_has == true){
     return DB::table('team')->select('id')->where('user_id', $id)->first();
    }
    else return NULL;
   }
   public function joiToTournament($data){
    return DB::table('tournamets_team')->insert($data);
   }

   public function getTeams($tournament_id, $user_id){
       $is_has = DB::table('tournamets_team')->where('tournament_id', $tournament_id)->exists();
    if($is_has == true){
     return  DB::table('tournamets_team')
     ->join('team', 'tournamets_team.team_id', '=', 'team.id')
     //->join('team_members', 'tournamets_team.team_id' , '=', 'team_members.team_id')
      ->select('team.name','team.user_id','tournamets_team.team_id')
     ->where('tournamets_team.tournament_id', $tournament_id)->get();
    }else return NULL;
    
    
  }

  public function checkTeam($user_id){
    $has = DB::table('team_members')->where('user_id', $user_id)->exists();
      if($has == true){
     return  DB::table('team_members')->select('team_id', 'user_id', 'role')->where('user_id', $user_id)->first();
    }else  return NULL;
  }
}
