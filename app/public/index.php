<?php
require __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application;

$app->get('/', function () {
    return '<h1>Hello</h1>';
});

$app->run();
