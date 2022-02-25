<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MatchesResultStoreRequest;
use App\Models\Stage;
use App\Models\Tournament;
use App\Models\TournamentGroup;
use App\Models\TournamentGroupTeam;
use App\Models\TournamentMatches;
use App\Models\TournamentMatchesResult;
use App\Models\TournamentMembers;
use Illuminate\Http\Request;

class MatchesController extends Controller
{

    public function edit($teamId ,Request $request) {
        $tournamentGroupTeam = TournamentGroupTeam::findOrFail($teamId)->load('team.teammates.user',  'team.teammates.matches', 'stage', 'turnir', 'group.matches');

        return view('admin.home.matches.create', compact('tournamentGroupTeam'));
    }

    public function matchesResultStore(MatchesResultStoreRequest $request){

        $data = $request->validated();

        $insert = [];
        $index = 0;
        foreach ($data['matches'] as $teammate) {
            foreach ($teammate as $matche) {
                $index++;

                $insert[$index]['team_id'] = $matche['team_id'];
                $insert[$index]['match_id'] = $matche['match_id'];
                $insert[$index]['kills_pts']   = $matche['kills_pts'];
                $insert[$index]['id'] = $matche['update'] ?? false;
            }
        }

        $collect = collect($insert);
        $tournamentGroupTeamsUpdate = [
            'place_pts' =>  $data['place_pts'],
            'kills_pts' => $collect->sum('kills_pts'),
        ];

        $tournamentGroupTeams = TournamentGroupTeam::find( $data['tournamentGroupTeamsId']);
        $tournamentGroupTeams->update($tournamentGroupTeamsUpdate);
        $tournamentMatchesResult = TournamentMatchesResult::upsert($insert, 'id', ['team_id', 'match_id', 'kills_pts']);

        return redirect()->route('team.show', $tournamentGroupTeams->id);
    }


    public function create($groupId, Request $request) {
        $group = TournamentGroup::findOrFail($groupId)->load('stage', 'turnir', 'matches');

        return view('admin.home.matches.edit', compact('group'));
    }

    public function update(Request $request) {
        // добавить валидацию
        $data = $request->all();
        //Логику добавления заменить в одну строчку добавить связи
        $insert = [];
        foreach ($data['matches'] ?? [] as $key => $match) {
            $insert[$key]['match_name'] = $match['match_name'];
            $insert[$key]['stage_id'] = $data['stage_id'];
            $insert[$key]['group_id']   = $data['group_id'];
            $insert[$key]['tournament_id'] = $data['tournament_id'];
            $insert[$key]['login']   = $match['login'];
            $insert[$key]['password'] = $match['password'];
            $insert[$key]['id'] = $match['update'] ?? false;
        }

        $deletedIds = json_decode($data['deletedIds']);
        if ($deletedIds) {
            TournamentMatchesResult::whereIn('match_id', $deletedIds)->delete();
            TournamentMatches::destroy($deletedIds);
        }

        $tournamentMatchesResult = TournamentMatches::upsert($insert, 'id', ['match_name', 'stage_id', 'group_id', 'tournament_id', 'login', 'password']);

        return redirect()->route('standings', [$data['tournament_id'],$data['stage_id'], $data['group_id'] ]);
    }

}
