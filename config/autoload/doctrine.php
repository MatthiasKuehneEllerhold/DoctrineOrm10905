<?php

declare(strict_types=1);

use Doctrine\DBAL\Driver\PDO\MySQL\Driver;

/**
 * Configuration for the database (Doctrine ORM Module)
 *
 * @see https://github.com/doctrine/DoctrineORMModule
 */
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass'   => Driver::class,
                'configuration' => 'orm_default',
                'params'        => [
                    'unix_socket' => '',
                    'host'        => 'db',
                    'port'        => '3306',
                    'dbname'      => 'doctrine10905',
                    'charset'     => 'utf8mb4',
                    'user'        => 'root',
                    'password'    => 'dev',
                ],
            ],
        ],
        'configuration' => [
            'orm_default' => [
                'result_cache'     => 'redis',
                'metadata_cache'   => 'redis',
                'hydration_cache'  => 'redis',
                'generate_proxies' => true,
            ],
        ],
    ],
];
