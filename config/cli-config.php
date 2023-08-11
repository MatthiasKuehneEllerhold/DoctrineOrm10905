<?php

declare(strict_types=1);

use Doctrine\ORM\Tools\Console\ConsoleRunner;

try {
    chdir(dirname(__DIR__));

    // Composer autoloading
    require_once 'vendor/autoload.php';

    // Init the application!
    $application = \Laminas\Mvc\Application::init(
        require 'config/application.config.php'
    );
    $entityManager = $application->getServiceManager()->get('doctrine.entitymanager.orm_default');
} catch (Throwable $e) {
    echo $e->getMessage();
    exit(1);
}

return ConsoleRunner::createHelperSet($entityManager);
