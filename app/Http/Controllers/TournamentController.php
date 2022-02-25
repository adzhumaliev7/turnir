<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{
     public function index()
     {

          if (Auth::user() != null) {
               $id = Auth::user()->id;
               $mail = Auth::user()->email;
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

     public function matchView($id)
     {
    
          $tournaments = Tournament::getTournamentById($id);
          $teams_count = Tournament::teamsCount($id);
 
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
              
               if ($teams == NULL) {
                    $teams = "";
               }
               if ($userdata != NULL) {
                    $userdata = (array) $userdata; 
                  
                    $members = Tournament::getMembers($userdata['team_id']);
                    
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
               } else {
                    $checked = NULL;
                    $members =null;
               }
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
            
               'teams_count'=> $teams_count,
          ]);
     }

     public function joinTournament($id, Request $request)
     {
          $user_id = Auth::user()->id;
          $team_id = Tournament::getTeamById($user_id);
        
           $members = $request->input('members');
   
          if($members == null) {
               return redirect()->back()->with('error_msg', 'вы не выбрали учасников команды');  
          }  
          if(count($members) < 3 ) {
               return redirect()->back()->with('error_msg', 'маленькое количество участнкиов (минимум 3 участника)');  
          }   
          if(count($members) > 4 ) {
               return redirect()->back()->with('error_msg', 'превышен лимит участников (максимум 4 участника)');  
          }   
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
