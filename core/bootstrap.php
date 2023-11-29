<?php

use Core\Main\Container;
use Core\Main\Router\RouteList;

require  $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/app/include/functions.php';

$container = Container::getInstance();

$request        = $container->get(Core\Main\Request::class);
$routerList     = $container->get(RouteList::class);
$router         = $container->get(Core\Main\Router::class);

$router->match($request->getServerParam('REQUEST_URI'));
