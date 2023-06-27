<?php
/**
 * @var array $offers
 * @var \App\Offers\Offer $offer
 */
?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">
                        Angebot ID:
                    </th>
                    <th scope="col">
                        Kunden ID:
                    </th>
                    <th scope="col">
                        Erstellt am:
                    </th>
                    <th scope="col">
                        Status:
                    </th>
                    <th scope="col">
                        Kunde:
                    </th>
                    <th scope="col">
                        Firma:
                    </th>
                    <th scope="col">
                        Positionen:
                    </th>
                    <th scope="col">
                        Summe:
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($offers as $offer):?>
                    <tr>
                        <td>
                            <?=$offer->getOfferId()?>
                        </td>
                        <td>
                            <?=$offer->getCustomerId()?>
                        </td>
                        <td>
                            <?=$offer->getCreatedDate()?>
                        </td>
                        <td>
                            <?=$offer->getStatus()?>
                        </td>
                        <td>
                            <a href="http://localhost/positions">PLACEHOLDER_CUSTOMER</a>
                        </td>
                        <td>
                            PLACEHOLER_COMPANY
                        </td>
                        <td>
                            PLACEHOLDER_POSITIONS
                        </td>
                        <td>
                            <?=$offer->getSum()?>
                        </td>
                        <td>
                            <button id="<?=$offer->getOfferId()?>" type="button" class="btn btn-light new-position">Details</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
