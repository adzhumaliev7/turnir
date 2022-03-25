<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentMembers extends Model
{
    use HasFactory;

    protected $table = 'tournaments_members';
    protected $fillable = ['tournament_id'];

    public function matches() {
        return $this->hasMany(TournamentMatchesResult::class, 'team_id');
    }

    public function user( ) {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function turnir( ) {
        return $this->hasOne(Tournament::class, 'id', 'tournament_id');
    }

}
