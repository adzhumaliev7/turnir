<?php

namespace App\Http\Controllers\Auth;

//use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    use RegistersUsers;
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',  'min:4','confirmed'],
        ]);
    }


    public function create(Request $request){
       /*  if(Auth::check()){
            return redirect(route('user.main'));
        }
         $validateFields =$request->validate([
            'email' => 'required|email',
            'password' => 'required'
         ]);
         if(User::where('email', $validateFields['email'])->exists()){
            return redirect(route('user.registration'))->withErrors([
             'email' => 'Такой пользователь уже зарегистррирован'
         ]);
         }
         $user = User::create($validateFields);
         $user->assignRole('user');
        Mail::to($user)->send(new UserRegistered($user));
        $request->session()->flash('message', 'На ваш адрес было выслано письмо с подтверждением регистрации.');
         if($user){
             Auth::login($user);
             return redirect()->to(route('user.main'));
         }
         return redirect(route('user.login'))->withErrors([
             'forError' => 'Произошла ошибка при сохранении'
         ]); */

        $this->validator($request->all())->validate();

        $user =User::create($request->all());
        $user->assignRole('user');
        Mail::to($user)->send(new UserRegistered($user));
        $request->session()->flash('message', 'На ваш адрес было выслано письмо с подтверждением регистрации.');
        //return back();
        if($user){
            Auth::login($user);
            return redirect(route('main'));
        }
    }
    public function confirmEmail(Request $request, $token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        $request->session()->flash('message', 'Учетная запись подтверждена. Войдите под своим именем.');
        return redirect(route('user.login'));
    }
}
