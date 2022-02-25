<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GroupStoreRequest;
use App\Models\Stage;
use App\Models\Tournament;
use App\Models\TournamentGroup;
use App\Models\TournametsTeam;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create($turnirId, $stageId, Request $request){
        $turnit =  Tournament::find($turnirId);
        $stage = Stage::find($stageId);
        return view('admin.home.tournament.create_group_new',compact('turnit', 'stage'));
    }

    public function store(GroupStoreRequest $request){
        $data = $request->validated();
        $group = TournamentGroup::create($data);
        return redirect()->route('standings', [$data['tournament_id'], $data['stage_id'], $group->id ]);
    }

    public function destroy($groupId, Request $request) {
        $group = TournamentGroup::findOrFail($groupId);
        $group->remove();

        return redirect()->route('standings', $group->tournament_id);
    }

}
