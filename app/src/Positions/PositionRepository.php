<?php

namespace App\Positions;

use PDO;

class PositionRepository {

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPositionsByOffer(int $offerId): array
    {
        $stmt = $this->pdo->prepare('
            SELECT 
                position_id AS positionId,
                offer_id as offerId,
                name,
                details,
                price,
                amount
            FROM
                positions
            WHERE
                offer_id = ?
        ');

        $stmt->execute([$offerId]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Position::class);
    }
}
