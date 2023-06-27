<?php

namespace App\Offers;

use App\Inc\AbstractRepository;
use PDO;

class OfferRepository extends AbstractRepository
{

    public function getOffers(): array
    {
        $stmt = $this->pdo->prepare('
            SELECT 
                offer_id AS offerId,
                customer_id AS customerId,
                created_at AS createdAt,
                deleted_at AS deletedAt,
                updated_at AS updatedAt,
                status AS status,
                sum AS sum
            FROM
                offers
        ');

        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_CLASS, Offer::class);
    }

    public function getOfferById(int $offerId): array
    {
        $stmt = $this->pdo->prepare('
            SELECT 
                offer_id AS offerId,
                customer_id AS customerId,
                created_at AS createdAt,
                deleted_at AS deletedAt,
                updated_at AS updatedAt,
                status AS status,
                sum AS sum
            FROM
                offers
            WHERE
                offer_id = ?
        ');

        $stmt->execute([$offerId]);
        return  $stmt->fetchAll(PDO::FETCH_CLASS, Offer::class);
    }

    public function updatePosition(Offer $offer): void
    {
        $stmt = $this->pdo->prepare('
            UPDATE offers SET customer_id = ?, created_at = ?, deleted_at = ?, updated_at = ?, status = ?, sum = ?, positions = ? WHERE offer_id = ?
        ');

        $stmt->execute([
            $offer->getCustomerId(),
            $offer->getCreatedDate(),
            $offer->getDeletedDate(),
            $offer->getUpdatedDate(),
            $offer->getStatus(),
            $offer->getSum(),
            $offer->getPositions(),
            $offer->getOfferId()
        ]);
    }

    public function deletePosition(int $offerId, int $customerId): void
    {
        $stmt = $this->pdo->prepare('
            DELETE FROM offers WHERE offer_id = ? AND customer_id = ?
        ');

        $stmt->execute([$offerId, $customerId]);
    }

    public function getOfferIds(): array
    {
        $stmt = $this->pdo->prepare('
            SELECT 
                offer_id
            FROM
                offers
        ');

        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}