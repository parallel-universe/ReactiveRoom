<?php
require __DIR__ . '/../autoload.php';
require __DIR__ . '/../bootstrap.php';

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use ReactiveRoom\Player\PlayerView;

$app = new Silex\Application;

$app->get('/', function () use ($container) {
    $username = 'player1';

    $playerRepository = $container->get('player_repository');
    $result = $playerRepository->findByUsername($username);

    $playerView = new PlayerView;
    $player = $playerView->render($result);

    return '<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>ReactiveRoom</title>
  <meta name="description" content="reactiveRoom">
  <meta name="author" content="reactiveRoom">

  <link rel="stylesheet" type="text/css" href="build/styles.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="vendor/jquery.terminal/css/jquery.terminal.min.css" media="screen" />

  <script src="vendor/underscore/underscore-min.js"></script>
  <script src="vendor/jquery/dist/jquery.min.js"></script>
  <script src="vendor/jquery.terminal/js/jquery.terminal.min.js"></script>
  <script src="vendor/nunjucks/browser/nunjucks-slim.min.js"></script>
  <script src="vendor/backbone/backbone-min.js"></script>
  <script src="vendor/backbone.marionette/lib/backbone.marionette.min.js"></script>
  <script src="vendor/bottlejs/dist/bottle.min.js"></script>
</head>

<body>
  <div class="js-container"></div>

  <script>
    var player = ' . json_encode($player) . ';
  </script>
  <script src="build/templates.js"></script>
  <script src="build/scripts.js"></script>
</body>
</html>';
});

$app->run();
