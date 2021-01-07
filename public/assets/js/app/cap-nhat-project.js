//lịch
lichThang($('#modal-cap-nhat-project .from-date-project,#modal-cap-nhat-exp .from-date-exp'));

lichThang($('#modal-cap-nhat-project .to-date-project,#modal-cap-nhat-exp .to-date-exp')).on('changeDate', function (e) {
    let value = $(e.currentTarget).val();

    let arrayDatesEnd = value.split("/");

    let _this = $(e.currentTarget).attr('class');
    let _this_index = -1;

    $(e.currentTarget).parents('.modal').find('input').each(function () {
        _this_index++;
        if ($(this).attr('class') == _this) {
            return _this_index;
        }
    });
    let valueBegin = $(e.currentTarget).prop("tagName").toLowerCase();
    let arrayDatesBegin = $(e.currentTarget).parents('.modal').find(valueBegin).eq(parseFloat(_this_index) - 1).val().split("/");

    let dateBegin = new Date(arrayDatesBegin[1], arrayDatesBegin[0] - 1);
    let dateEnd = new Date(arrayDatesEnd[1], arrayDatesEnd[0] - 1);

    // console.log(dateBegin < dateEnd)
    if (dateEnd > dateBegin) {
        $(e.currentTarget).val(value)
    } else {
        // $.toast({
        //     heading: 'Chọn sai ngày',
        //     hideAfter: 3000,
        //     icon: 'error',
        //     loaderBg: 'red',
        //     position: 'top-right',
        //     stack: 1,
        //     text: 'Ngày kết thúc phải lớn hơn ngày bắt đầu!',
        // });
        getNotificationAjax({status:400,title:'Chọn ngày thất bại!',message:'Ngày kết thúc phải lớn hơn ngày bắt đầu!!'});
        $(e.currentTarget).parents('.modal').find(valueBegin).eq(_this_index.val($(e.currentTarget).parents('.modal').find(valueBegin).eq(parseFloat(_this_index) - 1)));
    }
});

//update project
$(document).on('click','#add-new-project', function () {
    $('#modal-cap-nhat-project').modal('show');
    $('#modal-cap-nhat-project').data('kieu','themmoi');
    $('#modal-cap-nhat-project').find('input,textarea').not('.from-date-project,.to-date-project').val('');
    $('#modal-cap-nhat-project').find('select').val('').trigger('change.select2');
    // $('#modal-cap-nhat-project').find('.from-date-project').val('');
    // $('#modal-cap-nhat-project').find('.to-date-project').val('');

});
//xóa một dự án
$(document).on('click', '.xoa1-project', function () {
    let update_index = 0;

    $(this).parents('tr').remove();
    $('#table-project').find('tbody tr').each(function () {
        update_index++;
        $(this).find('td').eq(0).text(update_index);

    });

});


//cập nhật dự án
$(document).on('click', '.cap-nhat-project', function () {
    let indexs = $(this).parents('tr').find('td').eq(0).text();
    let name = $(this).parents('tr').find('td').eq(1).text();
    let fromDate = $(this).parents('tr').find('td').eq(2).text();
    let toDate = $(this).parents('tr').find('td').eq(3).text();
    // let status = $(this).parents('tr').find('td').eq(4).data('id');
    let links = $(this).parents('tr').find('td').eq(4).text();
    console.log(links)
    $('#modal-cap-nhat-project .modal-body').find('input').eq(0).val(indexs);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(1).val((name == 'NULL') ? '' : name);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(2).val((fromDate == 'NULL') ? '' : fromDate);
    $('#modal-cap-nhat-project .modal-body').find('input').eq(3).val((toDate == 'NULL') ? '' : toDate);
    // $('#modal-cap-nhat-project .modal-body').find('select').val((status == '') ? '' : status).trigger('change.select2');
    $('#modal-cap-nhat-project .modal-body').find('textarea').val((links == 'NULL') ? '' : links);

    $('#modal-cap-nhat-project').modal('show');
    $('#modal-cap-nhat-project').data('kieu','capnhat');


});

