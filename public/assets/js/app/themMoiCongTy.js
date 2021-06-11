
$(function () {
    
    getImage();
    
    // console.log("hoô")
    $("div#them-moi-cong-ty #logo_cong_ty").hover(function () {
        if ($(window).width() >= 576) {
            $(this).find('div.hover-me').fadeIn('fast');
        }
    }, function () {
        if ($(window).width() >= 576) {
            $(this).find('div.hover-me').fadeOut('fast');
        }
    });
    
    $(document).on('click', '.logo_cong_ty_view', function () {
        $('#xem_anh_dai_dien').modal('show');
        let value = $(this).parents('#logo_cong_ty').find('img').attr('src');
        $('#xem_anh_dai_dien').find('.modal-body').find('img').attr('src', value);
    });
    $(document).on('click', '.logo_cong_ty_view-mobile', function () {
        $('.logo_cong_ty_view').trigger('click');
    });
    $("div#them-moi-cong-ty #so_luong_chi_nhanh").TouchSpin({
        min: 0,
        buttondown_class: "btn btn-primary waves-effect",
        buttonup_class: "btn btn-primary waves-effect"
    });

    $(document).on('input change','#so_luong_chi_nhanh',function () {
        let __this = $(this);
        let getParents = null;
        if (__this.parents('.modal').length > 0){
            getParents = __this.parents('.modal');
        }else{
            getParents = $('body');
        }
        let value = __this.val();
        let inputCount = getParents.find('#dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('input').length + 1;

        // console.log(inputCount);
        if (value > 0) {
            __this.addClass('ready');
        } else if (value <= 0) {
            __this.val(0).select();
            __this.removeClass('ready');
        }
        if (__this.hasClass('ready')) {
            getParents.find('#dia_chi_chi_nhanh').removeClass('d-none');

            if (value == inputCount && value != 0) {
                getParents.find('#dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').append('<div class="xoa-element">Địa chỉ chi nhánh số ' + value + ':<input class="form-control dia_chi_chi_nhanh child-not-null" title="Địa chỉ chi nhánh" value=""></div>');
            } else if (value < inputCount) {
                getParents.find('#dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('.xoa-element:last').remove();
            }

        } else {
            getParents.find('#dia_chi_chi_nhanh').addClass('d-none');
            getParents.find('#dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('.xoa-element').remove();

        }
    });
    // $('#so_luong_chi_nhanh').on('input change', function () {
    //     let __this = $(this);
    //     let value = __this.val();
    //     let inputCount = $('#dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('input').length + 1;
    //     // console.log(value)
    //     if (value > 0) {
    //         __this.addClass('ready');
    //     } else if (value <= 0) {
    //         __this.val(0).select();
    //         __this.removeClass('ready');
    //     }
    //     if (__this.hasClass('ready')) {
    //         $('#dia_chi_chi_nhanh').removeClass('d-none');
    //
    //         if (value == inputCount && value != 0) {
    //             $('#dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').append('<div class="xoa-element">Địa chỉ chi nhánh số ' + value + ':<input class="form-control dia_chi_chi_nhanh child-not-null" title="Địa chỉ chi nhánh" value=""></div>');
    //         } else if (value < inputCount) {
    //             $('#dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('.xoa-element:last').remove();
    //         }
    //
    //     } else {
    //         $('#dia_chi_chi_nhanh').addClass('d-none');
    //         $('#dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('.xoa-element').remove();
    //
    //     }
    // });
    // var $uploadCrop_congty;

    // function readFile(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('.upload-demo').addClass('ready');
    //             $uploadCrop_congty.croppie('bind', {
    //                 url: e.target.result,
    //             }).then(function () {
    //                 console.log('jQuery bind complete');
    //             });
    //         };
    //         //
    //         reader.readAsDataURL(input.files[0]);
    //     } else {
    //         swal('Sorry - you\'re browser doesn\'t support the FileReader API');
    //     }
    // }

    // $uploadCrop_congty = $('#doi_anh_dai_dien.congty').find('#upload-demo').croppie({
    //     viewport: {
    //         width: 350,
    //         height: 350,
    //     },
    //     enableExif: false,
    // });

    $(document).on('click', '#logo_cong_ty .logo_cong_ty_change', function () {
        $(this).parents('#logo_cong_ty').find('.file-upload').trigger('click');
    });
    $(document).on('click', '.logo_cong_ty_change-mobile', function () {
        $('#logo_cong_ty .logo_cong_ty_change').trigger('click');
    });
    $(document).on('click','.change-img-upload',function(){
        $('#logo_cong_ty .logo_cong_ty_change').trigger('click');
    })

    // $(document).on('change', '#logo_cong_ty .logo_cong_ty_file', function () {
    //     let getModal = $(this).parents('.modal').attr('id');
    //     $('#doi_anh_dai_dien.congty').data('type', getModal).modal('show');
    //     readFile(this);
    // });
    $('div.modal#them-moi-cong-ty').on('hidden.bs.modal', function () {
        // alert()
        $(this).find('#logo_cong_ty').find('img').attr('src', 'images/default-company-logo.jpg').data('src', 'images/default-company-logo.jpg');
        // $(this).find('input').val('').trigger('change');
        $(this).find('input').not('#from_time,#to_time').val('');
        $(this).find('#so_luong_chi_nhanh').val(0).trigger('change');

    });
    $('div#them-moi-cong-ty').on('shown.bs.modal', function () {
        $('div#them-moi-cong-ty #from_time,div#them-moi-cong-ty #to_time').datetimepicker({
            format: 'HH:mm',
            widgetPositioning: {
                vertical: 'bottom',
                horizontal: 'right'
            },
            icons: {
                time: "icofont icofont-clock-time",
                date: "icofont icofont-ui-calendar",
                up: "icofont icofont-rounded-up",
                down: "icofont icofont-rounded-down",
                next: "icofont icofont-rounded-right",
                previous: "icofont icofont-rounded-left"
            },
        });

        $('div#them-moi-cong-ty select#from_day,div#them-moi-cong-ty select#to_day,div#them-moi-cong-ty select#quy_mo_nhan_su').select2({
            dropdownParent: $('#them-moi-cong-ty')
        });

        $('div#them-moi-cong-ty select#linh_vuc_hoat_dong').select2({
            dropdownParent: $('#them-moi-cong-ty'),
            placeholder: ' Chọn Ngành nghề',
            allowClear: false
        });
        $('.form-control').eq(0).select();
    })
    $('#doi_anh_dai_dien.congty').on('hidden.bs.modal', function () {
        let type = $(this).data('type');

        switch (type) {
            case 'them-moi-cong-ty':
                $('#them-moi-cong-ty #logo_cong_ty').find('input[type="file"]').val('');
                break;
            // case 'tuyendung':
            //     $('#avatar_tuyen_dung').parent().find('input[type="file"]').val('');
            //     break;
        }
    });
    $(document).on('hidden.bs.modal','#doi_anh_dai_dien',function () {
        $('.logo_cong_ty_file').val('');
    })
    // $('#doi_anh_dai_dien.congty').find('.modal-footer').find('button:eq(1)#save').on('click', function () {
    //     let __this = $(this);
    //     let type = $(this).parents('.modal').data('type');
    //     // console.log('modal nè', type);

    //     // console.log(type)
    //     let elementID = '';
    //     switch (type) {
    //         case 'them-moi-cong-ty':
    //             // elementID = $('#' + type).find('#logo_cong_ty');
    //             elementID = $('body').find('#logo_cong_ty');
    //             break;
    //         case 'cap-nhat-cong-ty':

    //             elementID = $('#them-moi-cong-ty').find('#logo_cong_ty');
    //             break;
    //     }
    //     let namePicture = elementID.find('input[type="file"]')[0].files[0].name;
    //     // $uploadCrop_congty.croppie('result', {
    //     //     type: 'canvas',
    //     //     size: 'viewport',
    //     // }).then(function (resp) {
    //     //     console.log(elementID)
    //     //     elementID.find('img').attr('src', resp);
            
    //     //     // let method = 'post';
    //     //     // let url = '/nha-tuyen-dung/set-logo-company';
    //     //     // let data = {
    //     //     //     fileName: resp,
    //     //     //     name: namePicture,
    //     //     // };
    //     //     // sendAjaxNoFunc(method, url, data, __this.attr('id')).done(function (e) {
    //     //     //     // console.log('data', e.reset[0])
    //     //     //     elementID.find('img').attr('src', getBaseURL+e.reset[0]).data('data', e.reset[0]);
    //     //     //     getHtmlResponse(e);

    //     //     //     if (e.status == 200) {
    //     //     //         $('#doi_anh_dai_dien.congty').modal('hide');

    //     //     //     }
    //     //     // })

    //     });
    // });
});

$(document).on('click', 'button#save-cong-ty', function () {
    // console.log(cropperUpload)
    // return;
    // alert()\
    let avatarCongTy = cropperUpload != null ? cropperUpload.getCroppedImage() : $('#logo_cong_ty').find('img').data('data');
    let __this = $(this);
    let gio_lam_viec = [];
    let ngay_lam_viec = [];
    let error = 0;
    // let getParents = $('#' + $(this).parents('.modal').attr('id'));
    let getParents = null;
    if (__this.parents('.modal').length > 0){
        getParents = __this.parents('.modal');
    }else{
        getParents = $('body');
    }
    // let getParents = $('body');
    let array_dia_chi_chi_nhanh = [];
    let dia_chi_chi_nhanh = getParents.find('.dia_chi_chi_nhanh');
    let so_luong_chi_nhanh = getParents.find('#so_luong_chi_nhanh');
    error += notNullMessage(getParents.find('.not-null'));
    // console.log(notNullMessage(getParents.find('.not-null')))
    // return;
    if(so_luong_chi_nhanh.hasClass('ready')){
        dia_chi_chi_nhanh.each(function () {
            array_dia_chi_chi_nhanh.push($(this).val());
        });
    }

    // console.log(error);
    if (error == 0) {
        gio_lam_viec.push(getParents.find('#from_time').val(), getParents.find('#to_time').val());
        ngay_lam_viec.push(getParents.find('#from_day').find('option:checked').val(), getParents.find('#to_day').find('option:checked').val());

        let dataSend = {
            id : getParents.find('#object-fillter').val(),
            ten_cong_ty: getParents.find('#ten_cong_ty').val(),
            link_website: getParents.find('#link_website').val(),
            email_cong_ty: getParents.find('#email_cong_ty').val(),
            dien_thoai_cong_ty: getParents.find('#dien_thoai_cong_ty').val(),
            dia_chi_chinh: getParents.find('#dia_chi_chinh').val(),
            gio_lam_viec: gio_lam_viec,
            ngay_lam_viec: ngay_lam_viec,
            quy_mo_nhan_su: getParents.find('#quy_mo_nhan_su').find('option:checked').val(),
            linh_vuc_hoat_dong: getParents.find('#linh_vuc_hoat_dong').val(),
            fax_cong_ty: getParents.find('#fax_cong_ty').val(),
            // logo_cong_ty: getParents.find('#logo_cong_ty').find('img').data('data'),
            gioi_thieu_cong_ty: getParents.find('#gioi_thieu_cong_ty').val(),
            so_luong_chi_nhanh: so_luong_chi_nhanh.val(),
            dia_chi_chi_nhanh: array_dia_chi_chi_nhanh,
            nam_thanh_lap: getParents.find('#nam_thanh_lap').val(),
            dia_diem_id: getParents.find('#dia_diem').val(),
            avatar :  avatarCongTy
        }
        // console.log(dataSend);
        // return;
        sendAjaxNoFunc('post', '/danh-sach-cong-ty/tao-moi', dataSend, __this.attr('id')).done(res => {
            // console.log('them moi',res);
            getHtmlResponse(res);
            if (res.status == 200) {
                if (__this.parents('.modal').length > 0){
                    let dataRespose = res.reset[0];
                    // console.log(dataRespose)
                    __this.parents('.modal').modal('hide');
                    $('body').find('#cong_ty_tuyen_dung').val(dataRespose.id);
                    // if ($('body').find('')
                    $('body').find('#cong_ty_tuyen_dung').parent().find('img').attr('src',getBaseURL+dataRespose.logo);
                    $('body').find('#cong_ty_tuyen_dung_name').find('h5').text(dataRespose.name);
                    $('body').find('#cong_ty_tuyen_dung_name').removeClass('form-control is-invalid')
                }else{
                    window.location.href = '/danh-sach-cong-ty';
                }

                // $('#' + __this.attr('id')).attr('disabled', 'disabled');
                // if (getParents.data('type') == 'cong_ty_tuyen_dung') {
                //     // alert('select')
                //     sendAjaxNoFunc('get', '/danh-sach-cong-ty/data', {}, __this.attr('id')).done(async e => {
                //         const data = e.data;
                //         let checked = null;
                //         let count = 0;
                //         await $('#' + getParents.data('type')).find('option').not(':first').remove();
                //         await $.each(data, function (i, v) {
                //             switch (i) {
                //                 case 0:
                //                     checked = 'selected';
                //                     break;
                //                 default:
                //                     checked = null;
                //                     break;
                //             }
                //
                //             $('#' + getParents.data('type')).append('<option value="' + v.id + '" ' + checked + ' data-img="'+ getBaseURL + v.logo + '">' + v.name + '</option>');
                //             // getHTMLcongTy();
                //         });
                //         // getHTMLcongTy();
                //     });
                // } else {
                //     // console.log('ccc',$('body').find('#danh-sach-cong-ty').length)
                //     if ($('body').find('#danh-sach-cong-ty').length != 0){
                //         datatable_table.ajax.reload();
                //     }
                //
                // }
                // getParents.modal('hide');

            }
        })
    }
    ;

});


