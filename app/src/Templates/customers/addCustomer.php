<h1 class="p-3">Neukunde</h1>
<form action="/customers/add" method="post" class="p-4">
    <div class="row">
        <div class="form-group col-4">
            <label for="customerName">Name</label>
            <input type="text" class="form-control mb-2" name="customerName" id="customerName" aria-describedby="emailHelp" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-8">
            <label for="customerStreet">Straße</label>
            <input type="text" class="form-control mb-2" name="customerStreet" id="customerStreet" required>
        </div>
        <div class="form-group col-2">
            <label for="customerStreetNr">Hausnr.</label>
            <input type="text" class="form-control mb-2" name="customerStreetNr" id="customerStreetNr" required>
        </div>
        <div class="form-group col-2">
            <label for="customerStreetAdditional">Straße zus.</label>
            <input type="text" class="form-control mb-2" name="customerStreetAdditional" id="customerStreetAdditional">
        </div>
        <div class="form-group col-4">
            <label for="customerZip">PLZ</label>
            <input type="text" class="form-control mb-2" name="customerZip" id="customerZip" pattern="[0-9]*" required>
        </div>
        <div class="form-group col-4">
            <label for="customerCity">Stadt</label>
            <input type="text" class="form-control mb-2" name="customerCity" id="customerCity" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-4">
            <label for="customerEmail">E-Mail</label>
            <input type="email" class="form-control mb-2" name="customerEmail" id="customerEmail" required>
        </div><br>
        <div class="form-group col-4">
            <label for="customerPhone">Telefon</label>
            <input type="text" class="form-control mb-2" name="customerPhone" id="customerPhone" required>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Kunden anlegen</button>
</form>