//modal dự án
$(document).on('shown.bs.modal', '#modal-cap-nhat-project', function () {
    $(this).find('.modal-body').find('input').eq(1).select();
    $(this).find('.project-status-select').select2();
});

//nút cập nhật dự án
$(document).on('click', '#modal-cap-nhat-project .modal-footer button:eq(1)', function () {
    let kieu_modal = $('#modal-cap-nhat-project').data('kieu');
    let __this = $(this);
    let _parent = $('#modal-cap-nhat-project .modal-body');
    let indexs = _parent.find('input').eq(0).val();
    let name = _parent.find('input').eq(1).val();
    let fromDate = _parent.find('input').eq(2).val();
    let toDate = _parent.find('input').eq(3).val();
    // let status = _parent.find('select').val();
    // let status_text = _parent.find('select').find('option:checked').text();
    let links = _parent.find('textarea').val();

    let errorCount = 0;

    errorCount += notNullMessage($('#modal-cap-nhat-project').find('.not-null'));

    if (errorCount == 0) {

        switch (kieu_modal) {
            case 'themmoi':
                let indexTrow;
                if ($('#table-project tbody tr').length == 0) {
                    indexTrow = 1;
                } else {
                    indexTrow = parseInt($('#table-project').find('tbody tr:last').find('td').eq(0).text()) + 1;
                }

                let data = {
                    name : name,
                    fromDate : fromDate,
                    toDate : toDate,
                    status : {
                        class: getHtmlStatusProject(status),
                        // text : status_text,
                        id: status
                    },
                    links : links,
                }
                // console.log(data);
                // return;
                setTRowProject(indexTrow,data, 0,__this.attr('id')).done(async res => {

                    await $('#table-project').find('tbody').append(res);
                    // console.log('index nè',$('.table-project tbody').find('tr:last').index());
                    $('#modal-cap-nhat-project').modal('hide');

                });
                break;
            case 'capnhat':
                $('#modal-cap-nhat-project').modal('hide');
                $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(1).text((name == '') ? 'NULL' : name);
                $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(2).text((fromDate == '') ? 'NULL' : fromDate);
                $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(3).text((toDate == '') ? 'NULL' : toDate);
                // $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(4).data('id', status).html('<span class="' + getHtmlStatusProject(status) + '">' + status_text + '</span>');
                $('.table-project tbody').find('tr').eq(parseInt(indexs) - 1).find('td').eq(4).html('<a href="' + ((links == '') ? 'NULL' : links) + '" target="_blank">' + ((links == '') ? 'NULL' : links) + '</a>');
                break;
        }


    }

});

$(document).on('click','#modal-nop-don .modal-footer button:eq(0)',function () {
    $('#modal-nop-don .modal-body ul.wizard').find('li').eq(0).find('a').trigger('click');
});

$(document).on('click','#modal-nop-don .modal-footer button:eq(1)',function () {
    $('#modal-nop-don .modal-body ul.wizard').find('li').eq(1).find('button#luu-nop-ho-so').trigger('click');
});

const getHtmlStatusProject = (status) => {
    switch (parseInt(status)) {
        case 1:
            return 'badge badge-info';
        case 2:
            return 'badge badge-pink';
        case 3:
            return 'badge badge-success';
        case 4:
            return 'badge badge-warning';
    }
}



//index,name,fromDate,toDate,url
const setTRowProject = (index,data,type,button) => {
    let ajax = {
        method: 'get',
        url: '/nguoi-tim-viec/project-view',
        data: {
            index: index,
            type: type,
            data:data
        },
    };
    return sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,button);
    // return $.ajax({
    //     method: 'get',
    //     url: '/nguoi-tim-viec/project-view',
    //     data: {
    //         index: index,
    //         type: type,
    //         data:data
    //     },
    // });
};
