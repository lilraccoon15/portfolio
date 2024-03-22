<?php

namespace App\Model\Repository;

use PDO;

class Repository
{
    protected PDO $db;

    public function __construct()
    {
        $this -> db = new PDO('mysql:host=localhost;dbname=my_book_nook', "root", "");
    }
}