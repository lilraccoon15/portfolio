<?php

namespace App\Core;

use App\Controller\Controller;
use App\Controller\HomeController;
use App\Controller\LibraryController;
use App\Controller\LoginController;

class Router
{
    public function run()
    {
        $requestUri = $_SERVER["REQUEST_URI"];
        $path = $requestUri ?: "/";
        $urlParts = parse_url($path);
        $pathExplode = explode('/', $urlParts['path']);
        
        $controllerName = '';

        if (!empty($pathExplode[1])) {
            $controllerName .= ucwords($pathExplode[1]);
        } else {
            $controllerName .= 'Home';
        }

        $method = "index";

        if (!empty($pathExplode[3])) {
            $method = $pathExplode[3];
        }

        $additionalParams = array_slice($pathExplode, 4);

        $params = [];
        for ($i = 0; $i < count($additionalParams); $i += 2) {
            $paramName = $additionalParams[$i];
            $paramValue = $additionalParams[$i + 1] ?? null;
            $params[$paramName] = $paramValue;
        }

        $controller = new Controller;
        $controller->handleRequest($controllerName, $method, $params);
    }
}