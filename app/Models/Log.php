<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;


   protected $fillable = ['model_id', 'model_type', 'log_type', 'old_value', 'new_value', 'description', 'user_id'];

    public function model(){
        return $this->morphTo();
    }

    public function type() {
        return $this->hasOne( LogType::class, 'id', 'log_type');
    }

    public function newAdminUser(){
        return $this->hasOne( User::class, 'id', 'new_value');
    }

    public function oldAdminUser(){
        return $this->hasOne( User::class, 'id', 'old_value');
    }
    public function ban(){
        return $this->hasOne(Team::class, 'id', 'model_type');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function turnir(){
        return $this->hasOne( Tournament::class, 'id', 'old_value');
    }
}
