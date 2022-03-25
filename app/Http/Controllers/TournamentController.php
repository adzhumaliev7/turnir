<?php

namespace App\Http\Controllers;
use App\Models\TournamentGroup;
use App\Models\Stage;
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
          $date = date('Y-m-d'); 
          if ($tournaments == NULL) {
               $tournaments == "";
          }
          return view('main.tournament', [
               'mail' => $mail,
               'tournaments' => $tournaments,
               'date' => $date,
          ]);
     }
     public function matchViewNew($turnirId, $stageId = null, $groupId = null,  Request $request){
          $tournament = Tournament::withCount('order', 'stages')->findOrFail($turnirId);
          $date = date('Y-m-d');  /// надо для проверки даты начала турнира
          $teams_count = Tournament::teamsCount($turnirId);
            //команды зарегистрированные в турнир
  
          $teams = Tournament::getTeams($turnirId);
  
          $userTeam = Auth::user()->team ?? false;
        
          $tournametTeam = $userTeam ? $userTeam->order->where('tournament_id', $tournament->id)->first() : false;
          $members = $userTeam ? $userTeam->teammatesTeam->load('user') : false;
  
  
          if (!$stageId) $stage = $tournament->stages->first();
          else $stage = Stage::findOrFail($stageId)->load('groups');
  
          if (!$groupId){
              $group = $stage ?  $stage->groups()->with(['tournamentGroupTeams' => function($q) {
                  $q->orderBy('kills_pts', 'desc');
              }, 'tournamentGroupTeams.group.matches.res', 'matches', 'tournamentGroupTeams.team.teammates'])->first(): null;
          } else {
              $group = TournamentGroup::findOrFail($groupId)->load(['tournamentGroupTeams' => function($q) {
                  $q->orderBy('kills_pts', 'desc');
              }, 'tournamentGroupTeams.group.matches.res', 'matches', 'tournamentGroupTeams.team.teammates']);
          }
          return view('main.match_new', compact('tournament', 'teams_count','teams', 'members', 'date', 'tournametTeam', 'stage', 'group', 'userTeam'));
      }
  
       public function matchView($turnirId, $stageId = null, $groupId = null,  Request $request){
        /*     $tournament = Tournament::findOrFail($turnirId);
            $tournament->withCount('order')->get();
            $teams_count = Tournament::teamsCount($turnirId);
  
            $date = date('Y-m-d');  /// надо для проверки даты начала турнира
            $turnir = $date > $tournament->tournament_start  ? "close" : "active";
    //dump(Auth::user(), User::);
            //////////////////////////////////////// разные проверки на капитана, на команлды и т.д говнокод
  //команды зарегистрированные в турнир 
            $teams = Tournament::getTeams($turnirId);
  
   //dd($tournament->order->first()->team, $teams);
            if (Auth::check()) { //если пользователь авторизован
                $user_id = Auth::id();
                $captain_team_id = Tournament::checkTeam($user_id); // проверяем есть ли команда у зашедшего пользователя и является ли он капитаном
  
                if ($captain_team_id != null) { // если есть запись то получаем участников
                    $members = Tournament::getMembers($captain_team_id);
  
                    $is_has_team = Tournament::hasTeam($turnirId,$captain_team_id);  // смотрим не зарегистрирована ли команда  в турнире
                    if($is_has_team == true){
                         $get_team_status = Tournament::getTeamStatus($turnirId, $captain_team_id);
                    }
                    else $get_team_status = null;
            }
            else{//обнуляем для обычных авторизованых пользователей
            $members =null;
            $is_has_team = false;
            $get_team_status = null;
            $captain_team_id = null;
            }
       }
            else { // не для авторизованых
                $members =null;
                $is_has_team = false;
                $get_team_status = null;
                $captain_team_id = null;
  
       }
  
            return view('main.match', [
                'tournament' => Tournament::find($turnirId),
                'teams' => $teams,
                'turnir' => $turnir,
                'members' => $members,
                'date' => $date ,
                'teams_count'=> $teams_count,
                'captain' => $captain_team_id,
                'is_has_team' => $is_has_team,
                'status' => $get_team_status,
            ]);
   */
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
