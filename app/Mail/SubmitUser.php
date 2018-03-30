<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\Settings as S;
use Carbon\Carbon;

class SubmitUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('OiOi Guru Film Submitting');
        $user = Auth::user();
        $rawCycle = S::where('name','period_end')->first()->value;
        $cycle = Carbon::parse($rawCycle)->format('M d, Y \a\t h:i A');//->toDayDateTimeString();
        $until = Carbon::parse($rawCycle)->addDays(5)->format('M d, Y');//->toDayDateTimeString();

        return $this->markdown('emails.user.submit-user', compact('user', 'cycle', 'until'));
    }
}
