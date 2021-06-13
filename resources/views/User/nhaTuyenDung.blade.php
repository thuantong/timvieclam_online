@extends('master.index')
@section('content')
    <head>
        {{--        <link href="assets\libs\clockpicker\bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">--}}
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"
              type="text/css">

    </head>
    @include('User.modal.doiMatKhau')
    {{--    Thêm mới công ty - modal--}}
    @include('CongTy.modal.themMoi')
    {{--    Xem ảnh đại diện modal--}}
    @include('CongTy.modal.xemAnhDaiDien')
    @include('CongTy.modal.anh_dai_dien')

    {{-- <div class="modal fade bs-example-modal-center" id="xem_anh_dai_dien" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{--                <div class="modal-header">--}}
                {{--                    <h4 class="modal-title" id="myCenterModalLabel">Center modal</h4>--}}
                {{--                    --}}
                {{--                </div>--}}
                {{--  <div class="modal-body p-0">
                    <button type="button" class="close position-absolute text-danger" style="right: 1rem"
                            data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <img src="" style="width: 100%">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> --}}

    {{-- <div class="modal fade bs-example-modal-center thong-tin" id="doi_anh_dai_dien" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Cập nhật ảnh đại diện')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="demo-wrap upload-demo">
                        {{--                        <div class="container">--}}
                        {{--<div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="upload-msg">
                                    Đang tải ảnh
                                </div>
                                <div class="upload-demo-wrap">
                                    <div id="upload-demo"></div>
                                </div>
                            </div>
                        </div>
                        {{--                        </div>--}}
                   {{--   </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal" id="close">{{__('Thoát')}}</button>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="save">
                        {{__('Chọn ảnh này')}}
                    </button>
                </div>

            </div>
        </div>
    </div> --}}



    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a>Thông tin</a></li>
                        <li class="breadcrumb-item active">Thông tin cá nhân</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Phần Nhà Tuyển Dụng')}}</h4>
            </div>
        </div>
    </div>

    <div class="row" id="scroll-fixed">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1 text-right">
                <div class="btn-group btn-group-sm" style="float: none;">
                    <a class="btn btn-sm btn-primary text-white mr-4" data-toggle="modal"
                       data-target="#modal-doi-mat-khau">{{__('Đổi mật khẩu')}}</a>
                    {{--                    <button class="btn btn-warning btn-sm call-save-profile">{{__('Cập nhật')}}</button>--}}
                    <button class="btn btn-success btn-sm save-profile"
                            id="save-profile">{{__('Lưu lại tất cả')}}</button>
                    <a class="btn btn-secondary btn-sm cancel-profile" href="/nha-tuyen-dung">{{__('Không lưu')}}</a>
                </div>

            </div>

        </div>
    </div>


    <div class="row center-element nha-tuyen-dung-container">

        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="card-box p-1 mb-1 text-right">
                <div class="row">
                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h4 class="bg-light p-2 text-uppercase">{{__('Thông Tin Nhà Tuyển Dụng')}}</h4></label>
                </div>
                {{-- <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="ho_ten"><abbr class="text-danger  font-15">* </abbr>{{__('Họ tên: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="ho_ten" title="Họ tên"
                               placeholder="@if(Auth::user()->ho_ten == null){{"Nhập họ tên"}}@endif"
                               value="@if(Auth::user()->ho_ten != null){{Auth::user()->ho_ten}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div> --}}
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="email"><abbr class="text-danger  font-15">* </abbr>{{__('Email: ')}}
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <div class="input-group">
                            <input class="form-control email-not-null"
                                   placeholder="@if(Auth::user()->email == null){{"Nhập email"}}@endif"
                                   id="email" data-rule="email" title="Email người tuyển dụng"
                                   value="@if(Auth::user()->email != null){{Auth::user()->email}}@endif">
                            <button
                                class="btn btn-sm @if(Auth::user()->email != Auth::user()->email_confirmed){{__('btn-primary')}}@else{{__('btn-success')}}@endif"
                                @if(Auth::user()->email != Auth::user()->email_confirmed) id="gui-xac-nhan-email" @endif>@if(Auth::user()->email != Auth::user()->email_confirmed){{__('Gửi xác thực email')}}@else{{__('Đã xác nhận')}}@endif</button>
                        </div>
                        <span class="text-success message-response"></span>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="gioi_tinh"><abbr class="text-danger  font-15">* </abbr>{{__('Địa chỉ')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="dia_chi" title="Địa chỉ"
                               value="@if($data['dia_chi'] != null){{$data['dia_chi']}}@endif">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="gioi_tinh"><abbr class="text-danger  font-15">* </abbr>{{__('Giới tính')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <select class="form-control not-null" id="gioi_tinh_tuyen_dung" title="Giới tính">
                            <option value="" disabled selected
                                    class="text-center">{{__('Chọn giới tính')}}</option>
                            <option value="1"
                                    @if($data['gioi_tinh'] != null && $data['gioi_tinh'] == 1) selected @endif>{{__('Nam')}}</option>
                            <option value="2"
                                    @if($data['gioi_tinh'] != null && $data['gioi_tinh'] == 2) selected @endif>{{__('Nữ')}}</option>
                        </select>

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="ngay_sinh_tuyen_dung"><abbr
                                class="text-danger  font-15">* </abbr>{{__('Ngày sinh')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="ngay_sinh_tuyen_dung" title="Ngày sinh"
                               value="@if($data['nam_sinh'] != null){{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$data['nam_sinh'])->format('d/m/Y')}}@else{{date('d/m/Y')}}@endif">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="phone_tuyen_dung"><abbr
                                class="text-danger  font-15">* </abbr>{{__('Số điện thoại: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null"
                               placeholder="@if(Auth::user()->phone == null){{"Nhập số điện thoại"}}@endif"
                               id="phone_tuyen_dung" title="Số điện thoại"
                               value="@if(Auth::user()->phone != null){{Auth::user()->phone}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Công ty tuyển dụng:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="input-group">
                            <input id="cong_ty_tuyen_dung" class="form-control not-null" title="Công ty tuyển dụng"
                                           type="hidden" title="Công ty"
                                           value="@if(isset($data) && $data['id'] != null){{$data['id']}}@endif">
                                           <input id="cong_ty_tuyen_dung_name" class="form-control font-weight-bold text-center disabled" disabled value="@if(isset($data) != null && $data['tai_khoan_id'] != null){{ucwords(Auth::user()->ho_ten)}}@else{{'Chưa thêm công ty tuyển dụng'}}@endif">
                                           <button class="btn waves-effect float-right btn-warning btn-sm call-them-moi-cong-ty"
                                           id="call-them-moi-cong-ty">Chỉnh sửa
                                   </button>
                        </div>

                        <span class="text-success message-response"></span>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>

                        {{-- <div class="input-group"> --}}
                            {{-- <div class="col-sm-12 col-md-12 col-lg-12 border col-xl-12 pr-0"> --}}
                                {{-- <div class="row"> --}}
                                    {{--                                    <div class="col-sm-12 col-md-4">--}}
                                    {{--                                        <img src="@if(isset($data) && $data['logo'] != null){{URL::asset(''.$data['logo'].'')}}@else{{URL::asset('images/default-company-logo.jpg')}}@endif" width="100" height="100">--}}
                                    

                                    {{--                                    </div>--}}
                                    {{-- <div class="col-sm-12 col-md-12 text-center"
                                         id="cong_ty_tuyen_dung_name">@if(isset($data) != null && $data['tai_khoan_id'] != null)
                                         <h5>{{ucwords(Auth::user()->ho_ten)}}</h5>@else <h5>{{'Chưa thêm công ty tuyển dụng'}}</h5> @endif<button class="btn waves-effect float-right btn-warning btn-sm call-them-moi-cong-ty"
                                            id="call-them-moi-cong-ty">Chỉnh sửa
                                    </button>
                                            
                                    </div>
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span> --}}
                                {{-- </div> --}}
                            
                            {{-- </div> --}}
                            {{-- <div class="col-sm-3 col-md-2 col-lg-2 col-xl-2 pl-0">
                                <button class="btn waves-effect btn-primary call-them-moi-cong-ty"
                                        id="call-them-moi-cong-ty">Chỉnh sửa
                                </button>
                            </div> --}}
                        {{-- </div> --}}

                    </div>
                </div>
                
                {{-- <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Giới thiệu bản thân:</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <textarea class="form-control"
                                  id="gioi_thieu">@if($data['gioi_thieu']){{$data['gioi_thieu']}}@endif</textarea>
                    </div>
                </div> --}}
                <h5 class="mb-3 text-uppercase bg-light p-2 text-center text-md-left"><i class="mdi mdi-earth mr-1"></i>
                    {{__('Mạng xã hội:')}}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-fb">Facebook</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-facebook-official"></i></span>
                                </div>
                                {{--                                unserialize($nguoiTimViec['social'])[0]--}}
                                <input type="text" class="form-control social-link" id="social-fb"
                                       value="@if($data['mang_xa_hoi'] != null){{unserialize($data['mang_xa_hoi'])[0]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-tw">Twitter</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-twitter"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-tw"
                                       value="@if($data['mang_xa_hoi'] != null){{unserialize($data['mang_xa_hoi'])[1]}}@endif"
                                       placeholder="Username">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-insta">Instagram</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-insta"
                                       value="@if($data['mang_xa_hoi'] != null){{unserialize($data['mang_xa_hoi'])[2]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-lin">Linkedin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-linkedin"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-lin"
                                       value="@if($data['mang_xa_hoi'] != null){{unserialize($data['mang_xa_hoi'])[3]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-sky">Skype</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-skype"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-sky"
                                       value="@if($data['mang_xa_hoi'] != null){{unserialize($data['mang_xa_hoi'])[4]}}@endif"
                                       placeholder="@username">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-gh">Github</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-github"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-gh"
                                       value="@if($data['mang_xa_hoi'] != null){{unserialize($data['mang_xa_hoi'])[5]}}@endif"
                                       placeholder="Username">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.js')}}"></script>

    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\nhaTuyenDung.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\doi_mat_khau.js')}}"></script>
   
    {{-- <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\themMoiCongTy.js')}}"></script> --}}
    {{--    init valiable of confirm email--}}
    <script type="text/javascript">
        let data_action_confifm = '{{Auth::user()->id}}';
    </script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\chuc-nang-gui-confirm-email.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>
    <script>
        $(function () {
            // getImage();
            var fixedScroll = $('#scroll-fixed').offset();
            const headerTop = fixedScroll.top;
            $(window).on('scroll', function () {

                // console.log(fixedScroll.top, window.pageYOffset + 70);
                if (window.pageYOffset + 70 >= headerTop) {
                    $('#scroll-fixed').addClass('scroll-fixed-top');
                } else {
                    $('#scroll-fixed').removeClass('scroll-fixed-top');
                }
            });
        });
        let HTMLcongTy = null;
        let getBaseURL = '{{URL::asset('/')}}';
        const initEventCapNhatCongTy = () => {
            // $('#doi_anh_dai_dien').data('type', 'them-moi-cong-ty')
            select2Default($('select#from_day'));
            select2Default($('select#to_day'));
            select2Default($('select#quy_mo_nhan_su'));
            select2MultipleDefault($('select#linh_vuc_hoat_dong'), 'Chọn Ngành nghề')
            // $('select#from_day,select#to_day,select#quy_mo_nhan_su').select2({
            //     dropdownParent: $('div#cap-nhat-cong-ty ')
            // });
            // $('select#linh_vuc_hoat_dong').select2({
            //     placeholder: ' Chọn Ngành nghề',
            //     allowClear: false
            // });

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
    </script>

    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\themMoiCongTy.js')}}"></script>
    {{-- <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\uploadImage.js')}}"></script> --}}
    <script>
        $(document).on('click', 'button#call-them-moi-cong-ty', function () {
            $('div.modal#them-moi-cong-ty').modal('show');
            let ajax = {
                url: '/danh-sach-cong-ty/get-content',
                method: 'get',
                data: {}
            };
            sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(e => {
                $('div.modal#them-moi-cong-ty').find('.modal-body').html(e);
                $('div.modal#them-moi-cong-ty').find('.modal-body').find('#save-cong-ty').addClass('d-none');
                initEventCapNhatCongTy()
                // hoverEventLogo();
            })
            // $('div.modal#them-moi-cong-ty').data('type', 'cong_ty_tuyen_dung');
            // alert()
        });
    </script>
@endpush
