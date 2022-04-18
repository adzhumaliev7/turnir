<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pages;

class TermsController extends Controller
{
    public function index(){
        if(Auth::user() != null){
            $mail = Auth::user()->email;
        }
        else $mail = null;
        $page = Pages::find(2);
        return view('main.other.terms' , compact('mail', 'page'));
    }
}
