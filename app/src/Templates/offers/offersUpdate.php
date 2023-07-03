<?php
/**
 * @var \App\Offers\Offer $offer
 * @var \App\Customers\Customer $customer
 * @var array $customers
 */
?>
<div class="container">
    <form action="offers/details" method="POST">
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" label="Default select example">
                <option value="inactive">Inactive</option>
                <option value="active">Active</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="customer" class="form-label">Kunde</label>
            <select id="status" name="customerID" class="form-select" label="Default select example">
                <option value="<?= $offer->getCustomerId()?>"><?= ($offer->getCustomer())->getCustomerName()?></option>
                <?php foreach ($customers as $customer) : ?>
                    <option value="<?= $customer->getCustomerId()?>"><?= $customer->getCustomerName()?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" value="1" name="offerID" class="btn btn-primary">Speichern</button>
    </form>
</div>
