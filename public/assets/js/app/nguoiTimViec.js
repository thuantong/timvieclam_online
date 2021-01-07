const skill_view = (type) => {
    let method = 'get';
    let url_send = '/user-skill-view-append';
    return $.ajax({
        method: method,
        url: url_send,
        data: {type: type}
    });
};


let idsr = [];


$(function () {
    $(window).scrollTop(0);
    $('select#khu_vuc').select2();
    $("#muc_luong_from").TouchSpin({
        prefix: 'Từ<span style="color: #e9ecef!important;">...</span>',
        postfix: 'Triệu(đ)',
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    })
    $("#muc_luong_to").TouchSpin({
        prefix: 'Đến',
        postfix: 'Triệu(đ)',
        buttondown_class: "btn btn-primary",
        buttonup_class: "btn btn-primary"
    })

    //end lich
    lichNgay($('#ngay_sinh'));

    //lấy dữ liệu bảng kỹ năng
    skill_view(1).done(res => {
        // console.log('cc',res);
        $('#render-skill.card-box').append(res);
    }).then(function (b) {
        $('.skill_append').ionRangeSlider({
            skin: 'round',
            from: $(this).data('value'),
            from_fixed: false,
        });
    });
    // //lấy dữ liệu bảng kinh nghiệm
    // getHtmlExpNew(1).done(res => {
    //     $('#about-me-exp').find('ul').append(res);
    // });

    // //lấy dữ liệu bảng dự án
    // setTRowProject(0, 1).done(res => {
    //     // console.log('tr',res);
    //     $('#table-project').find('tbody').append(res);
    // });
    $('#gioi_tinh,.hoc_van,.loai_cong_viec').select2();

    //thêm kỹ năng
    $('#add-new-skill').on('click', function () {
        skill_view(0).done(res => {
            $(this).parents('.card-box').append(res);
        }).then(function (b) {
            $('.skill_append:last').ionRangeSlider({
                skin: 'round',
                from: 10,
                from_fixed: false,
                onStart: function (data) {
                    data.input.parent().find('.skill_value').text(data.from);
                },
            });

        });
    });

});

//đổi điểm tăng chữ ở span
$(document).on('change', '.skill_append', function () {
    $(this).parent().find('.skill_value').text($(this).val());
});

//xóa một kỹ năng
$(document).on('click', '.remove-skill', function () {
    $(this).parents('.pt-1.skill').remove();
});

//nút không lưu
$(document).on('click', '.cancel-profile', function () {
    window.location.href = '/nguoi-tim-viec';

});

//nút lưu cập nhật hồ sơ
$(document).on('click', '.save-profile', function () {
    let __this = $(this);
    let gt_ban_than = $('#user_gioi_thieu').find('textarea').val()//giới thiệu bản thân
    let so_dien_thoai = $('input.phone').val();//số điện thoại
    let dia_chi_email = $('input.email').val();//email
    let ho_ten = $('input#ho_ten').val();//họ và tên
    let gioi_tinh = $('select#gioi_tinh').val();//giới tính
    let ngay_sinh = $('input#ngay_sinh').val();//ngày sinh
    let muc_tieu_nghe_nghiep = $('textarea#muc_tieu_nghe_nghiep').val();//mục tiêu nghề nghiệp
    let so_thich = $('textarea#so_thich').val();//sở thích
    let dia_chi = $('input#dia_chi').val();//địa chỉ
    let vt_ung_tuyen = $('input#vt_ung_tuyen').val();//vị trí ứng tuyển
    let khu_vuc = $('select#khu_vuc').val();//khu vực
    //không lấy
    let muc_luong_from = $('input#muc_luong_from').val();
    let muc_luong_to = $('input#muc_luong_to').val();
    //end không lấy
    let muc_luong = muc_luong_from + " - " + muc_luong_to;
    let hoc_van = $('select#hoc_van').val();
    let ten_truong_tot_nghiep = $('input#ten_truong_tot_nghiep').val();
    let loai_cong_viec = $('select#loai_cong_viec').val();
    let ten_cong_viec = $('input#ten_cong_viec').val();
    let all_skills = [];//array skill
    let all_social = [];
    let all_exp = [];//kinh nghiệm
    let all_projects = [];
    let error = 0;
    //phần tạo mảng kỹ năng
    if ($('.pt-1.skill').length > 0) {
        $('.pt-1.skill').each(function () {

            if ($(this).find('.skill-name').val() == '') {
                $(this).find('.skill-name').addClass('is-invalid');
                error++;
            } else {
                let item = {};
                item.name = $(this).find('.skill-name').val();
                item.diem = $(this).find('.skill_value').text();
                all_skills.push(item)
            }
        });
    }

    //phần tạo mảng mạng xã hội
    $('.social-link').each(function () {

        all_social.push($(this).val());

    });

    //phần tạo mảng kinh nghiệm làm việc
    if ($('#exp-list').find('li').length > 0) {
        $('#exp-list').find('li').each(function () {
            let item = {};
            item.tenCtyVaChucVu = $(this).find('.company-name-exp').text();
            item.websites = $(this).find('.company-link-exp').text();
            item.from_date = $(this).find('.time-exp').find('b').eq(0).text();
            item.to_date = $(this).find('.time-exp').find('b').eq(1).text();
            item.mo_ta = $(this).find('.description-exp').html().replace(/<br>/g, '\n');
            all_exp.push(item);
        });
    }

    //phần tạo mảng project
    if ($('#table-project').find('tbody').find('tr').length > 0) {
        $('#table-project').find('tbody').find('tr').each(function () {
            let item = {};
            item.id = $(this).find('td').eq(0).text();
            item.project_name = $(this).find('.project-name').text();
            item.project_from = $(this).find('.project-from').text();
            item.project_to = $(this).find('.project-to').text();
            item.project_status = $(this).find('.project-status').data('id');
            item.project_links = $(this).find('.project-links').text();
            all_projects.push(item);
        });
    }
    error += notNullMessage($('#nguoi-tim-viec-container .not-null'));
    // console.log(error)
    if (error == 0) {

        // $('.save-profile,.cancel-profile').addClass('d-none');
        let ajax = {
            method: 'post',
            url: '/nguoi-tim-viec/update',
            data: {
                gt_ban_than: gt_ban_than,
                so_dien_thoai: so_dien_thoai,
                dia_chi_email: dia_chi_email,
                ho_ten: ho_ten,
                gioi_tinh: gioi_tinh,
                ngay_sinh: ngay_sinh,
                muc_tieu_nghe_nghiep: muc_tieu_nghe_nghiep,
                so_thich: so_thich,
                dia_chi: dia_chi,
                vt_ung_tuyen: vt_ung_tuyen,
                khu_vuc: khu_vuc,
                muc_luong: muc_luong,
                hoc_van: hoc_van,
                ten_truong_tot_nghiep: ten_truong_tot_nghiep,
                loai_cong_viec: loai_cong_viec,
                ten_cong_viec: ten_cong_viec,
                all_skills: all_skills,
                all_social: all_social,
                all_exp: all_exp,
                all_projects: all_projects,
                status_jobs: $('#status-jobs').find('option:checked').val(),
            },
        };
        // console.log('data ngtk', ajax.data);
        // return false;
        sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,__this.attr('id')).done(r=>{
            // console.log(r)
            getHtmlResponse(r);
            if (r.status == 200){
                window.location.href = '/nguoi-tim-viec';
            }
        });

    }


});
