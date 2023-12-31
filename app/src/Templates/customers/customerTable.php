<?php
/**
 * @var array $allCustomers
 * @var \App\Customers\Customer $customer
 * @var \App\Inc\View $modal
 */
?>
<a href="/customers/add"><button class="btn btn-primary">Neukunden anlegen</button></a>
<form class="" id="customer-form" action="/customers/delete" method="post">
<input id="delete-customer" class="btn btn-primary" type="button" value="Löschen">
<input class="btn btn-primary" type="submit" formaction="customers/update" value="Kunden Aktualisieren">
<input class="btn btn-success" type="submit" formaction="offers/create" value="Neues Angebot erstellen">
<div class="">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Adresse</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Telefon</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allCustomers as $customer) : ?>
            <tr id="customer<?= $customer->getCustomerId() ?>">
                <th><input type="radio" name="customerId" value="<?php echo $customer->getCustomerId() ;?>" required></th>
                <th scope="row"><?php echo $customer->getCustomerId() ?></th>
                <td><?php echo $customer->getCustomerName() ?></td>
                <td><?php echo $customer->getCustomerStreet() . $customer->getCustomerStreetNr() . " ".$customer->getCustomerStreetAdditional() . ", " . $customer->getCustomerZip() . " " . $customer->getCustomerCity() ?></td>
                <td><?php echo $customer->getCustomerEmail() ?></td>
                <td><?php echo $customer->getCustomerPhone() ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <?= $modal->render([]); ?>
</div>

</form>