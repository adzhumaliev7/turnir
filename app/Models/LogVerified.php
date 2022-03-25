<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogVerified extends Model
{
    use HasFactory;

    protected $table = 'log_verified';
    protected $fillable = ['user_id', 'moder_id', 'description', 'date', 'status'];
}
