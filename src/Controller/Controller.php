<?php

namespace App\Controller;

use App\Controller\ErrorsController;

class Controller
{
    public function handleRequest(string $controllerName, string $method, array $params = []): void
    {
        $controllerClass = "App\Controller\\" . $controllerName . "Controller";

        if (class_exists($controllerClass)) 
        {
            $controller = new $controllerClass();
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                $errorsController = new ErrorsController();

                $errorsController->index('404');
                exit;
            }
        } 
        else {
            $errorsController = new ErrorsController();
            $errorsController->index('404');
            exit;
        }
    }

    public function render(string $view, array $data = []): void
    {
        $viewPath = ROOT . "/src/views/$view.php";
        $layoutPath = ROOT . "/src/views/layout.php";
        
        extract($data);

        ob_start();
        require_once $viewPath;
        $content = ob_get_clean();

        require $layoutPath;

    }
}