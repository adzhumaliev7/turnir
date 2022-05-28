<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use  App\Notifications\TwoFactorCode;
class TwoFactorController extends Controller
{
    public function index() 
    {
        return view('auth.twoFactor');
    }
    public function store(Request $request)
    {
         $request->validate([
            'two_factor_code' => 'integer|required',
        ]);
        $user = auth()->user();
     
        if($request->input('two_factor_code') == $user->two_factor_code)
        {
            $user->resetTwoFactorCode();
            return redirect()->route('admin');
        }
        return redirect()->back()
            ->withErrors(['two_factor_code' => 
                'Введенный код не верный!']); 
              
    }
    public function resend()
    {
         $user = auth()->user();
         \Auth::user()->generateTwoFactorCode();
        \Auth::user()->notify(new TwoFactorCode());
        return redirect()->back()->withMessage('Двухфакторный код отправлен снова'); 
       
    }
}
