<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Illuminate\Support\Facades\DB;
class Log_orders_team extends Model
{
    use HasFactory;
    protected $fillable = ['team_id', 'admin', 'descriptions', 'log_type','tournament_id'];



    public function team() {
        return $this->hasOne(Team::class);
    }
    public static  function getAll($type){
        $log =  DB::table('log_orders_teams')
        ->join('team','log_orders_teams.team_id','=','team.id')
        ->select('log_orders_teams.*', 'team.name')
        ->where('log_orders_teams.log_type', $type)
        ->get();
      return $log->count() ? $log : null;
    }

}
