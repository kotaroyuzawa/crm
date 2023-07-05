<?php
/**
 * @var \App\Positions\PositionRenderer $positionRenderer
 * @var \App\Offers\Offer $offer
 * @var string $customerInfo
 * @var string $companyInfo
 */
?>
<div class="container">
    <div class="row">
        <div class="col mt-2">
            <button class="btn btn-primary new-position" type="button" data-offer="<?= $offer->getOfferId() ?>">Neue Position</button>
        </div>
        <form class="col mt-2"action="offers/update?id=<?= $offer->getOfferId() ?>" method="GET">
            <button value="<?= $offer->getOfferId() ?>" type="submit" name="offerID" class="btn btn-success">Angebot Bearbeiten</button>
        </form>
        <form class="col mt-2" action="offers/delete" method="POST">
            <button value="<?=$offer->getOfferId()?>" type="submit" name="deleteOffer" class="btn btn-danger">Löschen</button>
        </form>
    </div>
    <div class="customer">
        <h2>Kunde:</h2>
        <?= $customerInfo ?>
    </div>
    <div class="company">
        <h2>Firma:</h2>
        <?= $companyInfo ?>
    </div>
    <div id="offer_details">
        <h2>Angebot Details: </h2>
        Erstellt am: <?= $offer->getCreatedDate()?>
        <br>
        Angebot Status: <?= $offer->getStatus()?>
        <br>
        Angebot ID: <?= $offer->getOfferId()?>

    </div>
    <div class="positions">
        <h2>Positionen:</h2>
        <div id="position-list">
            <div class="row text-end mt-3 border-bottom">
                <div class="col-2">
                    <h5>Name</h5>
                </div>
                <div class="col-4">
                    <h5>Details</h5>
                </div>
                <div class="col-1">
                    <h5>Anzahl</h5>
                </div>
                <div class="col-1">
                    <h5>Preis</h5>
                </div>
                <div class="col-1">
                    <h5>Skonto</h5>
                </div>
                <div class="col-1">
                    <h5>Rabatt</h5>
                </div>
                <div class="col-1">
                    <h5>Gesamt</h5>
                </div>
            </div>
            <?= $positionRenderer->renderList() ?>
        </div>
    </div>
</div>

