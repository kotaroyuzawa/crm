<?php

namespace App\User;

use App\Inc\AbstractRepository;
use \PDO;

class UserRepository extends AbstractRepository {

    public function getAllUser(): array
    {
        $stmt = $this->pdo->prepare('
            SELECT 
                user_id AS userID,
                first_name AS firstName,
                last_name AS lastName,
                email
            FROM
                users
        ');
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function getUserById(int $userId): User
    {
        $stmt = $this->pdo->prepare('
            SELECT 
                user_id AS userID,
                first_name AS firstName,
                last_name AS lastName,
                email
            FROM
                users
            WHERE 
                user_id = ?
        ');
        $stmt->execute([$userId]);
        return $stmt->fetchObject(User::class);
    }

}