<?php

namespace App\Models;
use App\Models\TournamentGroup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = ['stage_number', 'stage_name', 'tournament_id'];

    public function groups() {
        return $this->hasMany(TournamentGroup::class);
    }

    public function matches() {
        return $this->hasMany(TournamentMatchesResult::class, 'stages_id');
    }

//    public function teams() {
//
//    }

    public function turnir() {
        return $this->hasOne(Tournament::class, 'id', 'tournament_id');
    }

}
