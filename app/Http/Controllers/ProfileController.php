<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersProfile;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
       $id = Auth::user()->id;
      $data = UsersProfile::getById($id);

      $teams=Team::getTeamById($id);
     // $a=(array) $data;

     
          return view('profile',[
            'data'=>$data,
            'teams'=>$teams,
          ]);
     }
   
    public function saveProfile(Request $request){

   if($request->isMethod('post')){
      
        if($request->hasFile('doc_photo')) {
           $file_name = $request->file('doc_photo')->getClientOriginalName();
            $file = $request->file('doc_photo');
            $file->move(public_path() . '/uploads/storage/img',$file_name);
        }
         if($request->hasFile('doc_photo2')) {
           $file_name2 = $request->file('doc_photo2')->getClientOriginalName();
            $file = $request->file('doc_photo2');
            $file->move(public_path() . '/uploads/storage/img',$file_name2);
        }
     
   $data =$request->validate([
            'doc_photo' => '',
            'doc_photo2' => '',
            'phone' => 'required',
            'fio' => 'required',
            'login' => 'required',
            'email' => 'required|email',
            'country' => '',
            'timezone' => '',
            'city' => '',
            'bdate' => '',
            'nickname' => 'required',
            'game_id' => 'required'
         ]);
           $id = Auth::user()->id;
       $data['verification'] = 'on_check';
       $data['user_id'] = $id;
       $data['doc_photo']=$file_name;
       $data['doc_photo2']=$file_name2;

         UsersProfile::saveProfile($data);
       
         }
        
       \Session::flash('flash_meassage', 'Сохранено');
        return view('profile');
    }


    public function createTeam(Request $request){

    $data =$request->validate([
           
            
            'name' => 'required',
         ]);
    
         $id = Auth::user()->id;
      $data['user_id'] = $id;
       $data['role']='captain';
   UsersProfile::Team($data);
       \Session::flash('flash_meassage', 'Сохранено');
       return view('profile');  
        } 
    
  
}
