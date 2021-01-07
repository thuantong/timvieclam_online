
$(function () {
    $('#modal-nop-don #gioi_tinh').select2({
        dropdownParent: $('#modal-nop-don')
    });
    lichNgay($('#modal-nop-don #ngay_sinh'));
    $("#modal-nop-don #ngay_sinh").datepicker("setDate", "1/1/1990");
    $('#call-modal-nop-don').on('click', function () {
        $('#modal-nop-don').modal('show')
    });
    //nút next hồ sơ
    $('#modal-nop-don #luu-nop-ho-so,#modal-nop-don #tab-nop-don-header.form-wizard-header li.nav-item').on('click', function (e) {
        let error = 0;
        let __this = $(this);
        error += parseInt(notNullMessage($('#modal-nop-don #tab-nop-don.tab-content .tab-pane.active .not-null')));
        if ($('#modal-nop-don #tab-nop-don.tab-content .tab-pane.active').find('input#allow-see-infomation').length > 0) {
            if ($('#modal-nop-don #tab-nop-don.tab-content .tab-pane.active').find('input#allow-see-infomation').is(':checked') == false) {
                $('#modal-nop-don #tab-nop-don.tab-content .tab-pane.active').find('input#allow-see-infomation').addClass('is-invalid').parent().find('span.invalid-feedback').find('strong').text('Bạn phải đồng ý điều khoản này');
                error += 1;
                // return false;
            }
        }

        // console.log('lỗi nhiều quá',notNullMessage($('#modal-nop-don #tab-nop-don.tab-content .tab-pane.active .not-null')))
        if (error == 0) {
            if ($('#modal-nop-don #tab-nop-don.tab-content .tab-pane.active').find('.ajax-nop-don').length) {
                //check tab2

                if ($('#modal-nop-don #tab-nop-don.tab-content .tab-pane.active').find('ul#exp-list li').length == 0) {
                    $('#modal-nop-don .modal-footer').find('span').removeClass('d-none').text('Bạn phải thêm kinh nghiệm làm việc (học vấn)!!');
                    return false;
                } else {
                    $('#modal-nop-don .modal-footer').find('span').addClass('d-none').text('ok!!');
                    let kinh_nghiem_array = [];
                    let project_array = [];
                    $('#modal-nop-don .modal-body #exp-list li').each(function () {
                        let item = {};
                        item.from_date = $(this).find('.time-exp').find('b').eq(0).text();
                        item.to_date = $(this).find('.time-exp').find('b').eq(1).text();
                        item.tenCtyVaChucVu = $(this).find('.company-name-exp').text();
                        item.websites = $(this).find('.company-link-exp').text();
                        item.mo_ta = $(this).find('.description-exp').text();
                        kinh_nghiem_array.push(item);
                        // time-exp
                    });
                    $('#modal-nop-don .modal-body #table-project tbody tr').each(function () {
                        let item = {};
                        item.id = $(this).find('td').eq(0).text();
                        item.project_name = $(this).find('.project-name').text();
                        item.project_from = $(this).find('.project-from').text();
                        item.project_to = $(this).find('.project-to').text();
                        item.project_status = $(this).find('.project-status').data('id');
                        item.project_links = $(this).find('.project-links').text();
                        project_array.push(item);
                        // time-exp
                    });
                    let ajax = {
                        method: 'post',
                        url: '/nop-don-ung-tuyen',
                        data: {
                            id_bai_viet: idBaiTuyenDung,
                            ho_ten: $('#modal-nop-don .modal-body #ho_ten').val(),
                            gioi_tinh: $('#modal-nop-don .modal-body #gioi_tinh').val(),
                            ngay_sinh: $('#modal-nop-don .modal-body #ngay_sinh').val(),
                            so_dien_thoai: $('#modal-nop-don .modal-body #so_dien_thoai').val(),
                            dia_chi: $('#modal-nop-don .modal-body #dia_chi').val(),
                            check: $('#modal-nop-don .modal-body #allow-see-infomation:checked').length,
                            kinh_nghiem: kinh_nghiem_array,
                            projects: project_array,
                        },
                    }
                    // console.log('cacacx',project_array)
                    $('#progressbarwizard').bootstrapWizard('previous');
                    alertConfirm({ title: 'Xác nhận ứng tuyển', message: 'Bạn muốn ứng tuyển công việc này?' }).then(value => {

                        if (value.value == true) {
                            // console.log('data sen',ajax);
                            // return;
                            sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(function (r) {
                                // console.log('datares',r);
                                let iddonxinviec = r;

                                // return;
                                $.ajax({
                                    method: 'post',
                                    url: '/nguoi-tim-viet/upload-file-multiple?type=1&don_xin_viec=' + iddonxinviec,//xac nhan up
                                    data: formDataFileUpload,
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    processData: false,
                                    contentType: false,
                                }).done(e => {
                                getHtmlResponse(e);

                                    if (e.status == 200) {
                                        $('#progressbarwizard').bootstrapWizard('next');
                                        $('#modal-nop-don').find('.modal-body .wizard .previous').remove();
                                        if ($('body').find('.call-modal-nop-don').length) {
                                            $('.call-modal-nop-don').removeClass('btn-outline-warning');
                                            $('.call-modal-nop-don').addClass('btn-warning');
                                            $('.call-modal-nop-don').addClass('like-animation');
                                            $('.call-modal-nop-don').find('i').text('Đã ứng tuyển');
                                            $('.call-modal-nop-don').removeAttr('id');
                                        }
                                        setTimeout(function () {
                                            $('#modal-nop-don').modal('hide');
                                        }, 4000);
                                    } else if (e.status == 401) {
                                        vtoast.show(r.title, r.message, {
                                            width: 250,
                                            margin: 20,
                                            "progressbar": "bottom",
                                            color: "#FFFFFF",
                                            backgroundcolor: '#cb4745',
                                            unfocusduration: 500,
                                            "duration": 1500,
                                            opacity: "1"
                                        });
                                        $('#modal-nop-don').modal('hide');

                                    }
                                });



                            });
                        } else {
                            return false;
                        }
                    })

                    // console.log('bắt đầu gửi ajax',ajax.data);
                }

            }
        } else {
            console.log(error);
            return false;
        }

    });

    $('#modal-nop-don #tab-nop-don-header.form-wizard-header li.nav-item:eq(2)').on('click', function () {
        return false;
    });

    $('#modal-nop-don .modal-body #allow-see-infomation').on('change', function () {
        // console.log($(this).is(":checked"))
        if ($(this).is(":checked") == true) {
            $(this).removeClass('is-invalid');
        }
    });

    $('#modal-cap-nhat-exp').on('hidden.bs.modal', function () {
        $('#modal-nop-don .modal-footer').find('span').addClass('d-none').text('ok!!');
    });

})
