positions = {

    init: function () {
        $('.new-position').on('click', function () {
            positions.openModal();
        })
    },

    openModal: function () {
        $('#position-modal').modal('show');
    }
}

$(document).ready(function () {
    positions.init();
})