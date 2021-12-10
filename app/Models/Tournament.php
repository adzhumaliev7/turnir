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
}
