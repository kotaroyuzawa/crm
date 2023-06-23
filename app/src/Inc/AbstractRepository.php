<?php

namespace App\Inc;

use PDO;

abstract class AbstractRepository
{
    public PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}