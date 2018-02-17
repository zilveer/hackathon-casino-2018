<?php

/*
|--------------------------------------------------------------------------
| Heroku Environment
|--------------------------------------------------------------------------
|
| Translates the DATABASE_URL environment setting into several (more
| conventionnal for Laravel) environment settings DB_CONNECTION, DB_HOST,
| DB_PORT, DB_USERNAME, DB_PASSWORD, and DB_DATABASE.
|
*/

if ($url = getenv('DATABASE_URL')) {
    $url = (parse_url($url) ?: []) + [
        'scheme' => null, 'host' => null, 'port' => null,
        'user'   => null, 'pass' => null, 'path' => null
    ];

    if ($url['scheme'] == 'postgres') {
        putenv("DB_CONNECTION=pgsql");
        $url['host'] && putenv("DB_HOST={$url['host']}");
        $url['port'] && putenv("DB_PORT={$url['port']}");
        $url['user'] && putenv("DB_USERNAME={$url['user']}");
        $url['pass'] && putenv("DB_PASSWORD={$url['pass']}");
        $url['path'] && putenv("DB_DATABASE=" . substr($url['path'], 1));
    }
}

/*
|--------------------------------------------------------------------------
| Heroku Environment
|--------------------------------------------------------------------------
|
| Translates the REDIS_URL environment setting into several (more
| conventionnal for Laravel) environment settings REDIS_HOST,
| REDIS_PASSWORD, and REDIS_PORT.
|
*/

if ($url = getenv('REDIS_URL')) {
    $url = (parse_url($url) ?: []) + [
        'scheme' => null, 'host' => null, 'port' => null,
        'user'   => null, 'pass' => null, 'path' => null
    ];

    if ($url['scheme'] == 'redis') {
        putenv("CACHE_DRIVER=redis");
        $url['host'] && putenv("REDIS_HOST={$url['host']}");
        $url['port'] && putenv("REDIS_PORT={$url['port']}");
        $url['pass'] && putenv("REDIS_PASSWORD={$url['pass']}");
    }
}

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

        'session' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 1,
        ],

    ],

];
