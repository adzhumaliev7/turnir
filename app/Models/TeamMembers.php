<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function team() {
        return $this->belongsTo(Team::class);
    }
}
