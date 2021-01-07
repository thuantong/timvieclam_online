@extends('Admin.index')
@section('content')
    <head>
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
              rel="stylesheet">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"
              type="text/css">
        <!-- third party css -->
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet"
              type="text/css">

        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\switchery\switchery.min.css')}}" rel="stylesheet" type="text/css">

        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    @include('Admin.QuanLyTaiKhoan.themMoiTaiKhoan')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Quản trị viên</a></li>
                        <li class="breadcrumb-item active">Quản lý tài khoản</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Quản lý tài khoản')}}</h4>
            </div>
        </div>
    </div>

    <div class="row quan-ly-tai-khoan-container">
        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 pr-0">
            <div class="card-box p-1 mb-1">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0 nowrap datatable-check" id="danh-sach-tai-khoan">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên tài khoản</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Họ và Tên</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Chức năng</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 pl-0">
            <div class="card-box p-1 mb-1">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="bg-light w-100 text-center"><h5>Phân quyền</h5></label>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="w-100">
                                    <div class="form-group row overflow-y-auto container-body" id="get-phan-quyen">

                                    </div>
                                    <div class="form-group row container-footer">
                                        <div class="col-sm-12 col-md-12">
{{--                                            <button class="btn btn-primary check-all" id="check-all">Chọn tất cả</button>--}}
                                            <button class="btn btn-success save-tac-vu" id="save-tac-vu">Lưu lại</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\switchery\switchery.min.js')}}"></script>
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>


    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>

    <script type="text/javascript">
        let table = null;
        /**
         * lấy danh tài khoản
         * @returns {*}
         */
        const getDataTaiKhoan = () => {
            let ajax = {
                method: 'get',
                url: '/admin/danh-sach-tai-khoan/get-data',
            }
            let column = [
                {
                    render: function (api, rowIdx, columns, meta) {
                        return meta.row + 1;
                    },
                    className: 'text-primary text-center'
                },
                {
                    data: 'ho_ten'
                },
                {
                    data: 'email'
                },
                {
                    data: 'ho_ten'
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        return getTrangThaiTaiKhoan(columns.status)
                    },
                    className: 'text-center'
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        let khoaTaiKhoanD = 'd-none';
                        let moKhoaTaiKhoanD = 'd-none';
                        if (columns.status == 2){
                            moKhoaTaiKhoanD = '';
                        }else{
                            khoaTaiKhoanD = ''
                        }
                        return '<button class="btn btn-sm btn-danger khoa-tai-khoan '+khoaTaiKhoanD+'" data-action="'+columns.id+'">Khóa tài khoản</button><button class="btn btn-sm btn-light mo-khoa-tai-khoan '+moKhoaTaiKhoanD+'" data-action="'+columns.id+'">Mở khóa</button>'
                    },
                    className: 'text-center'
                }
            ];
            return datatableAjax($('#danh-sach-tai-khoan'), ajax, column);
        };

        /**
         * Lấy tác vụ
         * @param data
         */
        const getPhanQuyen = (data) => {
            let ajax = {
                method : "get",
                url : "/admin/danh-sach-tai-khoan/get-phan-quyen",
                data : {
                    data : data
                }
            }

            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(r=>{
                console.log(r)
                $('.container-body#get-phan-quyen').html(r);
                switcheryInit();
                setHeightBody();
                // checkTacVuChecked();
            });
        }

        /**
         * set chiều cao left side
         */
        const setHeightBody = ()=>{
            if (checkIsDeviceMedium() == true){
                let chieuCaoContent = $('.quan-ly-tai-khoan-container').height();
                let chieuCaoHeader = $('.container-header').height();
                let chieuCaoFooter = $('.container-footer').height();
                let chieuCaoBody = parseFloat(chieuCaoContent) - parseFloat(chieuCaoHeader) - parseFloat(chieuCaoFooter) ;
                // console.log('content',chieuCaoContent,'header',chieuCaoHeader,'footer',chieuCaoFooter,'body',chieuCaoBody)
                $('.container-body').css('max-height',chieuCaoBody- parseFloat(60)+'px');
            }

        }

        $(document).on('click','.them-moi-danh-sach',function () {
            $('#modal-them-moi-tai-khoan').modal('show');
        });
        $(document).on('click','#modal-them-moi-tai-khoan .modal-footer #save',function () {
            let __this = $(this);
            let __body = $('#modal-them-moi-tai-khoan .modal-body');
            let ajax = {
                method:'post',
                url : '/go-dang-ky',
                data : {
                    name : __body.find('#name'),
                    email : __body.find('#email'),
                    phone : __body.find('#phone'),
                    password : __body.find('#password'),
                    password_confirmation : __body.find('#password-confirm'),
                    type : __body.find('[type="radio"]:checked').val(),
                    ajaxCheck : 1
                }
            }
            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(r =>{
                console.log(r)
            })
        });
