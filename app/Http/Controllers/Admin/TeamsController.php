<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\joinTurnaments;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $teams = TournametsTeam::where('status', 'accepted')->where('tournament_id', $turnirId)->whereNotIn('team_id', $arr)->with('team')->get();

        return view('admin.home.tournament.create_team_new', compact('turnir', 'teams', 'group', 'stage'));

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

    public function joinTournament($turnirId, $teamId, joinTurnaments $request)
    {
        $data = $request->validated();

        $turnir = Tournament::findOrFail($turnirId);
        $team = Team::findOrFail($teamId);

        $insert = [];
        foreach ($data['members'] as $member) {
            $insert[] = ['tournament_id' => $turnirId, 'team_id' => $teamId, 'user_id' =>$member];
        }

        TournamentMembers::insert($insert);
        TournametsTeam::create(['tournament_id' => $turnirId, 'team_id' => $teamId, 'status' => 'accepted',]);

        return  redirect()->back();
    }


    public function destroy($tournamentGroupTeamsId, Request $request){
        $tournamentGroupTeams = TournamentGroupTeam::findOrFail($tournamentGroupTeamsId);
        $tournamentGroupTeams->delete();

        return redirect()->back();
    }

    public function getDataList(Request $request) {
        $TournametTeams = TournametsTeam::where('tournament_id', $request->get('turnirId'))->pluck('team_id');

        $limit = $request->input('length');
        $start = $request->input('start');
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');
        $order = $request->input('columns.' . $request->input('order.0.column') . '.data');

        $sql = Team::with('сaptain')->whereNotIn('id',$TournametTeams)
            ->Where(function ($q) use ($search) {
                $q->OrWhere( 'name', 'LIKE',"%{$search}%");
                $q->OrWhere('id','LIKE',"%{$search}%");
                $q->OrWhereHas('сaptain', function (Builder $query) use ($search) {$query->where('name','LIKE',"%{$search}%");});
            });

        $totalFiltered = $sql->count();
        $teams = $sql->offset($start)->limit($limit)->orderBy($order == 'nameCapitane' ? 'name' : $order,$dir,$dir)->get();

        $data = [];
        foreach ($teams as $team) {
            $nestedData['id'] = $team->id;
            $nestedData['name'] = $team->name;
            $nestedData['members'] = Tournament::getMembers($team->id) ?? [];
            $nestedData['nameCapitane'] = $team->сaptain->name;
            $data[] = $nestedData;
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => $sql->get()->count(),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ];

        return response()->json($json_data);
    }


}
