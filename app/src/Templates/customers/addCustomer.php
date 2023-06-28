<form action="/customers/add" method="post">
    <div class="form-group">
        <label for="customer_name">Customer Name</label>
        <input type="text" class="form-control" name="customerName" id="customerName" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
        <label for="customer_street">Customer Street</label>
        <input type="text" class="form-control" name="customerStreet" id="customerStreet" required>
    </div>
    <div class="form-group">
        <label for="customer_street_nr">Customer Street Nr</label>
        <input type="text" class="form-control" name="customerStreetNr" id="customerStreetNr" required>
    </div>
    <div class="form-group">
        <label for="customer_street_additional">Customer Street Additional</label>
        <input type="text" class="form-control" name="customerStreetAdditional" id="customerStreetAdditional">
    </div>
    <div class="form-group">
        <label for="customer_city">Customer City</label>
        <input type="text" class="form-control" name="customerCity" id="customerCity" required>
    </div>
    <div class="form-group">
        <label for="customer_email">Customer Email</label>
        <input type="email" class="form-control" name="customerEmail" id="customerEmail" required>
    </div>
    <div class="form-group">
        <label for="customer_phone">Customer Phone</label>
        <input type="text" class="form-control" name="customerPhone" id="customerPhone" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>