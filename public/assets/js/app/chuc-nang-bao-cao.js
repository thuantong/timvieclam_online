$(document).on('click', '#bao-cao-button-call', function () {
    let __this = $(this);
    let id = __this.data('id');
    $('#bao-cao-modal').modal('show');
    $('#bao-cao-modal').find('#action-check').val(id);

});

$(document).on('click', '#bao-cao-modal .modal-footer #save', function () {
    let __this = $(this);
    let __thisModal_content = $('#bao-cao-modal').find('.modal-body');
    let idNTD = __thisModal_content.find('#action-check').val();
    // console.log(idNTD)
    // return;
    let noi_dung_BC = __thisModal_content.find('#noi-dung-bao-cao').val();
    let error = 0;
    error += notNullMessage(__thisModal_content.find('.not-null'));
    if (error == 0) {
        let ajax = {
            method: 'post',
            url: '/bao-cao-nha-tuyen-dung',
            data: {
                id: idNTD,
                noi_dung: noi_dung_BC
            },
        };
        // console.log('asdasd',ajax);
        sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, __this.attr('id')).done(e => {
            // console.log('asdasd',e);
            getHtmlResponse(e);
            if (e.status == 200) {
                $('#bao-cao-modal').modal('hide');
                $('.bao-cao-button-call').removeClass('btn-outline-primary');
                $('.bao-cao-button-call').addClass('btn-primary');
                $('.bao-cao-button-call').addClass('like-animation');
                $('.bao-cao-button-call').find('i').text(' Đã báo cáo');
                $('.bao-cao-button-call').removeAttr('id');
            }
        });
    }


});

