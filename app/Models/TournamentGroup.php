<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TournamentGroupTeam;
class TournamentGroup extends Model
{
    use HasFactory;
    protected $fillable = ['group_name', 'tournament_id', 'stage_id'];

    public function tournamentGroupTeams() {
        return $this->hasMany(TournamentGroupTeam::class, 'group_id');
    }

    public function turnir() {
        return $this->hasOne(Tournament::class, 'id', 'tournament_id');
    }

    public function stage() {
        return $this->hasOne(Stage::class, 'id', 'stage_id');
    }

    public function matches() {
        return $this->hasMany(TournamentMatches::class, 'group_id');
    }

    public function remove(){
        $tournamentGroupTeams = $this->tournamentGroupTeams->where('tournament_id', $this->tournament_id);

        foreach ($tournamentGroupTeams as $team) {
            $team->remove();
        }
        $this->delete();
    }


//stage_id
//group_id
}
