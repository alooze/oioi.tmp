<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use App\Country;
use App\City;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'firstname', 'lastname', 'image',
        'company', 'city', 'country', 'imdb_link', 'phone', 'phone_add', 'usertype',
        'soc_provider', 'soc_id',
    ];

    protected $role = 'user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
        'password'
    ];

    public function get_fields() {
        return $this->fillable;
    }
    public function get_rules() {
        return $this->rules;
    }

    //Send password reset notification
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getCountryNameAttribute() {
      if ( $this->country == '' || $this->country == null || $this->country == '0' ) {
        return '-';
      } else {
        $result = Country::where('ISO', $this->country)->first();
        if (!$result) {
          return $this->country;
        } else {
          return $result->Country;
        }
      }
    }

    public function getCityNameAttribute() {
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
}
