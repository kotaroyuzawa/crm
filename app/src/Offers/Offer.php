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

    public function setOfferId(int $offerId): void
    {
       $this->offerId = $offerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

}