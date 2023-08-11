<?php

declare(strict_types=1);

return [
    'redis-cache' => [
        // Do you want to enable the caching?
        'enabled' => true,

        // The unix socket path of the redis server
        'unix_socket' => '',

        // The host name of the redis host
        'host' => 'redis',

        // The port of the redis host, default 6379
        'port' => '6379',

        // Namespace to make it unique
        'namespace' => 'Ellerhold_Doctrine10905',
    ]
];
