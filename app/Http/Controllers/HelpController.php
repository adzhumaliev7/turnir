<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HelpController extends Controller
{

    public function index(){
        if(Auth::user() != null){
            $mail = Auth::user()->email;
        }
        else $mail = null;
        $help = DB::table('help')->leftJoin('users' , 'help.user_id', '=', 'users.id')->select('help.*', 'users.name')->orderBy('help.id','desc')->paginate(15);
        return view('main.help.index' , compact('mail' ,'help'));
    }
}
