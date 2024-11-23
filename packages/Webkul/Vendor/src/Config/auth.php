<?php

return [
    'guards' => [
        'vendor' => [
            'driver' => 'session',
            'provider' => 'vendors',
        ],
    ],

    'providers' => [
        'vendors' => [
            'driver' => 'eloquent',
            'model' => \Webkul\Vendor\Models\Vendor::class,
        ],
    ],

    'passwords' => [
        'vendors' => [
            'provider' => 'vendors',
            'table' => 'vendor_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
];