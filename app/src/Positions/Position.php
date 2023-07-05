<?php

namespace App\Positions;

class Position {

    private int $positionId;
    private int $offerId;
    private string $name;
    private string $details;
    private float $price;
    private float $amount;
    private float $handleCost;
    private float $profit;
    private float $tax;
    private float $skonto;
    private float $discount;

    public function __construct(){}

    /**
     * @param int $positionId
     */
    public function setPositionId(int $positionId): void
    {
        $this->positionId = $positionId;
    }

    /**
     * @param  int $offerId
     */
    public function setOfferId(int $offerId): void
    {
        $this->offerId = $offerId;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $details
     */
    public function setDetails(string $details): void
    {
        $this->details = $details;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param float $handleCost
     */
    public function setHandleCost(float $handleCost): void
    {
        $this->handleCost = $handleCost;
    }

    /**
     * @param float $profit
     */
    public function setProfit(float $profit): void
    {
        $this->profit = $profit;
    }

    /**
     * @param float $tax
     */
    public function setTax(float $tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @param float $skonto
     */
    public function setSkonto(float $skonto): void
    {
        $this->skonto = $skonto;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return int
     */
    public function getPositionId(): int
    {
        return $this->positionId;
    }

    /**
     * @return int
     */
    public function getOfferId(): int
    {
        return $this->offerId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDetails(): string
    {
        return $this->details;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getHandleCost(): float
    {
        return $this->handleCost;
    }

    /**
     * @return float
     */
    public function getProfit(): float
    {
        return $this->profit;
    }

    /**
     * @return float
     */
    public function getTax(): float
    {
        return $this->tax;
    }

    /**
     * @return float
     */
    public function getSkonto(): float
    {
        return $this->skonto;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function isNew(): bool
    {
        return $this->positionId === 0;
    }

    public function getSum(): float
    {
        $handeCost =  ($this->handleCost + 1);
        $profit = ($this->profit + 1);

        return $this->price * $this->amount * $handeCost * $profit;
    }

}
