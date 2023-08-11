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
} catch (Throwable $e) {
    $extras    = [];
    $variables = [
        'REQUEST_URI',
        'REQUEST_METHOD',
        'HTTP_REFERER',
        'REMOTE_ADDR',
    ];

    foreach ($variables as $var) {
        if (!empty($_SERVER[$var])) {
            $extras[$var] = $_SERVER[$var];
        }
    }

    file_put_contents(
        'log/php_error.log',
        sprintf(
            '%s EMERG (0): %s %s ' . PHP_EOL,
            date('c'),
            $e,
            json_encode($extras)
        ),
        FILE_APPEND
    );

    http_response_code(500);

    echo file_get_contents('public/500.html');
}
