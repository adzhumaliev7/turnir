<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Stage;
use App\Models\StagesGroup;
use App\Models\Tournament;
use App\Models\TournamentGroup;
use Illuminate\Http\Request;

class PattyController extends Controller
{

    public function standings($turnirId, $stageId = null, $groupId = null,  Request $request){

        $turnir = Tournament::findOrFail($turnirId)->load('stages');
        if (!$stageId) {
            $stage = $turnir->stages->first();
//            ->load('groups')
        } else {
            $stage = Stage::findOrFail($stageId)->load('groups');
        }

        if (!$groupId){
            $group = $stage ?  $stage->groups()->with('tournamentGroupTeams.group.matches.res', 'matches', 'tournamentGroupTeams.team.teammates')->first(): null;
        } else {
            $group = TournamentGroup::findOrFail($groupId)->load('tournamentGroupTeams.group.matches.res', 'matches', 'tournamentGroupTeams.team.teammates');
        }

        return view('admin.home.tournament.tournaments_about_new', compact('turnir', 'stage', 'group'));
    }


}
