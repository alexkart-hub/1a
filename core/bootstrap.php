<?php

use Core\Main\Container;
use Core\Main\Router\RouteList;

include  $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

$container = Container::getInstance();

$routerList = $container->get(RouteList::class);

$router = $container->get(Core\Main\Router::class);

$request = $container->get(Core\Main\Request::class);

$route = $router->match($request->getServerParam('REQUEST_URI'));

echo '<pre>';
print_r($route);
echo '</pre>';
