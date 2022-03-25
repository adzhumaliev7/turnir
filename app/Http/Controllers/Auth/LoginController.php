<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{

    use AuthenticatesUsers;
    public function login(Request $request){
       
          if(Auth::check()){
            return redirect(route('main'));
        }
        $formFields = $request->only(['email','password']);
     
        if(Auth::attempt($formFields)){
            return redirect()->intended(route('main'));
        }
        return redirect(route('user.login'))->withErrors([
             'email' => 'не верный логин или пароль',
         ]); 
    }

   /*  protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember'),
            redirect()->intended(route('main')),
        );
    }

    protected function credentials(Request $request)
    {
        return Arr::add($request->only($this->username(), 'password'), 'verified', true);
    } */

}