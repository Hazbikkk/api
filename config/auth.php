<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'logins',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'logins', // <-- ДОЛЖЕН быть 'logins'
        ],
    ],

    'providers' => [
        'logins' => [  // <-- ДОЛЖЕН быть 'logins', а не 'users'!
            'driver' => 'eloquent',
            'model' => App\Models\Register::class, // или Login::class
        ],
    ],

    'passwords' => [
        'logins' => [
            'provider' => 'logins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];