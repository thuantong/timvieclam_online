@extends('master.index')
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

    @include("Admin.PhanQuyen.modalTacVu")
    @include("Admin.PhanQuyen.modalThemQuyen")

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
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-0 container-left">
            <div class="card-box p-1 mb-1">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0 nowrap datatable-check"
                                   id="danh-sach-quyen">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Quyền</th>
                                    <th class="text-center">Chức năng</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 pl-0 container-right">
            <div class="card-box p-1 mb-1">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <label class="bg-light w-100 container-header">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 center-element">
                                            <button class="btn btn-sm btn-primary them-moi-tac-vu">Thêm mới</button>
                                            <button class="btn btn-sm btn-danger ml-1 xoa-tac-vu">Hiện xóa tác vụ</button>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <h5 class="text-center">Tác vụ</h5>
                                        </div>

                                    </div>
                                </label>

                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="w-100">
                                    <div class="form-group row overflow-y-auto container-body" id="get-tac-vu-phan-quyen">

                                    </div>
                                    <div class="form-group row container-footer">
                                        <div class="col-sm-12 col-md-12">
                                            <button class="btn btn-primary check-all" id="check-all">Chọn tất cả</button>
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

    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\switchery\switchery.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>

    <script type="text/javascript">
        let table = null;
        //view
        $(document).on('click','.container-right .them-moi-tac-vu',function () {
            $('#modal-tac-vu').modal('show')
        });
        $(document).on('click','.container-left .them-moi-danh-sach',function () {
            $('#modal-them-quyen').modal('show')
        });
        $(document).on('click','.container-right .xoa-tac-vu',function () {
            if ($(this).hasClass('active') == true){
                $(this).removeClass('active');
                $(this).text('Hiện xóa tác vụ');
                $('.xoa-mot-ta-vu').addClass('d-none');
            }else{
                $(this).addClass('active');
                $(this).text('Ẩn xóa tác vụ');
                $('.xoa-mot-ta-vu').removeClass('d-none');
            }
        });
        //end view

        /**
         * Xóa 1 tác vụ
         */
        $(document).on('click','.container-right .xoa-mot-ta-vu',function () {
            let textValue = $(this).parent().find('span').text();
            let __this = $(this);
            let alert = {
                title :"Xóa tác vụ",
                message :"Bạn muốn xóa tác vụ "+"\""+textValue+"\""+" ?",
            }
            alertConfirm(alert).then(r => {
                if (r.value == true){
                    let ajax = {
                        method : 'post',
                        url : '/admin/danh-sach-tac-vu/delete-tac-vu',
                        data : {
                            action : __this.data('action')
                        }
                    }
                    sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(r=>{
                        // console.log(r)
                        getHtmlResponse(r);
                        if (parseInt(r.status) == 200){
                            __this.parent().parent().remove()
                        }
                    });
                }
            });
        });

        /**
         * Xóa quyền trên datatable
         */
        $(document).on('click','#danh-sach-quyen tbody tr button.xoa',function () {
            let __this = $(this);
            let __this_parent = __this.parents('tr');
            let dataTable = table.row(__this_parent).data();
            let alert = {
                title :"Xóa quyền",
                message :"Bạn muốn xóa quyền "+"\""+dataTable.name+"\""+" ?",
            }
            alertConfirm(alert).then(r => {
                if (r.value == true){
                    let ajax = {
                        method : 'post',
                        url : '/admin/danh-sach-tac-vu/delete-quyen',
                        data : {
                            action : __this.data('action')
                        }
                    }
                    sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(r=>{
                        console.log(r)
                        getHtmlResponse(r);
                        if (parseInt(r.status) == 200){
                            table.ajax.reload(null,false);
                        }
                    });
                }
            });
        });
        /**
         * Chọn tất cả left side
         */
        $(document).on('click','.container-right #check-all',function () {
            let __this = $(this);
            let content = $('.container-right .container-body');
            content.find('[data-plugin="switchery"]').each(function () {
                changeSwitchery($(this),true);
            });
            __this.text('Bỏ chọn tất cả').attr('id','uncheck-all');
        });
        $(document).on('click','.container-right #uncheck-all',function () {
            let __this = $(this);
            let content = $('.container-right .container-body');
            content.find('[data-plugin="switchery"]').each(function () {
                changeSwitchery($(this),false);
            });
            __this.text('Chọn tất cả').attr('id','check-all');
        });

        $(document).on('change','[data-plugin="switchery"]',function () {
            let __this = $(this);
            checkTacVuChecked();
        });

        $(document).on('click','.container-right .save-tac-vu',function () {
            let __this = $(this);
            let htmlData = $('.container-right .container-body');
            let id = htmlData.find('#hidden-no-action').val();//id quyền
            let data = [];
            htmlData.find('[data-plugin="switchery"]').each(function () {
                if ($(this).is(':checked') == true){
                    data.push($(this).data('action'));
                }

            });
            //bắt đầu phân quyền
            let ajax = {
                method:'post',
                url : '/admin/danh-sach-tac-vu/phan-quyen-role',
                data : {
                    action : id,
                    action_data : data
                }
            }
            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,__this.attr('id')).done(r =>{
                console.log(r)
                getHtmlResponse(r);
                // if (parseInt(r.status) == 200){
                //     __this.parent().parent().remove()
                // }
            })
        })


        //main
        $(function () {
            //init db
            table = getDataChucVu();
            //sau khi zend xong dtb => click vào dòng thứ nhất
            $('#danh-sach-quyen').on('init.dt',function () {
                $('#danh-sach-quyen tbody tr').eq(0).trigger('click');
                let heightContentLeft = $('.container-left').height();
                $('.container-right').css('height', heightContentLeft + 'px');
            });

            /**
             * Click vào trow datatable
             */
            $('#danh-sach-quyen tbody').on('click', 'tr', function () {
                var data = table.row(this).data();
                // console.log(data)
                $('#danh-sach-quyen tbody').find('tr').removeClass('bg-light');
                $(this).addClass('bg-light');
                getTacVuPhanQuyen(data);

            });

            /**
             * event lưu 1 tác vụ | right side
             */
            $('#modal-tac-vu .modal-footer #save').on('click',function () {
                let __this_parent =  $('#modal-tac-vu').find('.modal-body');
                let __this = $(this);
                let ten = __this_parent.find('input#ten-tac-vu').val();
                let mo_ta = __this_parent.find('textarea#mo-ta').val();
                let error = 0;
                error += notNullMessage($(__this_parent.find('.not-null')));
                if(error == 0){
                    let ajax = {
                        method : 'post',
                        url : "/admin/danh-sach-tac-vu/set-tac-vu",
                        data : {
                            ten : ten,
                            mo_ta : mo_ta
                        }
                    };
                    // console.log(ajax)
                    sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,__this.attr('id')).done(r =>{
                       // console.log(r);
                       getHtmlResponse(r);
                        if (parseInt(r.status) == 200){
                            $('#modal-tac-vu').modal('hide');
                        }
                    });
                }
            });

            /**
             * Thêm quyền trên dtb
             */
            $('#modal-them-quyen .modal-footer #save').on('click',function () {
                let __this_parent =  $('#modal-them-quyen').find('.modal-body');
                let __this = $(this);
                let ten = __this_parent.find('input#ten-quyen').val();
                let mo_ta = __this_parent.find('textarea#mo-ta').val();
                let error = 0;
                error += notNullMessage($(__this_parent.find('.not-null')));
                if(error == 0){
                    let ajax = {
                        method : 'post',
                        url : "/admin/danh-sach-tac-vu/set-quyen",
                        data : {
                            ten : ten,
                            mo_ta : mo_ta
                        }
                    };
                    // console.log(ajax)
                    sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,__this.attr('id')).done(r =>{
                        // console.log(r);
                        getHtmlResponse(r);
                        if (parseInt(r.status) == 200){
                            $('#modal-them-quyen').modal('hide');
                            table.ajax.reload();
                        }
                    });
                }
            });
        });

        /**
         * lấy danh sách quyền
         * @returns {*}
         */
        const getDataChucVu = () => {
            let ajax = {
                method: 'get',
                url: '/admin/danh-sach-tac-vu/get-chuc-vu',
            }
            let column = [
                {
                    render: function (api, rowIdx, columns, meta) {
                        return meta.row + 1;
                    },
                    className: 'text-primary text-center'
                },
                {
                    data: 'name'
                },{
                    render: function (api, rowIdx, columns, meta) {
                        return '<button class="btn btn-sm btn-danger xoa" data-action="'+columns.id+'">Xóa</button>'
                    },
                    className: 'text-center'
                }
            ];
            return datatableAjax($('#danh-sach-quyen'), ajax, column);
        }

        /**
         * Lấy tác vụ
         * @param data
         */
        const getTacVuPhanQuyen = (data) => {
            let ajax = {
                method : "get",
                url : "/admin/danh-sach-tac-vu/get-tac-vu",
                data : {
                    data : data
                }
            }

            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(r=>{
                $('.container-right').find('#get-tac-vu-phan-quyen').html(r);
                switcheryInit();
                setHeightBody();
                checkTacVuChecked();
            });
        }

        /**
         * Kiểm tra số tác vụ đã check
         */
        const checkTacVuChecked = ()=>{
            let total = $('.container-right').find('[data-plugin="switchery"]').length;
            let totalChecked = $('.container-right').find('[data-plugin="switchery"]:checked').length;
            if (total == totalChecked){
                $('.container-right .check-all').text('Bỏ chọn tất cả').attr('id','uncheck-all');
            }else if (total > totalChecked){
                $('.container-right .check-all').text('Chọn tất cả').attr('id','check-all');
            }
        }

        /**
         * set chiều cao left side
         */
        const setHeightBody = ()=>{
            if (checkIsDeviceMedium() == true){
                let chieuCaoContent = $('.quan-ly-tai-khoan-container').height();
                let chieuCaoHeader = $('.container-right .container-header').height();
                let chieuCaoFooter = $('.container-right .container-footer').height();
                let chieuCaoBody = parseFloat(chieuCaoContent) - parseFloat(chieuCaoHeader) - parseFloat(chieuCaoFooter) ;
                // console.log('content',chieuCaoContent,'header',chieuCaoHeader,'footer',chieuCaoFooter,'body',chieuCaoBody)
                $('.container-right .container-body').css('max-height',chieuCaoBody- parseFloat(60)+'px');
            }

        }
    </script>
@endpush
