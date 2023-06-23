<?php

namespace App\Offers;

use App\Inc\AbstractRepository;
use App\Offers\Offer;
use PDO;

class OfferRepository extends AbstractRepository
{

    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    public function getOffers(): array
    {
        $stmt = $this->pdo->prepare('
            SELECT 
                offer_id as offerId
            FROM
                offers
        ');

        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_CLASS, Offer::class);
    }

}