positions = {

    init: function () {
        $('.new-position').on('click', function () {
            positions.openModal();
        })
    },

    openModal: function () {
        $('#position-modal').modal('show');
    },

    save: function () {
        $.ajax({
            url: '/position/save',
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