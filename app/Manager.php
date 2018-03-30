<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends User
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name', 'email', 'password', 'role', 'firstname', 'lastname', 'gender', 'company', 'city', 'country', 'website', 'phone', 'phone_add', 'usertype',
    ];

    public $role = 'manager';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $hidden = [
        'password', 'remember_token',
    ];
}
