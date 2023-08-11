<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'entity_two')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache(usage: 'READ_ONLY', region: 'default_region')]
class Entity2
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Entity1::class, inversedBy: 'entities2')]
    #[ORM\JoinColumn(name: 'entity1', referencedColumnName: 'name', nullable: false)]
    protected $entity1;

    #[ORM\Id]
    #[ORM\Column(name: 'string2', type: 'string', length: 50, nullable: false)]
    protected string $string2;

    public function getEntity1()
    {
        return $this->entity1;
    }

    public function getString2(): string
    {
        return $this->string2;
    }
}
