<?php
/**
 * @var array $customers
 * @var \App\Customers\Customer $customer
 */
?>
<form id="offer-filter-form">
    <div class="row border mt-2">
        <div class="col-2">
            <div class="mb-3">
                <label for="ff-offer-id" class="form-label m-0">Angebots ID:</label>
                <input type="number" name="ff-offer-id" class="form-control" id="ff-offer-id">
            </div>
        </div>
        <div class="col-2">
            <div class="mb-3">
                <label for="ff-from" class="form-label m-0">Angebote von:</label>
                <input type="text" name="ff-from" class="form-control" id="ff-from">
            </div>
        </div>
        <div class="col-2">
            <div class="mb-3">
                <label for="ff-to" class="form-label m-0">Angebote bis:</label>
                <input type="text" name="ff-to" class="form-control" id="ff-to">
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="ff-customer" class="form-label m-0">Kunde</label>
                <select class="form-select" name="ff-customer" id="ff-customer">
                    <option></option>
                    <?php foreach ($customers as $customer): ?>
                        <option value="<?= $customer->getCustomerId()?>"><?= $customer->getCustomerName()?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="col-auto">
                <button type="button" class="btn btn-primary mt-4 apply-filters">Suchen</button>
            </div>
        </div>
    </div>
</form>
