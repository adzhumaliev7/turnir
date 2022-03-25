<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Stage;
use App\Models\StagesGroup;
use App\Models\Tournament;
use App\Models\TournamentGroup;
use App\Models\TournametsTeam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PattyController extends Controller
{

    public function standings($turnirId, $stageId = null, $groupId = null,  Request $request){

        $turnir = Tournament::findOrFail($turnirId)->load('stages');
        if (!$stageId) {
            $stage = $turnir->stages->first();
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

    public function duplication($turnirId, Request $request) {
        $turnir = Tournament::with('stages.groups.matches', 'order')->findOrFail($turnirId);

        $newTurnir = $turnir->replicate()->fill(['name' => $turnir->name . '_копия']);
        $newTurnir->save();

        foreach ($turnir->order as $order) {
            $newOrder = $order->replicate()->fill(['tournament_id' => $newTurnir->id]);

            foreach ( $turnir->members->where('team_id',$order->team_id ) as $member){
                $newMember = $member->replicate()->fill(['tournament_id' => $newTurnir->id]);;
                $newMember->save();
            }
            $newOrder->save();
        }

        foreach ($turnir->stages as $stage) {
            $newStage = $stage->replicate()->fill(['tournament_id' => $newTurnir->id]);
            $newStage->save();
            foreach ($stage->groups as $group) {
               $newGroup = $group->replicate()->fill(['tournament_id' => $newTurnir->id, 'stage_id' => $newStage->id]);
               $newGroup->save();

               foreach ($group->matches as $match){
                   $newMatch= $match->replicate()->fill(['tournament_id' => $newTurnir->id, 'stage_id' => $newStage->id, 'group_id' => $newGroup->id]);
                   $newMatch->save();
               }

            }
        }
        return redirect()->back();
    }

    public function finish($turnirId, Request $request){
        $turnir = Tournament::findOrFail($turnirId);
        $turnir->active = 0;
        $turnir->save();
        return redirect()->back();
    }

}
