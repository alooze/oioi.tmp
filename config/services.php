<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '530070310697503', //'1803701039920224', // App ID
        'client_secret' => '7efdaa8b441aed7d945724a2f7673e35', //'0e76d65ddfa30de9038af875d3be9c17', // App Secret
        'redirect' => env('APP_URL') . '/socialite/facebook/callback', //Ссылка на перенаправление при удачной авторизации (3)
    ],

    'google' => [
        'client_id' => '562464874348-q4om4p9ugm2bn2tjltp4ck20mpbkdm6i.apps.googleusercontent.com',//'460089302427-dlpp9tfgp9dfpc5vbmr7v021a7fhk673.apps.googleusercontent.com',
        'client_secret' => 'HIoUXz5koxXlwpJUSPLfHZaY',//'SDc7MLo8Z_dgEtH2H88oS5V3',
        'redirect' => env('APP_URL') . '/socialite/google/callback',
    ],

    'twitter' => [
        'client_id' => 'PcBetuJF1vBjN3QlshJI4ljGr',//'MtQwjiQLKaHR8lQnm36rw7h8f',
        'client_secret' => 'HR1F4CMSt3sTzcEkFamePoy32TlCuJR9KMeJZrpD8FIv8LaXgI', //'IHLfsht8z5tWkrFgQ8seO2xMgWeC93A3GLK1hJ8yJQBMJmvnUA',
        'redirect' => env('APP_URL') . '/socialite/twitter/callback',
    ],

    'linkedin' => [
        'client_id' => '789eql0mgehi6t', //'78ibqiflo49rsk',
        'client_secret' => 'd4nI2VZjGzNXYpT0', //'M2j5RxAS9blLI14T',
        'redirect' => env('APP_URL') . '/socialite/linkedin/callback',
    ],

];
