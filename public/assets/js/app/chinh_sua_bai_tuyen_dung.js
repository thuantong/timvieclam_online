$(document).on('click','.chinh_sua',function () {
    let __this = $(this);
    let idBTD =  __this.data('id');
// console.log(idBTD)
    // return;
    let ajax = {
        method: 'get',
        url: '/bai-viet/chinh-sua',
        data: {
            id : idBTD
        },
    }
    sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
        // console.log(e)
        $('#chinh-sua-bai-tuyen-dung-modal').modal('show');
        $('#chinh-sua-bai-tuyen-dung-modal').find('.modal-body').html(e);
        eventModalChinhSua();
    })
});
$(document).on('focus','textarea',function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 10 + 'px';
})
const eventModalChinhSua = ()=>{
    // $('#doi_anh_dai_dien').data('type','them-moi-cong-ty')
    let parentNode = $('#chinh-sua-bai-tuyen-dung-modal');
    select2Single($('select.nganh_nghe_update'),parentNode);
    select2Single($('select.chuc_vu_tuyen_update'),parentNode);
    select2Single($('select.so_kinh_nghiem_update'),parentNode);
    select2Single($('select.bang_cap_update'),parentNode);
    select2Single($('select.gioi_tinh_update'),parentNode);
    select2Single($('select.dia_diem_lam_viec_update'),parentNode);
    select2Single($('select.hinh_thuc_update'),parentNode);
    var quill_update = new Quill("#chinh-sua-bai-tuyen-dung-modal #mo-ta-update-editor", {
        theme: "snow",
        // placeholder: 'Compose an epic...',
        modules: {toolbar: [ ["bold", "italic", "underline"], [{list: "ordered"}, {list: "bullet"}], [{align: []}], [], ["clean"]]}
    });
    var quill2_update = new Quill("#chinh-sua-bai-tuyen-dung-modal #yeu-cau-update-editor", {
        theme: "snow",
        // placeholder: 'Compose an epic...',
        modules: {toolbar: [ ["bold", "italic", "underline"], [{list: "ordered"}, {list: "bullet"}], [{align: []}], [], ["clean"]]}
    });
    var quill3_update = new Quill("#chinh-sua-bai-tuyen-dung-modal #quyen-loi-update-editor", {
        theme: "snow",
        // placeholder: 'Compose an epic...',
        modules: {toolbar: [ ["bold", "italic", "underline"], [{list: "ordered"}, {list: "bullet"}], [{align: []}], [], ["clean"]]}
    });

    parentNode.find('textarea').each(function () {
        // if ($(this).val() == '') {
        // console.log((this.scrollHeight))
            this.setAttribute('style', 'overflow-y:hidden;');
            this.style.height = 'auto';
            // this.style.height = (this.scrollHeight) + 10 + 'px';
        // } else {
        //     this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        // }

    }).on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 10 + 'px';
    }).on('keypress', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 15 + 'px';
    });

    $(".muc_luong_from_update").TouchSpin({
        min: 0,
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });
    $(".so_luong_tuyen_update").TouchSpin({
        min: 0,
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });
    $(".muc_luong_to_update").TouchSpin({
        min: 0,
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });
    lichNgay($('.han_tuyen_dung_update'));

}
$(document).on('click','#chinh-sua-bai-tuyen-dung-modal #save',function () {
    // alert('')
    let __this = $(this);
    let __parent = __this.parents('.modal');
    let muc_luong_array = [];
    muc_luong_array.push(__parent.find('.muc_luong_from_update').val(), __parent.find('.muc_luong_to_update').val());
    let do_tuoi_array = [];
    do_tuoi_array.push(__parent.find('.do_tuoi_from_update').val(), __parent.find('.do_tuoi_from_update').val());
    let array_ho_so_yey_cau = [];
    if ($('[name="ban_cap_yeu_cau_update"]:checked').length > 0){
        $('[name="ban_cap_yeu_cau_update"]:checked').each(function () {
            array_ho_so_yey_cau.push($(this).val());
        });
    }
    let error = 0;
    error += notNullMessage(__parent.find('.not-null'));
    // console.log(error)
    if (error == 0){
        let data = {
            id : __parent.find('#bai_viet_action').val(),
            tieu_de_bai_dang: __parent.find('.tieu_de_bai_dang_update').val(),//
            nganh_nghe: __parent.find('.nganh_nghe_update').val(),
            chuc_vu_tuyen: __parent.find('.chuc_vu_tuyen_update').find('option:checked').val(),
            ten_chuc_vu: __parent.find('.ten_chuc_vu_update').val(),
            so_luong_tuyen: __parent.find('.so_luong_tuyen_update').val(),
            so_kinh_nghiem: __parent.find('.so_kinh_nghiem_update').find('option:checked').val(),
            han_tuyen_dung: __parent.find('.han_tuyen_dung_update').val(),
            muc_luong: muc_luong_array,
            do_tuoi: do_tuoi_array,
            bang_cap: __parent.find('.bang_cap_update').find('option:checked').val(),
            gioi_tinh: __parent.find('.gioi_tinh_update').find('option:checked').val(),
            dia_diem_lam_viec: __parent.find('.dia_diem_lam_viec_update').find('option:checked').val(),
            hinh_thuc: __parent.find('.hinh_thuc_update').find('option:checked').val(),
            mo_ta_cong_viec: __parent.find('.mo_ta_cong_viec_update').val(),
            yeu_cau_cong_viec: __parent.find('.yeu_cau_cong_viec_update').val(),
            quyen_loi_cong_viec: __parent.find('.quyen_loi_cong_viec_update').val(),
            dia_chi_cong_viec: __parent.find('.dia_chi_cong_viec_update').val(),
            yeu_cau_ho_so :array_ho_so_yey_cau,
            so_ngay_ton_tai: __parent.find('#so_ngay_ton_tai_update').val()
        };
        // console.log(data)
        // return;
        sendAjaxNoFunc('post', '/bai-viet/chinh-sua/luu-tin', data, __this.attr('id')).done(e => {
            // console.log(e)
            getHtmlResponse(e);
            if (e.status == 405) {
                alertConfirm(e).then(result => {
                    // console.log('reeeee',result)
                    if (result.value == true) {
                        window.open('/so-du-tai-khoan', '_blank');
                    }
                })
            }
            if (e.status == 200) {
                if ($('body').find('#quan-ly-bai-dang.table').length > 0) {
                    table.ajax.reload();
                    $('.modal').modal('hide');
                }else {
                    window.location.href = '';
                }

            }
        })
    }
});
