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

            $productRepo = $em->getRepository(Product::class);
            $product     = $productRepo->find('teacup');

            foreach ($product->getDefaultMachines() as $defaultMachine) {
                echo $product->getName() . ': ' . $defaultMachine->getMachine()->getName() . '<br/>';
            }
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }


        return [

        ];

    }
}
