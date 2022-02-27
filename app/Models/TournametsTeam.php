<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournametsTeam extends Model
{
    protected $fillable = ['tournament_id'];
    protected $table = 'tournamets_team';
    use HasFactory;

    public function team() {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

}
