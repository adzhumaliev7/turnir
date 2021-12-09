<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class TournamentController extends Controller
{
    public function index(){
        $tournaments = Admin::getTournaments();
        return view('admin.home.tournament',[
            'tournaments'=>$tournaments,
        ]);
    }

    public function createTournament(Request $request){

    if($request->isMethod('post')){
         $data =$request->validate([
            'name' => 'required',
            'format' => 'required',
            'country' => '',
            'timezone' => '',
            'countries' => '',
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

        // var_dump($data);
         Admin::createTournament($data);

           \Session::flash('flash_meassage', 'Турнир добавлен');
           return redirect(route('admin'));
        }
         return view('admin.home.tournament_create');
    }
    public function tournamentView($id){
     $tournaments = Admin::getTournamentByID($id);
        
        return view('admin.home.tournament_view',[
            'tournaments'=>$tournaments,
            'id'=>$id,
        ]);
    }

     public function tournamentEdit($id, Request $request){
        
        if($request->isMethod('post')){
            $data =$request->validate([
               'name' => '',
               'format' => '',
               'country' => '',
               'timezone' => '',
               'countries' => '',
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
          
             Admin::editTournament($id,$data);
              return redirect(route('admin_tournament'));
        }
    }

    public function tournamentDelete($id){
         Admin::tournamentDelete($id);
        return redirect(route('admin_tournament'));
    }
}
