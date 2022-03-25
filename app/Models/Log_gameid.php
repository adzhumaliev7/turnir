<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_gameid extends Model
{
    use HasFactory;

    protected $fillable = [ 'oldvalue', 'newvalue', 'user_id', 'date'];
}
