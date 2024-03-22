<?php

namespace App\Service;

use PDO;
use App\Model\Entity\User;
use App\Model\Repository\RepositoryInterface;


class FormHandler implements FormHandlerInterface
{
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function isValidRegisterForm(array $formData): bool
    {
        $requiredFields = ['username', 'email', 'password', 'birthYear', 'gender', 'country'];
    
        foreach ($requiredFields as $field) {
            if (!isset($formData[$field]) || empty($formData[$field])) {
                return false;
            }
        }

        $username = $formData['username'];
        $email = $formData['email'];
        $password = $formData['password'];

        if ($this->repository->isUsernameTaken($username)) {
            header('Location: /register?error=username_taken');
            exit;
        }
        
        if ($this->repository->isEmailTaken($email)) {
            header('Location: /register?error=email_taken');
            exit;
        }
        
        if (!$this->isPasswordValid($password)) {
            header('Location: /register?error=invalid_password');
            exit;
        }

        if (!isset($_POST['terms'])) {
            header('Location: /register?error=terms_not_accepted');
            exit;
        }
    
        return true;
    }

    public function isValidUser(string $username, string $password): bool
    {
        $user = $this->repository->findOneUser($username);
        
        if ($user && password_verify($password, $user->getPassword())) {
            return true;
        }

        return false;
    }

    public function isPasswordValid(string $password): bool
    {
        return (strlen($password) >= 12 && preg_match('/[A-Z]/', $password) && preg_match('/\d/', $password));
    }
}