<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Admin extends Model
{
   public function getUsersCount(){
      $is_has = DB::table('users')->exists();
    if($is_has == true){
       return DB::table('users')->count();
    }
    else return NULL;
   }
     public function getTeamsCount(){
        $is_has = DB::table('team')->exists();
    if($is_has == true){
       return DB::table('team')->count();
    }else return NULL;
   }


   public function get(){
         $is_has = DB::table('users_profile2')->exists();
    if($is_has == true){
       return DB::table('users_profile2')->select('id','phone','fio','email','city', 'verification')->get();
    }else return NULL;
   }
     public function getTeams(){
        $is_has = DB::table('team')->exists();
    if($is_has == true){
       return DB::table('team')->select('id','name')->get();
    }else return NULL;
   }
    public function getById($id){
       return DB::table('users_profile2')->where('id', $id)->get();
   }

   public function verified($id){
        return DB::table('users_profile2')->where('id', $id)->update(['verification' => 'verified']);
   }

   public function getTournaments(){
     $is_has = DB::table('tournaments')->exists();
    if($is_has == true){
       return DB::table('tournaments')->select('id','name','country','tournament_start','games_time')->get();
    }else return NULL;
   }
   public function createTournament($data){
     return DB::table('tournaments')->insert($data);
   }

     public function getTournamentByID($id){
     return DB::table('tournaments')->where('id', $id)->get();
   }
     public function editTournament($id, $data){
     return DB::table('tournaments')->where('id', $id)->update($data);
   }
    public function tournamentDelete($id){
     return DB::table('tournaments')->where('id', $id)->delete();
   }

}
