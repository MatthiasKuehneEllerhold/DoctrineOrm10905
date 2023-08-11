<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Table(name: 'product')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache(usage: 'READ_ONLY')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(name: 'name', type: 'string', nullable: false, length: 50)]
    protected string $name;

    #[ORM\OneToMany(targetEntity: ProductMachine::class, mappedBy: 'product')]
    #[ORM\Cache(usage: 'READ_ONLY')]
    protected Collection $machines;

    #[ORM\OneToMany(targetEntity: ProductDefaultMachine::class, mappedBy: 'product')]
    #[ORM\Cache(usage: 'READ_ONLY')]
    protected Collection $defaultMachines;

    public function __construct(string $name, array $machines, array $defaultMachines)
    {
        $this->name            = $name;
        $this->machines        = new ArrayCollection($machines);
        $this->defaultMachines = new ArrayCollection($defaultMachines);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMachines(): array
    {
        return $this->machines->toArray();
    }

    /**
     * @return ProductDefaultMachine[]
     */
    public function getDefaultMachines(): array
    {
        return $this->defaultMachines->toArray();
    }
}
