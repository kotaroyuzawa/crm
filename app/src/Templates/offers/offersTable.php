<?php
/**
 * @var array $offers
 * @var \App\Offers\Offer $offer
 */
?>

<table border="1">
    <tbody>
    <tr>
        <td>
            <pre><b>Angebot ID:</b></pre>
        </td>
        <td>
            <pre><b>Kunden ID:</b></pre>
        </td>
        <td>
            <pre><b>Erstellt am:</b></pre>
        </td>
        <td>
            <pre><b>Geloescht am:</b></pre>
        </td>
        <td>
            <pre><b>Geandert am:</b></pre>
        </td>
        <td>
            <pre><b>Status:</b></pre>
        </td>
        <td>
            <pre><b>Kunde:</b></pre>
        </td>
        <td>
            <pre><b>Firma:</b></pre>
        </td>
        <td>
            <pre><b>Positionen:</b></pre>
        </td>
        <td>
            <pre><b>Summe:</b></pre>
        </td>
    </tr>
    <?php foreach ($offers as $offer):?>
    <tr>
        <td>
            <pre><b><?=$offer->getOfferId()?></b></pre>
        </td>
        <td>
            <pre><b><?=$offer->getCustomerId()?></b></pre>
        </td>
        <td>
            <pre><b><?=$offer->getCreatedDate()?></b></pre>
        </td>
        <td>
            <pre><b><?=$offer->getDeletedDate()?></b></pre>
        </td>
        <td>
            <pre><b><?=$offer->getUpdatedDate()?></b></pre>
        </td>
        <td>
            <pre><b><?=$offer->getStatus()?></b></pre>
        </td>
        <td>
            <pre><b>PLACEHOLDER_CUSTOMER</b></pre>
        </td>
        <td>
            <pre><b>PLACEHOLER_COMPANY</b></pre>
        </td>
        <td>
            <pre><b>PLACEHOLDER_POSITIONS</b></pre>
        </td>
        <td>
            <pre><b><?=$offer->getSum()?></b></pre>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
