<?php

declare(strict_types=1);

return [
    // This should be an array of module namespaces used in the application.
    'modules' => [
        'Laminas\\Cache',
        'Laminas\\Cache\\Storage\\Adapter\\BlackHole',
        'Laminas\\Cache\\Storage\\Adapter\\Memory',
        'Laminas\\Cache\\Storage\\Adapter\\Redis',
        'Laminas\\Router',
        'Laminas\\Session',
        'Laminas\\Validator',

        'DoctrineModule',
        'DoctrineORMModule',

        'Ellerhold\\Doctrine10905',
    ],

    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => [
        // This should be an array of paths in which modules reside.
        // If a string key is provided, the listener will consider that a module
        // namespace, the value of that key the specific path to that module's
        // Module class.
        'module_paths' => [
            './module',
            './vendor',
        ],

        // An array of paths from which to glob configuration files after
        // modules are loaded. These effectively override configuration
        // provided by modules themselves. Paths may use GLOB_BRACE notation.
        'config_glob_paths' => [
            'config/autoload/*.php',
        ],

        // Whether or not to enable a configuration cache.
        // If enabled, the merged configuration will be cached and used in
        // subsequent requests.
        'config_cache_enabled' => '0',

        // The key used to create the configuration cache file name: "module-config-cache.{config_cache_key}.php"
         'config_cache_key' => 'doctrine10905',

        // The path in which to cache merged configuration.
        'cache_dir' => 'data/',
    ],
];
