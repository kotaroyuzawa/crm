<div class="modal" id="position-modal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Position</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="position-form">
                    <div class="row">
                        <div class="col-5 border-end">
                            <h4 class="text-muted mt-2">Produkt</h4>
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
                                    <textarea class="form-control" id="position-details" name="position-details" style="height: 200px"></textarea>
                                    <label for="position-details">Beschreibung</label>
                                </div>
                            </div>
                            <div>
                                <input type="hidden" id="position-id" name="position-id">
                                <input type="hidden" id="offer-id" name="offer-id">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-muted mt-2">Firma</h4>
                                    <div class="row border-bottom">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="position-price" class="form-label">Bezugspreis</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="position-price"
                                                    name="position-price"
                                                    patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="position-amount" class="form-label">Anzahl</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="position-amount"
                                                    name="position-amount"
                                                    patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="handle-cost" class="form-label">Handlungskosten (%)</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="handle-cost"
                                                    name="handle-cost"
                                                    patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="position-profit" class="form-label">Gewinn (%)</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="position-profit"
                                                    name="position-profit"
                                                    patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="position-tax" class="form-label">USt (%)</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="position-tax"
                                                    name="position-tax"
                                                    patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4 class="text-muted mt-2">Kunde</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="skonto" class="form-label">Skonto (%)</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="skonto"
                                                    name="skonto"
                                                    patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="discount" class="form-label">Rabatt (%)</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="discount"
                                                    name="discount"
                                                    patter="[0-9]+([\.,][0-9]+)?" step="0.01">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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