<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Controller;

use Ellerhold\Doctrine10905\Database\Entity\Product;
use Laminas\Mvc\Controller\AbstractActionController;
use Psr\Container\ContainerInterface;

class IndexController extends AbstractActionController
{
    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function indexAction(): array
    {
        try {
            $em = $this->container->get('doctrine.entitymanager.orm_default');
            /* @var $em \Doctrine\ORM\EntityManager */

            echo __LINE__ . PHP_EOL;

            $e1Repo = $em->getRepository(Product::class);

            echo __LINE__ . PHP_EOL;

            $e11 = $e1Repo->find('e11');

            echo __LINE__ . PHP_EOL;

            var_dump($e11 === null);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }


        return [

        ];

    }
}
