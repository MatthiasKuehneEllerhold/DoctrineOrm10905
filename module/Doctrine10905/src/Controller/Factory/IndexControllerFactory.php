<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Controller\Factory;

use Ellerhold\Doctrine10905\Controller\IndexController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class IndexControllerFactory implements FactoryInterface
{
    /**
     * @throws \Throwable
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): IndexController
    {
        return new IndexController(
            $container
        );
    }
}
