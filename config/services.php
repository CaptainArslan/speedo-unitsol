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

    // 'google' => [
    //     'client_id' => "916839943114-uqujf3ev6020vte0f4isc5p6dv4abha1.apps.googleusercontent.com",
    //     'client_secret' => "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",
    //     'redirect' => 'http://localhost:8000/auth/google/callback',
    // ], 
    
    // 'facebook' => [
    //     'client_id' => "475678248025821",
    //     'client_secret' => "b07e8efd93bc846ba979ceaffbe855d0",
    //     'redirect' => 'http://localhost:8000/auth/facebook/callback',
    // ],

    'google' => [
        'client_id' => "916839943114-uqujf3ev6020vte0f4isc5p6dv4abha1.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => 'https://speedo.bhattimobiles.com/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => "475678248025821",
        'client_secret' => "b07e8efd93bc846ba979ceaffbe855d0",
        'redirect' => 'https://speedo.bhattimobiles.com/auth/facebook/callback',
    ],


];
