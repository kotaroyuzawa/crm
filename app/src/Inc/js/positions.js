positions = {

    init: function () {
        $('.new-position').on('click', function () {
            positions.openNewModal(this);
        })
        $('#position-list').on('click', '.position', function () {
            positions.openEditModal(this);
        })
        $('.save-position').on('click', function () {
            positions.save();
        })
        $('.delete-position').on('click', function () {
            positions.delete();
        })
    },

    openEditModal: function (trigger) {
        let position = $(trigger);
        $('#position-name').val(position.data('name'));
        $('#position-details').val(position.data('details'));
        $('#position-price').val(position.data('price'));
        $('#position-amount').val(position.data('amount'));
        $('#position-id').val(position.data('id'));
        $('#offer-id').val(position.data('offer'));
        $('#position-modal').modal('show');
    },

    openNewModal: function (trigger) {
        $('#position-form')[0].reset();
        $('#position-id').val(0);
        $('#offer-id').val($(trigger).data('offer'));
        $('#position-modal').modal('show');
    },

    save: function () {
        $.ajax({
            url: '/positions/save',
            type: 'POST',
            data: $('#position-form').serialize(),
            success: function (response) {
                let updatePosition = $('.position[data-id=' + response.id + ']');
                if (updatePosition.length > 0) {
                    updatePosition.replaceWith(response.content);
                } else {
                    $('#position-list').append(response.content);
                }

            }
        })
    },

    delete: function () {
        $.ajax({
            url: '/positions/delete',
            type: 'POST',
            data: $('#position-form').serialize(),
            success: function (response) {
                let updatePosition = $('.position[data-id=' + response.id + ']');
                if (updatePosition.length > 0) {
                    updatePosition.remove();
                    $('#position-modal').modal('hide');
                }

            }
        })
    }
}

$(document).ready(function () {
    positions.init();
})