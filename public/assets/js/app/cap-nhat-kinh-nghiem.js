// const nopDonUngTuyen = async ()=>{
    // let __this = $(this);
    $(document).on('click','#nopDonUngTuyen',async function () {
        let kinh_nghiem_array =[];
        $('#exp-list li').each(function () {
            let item = {};
            item.from_date = $(this).find('.time-exp').find('b').eq(0).text();
            item.to_date = $(this).find('.time-exp').find('b').eq(1).text();
            item.tenCtyVaChucVu = $(this).find('.company-name-exp').text();
            item.websites = $(this).find('.company-link-exp').text();
            item.mo_ta = $(this).find('.description-exp').text();
            kinh_nghiem_array.push(item);
            // time-exp
        });
        await $('#kinh-nghiem-lam-viec').val(JSON.stringify(kinh_nghiem_array));

        let dataConfirm = {
            message : "Bạn muốn xác nhận nộp đơn ứng tuyển này?",
            title : "Xác nhận nộp đơn xin việc"
        }
        alertConfirm(dataConfirm).then(result => {
            // console.log('reeeee',result)
            if (result.value == true) {
                $('#form-buoc-hai').submit();
            }
        })
    })


    // console.log(hrefAtribute)
// }
//cập nhật modal kinh nghiệm
$(document).on('click', '#modal-cap-nhat-exp .modal-footer #save-exp', function () {

    let error = 0;
    let index = $('#modal-cap-nhat-exp').find('input').eq(0).val();
    let ten_cong_ty = $('#modal-cap-nhat-exp').find('input').eq(1).val();
    let ten_chuc_vu = $('#modal-cap-nhat-exp').find('input').eq(2).val();

    let cong_ty_chuc_vu = ten_cong_ty + " - " + ten_chuc_vu;
    let trang_web = $('#modal-cap-nhat-exp').find('input').eq(3).val();
    let exp_from = $('#modal-cap-nhat-exp').find('input').eq(4).val();
    let exp_to = $('#modal-cap-nhat-exp').find('input').eq(5).val();
    let mo_ta = $('#modal-cap-nhat-exp').find('textarea').val();


    $('#modal-cap-nhat-exp').find('input').not('input[type="hidden"]').each(function () {
        if ($(this).val() == '') {
            $(this).addClass('is-invalid');
            $(this).parent().find('.invalid-feedback strong').text($(this).attr('title') + ' ' + 'không được để trống');
            error++;
        }
    });
    if (mo_ta == '') {
        $('#modal-cap-nhat-exp').find('textarea').addClass('is-invalid');
        $('#modal-cap-nhat-exp').find('textarea').parent().find('.invalid-feedback strong').text($('#modal-cap-nhat-exp').find('textarea').attr('title') + ' ' + 'không được để trống');
        error++;
    }

    if (error == 0) {
        let kieu_modal = $('#modal-cap-nhat-exp').data('kieu');
        // console.log('daaaaa',kieu_modal)
        switch (kieu_modal) {
            case 'themmoi':
                let data = {
                    exp_from :exp_from,
                    exp_to:exp_to,
                    cong_ty_chuc_vu:cong_ty_chuc_vu,
                    trang_web:trang_web,
                    mo_ta :mo_ta.replace(/\n/g, '<br>')
                }

                getHtmlExpNew(data,0).done(res => {

                    $('#add-new-exp').parents('#about-me-exp').find('ul').append(res);
                    $('#modal-cap-nhat-exp').modal('hide');
                });
                break;
            case 'capnhat':
                $('#modal-cap-nhat-exp').modal('hide');
                $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(0).text(exp_from);
                $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(1).text(exp_to);

                $('#exp-list').find('li').eq(index).find('.company-name-exp').text(cong_ty_chuc_vu);

                $('#exp-list').find('li').eq(index).find('.company-link-exp').text(trang_web);
                $('#exp-list').find('li').eq(index).find('.description-exp').html(mo_ta.replace(/\n/g, '<br>'));
                break

        }

        // index
        // $('#modal-cap-nhat-exp').modal('hide');
        // $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(0).text(exp_from);
        // $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(1).text(exp_to);
        //
        // $('#exp-list').find('li').eq(index).find('.company-name-exp').text(cong_ty_chuc_vu);
        //
        // $('#exp-list').find('li').eq(index).find('.company-link-exp').text(trang_web);
        // $('#exp-list').find('li').eq(index).find('.description-exp').html(mo_ta.replace(/\n/g, '<br>'));
    }

    // console.log(mo_ta.replace(/\n/g, '<br>'))
});
//hết phần kinh nghiệm

//nút cập nhật mở modal kinh nghiệm
$(document).on('click', '.cap-nhat-exp', function () {
    $('#modal-cap-nhat-exp').modal('show');
    $('#modal-cap-nhat-exp').data('kieu','capnhat');

    let index = $(this).parents('li').index();
    let exp_from = $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(0).text();
    let exp_to = $('#exp-list').find('li').eq(index).find('.time-exp').find('b').eq(1).text();
    let index_gach = $('#exp-list').find('li').eq(index).find('.company-name-exp').text().indexOf('-');
    let ten_cong_ty = $('#exp-list').find('li').eq(index).find('.company-name-exp').text().substr(0, index_gach).trim();
    let ten_chuc_vu = $('#exp-list').find('li').eq(index).find('.company-name-exp').text().substr(index_gach + 1).trim();
    let trang_web = $('#exp-list').find('li').eq(index).find('.company-link-exp').text();
    let mo_ta = $('#exp-list').find('li').eq(index).find('.description-exp').html().replace(/<br>/g, '\n');
    // $('#exp-list').find('li').eq(index).find('.description-exp').html(mo_ta.replace(/\n/g, '<br>'));

    // console.log(index)
    $('#modal-cap-nhat-exp').find('input').eq(0).val(index);
    $('#modal-cap-nhat-exp').find('input').eq(1).val(ten_cong_ty);
    $('#modal-cap-nhat-exp').find('input').eq(2).val(ten_chuc_vu);
    $('#modal-cap-nhat-exp').find('input').eq(3).val(trang_web);
    $('#modal-cap-nhat-exp').find('input').eq(4).val(exp_from);
    $('#modal-cap-nhat-exp').find('input').eq(5).val(exp_to);
    $('#modal-cap-nhat-exp').find('textarea').val(mo_ta);

});

//thêm một kinh nghiệm
$(document).on('click', '#add-new-exp', function () {
    $('#modal-cap-nhat-exp').modal('show');
    $('#modal-cap-nhat-exp').data('kieu','themmoi');
    $('#modal-cap-nhat-exp').find('input,textarea').not('.from-date-exp,.to-date-exp').val('')

});

//phần kinh nghiệm
const getHtmlExpNew = (data,type) => {
    return $.ajax({
        method: 'get',
        url: '/nguoi-tim-viec/project-view/get-exp-html',
        data: {
            type: type,
            data:data
        },
    });
};

//modal kinh nghiệm
$(document).on('shown.bs.modal', '#modal-cap-nhat-exp', function () {
    $(this).find('.modal-body').find('input').eq(1).select();
    lichThang($(this).find('.modal-body').find('#thoi-gian-bat-dau'));
    lichThang($(this).find('.modal-body').find('#thoi-gian-ket-thuc'));

});

//xóa 1 kinh nghiệm
$(document).on('click', '.xoa1-exp', function () {
    $(this).parents('li').remove();
});
