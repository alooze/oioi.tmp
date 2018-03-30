<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;
use Mail;
use App\Mail\ResetSocial;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function checkAndEmail(Request $request) {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ( !$user ) {
          return response(['email'=>["This email doesn't match any account. Register the account."]], 422);
        }
        if ($user->soc_provider != NULL) {
            $soc = ucfirst($user->soc_provider);
            Mail::to($email)->send(new ResetSocial($email));
            // Mail::raw("You've attempted password reseting on oioi.guru\nYour account was registered via the $soc credentials.\nYou can't change password for this account.",
            //   function ($message) use ($email) {
            //     $message->to($email);
            //     $message->subject("OiOi Guru Password Reset");
            // });
        } else {
            $this->sendResetLinkEmail($request);
        }
    }
}
