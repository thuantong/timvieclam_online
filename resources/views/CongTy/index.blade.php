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
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Sweet Alert-->
        <!-- third party css end -->
    </head>
    <div class="modal fade" id="cap-nhat-cong-ty" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                Đang tải....
            </div>
        </div>
    </div>
  
    {{-- @if (isset($data['data']) && (count($data['data']) > 0)) --}}
    @include('CongTy.modal.anh_dai_dien')
    @include('CongTy.modal.xemAnhDaiDien')
    {{-- @endif --}}
    

    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Thông tin tuyển dụng</a></li>
                        <li class="breadcrumb-item active">Công ty tuyển dụng</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Công ty tuyển dụng')}}</h4>
            </div>
        </div>
    </div>


{{--    <div class="row center-element">--}}

    {{-- @if (isset($data['data']) && (count($data['data']) > 0)) --}}
    @include('CongTy.content')

    {{-- @endif --}}
   
{{--    </div>--}}


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

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        let getBaseURL = '{{URL::asset('/').env('URL_ASSET_PUBLIC')}}';
    </script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\themMoiCongTy.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>
    <script>
        let datatable_table = null;
        const initEventCapNhatCongTy = ()=>{
            $('#doi_anh_dai_dien').data('type','them-moi-cong-ty')
            select2Default($('select#from_day'));
            select2Default($('select#to_day'));
            select2Default($('select#quy_mo_nhan_su'));
            select2Default($('select#dia_diem'));
            select2MultipleDefault($('select#linh_vuc_hoat_dong'),'Chọn Ngành nghề')
            
            $("#so_luong_chi_nhanh").TouchSpin({
                min: 0,
                buttondown_class: "btn btn-primary waves-effect",
                buttonup_class: "btn btn-primary waves-effect"
            });
            lichNam($('#nam_thanh_lap'));

            $('#from_time,#to_time').datetimepicker({
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
            hoverEventLogo();
        }
        const getDanhSachCongTy = () => {
            let ajaxDSCongTy = {
                method: 'get',
                url: '/danh-sach-cong-ty/data'
            };
            let columnDSCongTy = [
                {
                    // data: 'id',
                    render: function (data, type, row, meta) {
                        // console.log(meta)
                        return '<img src="' + row.logo + '" style="width:50px;height:50px">';
                        // return getIMGCongTy(row.logo);
                    },
                    className: 'pl-1 pr-1 text-center',
                },
                {
                    data: 'name',
                    // className : 'max-width-300px'
                    className: 'max-width-300px pl-1 pr-1'

                },
                {
                    data: 'email',
                    // className : 'max-width-200px'
                    className: 'max-width-300px pl-1 pr-1'

                },
                {
                    data: 'phone',

                    className: 'max-width-300px pl-1 pr-1'

                },
                {
                    data: 'websites',
                    className: 'max-width-300px pl-1 pr-1'
                },
                // {
                //     data: 'gioi_thieu',
                //     className: 'max-width-300px pl-1 pr-1'
                //
                // },
                {
                    // data: 'chucnang',
                    render: function (data, type, row, meta) {
                        return '<div class="form-group">' +
                            '<button class="btn btn-warning btn-sm cap-nhat-cong-ty" data-id="' + row.id + '"><i class="fa fa-pencil"></i>' +
                            '</button>' +
                            '<button class="btn btn-danger btn-sm xoa-cong-ty ml-1" data-id="' + row.id + '"><i class="fa fa-times"></i>' +
                            '</button>' +
                            '</div>'
                    },
                    className: 'pl-1 pr-1'
                    // className : 'pl-1 pr-1'
                }
            ];
            return datatableAjax($('#danh-sach-cong-ty'), ajaxDSCongTy, columnDSCongTy);

        }
        //main
        $(function () {
            initEventCapNhatCongTy();
            lichNam($('#them-moi-cong-ty #nam_thanh_lap'));
            $('.modal').on('hidden.bs.modal', function () {
                // $('.modal').css('opacity', '1')
                datatable_table.ajax.reload(null, false);
            });

            datatable_table = getDanhSachCongTy();

            // $('#gioi_thieu_cong_ty').on('focusout',function () {
            //         $('#ten_cong_ty').focus().select();
            // });

            

            $(document).on('input change', 'div#cap-nhat-cong-ty #so_luong_chi_nhanh', function () {

                let __this = $(this);
                let value = __this.val();
                let inputCount = $('div#cap-nhat-cong-ty #dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('input').length + 1;
                if (value > 0) {
                    __this.addClass('ready');
                } else if (value <= 0) {
                    __this.val(0).select();
                    __this.removeClass('ready');
                }
                if (__this.hasClass('ready')) {
                    $('div#cap-nhat-cong-ty #dia_chi_chi_nhanh').removeClass('d-none');

                    if (value == inputCount && value != 0) {
                        $('div#cap-nhat-cong-ty #dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').append('<div class="xoa-element">Địa chỉ chi nhánh ' + value + ':<input class="form-control dia_chi_chi_nhanh child-not-null" title="Địa chỉ chi nhánh" value=""></div>');
                    } else if (value < inputCount) {
                        $('div#cap-nhat-cong-ty #dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('.xoa-element:last').remove();
                    }

                } else {
                    $('div#cap-nhat-cong-ty #dia_chi_chi_nhanh').addClass('d-none');
                    $('div#cap-nhat-cong-ty #dia_chi_chi_nhanh').find('#dia_chi_chi_nhanh_append').find('.xoa-element').remove();

                }
            });

        });
        $(document).on('click', '.them-moi-danh-sach', function () {
            $('#them-moi-cong-ty').modal('show')
        });

        //cập nhật công ty
        $(document).on('click', 'button.cap-nhat-cong-ty', function () {
            let value = $(this).data('id');

            sendAjaxNoFunc('get', '/danh-sach-cong-ty/du-lieu-cap-nhat', {id: value}).done(res => {
                // console.log(res)
                $('div#cap-nhat-cong-ty').modal('show');
                //
                $('div#cap-nhat-cong-ty').find('.modal-content').html(res);

                $('div#cap-nhat-cong-ty select#from_day,div#cap-nhat-cong-ty select#to_day,div#cap-nhat-cong-ty  select#quy_mo_nhan_su').select2({
                    dropdownParent: $('div#cap-nhat-cong-ty ')
                });
                $('div#cap-nhat-cong-ty select#linh_vuc_hoat_dong').select2({
                    dropdownParent: $('div#cap-nhat-cong-ty'),
                    placeholder: ' Chọn Ngành nghề',
                    allowClear: false
                });

                $("div#cap-nhat-cong-ty #so_luong_chi_nhanh").TouchSpin({
                    min: 0,
                    buttondown_class: "btn btn-primary waves-effect",
                    buttonup_class: "btn btn-primary waves-effect"
                });
                lichNam($('div#cap-nhat-cong-ty #nam_thanh_lap'));

                $('div#cap-nhat-cong-ty #from_time,div#cap-nhat-cong-ty #to_time').datetimepicker({
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
                hoverEventLogo();

            })
        });
        const hoverEventLogo = () => {
            $("div#logo_cong_ty").hover(function () {
                if ($(window).width() >= 576) {
                    $(this).find('div.hover-me').fadeIn('fast');
                }
            }, function () {
                if ($(window).width() >= 576) {
                    $(this).find('div.hover-me').fadeOut('fast');
                }
            });
        }

        $(document).on('click', 'div#cap-nhat-cong-ty #save-cong-ty', function () {
            let __this = $(this);
            let gio_lam_viec = [];
            let ngay_lam_viec = [];
            let error = 0;
            let getParents = $('#' + $(this).parents('.modal').attr('id'));
            let array_dia_chi_chi_nhanh = [];
            let dia_chi_chi_nhanh = getParents.find('.dia_chi_chi_nhanh');
            let so_luong_chi_nhanh = getParents.find('#so_luong_chi_nhanh');

            error += notNullMessage(getParents.find('.not-null'));
            if (so_luong_chi_nhanh.hasClass('ready')) {
                dia_chi_chi_nhanh.each(function () {
                    array_dia_chi_chi_nhanh.push($(this).val());
                });
            }
            // console.log('error',error)
            if (error == 0) {
                gio_lam_viec.push(getParents.find('#from_time').val(), getParents.find('#to_time').val());
                ngay_lam_viec.push(getParents.find('#from_day').find('option:checked').val(), getParents.find('#to_day').find('option:checked').val());

                let dataSend = {
                    id: getParents.find('#id-danh-sach').val(),
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
                    logo_cong_ty: getParents.find('#logo_cong_ty').find('img').data('data'),
                    gioi_thieu_cong_ty: getParents.find('#gioi_thieu_cong_ty').val(),
                    so_luong_chi_nhanh: so_luong_chi_nhanh.val(),
                    dia_chi_chi_nhanh: array_dia_chi_chi_nhanh,
                }

                sendAjaxNoFunc('post', '/danh-sach-cong-ty/cap-nhat', dataSend, __this.attr('id')).done(res => {
                    // console.log('cc',res)
                    getHtmlResponse(res);
                    if (res.status == 200) {
                        $('#' + __this.attr('id')).attr('disabled', 'disabled');
                        $('div#cap-nhat-cong-ty').modal('hide');
                        datatable_table.ajax.reload(null, false);
                        // window.location.href = '/danh-sach-cong-ty';
                    }
                })
            }
            ;

        });

        $(document).on('click', '.xoa-cong-ty', function () {
            // table.row(this).data();
            let __this_parent = $(this).parents('tr');
            let __this__data = datatable_table.row(__this_parent).data();
            // console.log(__this__data)
            let dataConfirm = {
                title: 'Xóa công ty',
                message: 'Bạn muốn xóa công ty ' + __this__data.name + '?'
            }
            alertConfirm(dataConfirm).then(e => {
                if (e.value == true) {
                    sendAjaxNoFunc('post', '/danh-sach-cong-ty/xoa', {id: __this__data.id}, '').done(e => {
                        getHtmlResponse(e);
                        if (e.status == 200) {
                            datatable_table.ajax.reload(null, false);
                        }
                    })
                }
            });

        });
    </script>
@endpush
