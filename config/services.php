<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        //'client_id' =>'158585591333-mfb9anhv36eesst82qgje7l52bqrivh2.apps.googleusercontent.com',
        'client_id' =>'158585591333-mfb9anhv36eesst82qgje7l52bqrivh2',
        'client_secret' => '_NcDTx4eM2FlxEwXz2i2SI3m',
        'redirect' => 'https://laravel-social-testing-2020.herokuapp.com/login/callback',
    ],

];
