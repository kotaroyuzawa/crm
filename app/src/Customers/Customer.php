<?php

namespace App\Customers;


class Customer
{
    private int $customerId;
    private string $customerName;
    private string $customerStreet;
    private int $customerStreetNr;
    private string $customerStreetAdditional;
    private string $customerCity;
    private string $customerEmail;
    private string $customerPhone;

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     */
    public function setCustomerName(string $customerName): void
    {
        $this->customerName = $customerName;
    }

    /**
     * @return string
     */
    public function getCustomerStreet(): string
    {
        return $this->customerStreet;
    }

    /**
     * @param string $customerStreet
     */
    public function setCustomerStreet(string $customerStreet): void
    {
        $this->customerStreet = $customerStreet;
    }

    /**
     * @return int
     */
    public function getCustomerStreetNr(): int
    {
        return $this->customerStreetNr;
    }

    /**
     * @param int $customerStreetNr
     */
    public function setCustomerStreetNr(int $customerStreetNr): void
    {
        $this->customerStreetNr = $customerStreetNr;
    }

    /**
     * @return string
     */
    public function getCustomerStreetAdditional(): string
    {
        return $this->customerStreetAdditional;
    }

    /**
     * @param string $customerStreetAdditional
     */
    public function setCustomerStreetAdditional(string $customerStreetAdditional): void
    {
        $this->customerStreetAdditional = $customerStreetAdditional;
    }

    /**
     * @return string
     */
    public function getCustomerCity(): string
    {
        return $this->customerCity;
    }

    /**
     * @param string $customerCity
     */
    public function setCustomerCity(string $customerCity): void
    {
        $this->customerCity = $customerCity;
    }

    /**
     * @return string
     */
    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     */
    public function setCustomerEmail(string $customerEmail): void
    {
        $this->customerEmail = $customerEmail;
    }

    /**
     * @return string
     */
    public function getCustomerPhone(): string
    {
        return $this->customerPhone;
    }

    /**
     * @param string $customerPhone
     */
    public function setCustomerPhone(string $customerPhone): void
    {
        $this->customerPhone = $customerPhone;
    }


}