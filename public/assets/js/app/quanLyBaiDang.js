$(function () {
    table = getDanhSach();
});

$(document).on('click','.ly-do-tu-choi',function () {
    let __this = $(this);
    let __tRow = __this.parents('tr');
    let datatable = getDataRow_dt(table,__tRow);
    $('#ly-do-tu-choi-modal').find('.modal-body').find('textarea').val(datatable.get_duyet_tin.noi_dung);
    $('#ly-do-tu-choi-modal').modal('show');
});
$(document).on('click','.gui-lai-xac-nhan',function () {
    let __this = $(this);
    let __tRow = __this.parents('tr');
    let datatable = getDataRow_dt(table,__tRow);
    // console.log(datatable);return;
    let ajax = {
        method : "post",
        url : "/bai-viet/gui-lai-xac-nhan",
        data:{
            id :datatable.id
        }
    }
    sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
        getHtmlResponse(e);
        if (e.status == 200){
            db_ajax_reload_all(table);
        }
    });
});
const getDanhSach = () => {
    let ajax = {
        method: 'get',
        url: '/quan-ly-tuyen-dung/quan-ly-bai-dang/get-danh-sach'
    };
    let column = [
        {
            render: function (api, rowIdx, columns, meta) {
                return meta.row + 1;
            }
        },
        {
            data: 'tieu_de',
            className:'text-capitalize'
        },
        {
            data: 'get_chuc_vu.name'
        },
        {
            data: 'get_nha_tuyen_dung.get_tai_khoan.ho_ten'
        },
        {
            data: 'han_bai_viet',
            render: function (api, rowIdx, columns, meta) {
                if (columns.han_bai_viet == null) {
                    return '<span class="text-warning">Bài viết chưa được xác nhận</span>'
                }
                // return moment(columns.han_bai_viet,"YYYY-MM-DD");
                return moment(columns.han_bai_viet).format("DD/MM/YYYY");
            }
        },
        {
            render: function (api, rowIdx, columns, meta) {

                switch (parseInt(columns.status)) {
                    case 1:
                        return '<span class="text-success">Đang tuyển dụng</span>';
                    case 2:
                        return '<span class="text-danger">Đã bị từ chối</span>';
                    case 4:
                        return '<span class="text-danger">Đã tạm ngưng</span>';
                }
                return '<span class="text-warning">Chờ được duyệt</span>';
                // return columns.status;
            }
        },
        {
            render: function (api, rowIdx, columns, meta) {
                let classHide = '';
                let displayGhiChuTuChoi = 'd-none';
                switch (parseInt(columns.status)) {
                    case 0:
                        classHide = 'd-none';
                        break;
                    case 1:
                        classHide = 'd-block';
                        break;
                    case 2:
                        displayGhiChuTuChoi = '';
                        break;
                }

                return '<div class="d-flex center-element" data-id="' + columns.id + '">' +
                    '<a class="waves-effect text-primary mr-1 xem_noi_dung" style="text-decoration: underline" target="_blank" href="/bai-viet/thong-tin&baiviet='+columns.id+'&chitiet=1">Xem Nội dung</a>' +
                    '<button class="btn btn-sm btn-primary waves-effect chinh_sua ' + classHide + '" data-id="' + columns.id + '">Chỉnh sửa</button>' +
                    '<button class="btn btn-sm btn-warning waves-effect gui-lai-xac-nhan ' + displayGhiChuTuChoi + '" data-id="' + columns.id + '">Gửi lại xác nhận</button>' +
                    '<button class="btn btn-sm btn-info waves-effect ly-do-tu-choi ' + displayGhiChuTuChoi + '" data-id="' + columns.id + '">Lý do từ chối</button>' +
                    '</div>';
            }
        },

    ];
    return datatableAjax($('#quan-ly-bai-dang'), ajax, column);

};
