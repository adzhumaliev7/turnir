<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user->email)
            ->from('bigplaypro@gmail.com', 'Регистрация')
            ->view('auth.confirm');

      /*   Mail::send(['text' => 'messages.refuse'], ['name', 'wwww'], function ($message) use ($em) {
            $message->to($em, 'www')->subject('Bigplay');
            $message->from('tournamentpubgtest@gmail.com', 'www');
        });   */  
    }
}
