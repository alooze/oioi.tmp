<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubmitAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $dir;
    public $zipname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $dir, $zipname)
    {
        $this->user = $user;
        $this->dir = $dir;
        $this->zipname = $zipname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New film submit')
                    ->markdown('emails.manager.submit-admin')
                    ->attach($this->dir . $this->zipname, [
                        'as' => $this->zipname,
                        'mime' => 'application/bin',
                    ]);
    }
}
