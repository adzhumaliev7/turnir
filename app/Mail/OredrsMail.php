<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OredrsMail extends Mailable
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
            ->from('bigplaypro@gmail.com', 'Заявка на добавление данных')
            ->view('messages.order', [
                'text' => $this->text,
            ]);
    }
}
