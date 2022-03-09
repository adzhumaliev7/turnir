<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefuseTeam extends Mailable
{
    use Queueable, SerializesModels;
 public $user;
    public $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($user, $text)
    {
        $this->user = $user;
        $this->text = $text;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->to($this->user)
            ->from('tournamentpubgtest@gmail.com', 'Отказ заявки')
            ->view('messages.rejected_team', [
                'text' => $this->text
            ]);
    }
}
