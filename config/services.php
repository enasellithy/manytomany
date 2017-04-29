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
        'client_id' => '260653227695019',
        'client_secret' => 'be7aadb51e926937b86139f4ff6edb39',
        'redirect' => 'http://localhost:81/LaravelB/auth/facebook/callback',
    ],

    'github' => [
        'client_id' => '6e5e75589e2672548c15',
        'client_secret' => '479538f97a54cac3e8785e513c3167dc74672ab5',
        'redirect' => 'http://localhost:81/LaravelB/auth/github/callback',
    ],

];
