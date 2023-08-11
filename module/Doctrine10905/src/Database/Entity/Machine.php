<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'machine')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache(usage: 'READ_ONLY')]
class Machine
{
    #[ORM\Id]
    #[ORM\Column(name: 'name', type: 'string', nullable: false, length: 50)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
