<?php

namespace App\Controller;

class ProjectsController extends Controller
{
    public function index(): void
    {
        $this->render("projects/index");
    }
}