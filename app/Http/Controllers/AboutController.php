<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pages;
class AboutController extends Controller
{
    public function index(){
        if(Auth::user() != null){
            $mail = Auth::user()->email;
        }
        else $mail = null;
        $page = Pages::find(1);
        //$help = DB::table('help')->leftJoin('users' , 'help.user_id', '=', 'users.id')->select('help.*', 'users.name')->orderBy('help.id','desc')->paginate(15);
        
        return view('main.other.about' , compact('mail', 'page'));
    }
}