<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Mail;

class TournamentController extends Controller
{

    public function index()
    {
        $tournaments = Admin::getTournaments();
        if ($tournaments == NULL) {
            $tournaments == "";
        }
        return view('admin.home.tournament', [
            'tournaments' => $tournaments,
        ]);
    }
    public function draftTournament()
    {
        $tournaments = Admin::getTournamentsDraft();
        if ($tournaments == NULL) {
            $tournaments == "";
        }
        return view('admin.home.draft_tournaments', [
            'tournaments' => $tournaments,
        ]);
    }
    public function draftTournamentsActive($id)
    {
        Admin::draftTournamentsActive($id);
        return redirect(route('admin'));
    }
    public function draftTournamentsView($id)
    {
        $tournaments = Admin::getTournamentByID($id);

        return view('admin.home.draft_tournaments_view', [
            'tournaments' => $tournaments,
            'id' => $id,
        ]);
    }

    public function draftTournamentsEdit($id, Request $request)
    {


        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => '',
                'format' => '',
                'country' => '',
                'timezone' => '',
                'countries' => '',
                'description' => '',
                'start_reg' => '',
                'price' => '',
                'end_reg' => '',
                'slot_kolvo' => '',
                'ligue' => '',
                'rule' => '',
                'header' => '',
                'tournament_start' => '',
                'games_time' => '',
            ]);

            $data['status'] = 'draft';

            Admin::editTournament($id, $data);
            return redirect(route('admin_tournament'));
        }
    }

    public function createTournament(Request $request)
    {

        $timezones = config('app.timezones');

        if ($request->isMethod('post')) {


            $file_name = $request->file('file_label')->getClientOriginalName();
            $file = $request->file('file_label');
            $file->move(public_path() . '/uploads/storage/adminimg', $file_name);

            $data = $request->validate([
                'name' => '',
                'format' => '',
                'country' => '',
                'timezone' => '',
                'countries' => '',
                'price' => '',
                'description' => '',
                'start_reg' => '',
                'end_reg' => '',
                'slot_kolvo' => '',
                'ligue' => '',
                'rule' => '',
                'header' => '',
                'tournament_start' => '',
                'games_time' => '',
            ]);
            $data['file_label'] = $file_name;
            if ($request->get('submit') == 'save') {
                $data['status'] = 'save';
            } elseif ($request->get('submit') == 'draft') {

                $data['status'] = 'draft';
            }
            try {
                Admin::createTournament($data);
            } catch (\Illuminate\Database\QueryException  $exception) {
                return back()->withError('Турнир ' . $request->input('name') . ' уже существует')->withInput();
            }
            \Session::flash('flash_meassage', 'Турнир добавлен');
            return redirect(route('admin'));
        }
        return view('admin.home.tournament_create', [
            'timezones' => $timezones,
        ]);
    }

    public function tournamentView($id)
    {
        $tournaments = Admin::getTournamentByID($id);

        return view('admin.home.tournament_view', [
            'tournaments' => $tournaments,
            'id' => $id,
        ]);
    }

    public function tournamentEdit($id, Request $request)
    {



        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => '',
                'format' => '',
                'country' => '',
                'timezone' => '',
                'countries' => '',
                'description' => '',
                'start_reg' => '',
                'price' => '',
                'end_reg' => '',
                'slot_kolvo' => '',
                'ligue' => '',
                'rule' => '',
                'header' => '',
                'tournament_start' => '',
                'games_time' => '',
            ]);


            Admin::editTournament($id, $data);
            return redirect(route('admin_tournament'));
        }
    }

    public function tournamentDelete($id)
    {
        Admin::tournamentDelete($id);
        return redirect(route('admin_tournament'));
    }
    public function tournamentTeams($id)
    {
        $teams = Admin::getTournamentsTeams($id);

        $members = Admin::geTeamMembers($id);
        return view('admin.home.tournaments_teams', [
            'teams' => $teams,
            'members' => $members,
        ]);
    }
    public function applyTeam($id, $turnir_id)
    {
        $email = Admin::getEmail($id);
        foreach ($email as $key => $value) {
            $email = (array) $value;
            foreach ($email as $key => $value) {
                $em = $value;
            }
        }
        //   Mail::send(['text' => 'messages.apply'], ['name', 'wwww'], function ($message) use ($em){
        //     $message->to($em, 'www')->subject('SHOWMATCH');
        //     $message->from('tournamentpubgtest@gmail.com', 'www');
        //   }); 

        Admin::applyTeam($id, $turnir_id);

        return redirect(route('tournaments_teams', $turnir_id));
    }

    public function refuseTeam($id)
    {

        $email = Admin::getEmail($id);
        foreach ($email as $key => $value) {
            $email = (array) $value;
            foreach ($email as $key => $value) {
                $em = $value;
            }
        }

        Mail::send(['text' => 'messages.refuse'], ['name', 'wwww'], function ($message) use ($em) {
            $message->to($em, 'www')->subject('SHOWMATCH');
            $message->from('tournamentpubgtest@gmail.com', 'www');
        });

        Admin::refuseTeam($id);
        return redirect(route('admin_tournament'));
    }

    public function startTest($turnir_id)
    {
        $teams =  Admin::start($turnir_id);
        foreach ($teams as $key => $value) {
            $data[] = (array)$value;
        }
        Admin::setStage_1($data);
        return redirect(route('admin_tournament'));
    }
    public function createStage2($turnir_id)
    {
         $datas =  Admin::getStage_1($turnir_id);

        // dd($data);
         foreach ($datas  as $key => $value) {
            $data[] = (array)$value;
        } 
       // var_dump($data);
        Admin::setStage_2($turnir_id, $data);
    }

    public function createStage3($turnir_id)
    {
        $datas =  Admin::getStage_2($turnir_id);

        // dd($data);
        foreach ($datas  as $key => $value) {
            $data[] = (array)$value;
        }
        // var_dump($data);
        Admin::setStage_3($turnir_id, $data);
    }
    public function stages($turnir_id)
    {
        $stage_1 =  Admin::stage_1($turnir_id);
        $stage_2 =  Admin::stage_2($turnir_id);
        $stage_3 =  Admin::stage_3($turnir_id);
       // dd($datas);
        return view('admin.home.stages.stages',[
                    'turnir_id' => $turnir_id,
                    'stages_1' => $stage_1,
                    'stages_2' => $stage_2,
                    'stages_3' => $stage_3,
        ]);
    }
    public function stage_1($turnir_id)
    {
        $stage_1 =  Admin::stage_1($turnir_id);
       
        return view('admin.home.stages.stage_1', [
            'turnir_id' => $turnir_id,
            'stages_1' => $stage_1,
           
        ]);
    }

    public function update_stage(Request $request){
        
    }
}
