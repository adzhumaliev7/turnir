<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentMatchesResult extends Model
{
    use HasFactory;

    protected $fillable = ['stages_id', 'team_id', 'kills_pts'];


    public function matche(){
        return $this->hasOne(TournamentMatches::class, 'id', 'match_id');
    }

}
