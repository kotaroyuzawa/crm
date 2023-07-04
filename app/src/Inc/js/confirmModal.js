modal = {
    confirmModal: function (title = '', content = '', callback = null){
        let modal = $('#confirmModal');

        modal.find('.modal-title').html(title);
        modal.find('.modal-body').html(content);
        modal.modal('show');

        modal.find('.confirm-btn').click(function () {
            if (callback) {
                if (typeof callback == 'function') {
                    callback();
                }
            }
            callback = null;
            modal.modal('hide');
        });
        return true;
    }
}