<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
          $id = Auth::user()->id;
          $mail = User::getEmail($id);
        
         return view('main.main', ['mail' => $mail]);
    }

    public function feedback(){
        $id = Auth::user()->id;
        $mail = User::getEmail($id);
         return view('main.feedback',[
             'mail' => $mail,
         ]);
    }

     public function saveFeedback(Request $request){
        
   $data =$request->validate([
            
            'phone' => '',
            'fio' => '',
            'email' => 'required',
            'description' => '',
           
         ]);
         Feedback::saveFeedback($data);
         \Session::flash('flash_meassage', 'Отпавлено');
        return redirect(route('main.feedback'));
    }
   
}
