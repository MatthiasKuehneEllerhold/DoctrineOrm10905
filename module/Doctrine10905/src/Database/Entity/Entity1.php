<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Table(name: 'entity_one')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache(usage: 'READ_ONLY', region: 'default_region')]
class Entity1
{
    #[ORM\Id]
    #[ORM\Column(name: 'name', type: 'string', nullable: false, length: 50)]
    protected string $name;

    #[ORM\OneToMany(targetEntity: Entity2::class, mappedBy: 'entity1')]
    protected Collection $entities2;

    public function __construct(string $name, array $entities2)
    {
        $this->name      = $name;
        $this->entities2 = new ArrayCollection($entities2);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEntities2(): array
    {
        return $this->entities2->toArray();
    }
}
