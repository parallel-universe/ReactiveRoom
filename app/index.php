<?php
require __DIR__ . '/../vendor/autoload.php';

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

$config = file_get_contents(__DIR__ . '/../config.json');
$config = json_decode($config, true);
$connectionParams = array(
    'dbname' => $config['database']['name'],
    'user' => $config['database']['user'],
    'password' => $config['database']['password'],
    'host' => $config['database']['host'],
    'driver' => 'pdo_mysql',
);
$conn = DriverManager::getConnection($connectionParams);

$app = new Silex\Application;

$app->get('/', function () use ($conn) {
    $sql = 'SELECT username FROM user WHERE email = "matt@basekit.com";';
    $result = $conn->fetchAssoc($sql);
    return sprintf(
        '<h1>Hello %s</h1>',
        $result['username']
    );
});

$app->run();
