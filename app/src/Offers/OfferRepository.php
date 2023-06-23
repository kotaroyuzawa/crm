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
                customer_id AS customerId
            FROM
                offers
        ');

        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_CLASS, Offer::class);
    }
}