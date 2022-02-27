<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamStoreReuest;
use App\Models\Stage;
use App\Models\StagesGroup;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\TournamentGroup;
use App\Models\TournamentGroupTeam;
use App\Models\TournamentMatches;
use App\Models\TournamentMatchesResult;
use App\Models\TournamentMembers;
use App\Models\TournametsTeam;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function show($tournamentGroupTeamsId, Request $request){
        $tournamentGroupTeam = TournamentGroupTeam::findOrFail($tournamentGroupTeamsId)->load('team.сaptain', 'team.teammates.user', 'team.teammates.matches', 'group.matches', 'turnir', 'stage');
        $matches = TournamentMatches::where('tournament_id',  $tournamentGroupTeam->turnir->id)->where('stage_id', $tournamentGroupTeam->stage->id)->get();

        return view('admin.home.tournament.team', compact('tournamentGroupTeam','matches'));
    }

    public function create($turnirId, $groupId, Request $request) {

        $turnir =  Tournament::find($turnirId);
        $group = TournamentGroup::find($groupId);
        $stage = Stage::find($group->stage_id);

        $arr = [];
        foreach($stage->groups as $group) {
            foreach($group->tournamentGroupTeams->pluck('team_id')->toArray() as $team) {
                $arr[] =$team;
            }
        }



//        $result =  $this->startConditions()
//            ->selectRaw(\DB::raw('id, CONCAT (name, " - ", display_name, " ( ", description , " ) " ) AS id_title'))
//            ->toBase()
//            ->get()->pluck('id_title','id')->toArray();
//


//        dd(TournametsTeam::select(['tournamets_team.id AS tournamets_team.id', 'tournamets_team.team_id AS tournamets_team.team_id', 'team.*'])->join('team', 'tournamets_team.team_id', 'team.id')->toBase()->get());
//        ->join('users_profile2', 'team.user_id', '=', 'users_profile2.user_id')
//            ->select('users_profile2.email')
//            ->where('team.id', 1)
//            ->get();

        $teams = TournametsTeam::where('status', 'accepted')->where('tournament_id', $turnirId)->whereNotIn('team_id', $arr)->with('team')->get();
        $all = TournametsTeam::where('status', 'accepted')->where('tournament_id', $turnirId)->get();
//        dump($all[0]->team->games()->where('stage_id', $stage->id)->first()->group, $all[1]->team);
        return view('admin.home.tournament.create_team_new', compact('turnir', 'teams', 'group', 'stage', 'all', 'arr'));

    }

    public function store( TeamStoreReuest $request) {
        $data = $request->validated();

        $group = TournamentGroup::find($data['group_id']);
        $turnir =  $group->turnir;

        $insert = [];
        foreach ($data['teams'] ?? [] as $key => $match) {
            $insert[$key]['team_id'] =$match;
            $insert[$key]['tournament_id']   = $turnir->id;
            $insert[$key]['group_id'] = $group->id;
            $insert[$key]['stage_id'] = $group->stage_id;
        }

        $teams = TournamentGroupTeam::insert($insert);
        return redirect()->route('standings',[ $turnir->id, $group->stage_id, $group->id]);
    }

    public function destroy($tournamentGroupTeamsId, Request $request){
        $tournamentGroupTeams = TournamentGroupTeam::findOrFail($tournamentGroupTeamsId);
        $tournamentGroupTeams->remove();

        return redirect()->back();
    }

}
