<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    public function save(Request $request){
        if(Auth::check()){
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
         if($user){
             Auth::login($user);
             return redirect()->to(route('user.main'));
         }
         return redirect(route('user.login'))->withErrors([
             'forError' => 'Произошла ошибка при сохранении'
         ]);

    }
}
