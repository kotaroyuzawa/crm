<?php
/**
 * @var \App\Positions\PositionRenderer $positionRenderer
 * @var \App\Offers\Offer $offer
 */
?>
<div class="container">
    <h1>OFFERS DETAILS</h1>
        <?= $offer->getOfferId()?>
        <?= $offer->getStatus()?>
    <div class="customer">
        <h1>Customer</h1>
    </div>
    <div class="company">
        <h1>Company</h1>
    </div>
    <div class="positions">
        <div id="position-list">
            <?= $positionRenderer->renderList() ?>
        </div>
        <div class="mt-2">
            <button class="btn btn-primary new-position" type="button" data-offer="<?= $offer->getOfferId() ?>">Neue Position</button>
        </div>
    </div>
</div>

