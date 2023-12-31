<?php

namespace App\Company;

class Company {

    private int $companyId;
    private string $companyName;
    private string $companyStreet;
    private string $companyStreetAdditional;
    private int $companyZip;
    private string $companyCity;
    private string $companyCountry;
    private string $companyEmail;
    private string $companyPhone;
    private string $companyDescription;

    public function __construct(){}

    /**
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     */
    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }

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
     * @param string $companyCountry
     */
    public function setCompanyCountry(string $companyCountry): void
    {
        $this->companyCountry = $companyCountry;
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

    /**
     * @return string
     */
    public function getCompanyCountry(): string
    {
        return $this->companyCountry;
    }

}
