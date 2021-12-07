<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournament;
class TournamentController extends Controller
{
    public function index(){


         $tournaments = Tournament::getTournaments();
        return view('tournament',[
             'tournaments'=>$tournaments,
        ]);
    }
}
