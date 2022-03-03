<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StageStoreRequest;
use App\Http\Requests\Admin\UpdateStoreRequest;
use App\Models\Admin;
use App\Models\Stage;
use App\Models\Tournament;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function create($turnirId, Request $request) {
        $turnir = Tournament::find($turnirId);
        return view('admin.home.tournament.create_stage_new', compact('turnir'));
    }

    public function store(StageStoreRequest $request) {
        $data = $request->validated();

        $turnir = Tournament::find($data['tournament_id']);
        $data['stage_number'] = $turnir->stages->count() + 1;

        $stage = Stage::create($data);

        return redirect()->route('standings', [$data['tournament_id'], $stage->id ]);
    }

    public function edit($stogeId, Request $request){
        $stage = Stage::find($stogeId);
        return view('admin.home.tournament.edit_stage_new', compact('stage'));
    }

    public function update($stogeId, UpdateStoreRequest $request) {
        $data = $request->validated();

        $stage = Stage::findOrFail($stogeId);
        $stage->update($data);

        return redirect()->route('standings', [$stage->turnir->id, $stage->id ]);
    }

    public function destroy($stageId, Request $request) {
        $stage = Stage::findOrFail($stageId);
        $stage->delete();

        return redirect()->route('standings', $stage->tournament_id);
    }

}
