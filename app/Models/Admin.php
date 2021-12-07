<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Admin extends Model
{
   public function getUsersCount(){
       return DB::table('users')->count();
   }
     public function getTeamsCount(){
       return DB::table('team')->count();
   }


   public function get(){
       return DB::table('users_profile2')->select('id','phone','fio','email','city', 'verification')->get();
   }
     public function getTeams(){
       return DB::table('team')->select('id','name')->get();
   }
    public function getById($id){
       return DB::table('users_profile2')->where('id', $id)->get();
   }

   public function verified($id){
        return DB::table('users_profile2')->where('id', $id)->update(['verification' => 'verified']);
   }

   public function getTournaments(){
       return DB::table('tournaments')->select('id','name','country','tournament_start','games_time')->get();
   }
   public function createTournament($data){
     return DB::table('tournaments')->insert($data);
   }
}
