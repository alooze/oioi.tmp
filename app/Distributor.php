<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends User
{
    protected $table = 'users';
    
    public $role = 'distributor';

    public $rules = [
        'first-step' => [
            'pass' => 'required',
            'pass_rep' => 'same:pass',
            'email' => 'required|email|unique:users,email',
            'company' => 'required',
        ],
        'second-step' => [

        ],
    ];
}
