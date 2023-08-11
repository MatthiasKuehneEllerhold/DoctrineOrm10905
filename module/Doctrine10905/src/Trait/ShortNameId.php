<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Trait;

use Doctrine\ORM\Mapping as ORM;

trait ShortNameId
{
    #[ORM\Id]
    #[ORM\Column(name: 'name', type: 'string', nullable: false, length: 50)]
    protected string $name;

    public function getName(): string
    {
        return $this->name;
    }
}
