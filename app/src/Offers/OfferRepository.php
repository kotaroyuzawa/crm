<?php

namespace App\Offers;

use App\Inc\AbstractRepository;
use App\Inc\QueryBuilder;
use DateTime;
use DateTimeZone;
use PDO;

class OfferRepository extends AbstractRepository
{
    private QueryBuilder $queryBuilder;

    public function initQueryBuilder(): void
    {
        $this->queryBuilder = (new QueryBuilder($this->pdo))
            ->table('offers')
            ->select([
                'offer_id AS offerId',
                'customer_id AS customerId',
                'created_at AS createdAt',
                'deleted_at AS deletedAt',
                'updated_at AS updatedAt',
                'status AS status',
                'sum AS sum'
            ]);
    }

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
            WHERE
                deleted_at = "0000-00-00 00:00:00"
        ');

        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_CLASS, Offer::class);
    }

    public function getOfferById(int $offerId): Offer
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
        return  $stmt->fetchObject(Offer::class);
    }

    public function updateOffer(Offer $offer): void
    {
        $stmt = $this->pdo->prepare('
            UPDATE offers SET status = ?, customer_id = ? WHERE offer_id = ?
        ');

        $stmt->execute([
            $offer->getStatus(),
            $offer->getCustomerId(),
            $offer->getOfferId()
        ]);
    }

    public function deleteOffer(int $offerId): void
    {
        (new QueryBuilder($this->pdo))
            ->table('offers')
            ->addWhere('offer_id = ?', [$offerId])
            ->update(['deleted_at' => $this->getDeleteTime()]);
    }

    public function createOffer(int $customerId)
    {
        return (new QueryBuilder($this->pdo))
            ->table('offers')
            ->insert(['customer_id' => $customerId]);
    }

    public function updateSum(int $offerId): void
    {
        $stmt = $this->pdo->prepare('
            SET @offerId = ?;
            UPDATE offers SET `sum` = (SELECT sum(price * amount) FROM positions WHERE offer_id = @offerId) WHERE offer_id = @offerId 
        ');
        $stmt->execute([$offerId]);
    }

    public function deleteAllOffersFromCustomer(int $customerId): void
    {
        (new QueryBuilder($this->pdo))
            ->table('offers')
            ->addWhere('customer_id = ?', [$customerId])
            ->update(['deleted_at' => $this->getDeleteTime()]);
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

    public function setFilter(Filter $filter): void
    {
        $this->queryBuilder->addWhere($filter->getWhere(), $filter->getParams());
    }

    public function getObjects()
    {
        return $this->queryBuilder->getObjects(Offer::class);
    }

    private function getDeleteTime(): string
    {
        $dt = new DateTime('now', new DateTimeZone(TIMEZONE));
        return $dt->format('Y-m-d H:i:s');
    }
}