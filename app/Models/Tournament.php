<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
  public function getTournaments(){
       return DB::table('tournaments')->select('id','name','country','tournament_start','games_time')->get();
   }
    public function createTournament($data){
     return DB::table('tournaments')->insert($data);
   }
}
