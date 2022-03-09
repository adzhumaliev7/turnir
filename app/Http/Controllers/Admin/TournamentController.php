<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use App\Models\StagesGroup;
use App\Models\TournamentMatchesResult;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\VerifiedMail;
use App\Mail\ApplyTeamMail;
use App\Mail\RefuseTeam;
use App\Models\Tournament;
use App\Models\TournametsTeam;
use App\Models\TournamentGroup;
use App\Models\TournamentGroupTeam;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Requests\Admin\SaveTournamentRequest;
use App\Http\Requests\Admin\EditTournamentRequest;
use TournamentTeam;

class TournamentController extends Controller
{

    public function index()
    {
        $tournaments = Admin::getTournaments();

        return view('admin.home.tournament.tournament', [
            'tournaments' => $tournaments,
        ]);
    }
    public function draftTournament()
    {
        $tournaments = Admin::getTournamentsDraft();

        return view('admin.home.tournament.draft_tournaments', [
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

        return view('admin.home.tournament.draft_tournaments_view', [
            'tournaments' => $tournaments,
            'id' => $id,
        ]);
    }

    public function draftTournamentsEdit($id, EditTournamentRequest $request)
    {

        $data = $validated = $request->validated();
        $data['status'] = 'draft';
        Admin::editTournament($id, $data);
        return redirect(route('admin_tournament'));

    }

    public function createTournament()
    {
        $timezones = config('app.timezones');
        return view('admin.home.tournament.tournament_create', [
            'timezones' => $timezones,
        ]);
    }

    public function storeTournament(SaveTournamentRequest $request){
        $request->validate([

            'file_label' => 'image',

            'file_label' => 'mimetypes:image/jpeg,image/png',
        ]);

            if ($request->hasFile('file_label') == true ) {

                $name =  $request->file('file_label');
                $path = '/uploads/storage/adminimg/turnir_logo';
                $file_name = $this->uploadFiles($name, $path);
               
            }
            
            $data = $validated = $request->validated();
              if ($request->hasFile('file_label') == true ) {
            $data['file_label'] = $file_name;
           }
            if ($request->get('submit') == 'save') {
                $data['status'] = 'save';
                $data['active'] = 1;
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
    public function tournamentView($id)
    {
        $tournaments = Admin::getTournamentByID($id);

        return view('admin.home.tournament.tournament_view', [
            'tournaments' => $tournaments,
            'id' => $id,
        ]);
    }

    public function tournamentEdit($id, EditTournamentRequest $request)
    {
           $request->validate([

            'file_label' => 'image',

            'file_label' => 'mimetypes:image/jpeg,image/png',
        ]);

            if ($request->hasFile('file_label') == true ) {

                $name =  $request->file('file_label');
                $path = '/uploads/storage/adminimg/turnir_logo';
                $file_name = $this->uploadFiles($name, $path);
               
            }
            
            $data = $validated = $request->validated();
              if ($request->hasFile('file_label') == true ) {
            $data['file_label'] = $file_name;
           }
        Admin::editTournament($id, $data);
        return redirect(route('admin_tournament'));
    }

    public function tournamentDelete($id)
    {
        $turnit = Tournament::find($id);
        
        $turnit->delete();

        return redirect(route('admin_tournament'));
    }

    public function tournamentTeams($id)
    {
        $teams = Admin::getTournamentsTeams($id);
        return view('admin.home.tournament.tournaments_teams', [
            'teams' => $teams,

        ]);
    }
    public function tournamentTeamsCard($id, $turnir_id)
    {
        $team = Admin::getTeamById($id);
        $members = Admin::geTeamMembers($id, $turnir_id);
       
        $user_id  = Admin::geTeamMembersUserid($id, $turnir_id);
       
        foreach ($user_id as $user => $value) {
            $user_id = $value;
        }

        return view('admin.home.tournament.tournaments_team_card', [
            'team' => $team,
            'members' => $members,
            'team_id' => $id,
            'tournament_id' => $turnir_id,
            'user_id' => $user_id
        ]);
    }

    public function applyTeam($id, $turnir_id)
    {
        $emails = Admin::getTournamentsMembersEmail($id);
        foreach ($emails as $key => $value) {
          $emails = (array) $value;
          foreach ($emails as $key => $value) {
            $email[] = $value;
          }
        }
        Mail::to($email)->send(new ApplyTeamMail($email));
         Admin::applyTeam($id, $turnir_id);
        return redirect(route('tournaments_teams', $turnir_id));
    }

    public function refuseTeam($id, $turnir_id, $user_id, Request $request)
    {
        $email = Admin::getUsersEmail($user_id);

        $text = $request->input('text');
        Mail::to($email)->send(new RefuseTeam($email, $text));
        Admin::refuseTeam($id, $turnir_id);
        return redirect(route('admin_tournament'));
    }

    public function tournamentsAbout($id){

        $turnir = Tournament::find($id);
        $stage = Stage::find(14);


//        dd($stage->matches->groupBy('team_id')->max() );


        $data = Admin::getTournamentByID($id);

        $stages = Admin::getStages($id);
        $groups = Admin::getGroups($id);
        $teams = Admin::getGroupTeams($id);
    //  dd($stages->first(), Tournament::find($id));
        return view('admin.home.tournament.tournaments_about', [
            'datas' => $data,
            'turnir_id' => $id,
            'stages' => $stages,
            'groups' => $groups,
            'teams' => $teams,
            'turnir' => $turnir,
        ]);
    }

   public function createStage($turnir_id, Request $request){

    if ($request->isMethod('post')) {
         $data = $request->validate([
//            'stage_number' => 'required',
            'stage_name' => 'required',
        ]);

        $data['tournament_id'] = $turnir_id;
        $turnir = Tournament::find($turnir_id);
        $data['stage_number'] = $turnir->stage->count() + 1;
        Admin::createStage($data);
        return redirect(route('tournaments_about', $turnir_id));
         }
         $tournament=Admin::getTournamentByID($turnir_id);
          return view('admin.home.stages.create_stage',[
              'turnir_id' => $turnir_id,
              'tournaments' => $tournament,
          ]);
    }

    public function createGroup($turnir_id, $stage_id, Request $request){

         if ($request->isMethod('post')) {

                $data = $request->validate([
                'group_number' => 'required',
                'group_name' => 'required',
                // 'teams' =>  'required',
                 ]);
                 $data['tournament_id'] = $turnir_id;
                 $data['stage_id'] = $stage_id;

                $group = TournamentGroup::create($data);
//

                StagesGroup::create(['stage_id' => $stage_id, 'group_id' => $group->id, 'current' => 1]);

                $t = array_values( array_diff($request->get('teams', []), TournamentGroupTeam::where('tournament_id', $turnir_id)->pluck('team_id')->toArray()) );
                for($i=0;$i< count($t); $i++ ){

                    $data_teams['group_id'] = $group->id;
                    $data_teams['tournament_id'] = $turnir_id;
                    $data_teams['team_id'] = $t[$i];
//                    Admin::createGroupTeams($data_teams);
                    $tournamentGroupTeam = TournamentGroupTeam::create($data_teams);
                    TournamentMatchesResult::create(['stages_id' => $stage_id, 'team_id' => $tournamentGroupTeam->id]);

                }
             return redirect(route('tournaments_about', $turnir_id));

        }
            $tournament =  Tournament::with('stages.groups.tournamentGroupTeams')->find($turnir_id);

            $arr = [];
            foreach($tournament->stages as $stage) {
                foreach($stage->groups as $group) {
                    foreach($group->tournamentGroupTeams->pluck('team_id')->toArray() as $team) {
//                        dump($team);
                        $arr[] =$team;
                    }
                }
            }
            $teams2 = TournametsTeam::where('status', 'accepted')->where('tournament_id', $turnir_id)->whereNotIn('team_id', $arr)->get();

            return view('admin.home.stages.create_group',[
                'turnir_id' => $turnir_id,
                'stage_id' => $stage_id,
                'tournament' => $tournament,
                'teams' => $teams2
            ]);
        }
        protected function uploadFiles($name, $path){
            $file_name = $name->getClientOriginalName();
           $type = $name->getClientOriginalExtension();
           if ($type == 'png') $file_type = '.png';
           elseif ($type == 'jpg') $file_type = '.jpg';
           else $file_type = '.jpeg';
           $file_name = md5($file_name) . $file_type;
           $file = $name;
           $file->move(public_path() . $path, $file_name);
           return $file_name;
        }
}
