<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$container = new ContainerBuilder;
$locator = new FileLocator(array(__DIR__ . '/config/di'));
$loader = new YamlFileLoader($container, $locator);
$loader->load('services.yml');
