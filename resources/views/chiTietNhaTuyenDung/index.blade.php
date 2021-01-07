@extends('master.index')
@section('content')
    <head>
        {{--        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"--}}
        {{--              rel="stylesheet">--}}

        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Lightbox css -->
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\magnific-popup\magnific-popup.css')}}" rel="stylesheet" type="text/css">
        {{--        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"--}}
        {{--              type="text/css">--}}
        {{--        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">--}}


    </head>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Chi tiết nhà tuyển dụng</li>
                    </ol>
                </div>
                <h4 class="page-title">Chi tiết nhà tuyển dụng</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box  p-1 mb-1" >
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h4 class="tieu_de p-1 m-0 text-center bg-light text-uppercase"
                            id="ten_cong_ty">@if($data['get_cong_ty'] != null) @if($data['get_cong_ty']['name'] != null){{$data['get_cong_ty']['name']}}@endif @endif</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2 col-md-2">
                        <img
                            src="@if($data['get_cong_ty']['logo'] != null){{URL::asset(''.$data['get_cong_ty']['logo'].'')}}@endif"
                            class="border" style="width: calc(100%)">

                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <i>
                                    @if($data['cong_ty_nganh_nghe'] != null)
                                        {{implode(' - ', array_map(function($c) {
                                                return $c['name'];
                                            }, $data['cong_ty_nganh_nghe']))}}
                                    @endif
                                </i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <span class="fa fa-globe"></span><span>
                                        @if($data['get_cong_ty'] != null)
                                        {{$data['get_cong_ty']['websites']}}
                                    @endif
                                    </span>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <span class="icofont icofont-location-pin"></span><span>
                                        @if($data['get_cong_ty'] != null)
                                        {{$data['get_cong_ty']['dia_chi']}}
                                    @endif
                                    </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <span class="fa fa-group"></span><span>
                                @if($data['get_cong_ty'] != null)
                                        {{$data['quy_mo_nhan_su']['name']}}
                                    @endif
                                 </span>
                            </div>
                        </div>

                        @if(intval(Session::get('loai_tai_khoan')) == 1)
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <div
                                        class="btn quan-tam-nha-tuyen-dung @if(in_array($data['id'],$data['nha_tuyen_dung_da_quan_tam']['data']) == true) btn-info like-animation @else btn-outline-info @endif waves-effect position-relative"
                                        id="quan-tam-nha-tuyen-dung"
                                        data-id="@if($data['id'] != null){{$data['id']}}@endif">
                                        <i class="icofont icofont-thumbs-up">@if(in_array($data['id'],$data['nha_tuyen_dung_da_quan_tam']['data']) == true){{' Đã quan tâm'}}@else{{' Quan tâm'}}@endif</i>
                                        <span class="badge badge-danger noti-icon-badge position-absolute"
                                              style="right: 0px">{{$data['nha_tuyen_dung_da_quan_tam']['total']}}</span>
                                    </div>
                                    {{--                                    <div class="btn btn-outline-info btn-sm quan-tam-nha-tuyen-dung" id="quan-tam-nha-tuyen-dung" data-id="@if($data['get_nha_tuyen_dung']['id'] != null){{$data['get_nha_tuyen_dung']['id']}}@endif"><i class="fa fa-heart">Quan tâm</i></div>--}}
                                    {{--                                    <button class="btn btn-info btn-sm"></button>--}}
                                </div>
{{--                                <div class="col-sm-12 col-md-12 text-left">--}}
{{--                                    <div--}}
{{--                                        class="btn quan-tam-nha-tuyen-dung mt-2  @if(in_array($data['get_nha_tuyen_dung']['id'],$data['nha_tuyen_dung_da_quan_tam']['data']) == true) btn-info like-animation @else btn-outline-info @endif waves-effect position-relative"--}}
{{--                                        id="quan-tam-nha-tuyen-dung"--}}
{{--                                        data-id="@if($data['get_nha_tuyen_dung']['id'] != null){{$data['get_nha_tuyen_dung']['id']}}@endif">--}}
{{--                                        <i class="icofont icofont-thumbs-up">@if(in_array($data['get_nha_tuyen_dung']['id'],$data['nha_tuyen_dung_da_quan_tam']['data']) == true){{' Đã quan tâm'}}@else{{' Quan tâm'}}@endif</i>--}}
{{--                                        <span class="badge badge-danger noti-icon-badge position-absolute"--}}
{{--                                              style="right: 0px">{{$data['nha_tuyen_dung_da_quan_tam']['total']}}</span>--}}
{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div class="btn btn-outline-info btn-sm quan-tam-nha-tuyen-dung" id="quan-tam-nha-tuyen-dung" data-id="@if($data['get_nha_tuyen_dung']['id'] != null){{$data['get_nha_tuyen_dung']['id']}}@endif"><i class="fa fa-heart">Quan tâm</i></div>--}}
{{--                                    --}}{{--                                    <button class="btn btn-info btn-sm"></button>--}}
{{--                                </div>--}}
                            </div>
                        @endif

                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <label class="mb-0">Giới thiệu:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <span class="">
                                        @if($data['get_cong_ty'] != null)
                                        {{--                                            @for($i = 0 ; $i < 200; $i++)--}}
                                        {{$data['get_cong_ty']['gioi_thieu']}}
                                        {{--                                                @endfor--}}

                                    @endif
                                    </span>
                                {{--                                <button class="btn-sm btn btn-primary">đấ</button>--}}
                            </div>

                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-12 col-md-12 text-left">--}}
{{----}}
{{--                                <button class="btn-sm btn btn-default text-primary p-0">[Xem chi tiết]</button>--}}
{{--                            </div>--}}
{{----}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    <div class="card-box">--}}
{{--        <div class="w-100 position-relative overflow-y-auto">--}}
{{--            <div class="w-100" id="noi-dung-right-side" style="height: 300px">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <h4 class="tieu_de bg-light p-1 m-0 text-center">Công ty tuyển dụng</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <h4 class="tieu_de p-1 m-0 text-center"--}}
{{--                            id="ten_cong_ty">@if($data['get_cong_ty'] != null) @if($data['get_cong_ty']['name'] != null){{$data['get_cong_ty']['name']}}@endif @endif</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <i>--}}
{{--                            @if($data['cong_ty_nganh_nghe'] != null)--}}
{{--                                {{implode(' - ', array_map(function($c) {--}}
{{--                                        return $c['name'];--}}
{{--                                    }, $data['cong_ty_nganh_nghe']))}}--}}
{{--                            @endif--}}
{{--                        </i>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <span class="fa fa-globe"></span><span>--}}
{{--                                        @if($data['get_cong_ty'] != null)--}}
{{--                                {{$data['get_cong_ty']['websites']}}--}}
{{--                            @endif--}}
{{--                                    </span>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <span class="icofont icofont-location-pin"></span><span>--}}
{{--                                        @if($data['get_cong_ty'] != null)--}}
{{--                                {{$data['get_cong_ty']['dia_chi']}}--}}
{{--                            @endif--}}
{{--                                    </span>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <span class="fa fa-group"></span><span>--}}
{{--                                        @if($data['get_cong_ty'] != null)--}}
{{--                                {{$data['quy_mo_nhan_su']['name']}}--}}
{{--                            @endif--}}
{{--                                    </span>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                                    <span>--}}
{{--                                        @if($data['get_cong_ty'] != null)--}}
{{--                                            {{$data['get_cong_ty']['gioi_thieu']}}--}}
{{--                                        @endif--}}
{{--                                    </span>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center pt-2">--}}
{{--                        <img--}}
{{--                            src="@if($data['get_cong_ty']['logo'] != null){{URL::asset(''.$data['get_cong_ty']['logo'].'')}}@endif"--}}
{{--                            style="width: calc(20%)">--}}
{{--                        --}}{{--                                        @if($data['get_cong_ty'] != null)--}}
{{--                        --}}{{--                                            {{$data['get_cong_ty']['gioi_thieu']}}--}}
{{--                        --}}{{--                                        @endif--}}
{{--                        --}}{{--                                    </img>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <hr>--}}
{{--                <div class="row d-none">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <h4 class="tieu_de bg-light p-1 m-0 text-center">Nhà tuyển dụng</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="row d-none">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center pt-2">--}}
{{--                        <img--}}
{{--                            src="@if($data['get_tai_khoan']['avatar'] != null){{URL::asset($data['get_tai_khoan']['avatar'])}}@else{{URL::asset('images/default-user-icon-8.jpg')}}@endif"--}}
{{--                            style="width: calc(20%)">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row d-none">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <h4 class="ten_nha_tuyen_dung p-1 m-0 text-center"--}}
{{--                            id="ten_nha_tuyen_dung">@if($data != null) @if($data['get_tai_khoan']['ho_ten'] != null){{$data['get_tai_khoan']['ho_ten']}}@endif @endif</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @if(intval(Session::get('loai_tai_khoan')) == 1)--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">--}}
{{--                            <div--}}
{{--                                class="btn quan-tam-nha-tuyen-dung @if(in_array($data['id'],$data['nha_tuyen_dung_da_quan_tam']['data']) == true) btn-info like-animation @else btn-outline-info @endif waves-effect position-relative"--}}
{{--                                id="quan-tam-nha-tuyen-dung"--}}
{{--                                data-id="@if($data['id'] != null){{$data['id']}}@endif">--}}
{{--                                <i class="icofont icofont-thumbs-up">@if(in_array($data['id'],$data['nha_tuyen_dung_da_quan_tam']['data']) == true){{' Đã quan tâm'}}@else{{' Quan tâm'}}@endif</i>--}}
{{--                                <span class="badge badge-danger noti-icon-badge position-absolute"--}}
{{--                                      style="right: 0px">{{$data['nha_tuyen_dung_da_quan_tam']['total']}}</span>--}}
{{--                            </div>--}}
{{--                            --}}{{--                                    <div class="btn btn-outline-info btn-sm quan-tam-nha-tuyen-dung" id="quan-tam-nha-tuyen-dung" data-id="@if($data['get_nha_tuyen_dung']['id'] != null){{$data['get_nha_tuyen_dung']['id']}}@endif"><i class="fa fa-heart">Quan tâm</i></div>--}}
{{--                            --}}{{--                                    <button class="btn btn-info btn-sm"></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <div class="row d-none">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <span class="fa fa-envelope"></span><span>--}}
{{--                                        @if($data != null)--}}
{{--                                {{$data['get_tai_khoan']['email']}}--}}
{{--                            @endif--}}
{{--                                    </span>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row d-none">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                        <span class="icofont icofont-location-pin"></span><span>--}}
{{--                                        @if($data != null)--}}
{{--                                {{$data['dia_chi']}}--}}
{{--                            @endif--}}
{{--                                    </span>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row d-none">--}}
{{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}

{{--                                    <span>--}}
{{--                                        @if($data != null)--}}
{{--                                            {{$data['gioi_thieu']}}--}}

{{--                                        @endif--}}
{{--                                    </span>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        </div>--}}
{{--    </div>--}}

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box  p-1 mb-1">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h5 class="bg-light text-center p-1">{{__('Việc làm đang tuyển dụng')}}<span>(</span>@if(count($data['get_bai_viet']) != 0){{count($data['get_bai_viet'])}}@else{{0}}@endif<span>)</span></h5>
                    </div>
                </div>
                <div class="row" style="margin-left: 0;margin-right: 0">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-light">
                        {{--                        <div class="row" id="viec-lam-tuong-tu-render">--}}
                        <div class="row" id="container-items">
                            @if(count($data['get_bai_viet']) != 0)
                                {{--    @dd($data['bai_tuyen_dung'])--}}
{{--                                <input type="hidden" class="item-container-page" data-current="{{$data['trang_hien_tai']}}" data-pageurl="{{$data['check_trang']}}">--}}
                                @foreach($data['get_bai_viet'] as $row)
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 bg-white ribbon-box iteam-click" data-id="{{$row['id']}}">
                                        <div class="row">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 center-element">

                                                <img src="{{URL::asset($row['get_cong_ty']['logo'])}}" class="border" style="width: calc(100%)">

                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><h5 class="mb-0"><a class="xem-chi-tiet-post" href="{{route('baiviet.getThongTinBaiViet',[$row['id'],'chitiet'=>1])}}"><span title="{{ucwords($row['tieu_de'])}}">{{ucwords($row['tieu_de'])}}</span></a>
                                                        </h5></div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><i><span title="{{$row['get_cong_ty']['name']}}">{{$row['get_cong_ty']['name']}}</span></i>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-md-4 col-xl-4 text"><span title="{{$row['luong_from']}}{{' - '}}{{$row['luong_to']}}{{' Triệu'}}"><span class="icofont icofont-money"></span>{{$row['luong_from']}}{{' - '}}{{$row['luong_to']}}{{' Triệu'}}</span></div>
                                                            <div class="col-sm-4 col-md-4 col-xl-4 text"><span title="{{$row['get_dia_diem']['name']}}"><span class="icofont icofont-location-pin"></span>{{$row['get_dia_diem']['name']}}</span></div>
                                                            <div class="col-sm-4 col-md-4 col-xl-4 text"><span title="{{$row['han_tuyen']}}"><span class="fa fa-calendar-plus-o"></span>{{$row['han_tuyen']}}</span></div>
                                                            {{--                            <div class="col-sm-4 col-md-4 col-xl-4 text"><span title="{{$row['han_tuyen']}}">{{$row['han_tuyen']}}</span></div>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(intval($row['isHot']) == 1)
                                            <div class="ribbon-two ribbon-two-danger floats-right"><span class="right-custom">Hot</span>
                                            </div>
                                        @endif
                                        <div class="arrow-item d-none"></div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 bg-primary text-white text-center">
                                        {{__('Không tìm thấy việc làm')}}
                                    </div>
                                </div>
                                {{--    <div class="text-primary">{{__('Không có dữ liệu')}}</div>--}}
                            @endif
                            @push('scripts')
                                <script type="text/javascript">
                                    $(function () {
                                        //search
                                        let widthImage_search = $('#container-items .iteam-click').find('img').parent().width();
                                        let heightImage_search = widthImage_search;
                                        $('#container-items .iteam-click').find('img').css('width', widthImage_search).css('height', heightImage_search);
                                        $(window).resize(function () {
                                            widthImage_search = $('#container-items .iteam-click').find('img').parent().width();
                                            heightImage_search = widthImage_search;
                                            // console.log($('.iteam-click').find('img').parent().width());
                                            $('#container-items .iteam-click').find('img').css('width', widthImage_search).css('height', heightImage_search);

                                        });
                                        // //container index
                                        // let widthImage = $('#container-items .iteam-click').find('img').parent().width();
                                        // let heightImage = widthImage;
                                        //
                                        // $('#container-items .iteam-click').find('img').css('width', widthImage).css('height', heightImage);
                                        // //mũi tên
                                        // $('#container-items .iteam-click').on('click', function () {
                                        //     // console.log($(this).height());
                                        //     let haflHeight = parseFloat($(this).height())*0.4;
                                        //     $(this).find('.arrow-item').css('top',haflHeight+'px');
                                        //     if($(document).width() >= 576){
                                        //         $('#container-items .iteam-click').removeClass('iteam-click-focus');
                                        //         $(this).addClass('iteam-click-focus');
                                        //         $('.arrow-item').addClass('d-none');
                                        //         $(this).find('.arrow-item').removeClass('d-none');
                                        //     }else if($(document).width() < 576){
                                        //         $('.arrow-item').addClass('d-none');
                                        //     }
                                        // });
                                        // //resize post
                                        // $(window).resize(function () {
                                        //     widthImage = $('#container-items .iteam-click').find('img').parent().width();
                                        //     heightImage = widthImage;
                                        //     $('#container-items .iteam-click').find('img').css('width', widthImage).css('height', heightImage);
                                        //     console.log('cái con cặc')
                                        // });
                                    })
                                </script>
                            @endpush

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@push('scripts')
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.js')}}"></script>
    @endpush
