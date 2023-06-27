<?php

namespace App\Company;

class Company {

    private string $companyName;
    private string $companyStreet;
    private int $streetNumber;
    private string $companyStreetAdditional;
    private int $companyZip;
    private string $companyCity;
    private string $companyEmail;
    private string $companyPhone;
    private string $companyDescription;

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @param string $companyStreet
     */
    public function setCompanyStreet(string $companyStreet): void
    {
        $this->companyStreet = $companyStreet;
    }

    /**
     * @param int $streetNumber
     */
    public function setStreetNumber(int $streetNumber): void
    {
        $this->streetNumber = $streetNumber;
    }

    /**
     * @param string $streetAdditional
     */
    public function setCompanyStreetAdditional(string $streetAdditional): void
    {
        $this->companyStreetAdditional = $streetAdditional;
    }

    /**
     * @param int $companyZip
     */
    public function setCompanyZip(int $companyZip): void
    {
        $this->companyZip = $companyZip;
    }

    /**
     * @param string $companyCity
     */
    public function setCompanyCity(string $companyCity): void
    {
        $this->companyCity = $companyCity;
    }

    /**
     * @param string $companyEmail
     */
    public function setCompanyEmail(string $companyEmail): void
    {
        $this->companyEmail = $companyEmail;
    }

    /**
     * @param int $companyPhone
     */
    public function setCompanyPhone(int $companyPhone): void
    {
        $this->companyPhone = $companyPhone;
    }

    /**
     * @param string $companyDescription
     */
    public function setCompanyDescription(string $companyDescription): void
    {
        $this->companyDescription = $companyDescription;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return string
     */
    public function getCompanyStreet(): string
    {
        return $this->companyStreet;
    }

    /**
     * @return int
     */
    public function getStreetNumber(): int
    {
        return $this->streetNumber;
    }

    /**
     * @return string
     */
    public function getCompanyStreetAdditional(): string
    {
        return $this->companyStreetAdditional;
    }

    /**
     * @return int
     */
    public function getCompanyZip(): int
    {
        return $this->companyZip;
    }

    /**
     * @return string
     */
    public function getCompanyCity(): string
    {
        return $this->companyCity;
    }

    /**
     * @return string
     */
    public function getCompanyEmail(): string
    {
        return $this->companyEmail;
    }

    /**
     * @return int
     */
    public function getCompanyPhone(): int
    {
        return $this->companyPhone;
    }

    /**
     * @return string
     */
    public function getCompanyDescription(): string
    {
        return $this->companyDescription;
    }
}
