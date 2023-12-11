<?php

require_once __DIR__ . '/../vendor/autoload.php';

use J\PhpFramework\Application;

$app = new Application();

$app->router->get('/', function() {
    return "index";
});

$app->router->get('/about', 'about');

$app->run();