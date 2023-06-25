<?php

namespace App\Positions;

class PositionRenderer {

    private array $positions;

    public function addMany(array $positions): void
    {
        $this->positions = $positions;
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
        return <<<HTML
<div class="mt-2 border shadow position" {$this->renderAttributes($position)}>
    <p>PositionsId: {$position->getPositionId()}</p>
    <p>Angebotsnummer: {$position->getOfferId()}</p>
    <p>Überschrift: {$position->getName()} </p>
    <p>Details: {$position->getDetails()} </p>
    <p>Preis: {$position->getPrice()}</p>
    <p>Anzahl: {$position->getAmount()}x</p>
</div>
HTML;

    }

    public function getRenderedPositions(): array
    {
        $renderedPositions = [];
        foreach ($this->positions as $position) {
            $renderedPositions[] = $this->renderPosition($position);
        }

        return $renderedPositions;
    }
}
