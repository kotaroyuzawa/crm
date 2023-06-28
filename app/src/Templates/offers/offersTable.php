<?php
/**
 * @var array $offers
 * @var \App\Offers\Offer $offer
 * @var array $customer
 */
?>
<div class="container">
    <div class="row">
        <div class="">
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
                            <a href="http://localhost/customers"><?=$offer->getCustomer()->getCustomerName()?></a>
                        </td>
                        <td>
                            <a href="http://localhost/company">PLACEHOLER_COMPANY</a>
                        </td>
                        <td>
                            <?=$offer->getSum()?>
                        </td>
                        <td>
                            <form action="offers/details" method="POST">
                                <button value="<?=$offer->getOfferId()?>" type="submit" name="offerID" class="btn btn-light">Details</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
