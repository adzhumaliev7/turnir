<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\VerifiedMail;
use App\Mail\ApplyTeamMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{

    public function index()
    {
        $tournaments = Admin::getTournaments();
        if ($tournaments == NULL) {
            $tournaments == "";
        }
        return view('admin.home.tournament.tournament', [
            'tournaments' => $tournaments,
        ]);
    }
    public function draftTournament()
    {
        $tournaments = Admin::getTournamentsDraft();
        if ($tournaments == NULL) {
            $tournaments == "";
        }
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
        $request->validate([
            // файл должен быть картинкой (jpeg, png, bmp, gif, svg или webp)
            'file_label' => 'image',
            // поддерживаемые MIME файла (image/jpeg, image/png)
            'file_label' => 'mimetypes:image/jpeg,image/png',
        ]);
      
        if ($request->isMethod('post')) {


            if ($request->hasFile('file_label') == true ) {
                $file_name = $request->file('file_label')->getClientOriginalName();
                $type = $request->file('file_label')->getClientOriginalExtension();
                if ($type == 'png') $file_type = '.png';
                else $file_type = '.jpeg';
                $file_name = md5($file_name) . $file_type;
                $file = $request->file('file_label');
                $file->move(public_path() . '/uploads/storage/adminimg/turnir_logo', $file_name);
            }   
           /*  $file_name = $request->file('file_label')->getClientOriginalName();
            $file = $request->file('file_label');
            $file->move(public_path() . '/uploads/storage/adminimg', $file_name); */

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
                'rule' => '',
                'tournament_start' => '',
                'games_time' => '',
            ]);
            if ($request->hasFile('file_label') == true){
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
        return view('admin.home.tournament.tournament_create', [
            'timezones' => $timezones,
        ]);
    }

    public function tournamentView($id)
    {
        $tournaments = Admin::getTournamentByID($id);

        return view('admin.home.tournament.tournament_view', [
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
        Mail::to($email)->send(new VerifiedMail($email, $text));
        Admin::refuseTeam($id, $turnir_id);
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
        return redirect(route('stages', $turnir_id));
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
        return redirect(route('stages', $turnir_id));
    }
    public function createWinners($turnir_id)
    {
        $datas =  Admin::getStage_3($turnir_id);

        // dd($data);
        foreach ($datas  as $key => $value) {
            $data[] = (array)$value;
        }

        /*  Admin::setWinners($turnir_id, $data);
        Admin::changeTournamentStatus($turnir_id);
        return redirect(route('stages', $turnir_id)); */
    }
    public function stages($turnir_id)
    {
        $stage_1 =  Admin::stage_1($turnir_id);
        $stage_2 =  Admin::stage_2($turnir_id);
        $stage_3 =  Admin::stage_3($turnir_id);
        $winners =  Admin::getWinners($turnir_id);

        return view('admin.home.stages.stages', [
            'turnir_id' => $turnir_id,
            'stages_1' => $stage_1,
            'stages_2' => $stage_2,
            'stages_3' => $stage_3,
            'winners' => $winners
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

    public function update_stage($turnir_id, Request $request)
    {

        foreach ($request->input('data') as $id => $row) {
            \DB::table('stage_1')->where('id', $id)->update($row);
        }
        return redirect(route('stages', $turnir_id));
        /*  //$team_id = $request->input('team_id');
       // $point = $request->input('points');
     /*  foreach ($point as $key => $value) {
          $points[]['points'] = $value;
      }
      foreach ($team_id as $key => $value) {
            $teams_id[]['team_id'] = $value;
      } */
        //$data = array_map('array_merge', $teams_id, $points);
        //  dd($point);
        //Admin::setPointsStage_1($turnir_id, $data); */

    }

    public function stage_2($turnir_id)
    {
        $stage_2 =  Admin::stage_2($turnir_id);

        return view('admin.home.stages.stage_2', [
            'turnir_id' => $turnir_id,
            'stages_2' => $stage_2,

        ]);
    }

    public function update_stage2($turnir_id, Request $request)
    {

        foreach ($request->input('data') as $id => $row) {
            \DB::table('stage_2')->where('id', $id)->update($row);
        }
        return redirect(route('stages', $turnir_id));
        /*  //$team_id = $request->input('team_id');
       // $point = $request->input('points');
     /*  foreach ($point as $key => $value) {
          $points[]['points'] = $value;
      }
      foreach ($team_id as $key => $value) {
            $teams_id[]['team_id'] = $value;
      } */
        //$data = array_map('array_merge', $teams_id, $points);
        //  dd($point);
        //Admin::setPointsStage_1($turnir_id, $data); */

    }
    public function stage_3($turnir_id)
    {
        $stage_3 =  Admin::stage_3($turnir_id);

        return view('admin.home.stages.stage_3', [
            'turnir_id' => $turnir_id,
            'stages_3' => $stage_3,

        ]);
    }

    public function update_stage3($turnir_id, Request $request)
    {

        foreach ($request->input('data') as $id => $row) {
            \DB::table('stage_3')->where('id', $id)->update($row);
        }
        return redirect(route('stages', $turnir_id));
        /*  //$team_id = $request->input('team_id');
       // $point = $request->input('points');
     /*  foreach ($point as $key => $value) {
          $points[]['points'] = $value;
      }
      foreach ($team_id as $key => $value) {
            $teams_id[]['team_id'] = $value;
      } */
        //$data = array_map('array_merge', $teams_id, $points);
        //  dd($point);
        //Admin::setPointsStage_1($turnir_id, $data); */

    }
    public function tournamentsAbout($id){
        $data = Admin::getTournamentByID($id);
      /*   $stage_1 =  Admin::stage_1($id);
        $stage_2 =  Admin::stage_2($id);
        $stage_3 =  Admin::stage_3($id);
        $winners =  Admin::getWinners($id); */
        $stages = Admin::getStages($id);
        $groups = Admin::getGroups($id);
       
        return view('admin.home.tournament.tournaments_about', [
            'datas' => $data,
            'turnir_id' => $id,
            'stages' => $stages,
            'groups' => $groups,
        ]);
    }
     
   public function createStage($turnir_id, Request $request){
    if ($request->isMethod('post')) {
         $data = $request->validate([
            'stage_number' => 'required',
            'stage_name' => 'required',
        ]);
        $data['tournament_id'] = $turnir_id;
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
                
                 ]);
                 $data['tournament_id'] = $turnir_id;
                 $data['stage_id'] = $stage_id;
               
                
                $id = Admin::createGroup($data);
                
                 $t = $request->input('teams');
                for($i=0;$i< count($t); $i++ ){
                    $data_teams['group_id'] =$id;
                    $data_teams['tournament_id'] = $turnir_id;
                    $data_teams['team_id'] = $t[$i];
                    Admin::createGroupTeams($data_teams); 
                }
            // return redirect(route('tournaments_about', $turnir_id));  
         
        } 
             $tournament=Admin::getTournamentByID($turnir_id);
             $teams=Admin::getTeamsByTurnirId($turnir_id);

              return view('admin.home.stages.create_group',[
                  'turnir_id' => $turnir_id,
                  'stage_id' => $stage_id,
                  'tournaments' => $tournament,
                  'teams' => $teams 
              ]);   
        }
}
 