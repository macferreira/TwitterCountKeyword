<?php

require_once __DIR__.'/../vendor/autoload.php';

use Knp\Provider\ConsoleServiceProvider;

$app = new Silex\Application();

$app->register(
    new ConsoleServiceProvider(),
    array (
        'console.name' => 'TwitterCountKeywordConsoleApp',
        'console.version' => '1.0.0',
        'console.project_directory' => __DIR__.'/..'
    )
);

return $app;
