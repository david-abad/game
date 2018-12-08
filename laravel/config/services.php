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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    
    ],
    'facebook' => [
    'client_id' => env('FACEBOOK_ID'),         // Your GitHub Client ID
    'client_secret' => env('FACEBOOK_SECRET'), // Your GitHub Client Secret
    'redirect' => env('FACEBOOK_URL'),
    ],
    'google' => [
    'client_id' => env('GOOGLE_ID'),         // Your GitHub Client ID
    'client_secret' => env('GOOGLE_SECRET'), // Your GitHub Client Secret
    'redirect' => env('GOOGLE_URL'),
    ],
    'github' => [
    'client_id' => env('GITHUB_ID'),         // Your GitHub Client ID
    'client_secret' => env('GITHUB_SECRET'), // Your GitHub Client Secret
    'redirect' => env('GITHUB_URL'),
    ],
    'twitter' => [
    'client_id' => env('TWITTER_ID'),         // Your GitHub Client ID
    'client_secret' => env('TWITTER_SECRET'), // Your GitHub Client Secret
    'redirect' => env('TWITTER_URL'),
    ],
    'linkedin' => [
    'client_id' => env('LINKEDIN_ID'),         // Your GitHub Client ID
    'client_secret' => env('LINKEDIN_SECRET'), // Your GitHub Client Secret
    'redirect' => env('LINKEDIN_URL'),
    ],
    'instagram' => [
    'client_id' => env('INSTAGRAM_ID'),         // Your GitHub Client ID
    'client_secret' => env('INSTAGRAM_SECRET'), // Your GitHub Client Secret
    'redirect' => env('INSTAGRAM_URL'),
    ],
     'gitlab' => [
    'client_id' => env('GITLAB_ID'),         // Your GitHub Client ID
    'client_secret' => env('GITLAB_SECRET'), // Your GitHub Client Secret
    'redirect' => env('GITLAB_URL'),
    ],


];
