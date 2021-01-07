const getInitHtml = () => {
    if ($('body').find('#form-body').length >= 1) {
        select2Default($('#form-body .chuc_vu_tuyen'));
        select2Default($('#form-body .so_kinh_nghiem'));
        select2Default($('#form-body .bang_cap'));
        select2Default($('#form-body .gioi_tinh'));
        select2Default($('#form-body .dia_diem_lam_viec'));
        select2Default($('#form-body .hinh_thuc'));
        select2Default($('#form-body .nganh_nghe'));

        // $('#form-body .nganh_nghe').select2({
        //     placeholder: ' Chọn Ngành nghề',
        //     allowClear: false
        // }).data('select2').listeners['*'].push(function (name, target) {
        //     if (name == 'focus') {
        //         $(this.$element).select2("open");
        //     }
        // });
        // $('#form-body .cong_ty_tuyen_dung').select2({
        //     templateResult: function (data) {
        //         var span = data.text;
        //         if ($(data.element).data('img') != null) {
        //             span = $("<span><img src='" + $(data.element).data('img') + "' style='width: 50px;height: 50px'/> " + data.text + "</span>");
        //         }
        //         return span;
        //     }
        // }).data('select2').listeners['*'].push(function (name, target) {
        //     if (name == 'focus') {
        //         $(this.$element).select2("open");
        //     }
        // });
        $("#form-body .muc_luong_from").TouchSpin({
            prefix: 'Từ<span style="color: #e9ecef!important;">...</span>',
            postfix: 'Triệu(đ)',
            buttondown_class: "btn btn-primary waves-effect",
            buttonup_class: "btn btn-primary waves-effect"
        });
        $("#form-body .muc_luong_to").TouchSpin({
            prefix: 'Đến',
            postfix: 'Triệu(đ)',
            buttondown_class: "btn btn-primary waves-effect",
            buttonup_class: "btn btn-primary waves-effect"
        });
        $("#form-body .so_luong_tuyen,#form-body .so_ngay_ton_tai").TouchSpin({
            min: 1,
            buttondown_class: "btn btn-primary waves-effect",
            buttonup_class: "btn btn-primary waves-effect"
        });
        lichNgay($('#form-body .han_tuyen_dung'));
    }

    if ($('body').find('#form-update-body').length >= 1) {
        select2Default($('#form-update-body .chuc_vu_tuyen'));

        select2Default($('#form-update-body .so_kinh_nghiem'));

        select2Default($('#form-update-body .bang_cap'));

        select2Default($('#form-update-body .gioi_tinh'));

        select2Default($('#form-update-body .dia_diem_lam_viec'));

        select2Default($('#form-update-body .hinh_thuc'));


        $('#form-update-body .nganh_nghe').select2({
            placeholder: ' Chọn Ngành nghề',
            allowClear: false
        }).data('select2').listeners['*'].push(function (name, target) {
            if (name == 'focus') {
                $(this.$element).select2("open");
            }
        });


        // $('#form-update-body .cong_ty_tuyen_dung').select2({
        //     templateResult: function (data) {
        //         var span = data.text;
        //         if ($(data.element).data('img') != null) {
        //             span = $("<span><img src='" + $(data.element).data('img') + "' style='width: 50px;height: 50px'/> " + data.text + "</span>");
        //         }
        //         return span;
        //     }
        // }).data('select2').listeners['*'].push(function (name, target) {
        //     if (name == 'focus') {
        //         $(this.$element).select2("open");
        //     }
        // });


        $("#form-update-body .muc_luong_from").TouchSpin({
            prefix: 'Từ<span style="color: #e9ecef!important;">...</span>',
            postfix: 'Triệu(đ)',
            buttondown_class: "btn btn-primary waves-effect",
            buttonup_class: "btn btn-primary waves-effect"
        });


        $("#form-update-body .muc_luong_to").TouchSpin({
            prefix: 'Đến',
            postfix: 'Triệu(đ)',
            buttondown_class: "btn btn-primary waves-effect",
            buttonup_class: "btn btn-primary waves-effect"
        });


        $("#form-update-body .so_luong_tuyen,#form-update-body .so_ngay_ton_tai").TouchSpin({
            min: 1,
            buttondown_class: "btn btn-primary waves-effect",
            buttonup_class: "btn btn-primary waves-effect"
        });


        lichNgay($('#form-update-body .han_tuyen_dung'));
    }


}
$(function () {
    // $('#form-body select.form-control').select2();
    getInitHtml();

    $('button.save-bai-tuyen-dung').on('click', function () {
        // alert();
        // return;
        let __parent = $('#form-body');
        let __this = $(this);
        let error = 0;
        error += notNullMessage(__parent.find('.not-null'));

        if (__parent.find('#do_tuoi_from').val() <= 15){
            __parent.find('#do_tuoi_from').addClass('is-invalid');
            __parent.find('#do_tuoi_from').parent().find('.invalid-feedback').addClass('text-left').find('strong').text(__parent.find('#do_tuoi_to').attr('title') + ' không được thấp hơn số tuổi lao động(15 đến 60 tuổi)');
            __parent.find('#do_tuoi_from').val(15);
            error += 1;
        }else if (__parent.find('#do_tuoi_from').val() >= 60){
            __parent.find('#do_tuoi_from').addClass('is-invalid');
            __parent.find('#do_tuoi_from').parent().find('.invalid-feedback').addClass('text-left').find('strong').text(__parent.find('#do_tuoi_to').attr('title') + ' vượt quá số tuổi lao động(15 đến 60 tuổi)');
            __parent.find('#do_tuoi_from').val(60);
            error += 1;
        }
        if (__parent.find('#do_tuoi_to').val() <= 15){
            __parent.find('#do_tuoi_to').addClass('is-invalid');
            __parent.find('#do_tuoi_to').parent().find('.invalid-feedback').addClass('text-left').find('strong').text(__parent.find('#do_tuoi_to').attr('title') + ' không được thấp hơn số tuổi lao động(15 đến 60 tuổi)');
            __parent.find('#do_tuoi_to').val(15);
            error += 1;
        }else if (__parent.find('#do_tuoi_to').val() >= 60){
            __parent.find('#do_tuoi_to').addClass('is-invalid');
            __parent.find('#do_tuoi_to').parent().find('.invalid-feedback').addClass('text-left').find('strong').text(__parent.find('#do_tuoi_to').attr('title') + ' vượt quá số tuổi lao động(15 đến 60 tuổi)');
            __parent.find('#do_tuoi_to').val(60);
            error += 1;
        }
        let muc_luong_array = [];
        muc_luong_array.push(__parent.find('#muc_luong_from').val(), __parent.find('#muc_luong_to').val());
        let do_tuoi_array = [];
        do_tuoi_array.push(__parent.find('#do_tuoi_from').val(), __parent.find('#do_tuoi_to').val());
        let array_ho_so_yey_cau = [];
        if ($('[name="ban_cap_yeu_cau"]:checked').length > 0){
            $('[name="ban_cap_yeu_cau"]:checked').each(function () {
                array_ho_so_yey_cau.push($(this).val());
            });
        }

        // console.log('eroer',error)
        if (error == 0) {
            let data = {
                tieu_de_bai_dang: __parent.find('#tieu_de_bai_dang').val().toLowerCase(),
                chuc_vu_tuyen: __parent.find('#chuc_vu_tuyen').find('option:checked').val(),
                ten_chuc_vu: __parent.find('#ten_chuc_vu').val(),
                han_tuyen_dung: __parent.find('#han_tuyen_dung').val(),
                so_luong_tuyen: __parent.find('#so_luong_tuyen').val(),
                so_kinh_nghiem: __parent.find('#so_kinh_nghiem').find('option:checked').val(),
                muc_luong: muc_luong_array,
                bang_cap: __parent.find('#bang_cap').find('option:checked').val(),
                gioi_tinh: __parent.find('#gioi_tinh').find('option:checked').val(),
                dia_diem_lam_viec: __parent.find('#dia_diem_lam_viec').find('option:checked').val(),
                hinh_thuc: __parent.find('#hinh_thuc').find('option:checked').val(),
                mo_ta_cong_viec: __parent.find('#mo_ta_cong_viec').val(),
                yeu_cau_cong_viec: __parent.find('#yeu_cau_cong_viec').val(),
                quyen_loi_cong_viec: __parent.find('#quyen_loi_cong_viec').val(),
                dia_chi_cong_viec: __parent.find('#dia_chi_cong_viec').val(),
                do_tuoi: do_tuoi_array,
                cong_ty_tuyen_dung: __parent.find('#cong_ty_tuyen_dung').val(),
                so_ngay_ton_tai: __parent.find('#so_ngay_ton_tai').val(),
                nganh_nghe: __parent.find('#nganh_nghe').val(),
                yeu_cau_ho_so: array_ho_so_yey_cau,
                is_hot: __parent.find('[name="dang_ky_bai_viet_hot"]:checked').val(),
            };
            // console.log(data);
        // return;
            sendAjaxNoFunc('post', '/dang-bai-viet/luu-tin', data, __this.attr('id')).done(e => {
                console.log(e)
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
                        $('#them-moi-modal').modal('hide');
                    } else {
                        window.location.href = '';
                    }

                }
            })
        }

    });
    // $('#review-modal')//modal
    $('#form-body .review').on('click', function () {
        let tieu_de = $('#tieu_de_bai_dang').val();
        $('#review-modal').modal('show');
    });

    $(document).on('click', '#form-body button#call-them-moi-cong-ty', function () {
        $('div.modal#them-moi-cong-ty').modal('show');
        let ajax = {
            url:'/danh-sach-cong-ty/get-content',
            method:'get',
            data:{}
        };
        sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
             $('div.modal#them-moi-cong-ty').find('.modal-body').html(e);
             $('div.modal#them-moi-cong-ty').find('.modal-body').find('#save-cong-ty').addClass('d-none');
            initEventCapNhatCongTy()
            // hoverEventLogo();
        })
        // $('div.modal#them-moi-cong-ty').data('type', 'cong_ty_tuyen_dung');
        // alert()
    });

    $(document).on('focusout', '#form-body #review', function () {
        $('#form-body #tieu_de_bai_dang').focus();
    });
    // $(document).on('shown.bs.modal','#form-body div.modal#them-moi-cong-ty',function () {
    //     $(this).data('type','cong_ty_tuyen_dung');
    // })
});
