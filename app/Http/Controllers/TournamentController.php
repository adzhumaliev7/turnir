<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;
class TournamentController extends Controller
{
    public function index(){


         $tournaments = Tournament::getTournaments();
          if($tournaments == NULL){
               $tournaments == "";
          }

        return view('tournament',[
             'tournaments'=>$tournaments,
        ]);
    }

    public function createTournament(){

   
         return view('create_tournament');
    }

    public function saveTournament(Request $request){
        
         if($request->isMethod('post')){
         $data =$request->validate([
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
         $data['status']="on_check";
         Tournament::createTournament($data);
          \Session::flash('flash_meassage', 'Сохранено');
        return redirect(route('create_order'));
        }
    }
   public function matchView($id){
        $tournaments = Tournament::getTournamentById($id);

         $user_id = Auth::user()->id;
      $teams= Tournament::getTeams($id, $user_id);
      $userdata= Tournament::checkTeam($user_id);
      $userdata = (array) $userdata;

     //dd($teams['user_data']);
    foreach ($teams['teams'] as $key ) {
            $key=(array) $key;
       }

     if($userdata != NULL){
         if($userdata['role']=='captain' && $user_id != $key['user_id']){
               $checked = 'captain'; 
         } elseif($userdata['role']=='member' && $user_id != $key['user_id']) { 
              $checked = 'member';
          }else $checked= 'has';
     }
     else $checked = " ";


      /*  foreach ($teams['teams'] as $key ) {
            $key=(array) $key;
       }
       if($user_id == $key['user_id']){
          $checked = true; 
       } else $checked = false;
        */
        return view('match',[
             'tournaments' => $tournaments,
             'teams' => $teams['teams'],
             'checked' => $checked,
        ]);
   } 

   public function joinTournament($id){
          $user_id = Auth::user()->id;
          $team_id=Tournament::getTeamById($user_id);
        $team_id = (array) $team_id;
       $team_id=implode("",$team_id);
        
          $data=array(
               'tournament_id'=>$id,
               'team_id'=>$team_id,
          );
           Tournament::joiToTournament($data);
  return redirect(route('match', $id));
         
   }


}
