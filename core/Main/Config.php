<?php
namespace Core\Main;

class Config
{
    private $config;

    public function __construct()
    {
        $this->config = $this->getConfig();
    }

    public function getConfig()
    {
        $config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
        return $config;
    }

    public function get(string $keyString, $config = [])
    {
        if (empty($config)) {
            $config = $this->config;
        }
        $arKey = explode('.', $keyString);
        $result = $config[$arKey[0]];
        if (!empty($arKey[1])) {
            unset($arKey[0]);
            $result = $this->get(implode('.', $arKey), $result);
        }
        return $result;
    }
}