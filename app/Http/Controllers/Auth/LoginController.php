<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function procLogin(Request $request)
    {
        if ($request->qid) {
            // мы попали на авторизацию из формы комментирования faq
            session(['qid' => $request->qid]);
        }
        return $this->login($request);
    }

    protected function redirectTo()
    {
        if (request()->session()->has('qid')) {
            return route('f.start');
        }
        $user = Auth::user();
        if (in_array($user->role, ['admin', 'manager'])) {
            return route('a.start');
        }
        return route('f.profile');
    }

    // protected function hasTooManyLoginAttempts(Request $request)
    // {
    //     return $this->limiter()->tooManyAttempts(
    //         $this->throttleKey($request), 200, 0.2
    //     );
    // }
}
