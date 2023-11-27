<?php

namespace Core\Main;

use Core\Main\Router\Route;
use Core\Main\Router\RouteList;

class Router
{

    public function __construct(
        private Container $container,
        private RouteList $routeList
    ) {}

    public function match(string $url)
    {
        $urlPath = parse_url($url)['path'];
        $route = $this->getRoute($urlPath);
        $controller = $this->container->get($route->controller);
        call_user_func_array([$controller, $route->action], $route->arguments);
    }

    public function getRoute(string $urlPath): Route
    {
        return $this->routeList->getByUrl($urlPath);
    }
}