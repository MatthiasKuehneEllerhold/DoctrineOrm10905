<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Table(name: 'product_available_machine')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache(usage: 'READ_ONLY')]
class ProductMachine
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'machines')]
    #[ORM\JoinColumn(name: 'product', referencedColumnName: 'name', nullable: false)]
    #[ORM\Cache(usage: 'READ_ONLY')]
    protected $product;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Machine::class)]
    #[ORM\JoinColumn(name: 'machine', referencedColumnName: 'name', nullable: false)]
    #[ORM\Cache(usage: 'READ_ONLY')]
    protected $machine;

    public function __construct(Product $product, Machine $machine)
    {
        $this->product = $product;
        $this->machine = $machine;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getMachine(): Machine
    {
        return $this->machine;
    }
}
