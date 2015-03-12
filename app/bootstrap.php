<?php

require_once __DIR__.'/../vendor/autoload.php';

use Knp\Provider\ConsoleServiceProvider;
use TwitterCountKeyword\Service\TwitterService;
use TwitterCountKeyword\Service\TwitterResponseParseService;

$app = new Silex\Application();

$app->register(
    new ConsoleServiceProvider(),
    array (
        'console.name' => 'TwitterCountKeywordConsoleApp',
        'console.version' => '1.0.0',
        'console.project_directory' => __DIR__.'/..'
    )
);

$app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__.'/../config/parameters.yml'));

$app['twitterService'] = function ($app) {
    return new TwitterService(
        $app['config']['twitter.parameters']['consumer.api.key'],
        $app['config']['twitter.parameters']['consumer.api.secret']
    );
};

$app['twitterResponseParseService'] = function () {
    return new TwitterResponseParseService();
};

return $app;
