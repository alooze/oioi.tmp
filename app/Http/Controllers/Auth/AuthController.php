<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\City;
use App\Country;
use Mail;

class AuthController extends Controller
{
    public function forgotForm()
    {
        return view('auth.passwords.email');
    }

    public function procForgot(Request $request)
    {
        //
    }

    // public function soc()
    // {
    //     return view('profile.soctest');
    // }

    public function authNav() {
        return view('auth.nav');
    }

    public function redirect(Request $request, $provider)
    {
        if ($request->qid != null)
          setcookie('qid', $request->qid, 0, '/');
        return \Socialite::driver( $provider )->redirect();
    }

    public function callback(Request $request, $provider)
    {
        if ( isset( $request->error ) ) {
          return redirect()->route('f.auth');
        }
        $rawUser = \Socialite::driver($provider)->user();
        $name = $rawUser->getName();
        $userData = [
            'name' => str_replace(' ', '_', $name),
            'email' => $rawUser->getEmail(),
            'soc_provider' => $provider,
            'soc_id' => $rawUser->getId(),
        ];
        $nameParts = explode(' ', $name);
        if (count($nameParts) > 1) {
            $userData['firstname'] = explode(' ', $name)[0];
            $userData['lastname'] = explode(' ', $name)[1];
        }

        if (!$userData['email']) {
            $userData['email'] = $userData['soc_id'] . '@' . $userData['soc_provider'];
        }

        $user = User::where('email', $userData['email'])->first();

        if (!$user) {
            // создаем юзера
            $rawPass = md5($userData['email']);
            $userData['password'] = bcrypt($rawPass);
            $userData['role'] = 'producer';
            $user = User::create($userData);
            Auth::attempt(['email' => $userData['email'], 'password' => $rawPass]);
        } else {
            Auth::login($user);
        }

        if (isset($_COOKIE['qid']) && $_COOKIE['qid'] != null) {
            return redirect()->route('f.start');
        }
        return redirect()->route('f.profile');
    }

    // /**
    //  * Показываем форму для заполнения необходимых полей при первой авторизации через соцсети
    //  * @param  Request $request [description]
    //  * @return [type]           [description]
    //  */
    // public function firstTime(Request $request)
    // {
    //     $user = Auth::user();
    //     $countries = Country::orderBy('Country')->get();
    //     $countries = array_merge([0 => 'Select country'],
    //                 array_pluck($countries, 'Country', 'ISO')
    //             );
    //     $cities = [0 => 'Select you country'];
    //     return view('auth.first', compact('user','countries','cities'));
    // }
    //
    // /**
    //  * Сохраняем данные из формы при первой авторизации через соцсети
    //  * @param  Request $request [description]
    //  * @return [type]           [description]
    //  */
    // public function firstUpdate(Request $request)
    // {
    //     dd($request);
    // }

}
