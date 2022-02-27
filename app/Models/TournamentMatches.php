<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentMatches extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'tournament_id', 'stage_id'];

    public function res() {
        return $this->hasMany(TournamentMatchesResult::class, 'match_id', 'id');
    }

}
