<?php
require __DIR__ . '/../vendor/autoload.php';

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

$config = file_get_contents(__DIR__ . '/../config.json');
$config = json_decode($config, true);

$app = new Silex\Application;

$app->get('/', function () {
    return '<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>ReactiveRoom</title>
  <meta name="description" content="reactiveRoom">
  <meta name="author" content="reactiveRoom">
  <script src="vendor/underscore/underscore-min.js"></script>
  <script src="vendor/jquery/dist/jquery.min.js"></script>
  <script src="vendor/nunjucks/browser/nunjucks-slim.min.js"></script>
  <script src="vendor/backbone/backbone-min.js"></script>
  <script src="vendor/backbone.marionette/lib/backbone.marionette.min.js"></script>
</head>

<body>
  <div class="js-container"></div>

  <script src="build/ui/templates.js"></script>
  <script src="build/bundle.js"></script>
</body>
</html>';
});

$app->run();