//main
        $(document).on('click','#save-tac-vu',function () {

            let __this = $(this);
            let idQuyen = $('#get-phan-quyen').find('input:checked').data('action');
            let idTK = $('#get-phan-quyen').find('#action-phan-quyen').val();
            let ajax ={
                method:'post',
                url:'/admin/danh-sach-tai-khoan/set-phan-quyen',
                data : {
                    idQuyen : idQuyen,
                    idTK:idTK
                }
            }
            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
                console.log(e);
                getHtmlResponse(e);
                if(e.status == 200){
                    db_ajax_reload_all(table);
                }
            })
            console.log()
        })
        $(function () {
            table = getDataTaiKhoan();

            /**
             * Click vào trow datatable
             */
            $('#danh-sach-tai-khoan tbody').on('click', 'tr', function () {
                var data = table.row(this).data();
                let __this = $(this);
                // console.log(data)
                $('#danh-sach-tai-khoan tbody').find('tr').removeClass('bg-light');
                __this.addClass('bg-light');
                getPhanQuyen(data);

            });

            $('#danh-sach-tai-khoan tbody').on('click', '.khoa-tai-khoan', function () {
                // alert('cc');
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table, table_row);
                // console.log(data)
                // return;
                // let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                let idRecord = data.id;
                let nameUSER = data.ho_ten;
                let alertNotify = {
                    title: 'Khóa tài khoản ' + nameUSER,
                    message: 'Chọn tạm khóa tài khoản này?'
                }
                alertConfirm(alertNotify).then(res => {
                    if (res.value == true) {
                        let ajax = {
                            method: 'post',
                            url: '/admin/danh-sach-tai-khoan/khoa-tai-khoan',
                            data: {
                                id: idRecord,
                                name: nameUSER
                            }
                        }
                        sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(r => {
                            // console.log(r.reset[0])

                            getHtmlResponse(r);
                            if (r.status == 200) {
                                db_ajax_reload_all(table);

                            }
                        });

                    }
                });

            });
            $('#danh-sach-tai-khoan tbody').on('click', '.mo-khoa-tai-khoan', function () {
                // alert('cc');
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table, table_row);
                // console.log(data)
                // return;
                // let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                let idRecord = data.id;
                let nameUSER = data.ho_ten;
                let alertNotify = {
                    title: 'Mở khóa tài khoản ' + nameUSER,
                    message: 'Chọn mở khóa tài khoản này?'
                }
                alertConfirm(alertNotify).then(res => {
                    if (res.value == true) {
                        let ajax = {
                            method: 'post',
                            url: '/admin/danh-sach-tai-khoan/mo-khoa-tai-khoan',
                            data: {
                                id: idRecord,
                                name: nameUSER
                            }
                        }
                        sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(r => {
                            // console.log(r.reset[0])

                            getHtmlResponse(r);
                            if (r.status == 200) {
                                db_ajax_reload_all(table);

                            }
                        });

                    }
                });

            });
        })
    </script>
    @endpush
