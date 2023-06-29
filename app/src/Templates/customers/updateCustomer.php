<h1>Customer Update</h1>
<form action="/customers/updateSave" method="post">
    <div class="form-group">
        <label for="customerId">Customer ID</label>
        <input type="text" class="form-control" name="customerId" id="customerId" value="<?php echo $customer->getCustomerId() ?>" aria-describedby="emailHelp" readonly>
    </div>
    <div class="form-group">
        <label for="customerName">Customer Name</label>
        <input type="text" class="form-control" name="customerName" id="customerName" value="<?php echo $customer->getCustomerName() ?>" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
        <label for="customerStreet">Customer Street</label>
        <input type="text" class="form-control" name="customerStreet" id="customerStreet" value="<?php echo $customer->getCustomerStreet() ?>" required>
    </div>
    <div class="form-group">
        <label for="customerStreetNr">Customer Street Nr</label>
        <input type="text" class="form-control" name="customerStreetNr" id="customerStreetNr" value="<?php echo $customer->getCustomerStreetNr() ?>" required>
    </div>
    <div class="form-group">
        <label for="customerStreetAdditional">Customer Additional</label>
        <input type="text" class="form-control" name="customerStreetAdditional" id="customerStreetAdditional" value="<?php echo $customer->getCustomerStreetAdditional() ?>">
    </div>
    <div class="form-group">
        <label for="customerZip">Customer Street Zip</label>
        <input type="text" class="form-control" name="customerZip" id="customerZip" value="<?php echo $customer->getCustomerZip() ?>" pattern="[0-9]*"  required>
    </div>
    <div class="form-group">
        <label for="customerCity">Customer City</label>
        <input type="text" class="form-control" name="customerCity" id="customerCity" value="<?php echo $customer->getCustomerCity() ?>" required>
    </div>
    <div class="form-group">
        <label for="customerEmail">Customer Email</label>
        <input type="email" class="form-control" name="customerEmail" id="customerEmail" value="<?php echo $customer->getCustomerEmail()?>" required>
    </div>
    <div class="form-group">
        <label for="customerPhone">Customer Phone</label>
        <input type="tel" class="form-control" name="customerPhone" id="customerPhone" value="<?php echo $customer->getCustomerPhone() ?>"  required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

