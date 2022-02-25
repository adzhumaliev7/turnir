<?php

namespace App\Models;

use App\Models\Team;
use App\Models\TournamentMatchesResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class TournamentGroupTeam extends Model
{
    use HasFactory;
    use HasRelationships;

    protected $fillable = ['group_id', 'team_id', 'tournament_id', 'stage_id', 'place_pts', 'kills_pts'];

    public function team() {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

    public function group() {
        return $this->hasOne(TournamentGroup::class, 'id', 'group_id');
    }

    public function teammates(){
        return $this->hasManyThrough(TournamentMembers::class, Team::class, 'id','team_id', 'team_id');
    }


    public function qqq() {




//        return $this->hasManyDeep(
//            Comment::class,
//            [User::class, Post::class], // Intermediate models, beginning at the far parent (Country).
//            [
//                'country_id', // Внешний ключ в таблице "users".
//                'user_id', // Внешний ключ в таблице "posts".
//                'post_id' // Внешний ключ в таблице «комментарии».
//            ],
//            [
//                'id', // Local key on the "countries" table.
//                'id', // Local key on the "users" table.
//                'id'  // Local key on the "posts" table.
//            ]
//        );




        return $this->hasManyDeep(TournamentMembers::class, [
            Team::class
        ],
        [
            'id',
            'team_id',
        ],
        [
            'team_id',
            'id'
        ]);
    }


//    public function matches() {
//
//
////        return $this->hasManyThrough(
////            Deployment::class,
////            Environment::class,
////            'project_id', // Внешний ключ в таблице `environments` ...
////            'environment_id', // Внешний ключ в таблице `deployments` ...
////            'id', // Локальный ключ в таблице `projects` ...
////            'id' // Локальный ключ в таблице `environments` ...
////        );
//
//        return $this->hasManyThrough(TournamentMatchesResult::class, TournamentMembers::class, 'team_id', 'team_id', 'id', 'id');
//
//        return $this->hasMany(TournamentMatchesResult::class, 'team_id');
//    }

    public function turnir() {
        return $this->hasOne(Tournament::class, 'id', 'tournament_id');
    }

    public function stage() {
        return $this->hasOne(Stage::class, 'id', 'stage_id');
    }

    public function remove(){
        $teammates = $this->teammates->where('tournament_id', $this->tournament_id);
        TournamentMatchesResult::where('team_id', $teammates->pluck('id')->count() ? $teammates->pluck('id'): [] )->delete();
        $this->delete();

    }


}
