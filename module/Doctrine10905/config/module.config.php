<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905;

use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Doctrine\Persistence\Mapping\Driver\MappingDriverChain;
use Laminas\Router\Http\Segment;
use Laminas\Router\Http\TreeRouteStack;

return [
    'controllers'        => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
        ],
    ],

    'doctrine'           => [
        'cache' => [
            'redis' => [
                'instance' => Cache\LaminasCache::class,
            ],
        ],

        'configuration' => [
            'orm_default' => [
                'driver'             => 'chain_driver_orm_default',
                'proxy_dir'          => 'data/DoctrineORMModule/Proxy',
                'proxy_namespace'    => 'DoctrineORMModule\Proxy',
                'second_level_cache' => [
                    'enabled'               => true,
                    'default_lifetime'      => 200,
                    'default_lock_lifetime' => 500,
                    'regions'               => [
                        'default_region' => [
                            'lifetime'      => 200,
                            'lock_lifetime' => 500,
                        ],
                    ],
                ],
            ],
        ],

        'driver' => [
            'attr_driver_orm_default' => [
                'class' => AttributeDriver::class,
                'paths' => ['module/Doctrine10905/src/Database/Entity'],
            ],

            'chain_driver_orm_default' => [
                'class'   => MappingDriverChain::class,
                'drivers' => [
                    __NAMESPACE__ . '\Database\Entity' => 'attr_driver_orm_default',
                ],
            ],
        ],

        'entitymanager' => [
            'orm_default' => [
                'connection'    => 'orm_default',
                'configuration' => 'orm_default',
            ],
        ],
    ],

    'router'          => [
        'router_class' => TreeRouteStack::class,
        'routes'       => [
            'index' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            Cache\LaminasCache::class => Cache\Factory\LaminasCacheFactory::class,
        ],
    ],

    'view_manager'    => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => require __DIR__ . '/template_map.php',
        'template_path_stack'      => [
            'module/Doctrine095/view',
        ],
    ] ,
];
