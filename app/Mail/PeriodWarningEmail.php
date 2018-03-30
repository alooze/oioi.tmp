<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Settings as S;
use App\User;


class PeriodWarningEmail extends Mailable
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
        if ($endsForObj = S::where('name', 'email_days')->first()) {
            $endsFor = $endsForObj->value;
        } else {
            $endsFor = 7;
        }
        $user = $this->user;

        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Reminder Email')
                    ->markdown('emails.user.remind-period-end')
                    ->with([
                        'endsFor' => $endsFor,
                    ]);
    }
}
