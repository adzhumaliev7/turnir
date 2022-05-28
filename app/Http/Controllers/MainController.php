<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use App\CustomClasses\ColectionPaginate;
use App\Models\Tournament;
use App\Models\Pages;
class MainController extends Controller
{
    public function index()
    {   
        if(Auth::user() != null){
            $mail = Auth::user()->email;
			$user = User::findorfail(Auth::user()->id);
            $user->update(['session_id' => session()->getID()]);
			$active =  Auth::user()->verified;
        }
        else {$mail = null;
         $active = null;}
             $tournaments = Tournament::latest('tournament_start')->where('status', 'save')->limit(3)->get();
        $date = date('d.m.Y'); 


        return view('main.main', [
           'mail' =>$mail,
           'tournaments' => $tournaments,
           'active' => $active,
        ]);
    }

    public function feedback()
    {
        if (Auth::user() != null) {
            $active =  Auth::user()->verified;
            $mail = Auth::user()->email;
        }  else {$mail = null;
         $active = null;}
        return view('main.feedback', [
            'mail' => $mail,
			  'active' => $active,
        ]);
    }
	 public function test()
    {
        if (Auth::user() != null) {
          
            $mail = Auth::user()->email;
        } else $mail = null;
        return view('main.test', [
            'mail' => $mail,
        ]);
    }

    public function saveFeedback(Request $request)
    {
        
        $data = $request->validate([

            'phone' => '',
            'fio' => '',
            'email' => 'required',
            'description' => '',

        ]);
        Feedback::create(['fio'=> $request->input('fio'), 'phone'=> $request->input('phone'), 'email'=> $request->input('email'), 'description'=> $request->input('description'),]);
        \Session::flash('flash_meassage', 'Отпавлено');
        return redirect(route('feedback'));
    }

    public function rating(){
        if (Auth::user() != null) {
          
            $mail = Auth::user()->email;
        } else $mail = null;
        $teams=Team::getRating();
        
        return view('main.rating', [
            'mail' => $mail,
            'teams' => $teams,
        ]);
    }
        public function page($slug, $id){

        if(Auth::user() != null){
          $active =  Auth::user()->verified;
            $mail = Auth::user()->email;
        }
     else {$mail = null;
            $active = null;}
        $page = Pages::find($id);
        return view('main.page', [
           'mail' =>$mail,
           'page' => $page,
        'active' => $active,
        ]);
    }
}
