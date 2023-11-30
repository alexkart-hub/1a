<?php

use Core\Main\Container;

require  $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/app/include/functions.php';
require  __DIR__ . '/init.php';

$container = Container::getInstance();

$router = $container->get(Core\Main\Router::class);
