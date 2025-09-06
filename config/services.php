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
    
    'stripe' => [
    'key' => env('STRIPE_KEY'),
    'secret' => env('STRIPE_SECRET'),
    ],

    'printify' => [
    'token'   => env('PRINTIFY_API_KEY'),
    'shop_id' => env('PRINTIFY_SHOP_ID'),
    ],
    'ssactivewear' => [
    'base_url'       => env('SS_API_URL', 'https://api.ssactivewear.com/v2'),
    'account_number' => env('SS_ACCOUNT_NUMBER'),
    'api_key'        => env('SS_API_KEY'),
    ],
    'dripapps' => [
    'shop_id'   => env('DRIPAPPS_SHOP_ID'),
    'api_token' => env('DRIPAPPS_API_TOKEN'),
    ],





];
