<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
class MainController extends Controller
{
    public function index(){
         return view('main');
    }

    public function feedback(){
         return view('feedback');
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
        return redirect(route('feedback'));
    }
   
}
