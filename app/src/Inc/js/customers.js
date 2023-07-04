customers = {

    init: function () {
        $('#delete-customer').on('click', function (){
            if($('input:radio[name=customerId]').is(':checked')){
                customers.confirmDelete();
            }
        })
    },

    confirmDelete: function () {
        modal.confirmModal(
            'Löschen',
            '<p>Möchtest du diesen Kunden <b>wirklich löschen?</b><?>' +
            '<p class="text-danger">Alle Angebote von diesem Kunden werden als gelöscht gekennzeichnet und können dann nur vom Admin eingesehen werden</p>',
            this.deleteCustomer
        )
    },

    deleteCustomer: function () {
        $.ajax({
            url: '/customers/delete',
            type: 'POST',
            data: $('#customer-form').serialize(),
            success: function (response) {
                $('#customer' + response.id).remove()
            }
        })
    }
}

$(document).ready(function () {
    customers.init();
})