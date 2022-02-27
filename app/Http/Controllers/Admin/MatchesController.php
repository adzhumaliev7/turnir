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

    public function matchesResultStore(Request $request){
//TODO Сделать валидацию
        $data = $request->all();

        $insert = [];
        $index = 0;
        foreach ($data['matches'] as $key => $matche) {

            foreach ($matche as $teammate) {
                $index++;

                $insert[$index]['team_id'] = $teammate['team_id'];
                $insert[$index]['match_id'] = $teammate['match_id'];
                $insert[$index]['match_id'] = $teammate['match_id'];
                $insert[$index]['id'] = $teammate['update'] ?? false;
                $insert[$index]['kills_pts'] = $teammate['kills_pts'];
                $insert[$index]['place_pts'] =  $data['place'][$key];
                $insert[$index]['tournament_group_teams_id'] = $data['tournamentGroupTeamsId'];
            }

        }

        $collect = collect($insert);

        $tournamentGroupTeamsUpdate = [
            'place_pts' =>   array_sum($data['place']),
            'kills_pts' => $collect->sum('kills_pts'),
        ];

        $tournamentGroupTeams = TournamentGroupTeam::find( $data['tournamentGroupTeamsId']);
        $tournamentGroupTeams->update($tournamentGroupTeamsUpdate);
        $tournamentMatchesResult = TournamentMatchesResult::upsert($insert, 'id', ['team_id', 'match_id', 'kills_pts', 'place_pts', 'tournament_group_teams_id']);

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
