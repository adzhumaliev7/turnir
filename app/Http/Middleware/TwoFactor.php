<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
class TwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        $user = auth()->user();
       // \Auth::user()->update(['two_factor_expires_at' => now()]);
       
        if(auth()->check() && $user->two_factor_code  &&  $user->role->role_id == 2) {
           
            if ($user->two_factor_expires_at->lt(now())) {
                User::resetTwoFactorCode();
                auth()->logout();
                return redirect()->route('login')
                ->withMessage('Срок действия двухфакторного кода истек. Пожалуйста, войдите еще раз.');
            }
            if (!$request->is('verify*')) {
                return redirect()->route('verify.index');
            }
        }
    
        return $next($request);
    }
    
}
