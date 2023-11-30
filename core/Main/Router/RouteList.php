<?php

namespace Core\Main\Router;

use Core\Main\Controller\Page\MainPageController;
use Core\Main\Request;

class RouteList
{
    private array $items = [];

    public function __construct(private Request $request)
    {
        $this->init();
    }

    public function addItem(Route $route): void
    {
        if (!empty($route->name)) {
            $this->items[$route->name] = $route;
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getByName(string $name)
    {
        return $this->items[$name] ?? false;
    }

    public function getByUrl(string $url)
    {
        $result = array_filter($this->items, fn($item) => $item->url == $url);
        if (!empty($result)) {
            return reset($result);
        }
        return $this->get404($url);
    }

    private function init(): void
    {
        $this->addItem(new Route('main', '/', MainPageController::class));
        $this->addItem(new Route('404'));
        foreach ($this->allRoutes() as $route) {
            $this->addItem($route);
        }
    }

    private function get404($url)
    {
        $route = $this->getByName('404');
        $route->arguments = [$url];
        return $route;
    }

    private function allRoutes(): array
    {
        return [
            new Route(
                'test',
                '/test',
                MainPageController::class,
                arguments:[$this->request->getQueryParam()]
            ),
        ];
    }
}