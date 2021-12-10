<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
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
       
        return view('match',[
             'tournaments' => $tournaments,
        ]);
   } 


}
