<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

     public function addBan($id){
          Admin::addBan($id);
        return redirect(route('users'));
    }
     public function unblock($id){
          Admin::unblock($id);
        return redirect(route('users'));
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

      public function moderators(){
        $moderators = Admin::getModerators();
       
        return view('admin.home.moderators',[
            'moderators' => $moderators,
        ]); 
    }
      public function createModerators(){

       return view('admin.home.create_moderators'); 
       
    }
     public function saveModerator(Request $request){


          $data  = $request->validate([
          
            'email' => 'required',
           // 'password' => Hash::make($request->input('password')),
         ]); 
           $data['password'] = Hash::make($request->input('password'));
        $user = User::create($data);
        $user->assignRole('moderator');
       // return $user;

        return redirect(route('moderators'));
    }

     public function delteModeratos($id){
         Admin::delteModeratos($id);
        return redirect(route('moderators'));
    }

    public function help(){

        $help= Admin::getHelp();
       if($help == NULL){
            $help =="";
        }
        return view('admin.home.help',[
            'help' => $help,
        ]); 
       
    }
    public function createHelp(){
        return view('admin.home.create_help'); 
    }

    public function saveHelp(Request $request){
             $data  = $request->validate([
          
            'title' => 'required',
            'description' => 'required',
           // 'password' => Hash::make($request->input('password')),
         ]); 
          
        Admin::createHelp($data);
     
       // return $user;

        return redirect(route('help'));
    }
    public function editHelp($id){
          
         $help = Admin::getHelpById($id);
    return view('admin.home.edit_help',[
        'help'=>$help,
    ]); 
    }

    public function editHelpSave($id, Request $request){

         
            $data =$request->validate([
               'title' => '',
               'description' => '',
            ]);
         
             Admin::editHelp($id,$data);
              return redirect(route('help'));
        
    }

}
