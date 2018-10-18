<?php

use Admin\AdminRoutes;

return [
    'debug'   => env('DEBUG_MODE', true),
    'domains' => [
        /*'Foo' => [
            'routes'     => FooRoutes::class,
            'containers' => require_once(ROOT_DIR . '/src/Domains/Foo/config/containers.php')
        ]
        */
    ],
    'database' => [
        'host'     => env('DB_HOST', '127.0.0.1'),
        'dbname'   => env('DB_NAME'),
        'user'     => env('DB_USER'),
        'password' => env('DB_PASSWORD'),
        'port'     => env('DB_PORT', '5432'),
        'driver'   => env('DB_DRIVER', 'pdo_pgsql')
    ],
    'models_path' => [
        ROOT_DIR . '/src/Common/Models'
    ]
];