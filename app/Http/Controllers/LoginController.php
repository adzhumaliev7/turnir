<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
         if(Auth::check()){
            return redirect(route('user.main'));
        }
        $formFields = $request->only(['email','password']);
        
        if(Auth::attempt($formFields)){
            return redirect()->intended(route('user.main'));
        }
        return redirect(route('user.login'))->withErrors([
             'email' => 'Не удалось('
         ]);
}
}