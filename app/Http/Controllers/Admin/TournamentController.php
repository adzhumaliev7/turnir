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
            'country' => 'required',
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
}
