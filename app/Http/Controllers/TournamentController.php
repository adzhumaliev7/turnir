<?php

namespace App\Http\Controllers;
use App\Models\TournamentGroup;
use App\Models\Stage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\CustomClasses\ColectionPaginate;
use App\Models\TournamentMembers;
use App\Models\TournametsTeam;
class TournamentController extends Controller
{
     public function index()
     {
          if (Auth::user() != null) {
               $id = Auth::user()->id;
               $mail = Auth::user()->email;
			    $active =  Auth::user()->verified;
          }   else {$mail = null;
         $active = null;}
           $tournaments = Tournament::where('status', 'save')->orderBy('active', 'desc')->orderBy('tournament_start', 'asc')->paginate(9);
        
         $date = date('d.m.Y'); 
     
          return view('main.tournament', [
               'mail' => $mail,
               'tournaments' => $tournaments,
               'date' => $date,
			    'active' => $active,
          ]);
     }
     public function matchViewNew($turnirId, $stageId = null, $groupId = null,  Request $request){
		    if (Auth::user() != null) {
             
               $active =  Auth::user()->verified;
          } else  {
               $active = null;}
           $tournament = Tournament::withCount('order', 'stages')->findOrFail($turnirId);
          $date = date('Y-m-d');  /// надо для проверки даты начала турнира
          $teams_count = Tournament::teamsCount($turnirId);
           $active1 = 'active';
          $active2 = '';
      
            //команды зарегистрированные в турнир
  
          //$teams = Tournament::getTeams($turnirId);
            $teams = $tournament->order()->with('team:id,name')
              ->addSelect([
                  'memberCount' => TournamentMembers::select('tournament_id')
                      ->whereColumn('team_id', 'tournamets_team.team_id')
                      ->where('tournament_id', $turnirId)
                      ->select(DB::raw('count(tournament_id)'))
                      ->latest()
                      ->take(1),
                  ])
              ->paginate(16);
          $userTeam = Auth::user()->team ?? false;
        
          $tournametTeam = $userTeam ? $userTeam->order->where('tournament_id', $tournament->id)->first() : false;
          $members = $userTeam ? $userTeam->teammatesTeam->load('user') : false;
          //dd($tournametTeam);
         if (!$stageId) {
          $stage = $tournament->stages->first();
          }
          else{ $stage = Stage::findOrFail($stageId)->load('groups'); 
               $active1 = '';
               $active2 = 'active';
          }
  
          if (!$groupId){
              $group = $stage ?  $stage->groups()->with(['tournamentGroupTeams' => function($q) {
                 // $q->orderBy('kills_pts', 'desc');
                 $q->orderBy(DB::raw('kills_pts + place_pts'), 'desc');
              }, 'tournamentGroupTeams.group.matches.res', 'matches', 'tournamentGroupTeams.team.teammates'])->first(): null;
            
          } else {
              $group = TournamentGroup::findOrFail($groupId)->load(['tournamentGroupTeams' => function($q) {
                  $q->orderBy('kills_pts', 'desc');
                //$q->orderBy(DB::raw('kills_pts + place_pts'), 'desc');
              }, 'tournamentGroupTeams.group.matches.res', 'matches', 'tournamentGroupTeams.team.teammates']);
              $active1 = '';
              $active2 = 'active';
          }
          return view('main.match_new', compact('tournament', 'teams_count','teams', 'members', 'date', 'tournametTeam', 'stage', 'group', 'userTeam','active1', 'active2', 'active'));
      }
  
       public function matchView($turnirId, $stageId = null, $groupId = null,  Request $request){
    
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
          if(count($members) > 5 ) {
               return redirect()->back()->with('error_msg', 'превышен лимит участников (максимум 5 участников)');  
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

       TournametsTeam::create($data);
          return redirect(route('match', $id));    
     }
       public function revokeOrder($id, $team_id)
     {
           Tournament::revokeOrder($id, $team_id);
           return redirect()->back()->with('error_msg', 'Вы отозвали заявку');
     }
}
