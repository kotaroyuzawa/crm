<?php

namespace App\Inc;

use PDO;

class Database {

    private static Database $instance;
    private string $host = PDO_HOST;
    private string $dbname = PDO_DBNAME;
    private string $user = PDO_USER;
    private string $password = PDO_PASSWORD;
    private PDO $pdo;

    private function __construct()
    {
       $this->initPDO();
    }

    private function initPDO(): void
    {
        try {
            $this->pdo = new \PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->user,
                $this->password
            );
        } catch (\PDOException $e){
            echo 'ERROR: ' . $e->getMessage();
            die();
        }
    }

    public static function getConnection(): PDO
    {
        return self::getInstance()->getPDO();
    }

    private static function getInstance(): Database
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function getPDO(): PDO
    {
        return $this->pdo;
    }

}
