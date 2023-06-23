<?php

namespace App\Offers;



/**
 * This is a dummy class for study popuses
 */
class Offer
{
    private int $offerId;
    private Customer $customer;
    private int $customerId;
    private Company $company;
    private array $positions;
    private bool $status = false;

 /*   public function __construct(PDO $pdo, $offerIds, $offerName, $createdAt, $deletedAt, $offerIsActive){
        $this->pdo = Database::getConnection();
        $this->data = $data;
        $this->offerIds = $offerIds;
        $this->offerName= $offerName;
        $this->createdAt = $createdAt;
        $this->deletedAt = $deletedAt;
        $this->offerIsActive = $offerIsActive;
    }
*/
    public function __construct(){}

    public function setOfferId(int $offerId): void
    {
       $this->offerId = $offerId;
    }

    public function getOffer(): array
    {
        return ["tst"=>"Testi"];
    }

}