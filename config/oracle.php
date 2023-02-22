<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_DATA3_TNS', ''),
        'host'           => env('DB_DATA3_HOST', ''),
        'port'           => env('DB_DATA3_PORT', '1521'),
        'database'       => env('DB_DATA3_DATABASE', ''),
        'service_name'   => env('DB_DATA3_SERVICE_NAME', ''),
        'username'       => env('DB_DATA3_USERNAME', ''),
        'password'       => env('DB_DATA3_PASSWORD', ''),
        'charset'        => env('DB_DATA3_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_DATA3_PREFIX', ''),
        'prefix_schema'  => env('DB_DATA3_SCHEMA_PREFIX', ''),
        'edition'        => env('DB_DATA3_EDITION', 'ora$base'),
        'server_version' => env('DB_DATA3_SERVER_VERSION', '11g'),
        'load_balance'   => env('DB_DATA3_LOAD_BALANCE', 'yes'),
        'dynamic'        => [],
    ],
];
