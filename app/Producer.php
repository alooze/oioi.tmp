<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends User
{
    protected $table = 'users';
    // protected $fillable = [
    //     'user_id', 'firstname', 'lastname', 'gender', 'company', 'city', 'country', 'website', 'phone', 'phone_add'
    // ];
    // public $timestamps = false;

    public $role = 'producer';

    // public $register_rules = [
    //     'first-step' => [
    //         'firstname' => 'required',
    //         'lastname' => 'required',
    //         'gender' => 'required',
    //         'pass' => 'required',
    //         'pass_rep' => 'same:pass',
    //         'email' => 'required|email|unique:users,email',
    //     ],
    //     'second-step' => [
    //         'company' => 'required',
    //         'phone' => 'required',
    //     ]
    // ];
    public $profileRules = [
        'general' => [
          'firstname' => 'filled',
          'lastname' => 'filled',
        ],
        'contact' => [
          'email' => 'filled|email|unique:users,email',
        ],
        'password' => [
            'password' => 'required',
            'passnew' => 'required|confirmed',
        ],
    ];
    public function getProfileRules($type, $id) {
        $result = $this->profileRules[$type];
        if ($type == 'contact')
            $result['email'] .= ',' . $id;
        return $result;
    }
}
