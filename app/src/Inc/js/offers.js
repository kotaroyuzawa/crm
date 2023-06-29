offers = {

    init: function () {
        $('.new-position').on('click', function () {
            offers.openNewModal(this);
        })
        $('#ff-from').datepicker({
            dateFormat: 'dd.mm.yy'
        });
        $('#ff-to').datepicker({
            dateFormat: 'dd.mm.yy'
        });
        $('.apply-filters').on('click', function () {
            offers.applyFilters();
        })
    },

    openNewModal: function (trigger) {
        $('#position-form')[0].reset();
        $('#position-id').val(0);
        $('#offer-id').val($(trigger).data('offer'));
        $('#position-modal').modal('show');
    },

    applyFilters: function () {
        $.ajax({
            url: '/offers/filter',
            type: 'POST',
            data: $('#offer-filter-form').serialize(),
            success: function (response) {
                $('#offers-table').html(response.table);
            }
        })
    }

}

$(document).ready(function () {
    offers.init();
})