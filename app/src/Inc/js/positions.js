positions = {

    init: function () {
        $('.new-position').on('click', function () {
            positions.openModal(this);
        })
        $('.save-position').on('click', function () {
            positions.save();
        })
    },

    openModal: function (trigger) {
        $('#offer-id').val($(trigger).data('offer'));
        $('#position-modal').modal('show');
    },

    save: function () {
        $.ajax({
            url: '/positions/save',
            type: 'POST',
            data: $('#position-form').serialize(),
            success: function () {

            }
        })
    }
}

$(document).ready(function () {
    positions.init();
})