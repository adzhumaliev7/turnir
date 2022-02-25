<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if(Auth::user() != null){
        
            $mail = Auth::user()->email;
        }
        else $mail = null;
        return view('main.main', [
           'mail' =>$mail
        ]);
    }

    public function feedback()
    {
        if (Auth::user() != null) {
          
            $mail = Auth::user()->email;
        } else $mail = null;
        return view('main.feedback', [
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
        Feedback::saveFeedback($data);
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
}
