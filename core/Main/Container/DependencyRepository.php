<?php
namespace Core\Main\Container;

use Core\Main\Container;
use Core\Main\Request;
use Core\Main\Router\RouteList;
use Core\Main\Traits\Singleton;

class DependencyRepository
{
    use Singleton;

    /**
     * @var null
     */
    private array $repository = [];

    private function __construct()
    {
        $this->repository = $this->getRepository();
    }

    private function __clone() {}

    public function getAll(): array
    {
        return $this->repository;
    }

    /**
     * @param $key
     * @return false|mixed
     */
    public function get($key): mixed
    {
        return $this->repository[$key] ?? false;
    }

    public function addDependency($key, $value): void
    {
        $this->repository[$key] = $value;
    }

    private function getRepository(): array
    {
        $repository = [
//            'request' => Request::class,
//            'routeList' => RouteList::class,
        ];
        return array_merge(
            $repository,
            $this->repository ?? []
        );
    }
}