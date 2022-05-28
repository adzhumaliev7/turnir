<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogFailedAuthentication;
use App\Models\User;
use App\Models\Ip_log;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use  App\Notifications\TwoFactorCode;
class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected function validator(array $data)
    {
        $rule = LogFailedAuthentication::where('ip', \Request::getClientIp())->count() >= 3 ? 'required|captcha': 'nullable|captcha';
       //dd(LogFailedAuthentication::where('ip', \Request::getClientIp())->get());
        return Validator::make($data, [
            'g-recaptcha-response' => $rule
        ]);
      
    }
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){

        if(Auth::check()){
          return redirect(route('main'));
      }

      $this->validator($request->all())->validate();
      $formFields = $request->only(['email','password']);

      if(Auth::attempt($formFields)){
  	Ip_log::create(['user_id' => Auth::user()->id, 'ip' => \Request::getClientIp(),]);
  
        $user = User::findorfail(Auth::user()->id);
        if(Auth::user()->role->role_id == 2){
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode());
        }else 
         return redirect()->intended();

//
          return redirect()->intended();
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