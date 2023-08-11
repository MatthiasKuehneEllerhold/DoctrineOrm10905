<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Ellerhold\Doctrine10905\Trait\ShortNameId;

#[ORM\Table(name: 'product')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache]
class Product
{
    use ShortNameId;

    #[ORM\OneToMany(targetEntity: ProductMachine::class, mappedBy: 'product')]
    #[ORM\Cache]
    protected Collection $machines;

    #[ORM\OneToMany(targetEntity: ProductDefaultMachine::class, mappedBy: 'product')]
    #[ORM\Cache]
    protected Collection $defaultMachines;

    public function __construct(string $name, array $machines, array $defaultMachines)
    {
        $this->name            = $name;
        $this->machines        = new ArrayCollection($machines);
        $this->defaultMachines = new ArrayCollection($defaultMachines);
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
