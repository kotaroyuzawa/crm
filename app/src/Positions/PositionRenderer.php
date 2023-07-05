<?php

namespace App\Positions;

class PositionRenderer {

    private array $positions;

    public function addMany(array $positions): void
    {
        $this->positions = $positions;
    }

    private function renderPrice(float $price): string
    {
        return number_format($price, 2, ',', '.') . '€';
    }

    private function renderAttributes(Position $position): string
    {
        $attributes = [
            'id' => $position->getPositionId(),
            'offer' => $position->getOfferId(),
            'name' => $position->getName(),
            'details' => $position->getDetails(),
            'price' => $position->getPrice(),
            'amount' => $position->getAmount(),
            'handlecost' => $position->getHandleCost(),
            'profit' => $position->getProfit(),
            'skonto' => $position->getSkonto(),
            'discount' => $position->getDiscount()
        ];

        $string = '';
        foreach ($attributes as $key => $value) {
            $string .= ' data-' . $key . '="' . $value . '"';
        }

        return $string;
    }

    private function renderPercent(float $value)
    {
        return 100 * $value;
    }

    public function renderPosition(Position $position): string
    {
        $baseSum = $position->getSum();
        return <<<HTML
<div class="border-bottom position p-2" {$this->renderAttributes($position)}>
    <div class="row text-end">
        <div class="col-2">
            {$position->getName()}
        </div>
        <div class="col-5">
            {$position->getDetails()}
        </div>
        <div class="col-1">
            {$position->getAmount()}x
        </div>
        <div class="col-1">
            {$this->renderPrice($position->getPrice())}
        </div>
        <div class="col-1">
            {$position->getSkonto()}%
        </div>
        <div class="col-1">
            {$position->getDiscount()}%
        </div>
        <div class="col-1">
            {$this->renderPrice($position->getSum())}
        </div>
    </div>
</div>
HTML;

    }

    public function renderList(): string
    {
        $list = '';
        foreach ($this->positions as $position) {
            $list .= $this->renderPosition($position);
        }

        return $list;
    }
}
