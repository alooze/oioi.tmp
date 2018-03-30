<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Country;
use App\City;

class FilmPersonnel extends Model
{
    protected $fillable = [
        'film_id', 'external', 'role', 'firstname', 'lastname', 'email', 'phone', 'company', 'website', 'country', 'city', 'showreel_link', 'production_location', 'imdb_link', 'confirm_code', 'email_confirmed',
    ];

    protected static $rules = [
        'producer' => [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ],
        'director' => [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ],
        'writer' => [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ],
        'dop' => [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ],
    ];

    public static function getRules($step) {
        return self::$rules[$step];
    }

    public function getIsMeAttribute($value) {
        $user = Auth::user();
        return ($this->external == $user->id);
    }

    public function countryName($value=null) {
        $value = ( $value ) ?: $this->country;
        if ( $value == '' || $value == null || $value == '0' ) {
          return '-';
        } else {
          $result = Country::where('ISO', $value)->first();
          if (!$result) {
            return $this->country;
          } else {
            return $result->Country;
          }
        }
    }

    public function cityName() {
        if ( $this->city == '0' || $this->city == '' || $this->city == null) {
          return '-';
        } else {
          $result = City::find($this->city);
          if (!$result) {
            return $this->city;
          } else {
            return $result->name2;
          }
        }
    }

    public function getFilmAttribute() {
      return Film::find($this->film_id);
    }
}
