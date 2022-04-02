<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Log_gameid extends Model
{
    use HasFactory;

    protected $fillable = [ 'oldvalue', 'newvalue', 'user_id', ];

    public static function get($id){
        $logs = DB::table('log_gameids')
         ->orderBy('log_gameids.id', 'desc')
         ->get();
         return $logs->count() ? $logs : null;
    }
}
