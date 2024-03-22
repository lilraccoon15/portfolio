<?php

namespace App\Controller;

class ErrorsController extends Controller
{
    public function index($errorType = null): void
    {
        // var_dump($errorType);
        switch ($errorType) {
            case '404':
                $view = 'errors/error404/index';
                break;
        }
        $this->render($view);
    }
}