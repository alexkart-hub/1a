<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

require  $_SERVER["DOCUMENT_ROOT"] . "/core/bootstrap.php";
/**
 * @var Core\Main\Router $router
 */
$router->start();
