<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class TournamentController extends Controller
{
    public function index(){
        $tournaments = Admin::getTournaments();
        if($tournaments == NULL){
            $tournaments =="";
        }
        return view('admin.home.tournament',[
            'tournaments'=>$tournaments,
        ]);
    }

    public function createTournament(Request $request){

    if($request->isMethod('post')){

      
           $file_name = $request->file('file_label')->getClientOriginalName();
            $file = $request->file('file_label');
           $file->move(public_path() . '/uploads/storage/adminimg',$file_name);
            
        
      
         $data =$request->validate([
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
            'ligue' => '',
            'rule' => '',
            'header' => '',
            'tournament_start' => '',
            'games_time' => '',
         ]);
        $data['file_label']=$file_name;
       
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
         if($request->hasFile('file_1')) {
           $file_name = $request->file('file_1')->getClientOriginalName();
            $file = $request->file('file_1');
            $file->move(public_path() . '/uploads/storage/adminimg',$file_name);
        }
        if($request->isMethod('post')){
            $data =$request->validate([
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
          $data['file_1']=$file_name;
             Admin::editTournament($id,$data);
              return redirect(route('admin_tournament'));
        }
    }

    public function tournamentDelete($id){
         Admin::tournamentDelete($id);
        return redirect(route('admin_tournament'));
    }
    public function tournamentTeams($id){
        $teams = Admin::getTournamentsTeams($id);
        
        return view('admin.home.tournaments_teams',[
            'teams'=>$teams,
          
        ]);
    }
}
