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

    public function savePosition(Position $position): void
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO positions (offer_id, name, details, price, amount) VALUES (?, ?, ?, ?, ?);
        ');
        $stmt->execute([
           $position->getOfferId(),
           $position->getName(),
           $position->getDetails(),
           $position->getPrice(),
           $position->getAmount()
        ]);
    }

    public function updatePosition(Position $position): void
    {
        $stmt = $this->pdo->prepare('
            UPDATE positions SET name = ?, details = ?, price = ?, amount = ? WHERE position_id = ?
        ');
        $stmt->execute([
            $position->getName(),
            $position->getDetails(),
            $position->getPrice(),
            $position->getAmount(),
            $position->getPositionId()
        ]);
    }

    public function deletePosition(int $offerId, int $positionId): void
    {
        $stmt = $this->pdo->prepare('
            DELETE FROM positions WHERE offer_id = ? AND position_id = ?
        ');
        $stmt->execute([$offerId, $positionId]);
    }
}
