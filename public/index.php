<?php
declare(strict_types=1);

try {
    chdir(dirname(__DIR__));

    // Composer autoloading
    require_once 'vendor/autoload.php';

    // Init the application & run it!
    $application = \Laminas\Mvc\Application::init(
        require 'config/application.config.php'
    );
    $application->run();
} catch (\Throwable $e) {
    echo $e->getMessage();
}
