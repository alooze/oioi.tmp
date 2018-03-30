<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Settings as S;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\City;

class GlobalViewProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.cabinet', 'construction', 'index'], function($view) {
            // готовим данные для таймера
            $period = S::where('name','period_end')->first();
            if (!$period) {
                $end = Carbon::createSafe(2017, 12, 1, 12, 0, 0);
            } else {
                $endTime = preg_split('~[\D]~', $period->value);
                $end = Carbon::createSafe(
                            intval(trim($endTime[0])),
                            intval(trim($endTime[1])),
                            intval(trim($endTime[2])),
                            intval(trim($endTime[3])),
                            intval(trim($endTime[4])),
                            0
                        );
            }
            $now = Carbon::now();
            $endPeriod = $end->diff($now);
            $endPeriod->d = $end->diffInDays($now);
            $view->with('endPeriod', $endPeriod);
        });

        view()->composer('layouts.cabinet', function($view) {
            $active = Route::currentRouteName();
            $view->with('active', $active);
        });

        view()->composer([
          'auth.register',
          'films.general',
          'films.producer',
          'films.director',
          'films.dop',
          'profile.producer',
          ], function($view) {
            $user = Auth::user();
            $countries = array_pluck(Country::orderBy('Country')->get(), 'Country', 'ISO');
            if ($user && $user->country) {
                $citiesDB = City::where('country', $user->country)
                    ->orderBy('Country')
                    ->get();
                $cities = array_pluck($citiesDB, 'name2', 'id');
            } else {
                $cities = [0 => 'Choose country first'];
            }
            $view->with(['countries' => $countries, 'cities' => $cities]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
