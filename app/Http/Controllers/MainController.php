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
        }
        else $mail = null;
        $tournaments = Tournament::getTournaments();
        if($tournaments !=null) $tournaments = ColectionPaginate::paginate($tournaments, 10);
        $date = date('d.m.Y'); 

        return view('main.main', [
           'mail' =>$mail,
           'tournaments' => $tournaments,
           'date' => $date,
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
    public function page($slug, $id){

        if(Auth::user() != null){
        
            $mail = Auth::user()->email;
        }
        else $mail = null;
        $page = Pages::find($id);
        return view('main.page', [
           'mail' =>$mail,
           'page' => $page,
       
        ]);
    }
   
}
