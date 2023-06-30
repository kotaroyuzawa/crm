<div class="col-md-6 border-right">
    <form action="company/edit" method="post">
        <div class="p-3 py-3">
            <div class="col-md-12">
                <label class="labels">Firmenname</label>
                <input type="text" name="companyName" class="form-control" placeholder="Firmennamen eingeben" value="">
            </div>

            <div class="pt-2 col-md-12">
                <label class="labels">Adresse</label>
                <input type="text" name="companyStreet" class="form-control" placeholder="Adresse eingeben" value="">
            </div>

            <div class="pt-2 col-md-12">
                <label class="labels">Adresszusatz</label>
                <input type="text" name="companyStreetAdditional" class="form-control" placeholder="Adresszusatz eingeben" value="">
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="labels">PLZ</label>
                    <input type="text" name="companyZip" class="form-control" placeholder="PLZ eingeben" value="">
                </div>
                <div class="col-md-6">
                    <label class="labels">Stadt</label>
                    <input type="text" name="companyCity" class="form-control" placeholder="Stadt eingeben" value="">
                </div>
            </div>

            <div class="pt-2 col-md-12">
                <label class="labels">Land</label>
                <input type="text" name="companyCountry" class="form-control" placeholder="Land eingeben" value="">
            </div>

            <div class="pt-2 col-md-12">
                <label class="labels">Email</label>
                <input type="email" name="companyEmail" class="form-control" placeholder="Email eingeben" value="">
            </div>

            <div class="pt-2 col-md-12">
                <label class="labels">Rufnummer</label>
                <input type="tel" name="companyPhone" class="form-control" placeholder="Rufnummer eingeben" value="">
            </div>

            <div class="pt-2 col-md-12">
                <label class="labels">Beschreibung</label>
                <textarea type="text" name="companyDescription" class="form-control" placeholder="Beschreibung eingeben" value=""> </textarea>
            </div>

            <div class="mt-5 text-center">
                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
            </div>
        </div>
    </form>
</div>
