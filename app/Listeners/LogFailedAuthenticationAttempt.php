<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\LogFailedAuthentication;
use Request;
class LogFailedAuthenticationAttempt
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if(get_class($event) == 'Illuminate\Auth\Events\Failed'){
            LogFailedAuthentication::create([
                'ip' => Request::getClientIp()
            ]);
        } else{
            LogFailedAuthentication::where('ip', Request::getClientIp())->delete();
        }
    }
}
