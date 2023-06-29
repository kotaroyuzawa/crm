<h1>New Customer</h1>
<form action="/customers/add" method="post">
    <div class="form-group">
        <label for="customerName">Customer Name</label>
        <input type="text" class="form-control" name="customerName" id="customerName" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
        <label for="customerStreet">Customer Street</label>
        <input type="text" class="form-control" name="customerStreet" id="customerStreet" required>
    </div>
    <div class="form-group">
        <label for="customerStreetNr">Customer Street Nr</label>
        <input type="text" class="form-control" name="customerStreetNr" id="customerStreetNr" required>
    </div>
    <div class="form-group">
        <label for="customerStreetAdditional">Customer Street Additional</label>
        <input type="text" class="form-control" name="customerStreetAdditional" id="customerStreetAdditional">
    </div>
    <div class="form-group">
        <label for="customerZip">Customer Zip</label>
        <input type="text" class="form-control" name="customerZip" id="customerZip" pattern="[0-9]*" required>
    </div>
    <div class="form-group">
        <label for="customerCity">Customer City</label>
        <input type="text" class="form-control" name="customerCity" id="customerCity" required>
    </div>
    <div class="form-group">
        <label for="customerEmail">Customer Email</label>
        <input type="email" class="form-control" name="customerEmail" id="customerEmail" required>
    </div>
    <div class="form-group">
        <label for="customerPhone">Customer Phone</label>
        <input type="text" class="form-control" name="customerPhone" id="customerPhone" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>