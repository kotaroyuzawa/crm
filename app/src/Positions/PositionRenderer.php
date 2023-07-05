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

    private function renderSum(Position $position): string
    {
        return $this->renderPrice($position->getSum());
    }

    private function renderTax(Position $position): string
    {
        return $this->renderPrice($position->getSum() / (1 + $position->getTax()) * $position->getTax());
    }


    private function renderAttributes(Position $position): string
    {
        $attributes = [
            'id' => $position->getPositionId(),
            'offer' => $position->getOfferId(),
            'name' => $position->getName(),
            'details' => $position->getDetails(),
            'price' => $position->getPrice(),
            'amount' => $position->getAmount()
        ];

        $string = '';
        foreach ($attributes as $key => $value) {
            $string .= ' data-' . $key . '="' . $value . '"';
        }

        return $string;
    }

    public function renderPosition(Position $position): string
    {
        $baseSum = $position->getSum();
        return <<<HTML
<div class="mt-2 border position p-2" {$this->renderAttributes($position)}>
    <div class="row">
        <div class="col-8">
            <h3>{$position->getName()}</h3>
            <p>Details: {$position->getDetails()} </p>
        </div>
        <div class="col-4 text-end">
            <h4>{$this->renderSum($position)}</h4>
            <p>USt: {$this->renderTax($position)}</p>
            <p>{$position->getAmount()} x {$this->renderPrice($position->getPrice())}</p>
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
