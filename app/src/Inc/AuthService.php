<?php

namespace App\Inc;

class AuthService
{
    protected \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function checkSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            session_regenerate_id();
        }

        if (!empty($_SESSION['timestamp']) && $_SESSION['timestamp'] >= strtotime('-1 hours')) {
            session_regenerate_id();
        }
    }

    public function handleLogin($username, $password): bool
    {
        $this->checkSession();
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindValue(':email', strtolower($username), \PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!empty($user) && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }

        return false;
    }

    public function isLoggedIn(): bool
    {
        $this->checkSession();

        if (empty($_SESSION['user_id'])) {
            return false;
        }

        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :userId');
        $stmt->bindValue(':userId', $_SESSION['user_id'], \PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!empty($user)) {
            return true;
        }

        return false;
    }

    public function logout(): void
    {
        $this->checkSession();
        session_destroy();
    }

}