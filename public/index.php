<?php

require_once __DIR__ . '/../vendor/autoload.php';

use J\PhpFramework\Application;

$app = new Application();

$app->router->get('/', 'index');

$app->router->get('/about', 'about');

$app->run();