<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\City;

class CountryController extends Controller
{
    public function getCities(Request $request)
    {
        $countryCode = $request->country;

        $cities = City::where('country', $countryCode)
                        ->orderBy('name2')
                        ->get();
        $ret = [];
        if (!$cities || $cities->count() < 1) {
            $ret[] = ['value' => '', 'label' => 'Choose city', 'selected' => true];
        } else {
            $ret[] = ['value' => '', 'label' => 'Choose city', 'selected' => true];
            foreach ($cities as $city) {
                $ret[] = ['value' => $city->id, 'label' => $city->name2];
            }
        }
        return response()->json($ret);
    }

    public function getCountries() {
        return response()->json(array_pluck(Country::orderBy('Country')->get(), 'Country', 'ISO'));
    }
}
