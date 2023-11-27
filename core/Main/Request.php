<?php
namespace Core\Main;

use Core\Main\Traits\Singleton;

class Request
{
    private array $queryParam;
    private array $postParam;
    private array $serverParam;

    public function __construct(){
        $this->postParam   = $_POST;
        $this->serverParam = $_SERVER;
        $this->queryParam  = $this->getQuery();
    }

    public function getQueryParam(): array
    {
        return $this->queryParam;
    }

    public function getPostParam(): array
    {
        return $this->postParam;
    }

    public function getServerParam(string $key = ''): array|string
    {
        return empty($key) ? $this->serverParam : $this->serverParam[$key] ?? '';
    }

    private function getQuery(): array
    {
        $result = [];
        $urlData = parse_url($_SERVER['REQUEST_URI']);
        $queryString = $urlData['query'] ?? '';
        if (empty($queryString)) {
            return $result;
        }
        $arQuery = explode('&', $queryString);
        foreach ($arQuery as $item) {
            $arItem = explode('=', $item);
            $result[$arItem[0]] = $arItem[1];
        }
        return $result;
    }
}