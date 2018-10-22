<?php

use Domains\Foo\FooRoutes;
use Monolog\Logger;

return [
    'name'    => 'api',
    'debug'   => env('DEBUG_MODE', true),
    'logs'    => [
        // File logs
        Logger::CRITICAL => ROOT_DIR . '/logs/critical.log',
        Logger::ALERT    => ROOT_DIR . '/logs/alert.log'
    ],
    'domains' => [
        /**
         * 'Foo' => [
         *   'routes'     => FooRoutes::class,
         *   'containers' => require_once(ROOT_DIR . '/src/Domains/Foo/config/containers.php')
         * ]
         *
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
        'Common\Models' => ROOT_DIR . '/src/Common/Models'
    ]
];