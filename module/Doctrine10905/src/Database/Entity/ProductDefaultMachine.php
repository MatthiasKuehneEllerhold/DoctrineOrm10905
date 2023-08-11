<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'product_default_machine')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache]
class ProductDefaultMachine
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'defaultMachines')]
    #[ORM\JoinColumn(name: 'product', referencedColumnName: 'name', nullable: false)]
    #[ORM\Cache]
    protected $product;

    #[ORM\Id]
    #[ORM\Column(name: 'location', type: 'string', length: 50, nullable: false)]
    protected string $location;

    #[ORM\ManyToOne(targetEntity: ProductMachine::class)]
    #[ORM\JoinColumn(name: 'product2', referencedColumnName: 'product', nullable: false)]
    #[ORM\JoinColumn(name: 'machine', referencedColumnName: 'machine', nullable: false)]
    #[ORM\Cache]
    protected $productMachine;

    public function __construct(Product $product, string $location, ProductMachine $machine)
    {
        $this->product  = $product;
        $this->location = $location;
        $this->machine  = $machine;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getProductMachine(): ProductMachine
    {
        return $this->productMachine;
    }
}
