<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funder extends User
{
    protected $table = 'users';
    
    public $role = 'funder';

    public $rules = [
        'first-step' => [
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'pass' => 'required',
            'pass_rep' => 'same:pass',
            'email' => 'required|email|unique:users,email',
        ],
        'second-step' => [
            'company' => 'required',
            'phone' => 'required',
        ]
    ];
}
