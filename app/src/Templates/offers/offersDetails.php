<?php
/**
 * @var \App\Positions\PositionRenderer $positionRenderer
 * @var \App\Offers\Offer $offer
 * @var string $customerInfo
 */
?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <button class="btn btn-primary new-position" type="button" data-offer="<?= $offer->getOfferId() ?>">Neue Position</button>
        </div>
        <form class="col mt-2"action="offers/save" method="POST">
            <button value="<?=1?>" type="submit" name="offerID" class="btn btn-success">Angebot Speichern</button>
        </form>
        <form class="col mt-2" action="offers/delete" method="POST">
            <button value="<?=$offer->getOfferId()?>" type="submit" name="deleteOffer" class="btn btn-danger">Löschen</button>
        </form>
    </div>
    <div id="offer_details">
        <h2>Angebot Details: </h2>
        <?= $offer->getOfferId()?>
        <?= $offer->getStatus()?>
        <?= $offer->getCreatedDate()?>

    </div>
    <div class="customer">
        <h2>Kunde:</h2>
        <?= $customerInfo ?>
    </div>
    <div class="company">
        <h2>Firma:</h2>
    </div>
    <div class="positions">
        <h2>Positionen:</h2>
        <div id="position-list">
            <?= $positionRenderer->renderList() ?>
        </div>
    </div>
</div>

