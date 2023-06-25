<div class="modal" id="position-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Position</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="position-form">
                    <div class="mb-3">
                        <label for="position-name" class="form-label">Position</label>
                        <input
                                type="text"
                                class="form-control"
                                id="position-name"
                                name="position-name">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" id="position-details" name="position-details" style="height: 150px"></textarea>
                            <label for="position-details">Beschreibung</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="position-price" class="form-label">Preis</label>
                        <input
                                type="number"
                                class="form-control"
                                id="position-price"
                                name="position-price"
                                patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="position-amount" class="form-label">Anzahl</label>
                        <input
                                type="number"
                                class="form-control"
                                id="position-amount"
                                name="position-amount"
                                patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                    </div>
                    <div>
                        <input type="hidden" id="position-id" name="position-id">
                        <input type="hidden" id="offer-id" name="offer-id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete-position">Löschen</button>
                <button type="button" class="btn btn-primary save-position">Speichern</button>
            </div>
        </div>
    </div>
</div>