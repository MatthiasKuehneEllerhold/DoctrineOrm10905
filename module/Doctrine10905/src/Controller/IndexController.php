<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Psr\Container\ContainerInterface;

class IndexController extends AbstractActionController
{
    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function indexAction()
    {
        return [

        ];
    }
}
