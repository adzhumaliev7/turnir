<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
     public function index()
     {

          if (Auth::user() != null) {
               $id = Auth::user()->id;
               $mail = User::getEmail($id);
          } else $mail = null;
          $tournaments = Tournament::getTournaments();
          if ($tournaments == NULL) {
               $tournaments == "";
          }

          return view('main.tournament', [
               'mail' => $mail,
               'tournaments' => $tournaments,
          ]);
     }

     public function createTournament()
     {


          return view('create_tournament');
     }

     public function saveTournament(Request $request)
     {

          if ($request->isMethod('post')) {
               $data = $request->validate([
                    'name' => '',
                    'format' => '',
                    'country' => '',
                    'timezone' => '',
                    'countries' => '',
                    'players_col' => '',
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
               $data['status'] = "on_check";
               Tournament::createTournament($data);
               \Session::flash('flash_meassage', 'Сохранено');
               return redirect(route('create_order'));
          }
     }
     public function matchView($id)
     {
        /*   if (Auth::user() == null) {
               return redirect(route('user.login'));
          } */
          $tournaments = Tournament::getTournamentById($id);
          $stage_1 =  Admin::stage_1($id);
          $stage_2 =  Admin::stage_2($id);
          $stage_3 =  Admin::stage_3($id);
          $winners =  Admin::getWinners($id);
          foreach ($tournaments as $tournament) {
               $t = (array) $tournament;
          }

          $date = date('Y-m-d');
          if ($date > $t['tournament_start']) {
               $turnir  = 'close';
          } else {
               $turnir = 'active';
          }
          //$start_reg=($t['start_reg']  $date && $t['start_reg'] != $date);
          if ($t['start_reg'] > $date && $t['start_reg'] != $date) {
               $reg = "dont_time";
          } elseif ($t['start_reg'] <=  $date && $t['end_reg'] >= $date) {
               $reg = "time";
          } else $reg = "loss";
          //$end_reg=(strtotime(strtotime($date) >= $t['end_reg']));
          if (Auth::user() != null) {
               $user_id = Auth::user()->id;

               $mail = User::getEmail($user_id);
               $teams = Tournament::getTeams($id, $user_id); //команды зарегистрированные в турнир 

               $userdata = Tournament::checkTeam($user_id);


               $userdata = (array) $userdata;
               $members = Tournament::getMembers($userdata['team_id']);

               if ($teams == NULL) {
                    $teams = "";
               }

               if ($userdata != NULL) {
                    if ($userdata['role'] == 'captain') {
                         if ($teams != NULL) {
                              foreach ($teams as $key) {
                                   $key = (array) $key;
                              }
                              if ($user_id != $key['user_id']) {
                                   $checked = 'captain';
                              } else   $checked = 'has';
                         } else $checked = 'captain';
                    } else if ($userdata['role'] == 'member') {
                         if ($teams != NULL) {
                              foreach ($teams as $key) {
                                   $key = (array) $key;
                              }
                              if ($userdata['team_id'] != $key['team_id']) {
                                   $checked = 'member';
                              } else   $checked = 'has';
                         } else $checked = 'member';
                    } else $checked = 'has';
               } else $checked = NULL;
          }else {
               $mail = null;
               $checked = null;
               $members =null;
               $teams ="";
          }

          return view('main.match', [
               'mail' => $mail,
               'tournaments' => $tournaments,
               'teams' => $teams,
               'checked' => $checked,
               'reg' => $reg,
               'turnir' => $turnir,
               'members' => $members,
               'stages_1' => $stage_1,
               'stages_2' => $stage_2,
               'stages_3' => $stage_3,
               'winners' => $winners
          ]);
     }

     public function joinTournament($id, Request $request)
     {


          $members = $request->input('members');
          $user_id = Auth::user()->id;
          $team_id = Tournament::getTeamById($user_id);
          $team_id = (array) $team_id;
          $team_id = implode("", $team_id);

          $data = array(
               'tournament_id' => $id,
               'team_id' => $team_id,
               'status' => 'processed',

          );

          for ($i = 0; $i < count($members); $i++) {
               DB::table('tournaments_members')->insert(['tournament_id' => $id, 'team_id' => $team_id, 'user_id' => $members[$i]]);
          }

          Tournament::joiToTournament($data);
          return redirect(route('match', $id));
     }
}
