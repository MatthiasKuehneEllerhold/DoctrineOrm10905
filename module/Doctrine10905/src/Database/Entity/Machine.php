<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905\Database\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ellerhold\Doctrine10905\Trait\ShortNameId;

#[ORM\Table(name: 'machine')]
#[ORM\Entity(readOnly: true)]
#[ORM\Cache]
class Machine
{
    use ShortNameId;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
