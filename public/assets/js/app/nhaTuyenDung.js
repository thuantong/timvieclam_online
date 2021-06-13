window.scrollTo({ top: 0, behavior: 'smooth' });
$(function () {
    // $('#from_time').clockpicker({
    //     autoclose: true,
    // });
    // $(window).scrollTop(0);
    $('#from_time,#to_time').datetimepicker({
        format: 'HH:mm',
        icons: {
            time: "icofont icofont-clock-time",
            date: "icofont icofont-ui-calendar",
            up: "icofont icofont-rounded-up",
            down: "icofont icofont-rounded-down",
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        },
    });
    // var input = $('#to_time').clockpicker({
    //     placement: 'bottom',
    //     align: 'left',
    //     autoclose: false,
    //     'default': 'now'
    // });
    lichNgay($('#ngay_sinh_tuyen_dung'));

    $('select#from_day,select#to_day').select2();
    $('select#quy_mo_nhan_su').select2();
    $('select#linh_vuc_hoat_dong').select2({
        placeholder: ' Chọn Ngành nghề',
        allowClear: false
    });
    $('select#gioi_tinh_tuyen_dung').select2();

    // $("#logo_cong_ty").hover(function () {
    //     $(this).find('div').fadeIn('fast');

    // }, function () {
    //     $(this).find('div').fadeOut('fast');
    // });
    // $("#avatar_tuyen_dung").hover(function () {
    //     $(this).find('div').fadeIn('fast');

    // }, function () {
    //     $(this).find('div').fadeOut('fast');
    // });

    // $('#logo_cong_ty').find('button').eq(1).on('click', function () {
    //     $('#xem_anh_dai_dien').modal('show');
    //     let value = $(this).parents('#logo_cong_ty').find('img').attr('src');
    //     $('#xem_anh_dai_dien').find('.modal-body').find('img').attr('src', value);
    // });

    // $('#avatar_tuyen_dung').find('button').eq(1).on('click', function () {
    //     $('#xem_anh_dai_dien').modal('show');
    //     let value = $(this).parents('#avatar_tuyen_dung').find('img').attr('src');
    //     $('#xem_anh_dai_dien').find('.modal-body').find('img').attr('src', value);
    // });

    // var $uploadCrop;

    // function readFile(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#doi_anh_dai_dien.thong-tin').find('.upload-demo').addClass('ready');
    //             $uploadCrop.croppie('bind', {
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

    // $uploadCrop = $('#doi_anh_dai_dien.thong-tin').find('#upload-demo').croppie({
    //     viewport: {
    //         width: 400,
    //         height: 400,
    //     },
    //     enableExif: false,
    // });

    // save
    // $('#logo_cong_ty').find('button').eq(0).on('click', function () {
    //     $(this).parent().find('input[type="file"]').trigger('click');

    // });
    // $('#logo_cong_ty').parent().find('input[type="file"]').on('change', function () {
    //     $('#doi_anh_dai_dien.thong-tin').data('type','congty').modal('show');
    //     readFile(this);
    // });
    // $('#doi_anh_dai_dien.thong-tin').on('hidden.bs.modal',function () {
    //     let type = $(this).data('type');
    //     switch (type) {
    //         case 'congty':
    //             $('#logo_cong_ty').parent().find('input[type="file"]').val('');
    //             break;
    //         case 'tuyendung':
    //             $('#avatar_tuyen_dung').parent().find('input[type="file"]').val('');
    //             break;
    //     }
    // });
    // $('#doi_anh_dai_dien.thong-tin').find('.modal-footer').find('button:eq(1)#save').on('click',function () {
    //     let __this = $(this);
    //     let elementID = '';
    //     switch ($('#doi_anh_dai_dien.thong-tin').data('type')) {
    //         case 'congty': elementID = '#'+ $('#logo_cong_ty').attr('id');
    //             break;
    //         case 'tuyendung': elementID = '#'+ $('#avatar_tuyen_dung').attr('id');
    //             break;
    //     }
    //     let namePicture = $(elementID).parent().find('input[type="file"]')[0].files[0].name;
    //     $uploadCrop.croppie('result', {
    //         type: 'canvas',
    //         size: 'viewport',
    //     }).then(function (resp) {
    //         let method = 'post';
    //         let url = '/nha-tuyen-dung/set-logo-company';
    //         let data = {
    //                 fileName: resp,
    //                 name: namePicture,
    //         };
    //         sendAjaxNoFunc(method,url,data,__this.attr('id')).done(function (e) {
    //             $(elementID).find('img').attr('src', e.reset[0]).data('data',e.reset[0]);
    //             getHtmlResponse(e);
    //             $('#doi_anh_dai_dien.thong-tin').modal('hide');
    //         })

    //     });
    // });


    //change email
    $('#email').on('focusout',function () {
        let _this = $(this);
        let data = {
            email_nha_tuyen_dung : $(this).val()
        };
        sendAjaxNoFunc('get','/nha-tuyen-dung/confirm-email',data).done(function (res) {
            // console.log('emaildoi',res)
            if($.trim(res.status) == 400){
                getMessageError(_this,res);
            }
        })
    });

    // $('#avatar_tuyen_dung').find('button').eq(0).on('click', function () {
    //     $(this).parent().find('input[type="file"]').trigger('click');

    // });
    // $('#avatar_tuyen_dung').parent().find('input[type="file"]').on('change', function () {
    //     $('#doi_anh_dai_dien.thong-tin').data('type','tuyendung').modal('show');
    //     readFile(this);
    // });
});

$(document).on('click','.save-profile',function () {
    let elementNull = $('.nha-tuyen-dung-container .not-null');
    let error = 0;
    let button = $(this).attr('id');
    error += notNullMessage(elementNull);
    // alert();
    console.log(error)
    if (error == 0){
        let social = [];
        $('.social-link').each(function () {
            social.push($(this).val());
        });
        let method = 'post';
        let url = '/nha-tuyen-dung/update';
        let data = {

            // ho_ten_nhatuyendung : $('#ho_ten').val(),
            email_nhatuyendung : $('#email').val(),
            gioi_tinh_nhatuyendung : $('#gioi_tinh_tuyen_dung').val(),
            dia_chi_nhatuyendung : $('#dia_chi').val(),
            ngay_sinh_nhatuyendung : $('#ngay_sinh_tuyen_dung').val(),
            phone_nhatuyendung : $('#phone_tuyen_dung').val(),
            // avatar_nhatuyendung : $('#avatar_tuyen_dung').find('img').data('data'),
            // gioi_thieu_nhatuyendung : $('#gioi_thieu').val(),
            social_nhatuyendung : social

        };
        // console.log(data)
        sendAjaxNoFunc(method,url,data,button).done(res=>{
            // console.log(res)
            getHtmlResponse(res);
            if (res.status == 200){
                // $('#'+button).attr('disabled','disabled');
                window.location.href = '/nha-tuyen-dung';
            }
        });
    }
});

