<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyTeamMail extends Mailable
{
    use Queueable, SerializesModels;
    public array $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $user)
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
        return $this->to($this->user)
        ->from('bigplaypro@gmail.com', 'Одобрение заявки!')
        ->view('messages.apply_team');
    }
}
