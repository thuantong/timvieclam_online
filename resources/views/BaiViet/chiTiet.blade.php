@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <!-- ION Slider -->
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\ion-rangeslider\ion.rangeSlider.css')}}" rel="stylesheet" type="text/css">
        {{--        <link href="assets\libs\bootstrap-select\bootstrap-select.min.css" rel="stylesheet" type="text/css">--}}
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
              rel="stylesheet">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

        {{--        date picker--}}
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"
              type="text/css">
    </head>
    @include('BaoCao.modalBaoCao')


    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Việc làm</a></li>
                        <li class="breadcrumb-item active">Xem chi tiết</li>
                    </ol>
                </div>
                <h4 class="page-title">Xem chi tiết việc làm</h4>


                {{--                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>--}}

            </div>
        </div>
    </div>
    @include('CongTy.gioiThieu')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1">

                <div class="row" id="container-section">
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-center">
                                        <h4 class="tieu_de bg-light p-1 m-0 text-capitalize"
                                            id="tieu_de">@if($data['tieu_de'] != null){{$data['tieu_de']}}@endif</h4>
                                    </label>

                                </div>

                                {{--                                <div class="form-group row">--}}
                                {{--                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">--}}
                                {{--                                        <div class="row center-element">--}}
                                {{--                                            <small class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">--}}
                                {{--                                                Thích: <small class="tong-luot-thich">100</small>--}}
                                {{--                                            </small>--}}
                                {{--                                            <small class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-right">--}}
                                {{--                                                Ứng tuyển: <small class="tong-ung-tuyen">{{$data['don_xin_viec']['total']}}</small>--}}
                                {{--                                            </small>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}

                                {{--                                </div>--}}
                                
                                @if(intval(Session::get('loai_tai_khoan')) == 1)
                                    <div class="form-group row">

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                                            <div class="row center-element text-center">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div
                                                        class="btn @if(in_array($data['id'],$data['bai_da_luu']['data']) == true) btn-primary like-animation @else btn-outline-primary @endif waves-effect position-relative"
                                                        id="trang-chu-like-post" data-id="{{$data['id']}}">
                                                        <i class="icofont icofont-thumbs-up">@if(in_array($data['id'],$data['bai_da_luu']['data'])){{' Đã lưu'}}@else{{' Lưu bài'}}@endif</i>
                                                        <span
                                                            class="badge badge-danger noti-icon-badge position-absolute"
                                                            style="right: 0px">{{$data['bai_da_luu']['total']}}</span>
                                                    </div>
                                                    {{--                                                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">--}}
                                                    {{--                                                    <i class="icofont icofont-bell-alt noti-icon"></i>--}}
                                                    {{--                                                    <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>--}}
                                                    {{--                                                </a>--}}
{{--                                                    <button class="btn btn-outline-info"--}}
{{--                                                            title="Chat với nhà tuyển dụng">--}}
{{--                                                        <i class="icofont icofont-ui-text-loading "></i> Chat--}}
{{--                                                    </button>--}}

                                                    <div
                                                        class="btn @if(in_array($data['id'],$data['don_xin_viec']['data']) == false) btn-outline-warning @else btn-warning like-animation @endif waves-effect position-relative call-modal-nop-don"
                                                        @if(in_array($data['id'],$data['don_xin_viec']['data']) == false) id="call-modal-nop-don" @endif>
                                                        <i class="fa fa-send">@if(in_array($data['id'],$data['don_xin_viec']['data'])){{' Đã ứng tuyển'}}@else{{' Nộp đơn'}}@endif</i>
                                                        {{--                                                    <span class="badge badge-danger noti-icon-badge position-absolute" style="right: 0px">{{$data['don_xin_viec']['total']}}</span>--}}

                                                    </div>
{{--@dd($data['get_nha_tuyen_dung']['get_tai_khoan']['id'])--}}
                                                    <div
                                                        class="btn btn-outline-info like-animation waves-effect position-relative call-nhan-tin-tuyen-dung">
                                                        <a href="{{route('nhantin.index',['from'=>\Illuminate\Support\Facades\Auth::user()->id,'to'=>$data['get_nha_tuyen_dung']['get_tai_khoan']['id']])}}">
                                                            <i class="fa fa-commenting-o"></i> Nhắn tin với NTD
                                                        </a>

                                                        {{--                                                    <span class="badge badge-danger noti-icon-badge position-absolute" style="right: 0px">{{$data['don_xin_viec']['total']}}</span>--}}

                                                    </div>
{{--                                                    @dd($data)--}}


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @include('BaiViet.chiTiet.index')


                            </div>
                        </div>
                    </div>

                    {{-- việc gợi ý begin--}}
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 border-left">
                        <div class="w-100 position-relative overflow-y-auto">
                            <div class="w-100" id="noi-dung-right-side" style="height: auto">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="tieu_de bg-light p-1 m-0 text-center">Việc làm gợi ý<a
                                                class="float-right"
                                                href="{{route('trangchu.index',array('kieu_lam_viec'=>$data['kieu_lam_viec_id']))}}">[Xem
                                                thêm]</a></h4>

                                    </div>
                                </div>
                                <div class="row">
                                    @if($data['bai_tuyen_dung']->count() != 0)
                                      
                                        @foreach($data['bai_tuyen_dung'] as $row)
                                            <a class="col-sm-12 col-md-12 ribbon-box iteam-click"
                                               href="{{route('baiviet.getThongTinBaiViet',[$row['id'],'chitiet'=>1])}}">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <img src="{{URL::asset(env('URL_ASSET_PUBLIC').$row['getCongTy']->cong_ty_logo)}}"
                                                             class="border" style="width: calc(100%)">
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <h5 class="col-sm-12 col-md-12 mt-1 mb-1 overflow-hidden text-capitalize">
                                                                {{$row['tieu_de']}}
                                                            </h5>
                                                        </div>
                                                        <div class="row">
                                                            <small
                                                                class="col-sm-12 col-md-12 overflow-hidden text-dark text-uppercase">
                                                                {{$row['getCongTy']->cong_ty_name}}
                                                            </small>
                                                        </div>
                                                        <div class="row">
                                                            <small class="col-sm-12 col-md-12">
                                                                <span class="icofont icofont-money mr-1">
                                                                    {{$row['luong_from']}}{{' - '}}{{$row['luong_to']}}{{' Triệu'}}
                                                                </span>
                                                                {{--                                                                @if(Auth::user() != null){{$row['luong_from']}}{{' - '}}{{$row['luong_to']}}{{' Triệu'}}@else <a href="{{URL::asset('/dang-nhap')}}">Đăng nhập</a> @endif--}}
                                                            </small>
                                                        </div>
                                                        <div class="row">
                                                            <small class="col-sm-12 col-md-12">
                                                                <span
                                                                    class="icofont icofont-location-pin mr-1"></span>{{$row['getDiaDiem']->dia_diem}}
                                                            </small>
                                                        </div>
                                                        <div class="row">
                                                            <small class="col-sm-12 col-md-12">
                                                                <span
                                                                    class="fa fa-calendar-plus-o mr-1"></span>{{\Illuminate\Support\Carbon::parse($row['han_tuyen'])->format('d/m/Y')}}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(intval($row['isHot']) == 1)
                                                    <div class="ribbon-two ribbon-two-danger floats-right"><span
                                                            class="right-custom"
                                                            style="top: 7px;left: -14px;">Hot</span>
                                                    </div>
                                                @endif
                                            </a>

                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 bg-primary text-white text-center">
                                                {{__('Không tìm thấy việc làm')}}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

   
    @if(intval(Session::get('loai_tai_khoan')) == 1)

        @include('NopDon.NopDonModal.index')
        @include('User.modal.capNhatProject')
        @include('User.modal.capNhatExp')
    @endif

@endsection
@push('scripts')
    <script type="text/javascript">
        let idBaiTuyenDung = '{{$data['id']}}';
        $(function () {
            // fullSizePage();
            // let size_parent_of_right_side = $('#container-section').height();
            // console.log(size_parent_of_right_side)
            // $('#noi-dung-right-side').css('height', size_parent_of_right_side + 'px')
        })
    </script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.js')}}"></script>

    {{--date picker--}}
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>


    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>
    <!-- Plugins js-->
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\twitter-bootstrap-wizard\jquery.bootstrap.wizard.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\cap-nhat-kinh-nghiem.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\cap-nhat-project.js')}}"></script>

    <!-- Init js-->
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\pages\form-wizard.init.js')}}"></script>


    <script type="text/javascript">


        $(function () {
            // viec-lam-tuong-tu-render
            getViecLamTuongTu();
            $('#call-modal-nop-don').on('click', function () {
                window.location.href = "/nguoi-tim-viec/nop-don-buoc-mot?bai_tuyen_dung="+idBaiTuyenDung;
            });
            $('#trang-chu-like-post').on('click', function () {
                let __this = $(this);
                let idPost = __this.data('id');
                // console.log(idPost)
                if (__this.hasClass('btn-outline-primary') == true) {
                    __this.removeClass('btn-outline-primary');
                    __this.addClass('btn-primary');
                    __this.addClass('like-animation');
                    __this.find('i').text(' Đã lưu');
                    let ajax = {
                        method: 'post',
                        url: '/bai-viet/like',
                        data: {
                            id: idPost,
                            thich: 1
                        }
                    };
                    sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '')
                        .done(e => {
                            console.log(e)
                            __this.find('span').text(e.total_thich);

                            // $('.tong-luot-thich').text(e.total_thich);
                        });
                } else if (__this.hasClass('btn-primary') == true) {
                    __this.removeClass('btn-primary');
                    __this.removeClass('like-animation');
                    __this.addClass('btn-outline-primary');
                    __this.find('i').text(' Lưu bài');
                    let ajax = {
                        method: 'post',
                        url: '/bai-viet/like',
                        data: {
                            id: idPost,
                            thich: 0
                        }
                    };
                    sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '')
                        .done(e => {
                            // console.log(e)

                            __this.find('span').text(e.total_thich);
                        });

                }

            });

            $('#quan-tam-nha-tuyen-dung').on('click', function () {
                let __this = $(this);
                let idNhaTuyenDung = __this.data('id');
                // console.log(idNhaTuyenDung)
                // return;
                if (__this.hasClass('btn-outline-info') == true) {
                    __this.removeClass('btn-outline-info');
                    __this.addClass('btn-info');
                    __this.addClass('like-animation');
                    __this.find('i').text('Đã quan tâm');
                    let ajax = {
                        method: 'post',
                        url: '/quan-tam-nha-tuyen-dung',
                        data: {
                            id: idNhaTuyenDung,
                            quan_tam: 1
                        }
                    };
                    sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '')
                        .done(e => {
                            console.log(e)
                            __this.find('span').text(e.total_quan_tam);

                            // $('.tong-luot-thich').text(e.total_thich);
                        });
                } else if (__this.hasClass('btn-info') == true) {
                    __this.removeClass('btn-info');
                    __this.removeClass('like-animation');
                    __this.addClass('btn-outline-info');
                    __this.find('i').text('Quan tâm');
                    let ajax = {
                        method: 'post',
                        url: '/quan-tam-nha-tuyen-dung',
                        data: {
                            id: idNhaTuyenDung,
                            quan_tam: 0
                        }
                    };
                    sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '')
                        .done(e => {
                            // console.log(e)

                            __this.find('span').text(e.total_quan_tam);
                        });

                }

            });

        });

        let getViecLamTuongTu = () => {
            {{--let ajax = {--}}
            {{--    method :"get",--}}
            {{--    url:"/tim-tin-tuyen-dung?kieu_lam_viec="+'{{$data['get_kieu_lam_viec']['id']}}',--}}
            {{--    data:{}--}}
            {{--}--}}
            {{--sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{--}}
            {{--    $('#viec-lam-tuong-tu-render').html(e)--}}
            {{--})--}}
        }



    </script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\chuc-nang-bao-cao.js')}}"></script>

{{--    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\chuc-nang-nop-don-ung-tuyen.js')}}"></script>--}}
@endpush
