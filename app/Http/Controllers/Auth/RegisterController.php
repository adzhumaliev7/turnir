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
            'name' => ['required', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',  'min:8','confirmed', 'regex:/[0-9]/'],
            'country' => ['required'],
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    public function index(){
        $countries = config('app.countries');
        return view('auth.registration', compact('countries'));
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
        $request->session()->flash('message', 'На ваш адрес было выслано письмо с подтверждением регистрации.  Повторное письмо можно отправить через 60 секунд');
        //return back();
        if($user){
            Auth::login($user);
            return redirect()->intended(route('main'));
        }
    }
    public function confirmEmail(Request $request, $token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        $request->session()->flash('message', 'Учетная запись подтверждена. Войдите под своим именем.');
        return redirect(route('user.login'));
    }
	 public function confirmSendMessage()
    {
       
        $user = User::findorfail(Auth::user()->id);
        Mail::to($user)->send(new UserRegistered($user));
       session()->flash('message', 'На ваш адрес было выслано письмо с подтверждением регистрации.  Повторное письмо можно отправить через 60 секунд');
        return redirect()->intended(route('main'));
    }
}
