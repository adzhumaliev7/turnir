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
    
       foreach ($tournaments as $tournament ) {
          $t = (array) $tournament;
       }

      $date = date('Y-m-d');
      
      if($date > $t['tournament_start']){
           $turnir  = 'close';
      }else {
           $turnir = 'active';
      }
       //$start_reg=($t['start_reg']  $date && $t['start_reg'] != $date);
       if($t['start_reg'] > $date && $t['start_reg'] != $date){
            $reg= "dont_time";
       }
       elseif($t['start_reg'] <=  $date && $t['end_reg'] >= $date){
             $reg= "time";
       }else $reg= "loss";
       //$end_reg=(strtotime(strtotime($date) >= $t['end_reg']));
       
      $user_id = Auth::user()->id;
      $teams = Tournament::getTeams($id, $user_id);//команды зарегистрированные в турнир 
      $userdata= Tournament::checkTeam($user_id);
      $userdata = (array) $userdata;

     if($teams == NULL){
          $teams = "";
     }
 
     if($userdata != NULL){
          if($userdata['role']=='captain' ){
               if($teams != NULL){
                 foreach ($teams as $key ) {
                     $key=(array) $key;
                }
                 
                    if($user_id != $key['user_id']){
                         $checked = 'captain'; 
                    }else   $checked = 'has'; 
                }else $checked= 'captain';    
          }
          else if($userdata['role']=='member'){
                 if($teams != NULL){
                    foreach ($teams as $key ) {
                         $key=(array) $key;
                     }
                         if($userdata['team_id'] != $key['team_id']){
                              $checked = 'member'; 
                         }else   $checked = 'has'; 
               }  else $checked= 'member';       
          }else $checked= 'has';
     }else $checked= NULL;
 
        return view('match',[
             'tournaments' => $tournaments,
             'teams' => $teams,
             'checked' => $checked,
             'reg' => $reg,
             'turnir' => $turnir,
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
