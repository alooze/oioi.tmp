<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmRole extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $person;
    public $film;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($person, $film, $data)
    {
        $this->data = $data;
        $this->film = $film;
        $this->person = $person;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Please Confirm Your Invitation')
                    ->markdown('emails.user.confirm-role');
    }
}
