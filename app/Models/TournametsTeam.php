<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournametsTeam extends Model
{
    protected $fillable = ['tournament_id', 'team_id', 'status'];
    protected $table = 'tournamets_team';
    use HasFactory;

    public function team() {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

    public function turnir() {
        return $this->hasOne(Tournament::class, 'id', 'tournament_id');
    }

    public function tournamentsMembers(){
        return $this->hasMany(TournamentMembers::class, 'team_id', 'team_id');
    }

}
