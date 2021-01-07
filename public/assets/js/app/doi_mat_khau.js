$(document).on('click', '#modal-doi-mat-khau #save-doi-mat-khau', function () {
    let ajax = {
        method: 'post',
        url: '/doi-mat-khau'
    };
    let data = {
        password_old: $('#modal-doi-mat-khau .password-old').val(),
        password_new: $('#modal-doi-mat-khau .password-new').val(),
        re_password_new: $('#modal-doi-mat-khau .re-password-new').val(),
    };
    let error = 0;
    // error += notNullMessage($('#modal-doi-mat-khau .not-null'));
    error += validateMin($('#modal-doi-mat-khau .check-min'));
    if (error == 0) {
        sendAjaxNoFunc(ajax.method, ajax.url, data, $(this).attr('id')).done(e => {
            // console.log(e);
            getHtmlResponse(e);

            if (e.status == 200) {
                window.location.href = '';
            }

            if (e.reset != '' && e.reset[0] == 1) {
                $('#modal-doi-mat-khau').find('input').val('');
            }
        });
    }

});
