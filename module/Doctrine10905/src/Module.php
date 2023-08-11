<?php

declare(strict_types=1);

namespace Ellerhold\Doctrine10905;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig(): array
    {
        return require __DIR__ . '/../config/module.config.php';
    }
}
