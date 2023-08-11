<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Table(name: 'product_default_machine')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache(usage: 'READ_ONLY')]
class ProductDefaultMachine
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'defaultMachines')]
    #[ORM\JoinColumn(name: 'product', referencedColumnName: 'name', nullable: false)]
    #[ORM\Cache(usage: 'READ_ONLY')]
    protected $product;

    #[ORM\Id]
    #[ORM\Column(name: 'location', type: 'string', length: 50, nullable: false)]
    protected string $location;

    #[ORM\ManyToOne(targetEntity: Machine::class)]
    #[ORM\JoinColumn(name: 'machine', referencedColumnName: 'name', nullable: false)]
    #[ORM\Cache(usage: 'READ_ONLY')]
    protected $machine;

    public function __construct(Product $product, string $location, Machine $machine)
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

    public function getMachine(): Machine
    {
        return $this->machine;
    }
}
