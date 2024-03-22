<?php

session_start();

define("ROOT", dirname(__DIR__));

require(ROOT . "/vendor/autoload.php");

use App\Core\Router;

$router = new Router;
$router->run();
