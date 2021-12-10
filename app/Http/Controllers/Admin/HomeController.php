<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class HomeController extends Controller
{
    public function index(){
        $users=Admin::getUsersCount();
        $teams=Admin::getTeamsCount();

        return view('admin.home.index',[
            'users'=>$users,
            'teams'=>$teams,
        ]);
    }
    public function usersView(){

           $users=Admin::get();
          if($users == NULL){
            $users =="";
        }
           
         return view('admin.home.users',[
             'users'=>$users
         ]);
    }
      public function teamsView(){
          
           $teams=Admin::getTeams();
        if($teams == NULL){
            $teams =="";
        }
           
         return view('admin.home.teams',[
             'teams'=>$teams
         ]);
    }
    public function userCard($id){
          $users=Admin::getById($id);
          //var_dump($users);
  return view('admin.home.user_card',[
      'users'=>$users
        ]);
    }

    public function verified($id){
      $users=Admin::verified($id);
         return redirect()->to(route('users'));
    }


}
