<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
class TeamController extends Controller
{
    public function index($id){
        $data=Team::getTeamById($id);
        $members=Team::getTeamMembers($id);
       
         return view('team',[
            'data'=>$data,
            'members'=>$members,
        ]); 
    }
}
