<?php
    /**
     * @var array $positions
     * @var \App\Positions\Position $position
     */
?>
<div class="container-fluid">
    <div id="position-list">
        <?php foreach ($positions as $position): ?>
            <div class="mt-2">
                <p>PositionsId: <?= $position->getPositionId() ?></p>
                <p>Angebotsnummer: <?= $position->getOfferId() ?></p>
                <p>Überschrift: <?= $position->getName() ?></p>
                <p>Details: <?= $position->getDetails() ?></p>
                <p>Preis: <?= $position->getPrice() ?>€</p>
                <p>Anzahl: <?= $position->getAmount() ?>x</p>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
        <button class="btn btn-primary new-position" type="button">Neue Position</button>
    </div>
</div>
