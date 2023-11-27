<?php

namespace Core\Main\Router;

use Core\Main\Controller\Page\Page404Controller;

class Route
{
    public function __construct(
        public string $name = '',
        public string $url = '',
        public string $controller = Page404Controller::class,
        public string $action = 'index',
        public array $arguments = [],
        public array $params = []
    ) {}

    public function getArray(): array
    {
        $result = [];
        foreach ($this as $propertyKey => $propertyValue) {
            $result[$propertyKey] = $propertyValue;
        }
        return $result;
    }
}