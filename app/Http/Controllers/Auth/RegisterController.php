<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Mail;
use App\City;
use App\Country;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerForm()
    {
        $countries = array_pluck(Country::orderBy('Country')->get(), 'Country', 'ISO');
        return view('auth.register', compact('countries', 'route'));
    }

    public function procRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        // return $this->create($request->all());
        $user = $this->create($request->all());
        $mail = Mail::to('team@oioi.guru')->send(new \App\Mail\UserRegister($user));
        $mail = Mail::to('nadia.bezhnar@baoboab.com')->send(new \App\Mail\UserRegister($user));
        // team@oioi.guru nadia.bezhnar@baoboab.com

        // event(new Registered($user = $this->create($request->all())));
        //
        // $this->guard()->login($user);
        //
        return $user;//$this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
            'terms' => 'accepted',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['name'] = $data['firstname'] . '_' . $data['lastname'];
        return User::create($data);
    }
}
