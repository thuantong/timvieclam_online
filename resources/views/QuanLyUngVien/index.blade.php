@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"
              type="text/css">
        <!-- third party css -->
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
        <!-- ION Slider -->
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\ion-rangeslider\ion.rangeSlider.css')}}" rel="stylesheet" type="text/css">
    </head>


    <div id="dat-lich-phong-van-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
         aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="full-width-modalLabel">{{__('Gửi thông báo phỏng vấn cho ứng viên')}}</h4>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                </div>
                <div class="modal-body" style="min-height: 30vh">
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-4">
                            <label>Giờ phỏng vấn</label>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" id="gio-phong-van">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-4">
                            <label>Ngày phỏng vấn</label>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" id="ngay-phong-van">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>--}}
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="save">Gửi thông báo</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div id="ghi-chu-phong-van-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
         aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="full-width-modalLabel">{{__('Ghi chú phỏng vấn')}}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" style="min-height: 30vh">

                </div>

                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="save">Lưu lại</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="chi-tiet-ung-cu-vien-modal" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-full modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="full-width-modalLabel">{{__('Thông tin ứng viên')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    Đang tải...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
{{--                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>--}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản Lý Ứng Viên</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Quản Lý Ứng Viên')}}</h4>
            </div>
        </div>
    </div>
    <div class="row center-element">
        <div class="col-sm-6 col-md-6">
            <div class="row">
{{--                <label class="col-sm-4 col-md-4 text-right">Danh sách:</label>--}}
                <select class="form-control col-sm-12 col-md-12" id="fillter-table-check">
                    <option value=""disabled selected>Chọn Danh sách</option>
                    <option value="1">Danh sách ứng viên đang chờ xác nhận</option>
                    <option value="2">Danh sách ứng viên đã xác nhận</option>
                    <option value="3">Tất cả</option>
                </select>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-box p-1 mb-1 text-center">
                <div class="row">
                    <div class="col-sm-12 col-md-6 for-fillter-table-check cho-xac-nhan">
                        <h4>Danh sách ứng viên chờ xác nhận</h4>
                        <div class="table-responsive">
                            <table class="table datatable-check table-bordered table-hover mb-0"
                                   id="ung-vien-cho-xu-ly">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Tên ứng viên</th>
                                    <th>Công việc ứng tuyển</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 for-fillter-table-check da-xac-nhan">
                        <h4>Danh sách ứng viên phỏng vấn</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0" id="ung-vien-phong-van">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Tên ứng viên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Công việc ứng tuyển</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\responsive.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.flash.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.print.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.keyTable.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.select.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.js')}}"></script>

    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>
    <!-- Ion Range Slider-->
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\ion-rangeslider\ion.rangeSlider.min.js')}}"></script>

    <!-- Range slider init js-->
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\pages\range-sliders.init.js')}}"></script>
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>

    <script type="text/javascript">
        let table = null;
        let table2 = null;

        $(function () {

            // $('#fillter-table-check').val('1').change();
            table = getDanhSachUngVien();
            table2 = getDanhSachPhongVan();
            select2Default($('#fillter-table-check'));
            lichNgay($('#ngay-phong-van'));
            lichGio($('#gio-phong-van'));

            $('#fillter-table-check').on('change', function () {
                // alert();
                let __this = $(this);
                let option = __this.find('option:checked').val();
                switch (parseInt(option)) {
                    case 1://chờ xác nhận
                        $('.for-fillter-table-check').removeClass('col-md-6');
                        $('.for-fillter-table-check').removeClass('d-none');
                        $('.for-fillter-table-check.cho-xac-nhan').addClass('col-md-12');
                        $('.for-fillter-table-check.da-xac-nhan').addClass('col-md-12 d-none');
                        $($.fn.dataTable.tables(true)).DataTable()
                            .columns.adjust();
                        db_ajax_reload_all(table);
                        break;
                    case 2://đã xác nhận
                        $('.for-fillter-table-check').removeClass('col-md-6');
                        $('.for-fillter-table-check').removeClass('d-none');
                        $('.for-fillter-table-check.da-xac-nhan').addClass('col-md-12');
                        $('.for-fillter-table-check.cho-xac-nhan').addClass('col-md-12 d-none');
                        $($.fn.dataTable.tables(true)).DataTable()
                            .columns.adjust();
                        db_ajax_reload_all(table2);

                        break;
                    case 3://tất cả
                        $('.for-fillter-table-check').removeClass('col-md-12');
                        $('.for-fillter-table-check').removeClass('d-none');
                        $('.for-fillter-table-check').addClass('col-md-6');
                        $($.fn.dataTable.tables(true)).DataTable()
                            .columns.adjust();
                        db_ajax_reload_all(table);
                        db_ajax_reload_all(table2);
                        break;
                }
            });
            $('#fillter-table-check').val(1).trigger('change');

            $('#ung-vien-cho-xu-ly tbody').on('click', '.xem-ung-vien', function () {
                let __this = $(this);
                xemChiTietUngVien(__this,table);
            });

            $('#ung-vien-phong-van tbody').on('click', '.xem-ung-vien', function () {
                let __this = $(this);
                xemChiTietUngVien(__this,table2);
            });

            $('#ung-vien-cho-xu-ly tbody').on('click', '.chon-ung-vien', function () {
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table, table_row);
                let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                let idRecord = data.id;
                let nameNguoiTimViec = data.get_nguoi_tim_viec.get_tai_khoan.ho_ten;
                let alertNotify = {
                    title: 'Xác nhận chọn ứng viên ' + nameNguoiTimViec,
                    message: 'Chọn ứng viên vào danh sách phỏng vấn?'
                }
                alertConfirm(alertNotify).then(res => {
                    if (res.value == true) {
                        let ajax = {
                            method: 'get',
                            url: '/nha-tuyen-dung/quan-ly-ung-vien/confirm-danh-sach-phong-van',
                            data: {
                                id: idRecord,
                                name: nameNguoiTimViec
                            }
                        }
                        sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(r => {
                            // console.log(r.reset[0])

                            getHtmlResponse(r);
                            if (r.status == 200) {
                                $('#dat-lich-phong-van-modal').modal('show');
                                $('#dat-lich-phong-van-modal').data('id',idRecord);
                                // db_ajax_reload_page(table);
                                // db_ajax_reload_all(table2);
                            }
                        });

                    }
                });

            });
            //đặt lịch phỏng vấn
            $('#ung-vien-cho-xu-ly tbody').on('click', '.dat-lich-phong-van-ung-vien', function () {
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table, table_row);
                let idRecord = data.id;
                $('#dat-lich-phong-van-modal').modal('show');
                $('#dat-lich-phong-van-modal').data('id',idRecord);
            });

            $('#ung-vien-cho-xu-ly tbody').on('click', '.tu-choi-ung-vien', function () {
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table, table_row);
                // let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                let idRecord = data.id;
                let nameNguoiTimViec = data.get_nguoi_tim_viec.get_tai_khoan.ho_ten;
                let alertNotify = {
                    title: 'Từ chối hồ sơ ứng viên ứng viên ' + nameNguoiTimViec,
                    message: 'Chọn từ chối ứng viên khỏi danh sách phỏng vấn?'
                }
                alertConfirm(alertNotify).then(res => {
                    if (res.value == true) {
                        let ajax = {
                            method: 'get',
                            url: '/nha-tuyen-dung/quan-ly-ung-vien/tu-choi-danh-sach-phong-van',
                            data: {
                                id: idRecord,
                                name: nameNguoiTimViec
                            }
                        }
                        sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(r => {
                            // console.log(r.reset[0])

                            getHtmlResponse(r);
                            if (r.status == 200) {
                                // $('#dat-lich-phong-van-modal').modal('show');
                                // $('#dat-lich-phong-van-modal').data('id',idRecord);
                                db_ajax_reload_all(table);
                                db_ajax_reload_all(table2);
                            }
                        });

                    }
                });

            });
            //chấm đậu -done
            $('#ung-vien-phong-van tbody').on('click', '.chon-ung-vien', function () {
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table2, table_row);

                // let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                let idRecord = data.id;
                let nameNguoiTimViec = data.get_nguoi_tim_viec.get_tai_khoan.ho_ten;
                let alertNotify = {
                    title: 'Chấm đậu ứng tuyển ' + nameNguoiTimViec,
                    message: 'Chấm trúng tuyển cho ứng viên này?'
                }
                alertConfirm(alertNotify).then(res => {
                    if (res.value == true) {
                        let ajax = {
                            method: 'get',
                            url: '/nha-tuyen-dung/quan-ly-ung-vien/trung-tuyen-phong-van',
                            data: {
                                id: idRecord,
                                name: nameNguoiTimViec
                            }
                        }
                        sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(r => {
                            // console.log(r.reset[0])

                            getHtmlResponse(r);
                            if (r.status == 200) {
                                // $('#dat-lich-phong-van-modal').modal('show');
                                // $('#dat-lich-phong-van-modal').data('id',idRecord);

                                db_ajax_reload_all(table2);
                                // db_ajax_reload_all(table2);
                            }
                        });

                    }
                });

            });
            //chấm rớt adhjksadjhashdakjshdaskjdas
            $('#ung-vien-phong-van tbody').on('click', '.tu-choi-ung-vien', function () {
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table2, table_row);
                // let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                let idRecord = data.id;
                let nameNguoiTimViec = data.get_nguoi_tim_viec.get_tai_khoan.ho_ten;
                let alertNotify = {
                    title: 'Chấm rớt cho ứng viên ' + nameNguoiTimViec,
                    message: 'Chấm rớt cho ứng viên khỏi danh sách phỏng vấn?'
                }
                alertConfirm(alertNotify).then(res => {
                    if (res.value == true) {
                        let ajax = {
                            method: 'get',
                            url: '/nha-tuyen-dung/quan-ly-ung-vien/cham-rot-phong-van',
                            data: {
                                id: idRecord,
                                name: nameNguoiTimViec
                            }
                        }
                        sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(r => {
                            // console.log(r.reset[0])

                            getHtmlResponse(r);
                            if (r.status == 200) {
                                // $('#dat-lich-phong-van-modal').modal('show');
                                // $('#dat-lich-phong-van-modal').data('id',idRecord);
                                db_ajax_reload_all(table);
                                db_ajax_reload_all(table2);
                            }
                        });

                    }
                });

            });
            //ghi chú
            $('#ung-vien-phong-van tbody').on('click', '.ghi-chu-ung-vien', function () {

                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table2, table_row);
                // let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                let idRecord = data.id;
                let nameNguoiTimViec = data.get_nguoi_tim_viec.get_tai_khoan.ho_ten;

                $('#ghi-chu-phong-van-modal').modal('show');
                let ajax = {
                    url:"/nha-tuyen-dung/quan-ly-ung-vien/get-ghi-chu",
                    method:"get",
                    data:{
                        id : idRecord
                    },
                }
                sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
                    $('#ghi-chu-phong-van-modal').find('.modal-body').html(e);
                    $(document).on('change', 'select', function () {
                        if ($(this).hasClass('is-invalid')) {
                            $(this).removeClass('is-invalid');
                        }
                    });
                    $('textarea').each(function () {
                        if ($(this).val() == '') {
                            this.setAttribute('style', 'overflow-y:hidden;');
                        } else {
                            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
                        }
                    }).on('input', function () {

                        this.style.height = 'auto';
                        this.style.height = (this.scrollHeight) + 10 + 'px';
                    }).on('keypress', function () {
                        this.style.height = 'auto';
                        this.style.height = (this.scrollHeight) + 15 + 'px';
                    });
                });

            });
            $('#ghi-chu-phong-van-modal .modal-footer #save').on('click',function () {
                let __this = $(this);
                let __parent = __this.parents('.modal');
                let __body = __parent.find('.modal-body');
                let error = 0;
                // error += notNullMessage(__body.find('not-null'));
                let ajax = {
                    method : 'post',
                    url : '/nha-tuyen-dung/quan-ly-ung-vien/luu-ghi-chu',
                    data : {
                        id : __body.find('input#id-action').val(),
                        ghi_chu : __body.find('textarea#ghi-chu-text').val(),
                    },
                }
                sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
                    getHtmlResponse(e);
                    if (e.status == 200){
                        __parent.modal('hide');
                    }
                })
            });



            $('.them-moi-danh-sach').text('Lọc');

            locDanhSach($('#ung-vien-cho-xu-ly_wrapper'));
            locDanhSachPhongVan($('#ung-vien-phong-van_wrapper'))

            $('#ung-vien-cho-xu-ly_wrapper .dropdown-menu .dropdown-item').on('click',function () {
                let id = $(this).data('value');
                let __this = $(this);
                $('.dropdown-item').removeClass('active');
                __this.addClass('active');
                // db_ajax_reload_all(table);
                table.ajax.url('/nha-tuyen-dung/lay-danh-sach-ung-vien?type='+id).load();
                // table.draw();
                // table = getDanhSachUngVien(id);
            });
            $('#ung-vien-phong-van_wrapper .dropdown-menu .dropdown-item').on('click',function () {
                let id = $(this).data('value');
                let __this = $(this);
                $('.dropdown-item').removeClass('active');
                __this.addClass('active');
                // db_ajax_reload_all(table);
                table2.ajax.url('/nha-tuyen-dung/lay-danh-sach-phong-van?type='+id).load();
                // table.draw();
                // table = getDanhSachUngVien(id);
            })

            $('#dat-lich-phong-van-modal').find('.modal-footer #save').on('click',function () {
                let __this = $(this);
                let __parent = __this.parents('.modal');
                let idRecord = __parent.data('id');
                let ajax = {
                    method:'post',
                    url:"/nha-tuyen-dung/quan-ly-ung-vien/dat-lich-phong-van",
                    data:{
                        id : idRecord,
                        ngay:__parent.find('#ngay-phong-van').val(),
                        gio :__parent.find('#gio-phong-van').val()
                    }
                }
                sendAjaxNoFunc(ajax.method, ajax.url,ajax.data,__this.attr('id')).done(e=>{
                    console.log(e);
                    getHtmlResponse(e);
                    if (e.status == 200) {
                        __parent.modal('hide');
                        db_ajax_reload_all(table);
                        db_ajax_reload_all(table2);
                    }

                });

            });
        });

        const xemChiTietUngVien = (element,dt_table)=>{
            let table_row = element.parents('tr');
            let data = getDataRow_dt(dt_table, table_row);
            // console.log(data);
            let idNguoiTimViec = data.get_nguoi_tim_viec.id;
            // console.log(data)
            let ajax = {
                method: 'get',
                url: '/nguoi-tim-viet/chi-tiet',
                data: {
                    id: idNguoiTimViec
                }
            }
            $('#chi-tiet-ung-cu-vien-modal').modal('show');
            sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(e => {

                $('#chi-tiet-ung-cu-vien-modal .modal-content .modal-body').html(e)

                $('.skill_append').ionRangeSlider({
                    skin: 'round',
                    from: $(this).data('value'),
                    from_fixed: true,
                });

            });
        }
        const getDanhSachUngVien = () => {

            let ajax = null;
            let newType = $('#ung-vien-cho-xu-ly_wrapper #loc-danh-sach').find('option:checked').val();
                ajax = {
                    method: 'get',
                    url: '/nha-tuyen-dung/lay-danh-sach-ung-vien',

                }

            let column = [
                {
                    render: function (api, rowIdx, columns, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        return '<img src="/' + columns.get_nguoi_tim_viec.avatar + '" style="width:50px;height:50px">';
                    },
                    className: 'pr-1 pl-1 text-center'
                },
                {
                    data: 'get_nguoi_tim_viec.get_tai_khoan.ho_ten'
                },

                {
                    data: 'get_bai_tuyen_dung.tieu_de'
                },

                {
                    render: function (api, rowIdx, columns, meta) {
                        switch (parseInt(columns.status)) {
                            case 0:
                                return '<span class="text-warning">Mới ứng cử</span>';
                            // break;
                            case 1:
                                return '<span class="text-warning">Chờ xác nhận phỏng vấn</span>';
                            // break;
                            case 2:
                                return '<span class="text-success">Phỏng vấn</span>';
                            case 3:
                                return '<span class="text-danger">Đã từ chối</span>';
                            case 4:
                                return '<span class="text-success">Trúng tuyển</span>';
                            case 5:
                                return '<span class="text-danger">Đã loại</span>';
                            // break;
                        }
                    },
                    className: 'pr-1 pl-1 text-center'
                },


                {
                    render: function (api, rowIdx, columns, meta) {
                        let displayNone = null;
                        let displayNoneDatLich = 'd-none';
                        if (columns.status != 0){
                            displayNone = 'd-none';
                        }
                        if (columns.status == 1 && columns.thoi_gian_phong_van == null  && columns.ngay_phong_van == null){
                            displayNoneDatLich = null;
                        }
                        return '<div class="" style="display: block">' +
                            '<button class="btn btn-warning btn-sm waves-effect xem-ung-vien">Xem chi tiết' +
                            '</button>' +
                            '<button class="btn btn-primary btn-sm waves-effect chon-ung-vien text-center '+displayNone+'"><span>Chọn</span>' +
                            '</button>' +
                            '<button class="btn btn-light btn-sm waves-effect tu-choi-ung-vien '+displayNone+'">Từ chối' +
                            '</button>' +
                            '<button class="btn btn-light btn-sm waves-effect dat-lich-phong-van-ung-vien '+displayNoneDatLich+'">Đặt lịch phỏng vấn' +
                            '</button>' +
                            '</div>'
                    },
                    className: 'pl-1 pr-1'
                }
            ];
            return datatableAjax($('#ung-vien-cho-xu-ly'), ajax, column);
        }
        const locDanhSach = (e)=>{
            let parentNUT =  e.find('.them-moi-danh-sach').parent();
            e.find('.them-moi-danh-sach').addClass('dropdown-toggle waves-effect waves-light').data('toggle','dropdown');
            parentNUT.html(ungVienChoXuLy());
        }
        const locDanhSachPhongVan = (e)=>{
            let parentNUT =  e.find('.them-moi-danh-sach').parent();
            e.find('.them-moi-danh-sach').addClass('dropdown-toggle waves-effect waves-light').data('toggle','dropdown');
            parentNUT.html(ungVienPhongVan());
        }
        const ungVienChoXuLy = ()=>{
            // return '<select id="loc-danh-sach"><option value="0">Chờ xử lý</option><option value="-1">Tất cả</option></select>'
            return '<div class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Lọc danh sách <i class="fa fa-th"></i></div>' +
                '<div class="dropdown-menu">\n' +
                '                                            <a class="dropdown-item" data-value="0">Chờ xử lý</a>\n' +
                '                                            <a class="dropdown-item" data-value="-1">Tất cả</a>\n' +
                '                                        </div>'
        }
        const ungVienPhongVan= ()=>{
            // return '<select id="loc-danh-sach"><option value="0">Chờ xử lý</option><option value="-1">Tất cả</option></select>'
            return '<div class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Lọc danh sách <i class="fa fa-th"></i></div>' +
                '<div class="dropdown-menu">\n' +
                '                                            <a class="dropdown-item" data-value="2">Phỏng vấn</a>\n' +
                '                                            <a class="dropdown-item" data-value="-1">Tất cả</a>\n' +
                '                                        </div>'
        }
        const getDanhSachPhongVan = () => {
            let ajax = {
                method: 'get',
                url: '/nha-tuyen-dung/lay-danh-sach-phong-van'
            }
            let column = [
                {
                    render: function (api, rowIdx, columns, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        return '<img src="/' + columns.get_nguoi_tim_viec.avatar + '" style="width:50px;height:50px">';
                    },
                    className: 'pr-1 pl-1 text-center'
                },
                {
                    data: 'get_nguoi_tim_viec.get_tai_khoan.ho_ten'
                },

                {
                    data: 'get_nguoi_tim_viec.get_tai_khoan.email'
                },
                {
                    data: 'get_nguoi_tim_viec.get_tai_khoan.phone'
                },
                {
                    data: 'get_bai_tuyen_dung.tieu_de'
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        switch (parseInt(columns.status)) {
                            case 0:
                                return '<span class="text-warning">Mới ứng cử</span>';
                            // break;
                            case 1:
                                return '<span class="text-warning">Chờ xác nhận phỏng vấn</span>';
                            // break;
                            case 2:
                                return '<span class="text-success">Phỏng vấn</span>';
                            case 3:
                                return '<span class="text-danger">Đã từ chối</span>';
                            case 4:
                                return '<span class="text-success">Trúng tuyển</span>';
                            case 5:
                                return '<span class="text-danger">Đã loại</span>';
                            // break;
                        }
                    },
                    className: 'pr-1 pl-1 text-center'
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        let displayNone = 'd-none';
                        if (columns.status == 2){
                            displayNone = '';
                        }
                        return '<div class="" style="display: block">' +
                            '<button class="btn btn-warning btn-sm waves-effect xem-ung-vien">Xem chi tiết' +
                            '</button>' +
                            '<button class="btn btn-primary btn-sm waves-effect chon-ung-vien text-center '+displayNone+'">Chấm Đậu' +
                            '</button>' +
                            '<button class="btn btn-light btn-sm waves-effect tu-choi-ung-vien '+displayNone+'">Chấm Rớt' +
                            '</button>' +
                            '<button class="btn btn-info btn-sm waves-effect ghi-chu-ung-vien '+displayNone+'">Ghi Chú' +
                            '</button>' +
                            '</div>'
                    },
                    className: 'pl-1 pr-1'
                }
            ];
            return datatableAjax($('#ung-vien-phong-van'), ajax, column);
        }
    </script>
@endpush
