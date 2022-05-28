<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_logo extends Model
{

    use HasFactory;
    protected $table = 'users_logo';
    protected $fillable = ['user_id', 'photo'];
}
