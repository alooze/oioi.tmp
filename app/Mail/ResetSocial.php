<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SystemFile;
use App\User;
use Illuminate\Support\Facades\Auth;

class ResetSocial extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
   public function __construct($email)
   {
       $this->email = $email;
   }

    public function build()
    {
        $this->subject('Reset Password Notification');
        $user = User::where('email', $this->email)->first();

        return $this->markdown('emails.user.reset-pass', compact('user'));
    }
}
