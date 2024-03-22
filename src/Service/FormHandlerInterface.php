<?php

namespace App\Service;

interface FormHandlerInterface
{
    public function isValidRegisterForm(array $form): bool;
    public function isValidUser(string $username, string $password): bool;
    public function isPasswordValid(string $password): bool;

}