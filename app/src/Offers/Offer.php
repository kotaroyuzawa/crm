<?php

namespace App\Offers;

use App\Company\Company;
use App\Customers\Customer;

class Offer
{
    private int $offerId;
    private int $customerId;
    private string $createdAt;
    private string $deletedAt;
    private string $updatedAt;
    private string $status = 'Inactive';
    private float $sum;
    public Customer $customer;
    public Company $company;
    public array $positions;

    public function __construct()
    {

    }

    public function setOfferId(int $offerId): void
    {
       $this->offerId = $offerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function setCompany(Company $company):void
    {
        $this->company = $company;
    }

    public function setOfferPositions(array $positions):void
    {
        $this->positions = $positions;
    }

    public function getOfferId (): int
    {
        return $this->offerId;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function addPositions(array $positions): void
    {
        $this->positions = $positions;
    }

    public function getSum(): int
    {
        return $this->sum;
    }

    public function getCreatedDate(): string
    {
        return $this->createdAt;
    }

    public function getDeletedDate(): string
    {
        return $this->deletedAt;
    }

    public function getUpdatedDate(): string
    {
        return $this->updatedAt;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus($status):void {
        $this->status = $status;
    }
}