<form action="/customers/updateSave" method="post">
    <div class="form-group">
        <label for="customerId">Customer ID</label>
        <input type="text" class="form-control" name="customerId" id="customerId" value="<?php echo $customer['customerId'] ?>" aria-describedby="emailHelp" readonly>
    </div>
    <div class="form-group">
        <label for="customerName">Customer Name</label>
        <input type="text" class="form-control" name="customerName" id="customerName" placeholder="<?php echo $customer['customerName'] ?>" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
        <label for="customerStreet">Customer Street</label>
        <input type="text" class="form-control" name="customerStreet" id="customerStreet" placeholder="<?php echo $customer['customerStreet'] ?>" required>
    </div>
    <div class="form-group">
        <label for="customerStreet_nr">Customer Street Nr</label>
        <input type="text" class="form-control" name="customerStreetNr" id="customerStreetNr" placeholder="<?php echo $customer['customerStreetNr'] ?>" required>
    </div>
    <div class="form-group">
        <label for="customerStreet_additional">Customer Street Additional</label>
        <input type="text" class="form-control" name="customerStreetAdditional" id="customerStreetAdditional" placeholder="<?php echo $customer['customerStreetAdditional'] ?>">
    </div>
    <div class="form-group">
        <label for="customerCity">Customer City</label>
        <input type="text" class="form-control" name="customerCity" id="customerCity" placeholder="<?php echo $customer['customerCity'] ?>" required>
    </div>
    <div class="form-group">
        <label for="customerEmail">Customer Email</label>
        <input type="email" class="form-control" name="customerEmail" id="customerEmail" placeholder="<?php echo $customer['customerEmail'] ?>" required>
    </div>
    <div class="form-group">
        <label for="customerPhone">Customer Phone</label>
        <input type="text" class="form-control" name="customerPhone" id="customerPhone" placeholder="<?php echo $customer['customerPhone'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

