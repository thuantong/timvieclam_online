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
                        <li class="breadcrumb-item active">Tìm kiếm nhà tuyển dụng</li>
                    </ol>
                </div>
                <h4 class="page-title">Tìm kiếm nhà tuyển dụng</h4>
            </div>
        </div>
    </div>

    <div class="card-box">
        <form method="get" action="">
            @csrf
            <div class="row">
{{--                <div class="col-sm-4 col-md-4">--}}
{{--                    <div class="row">--}}
{{--                        <input class="form-control" name="tieu_de" placeholder="Nhập tên nhà tuyển dụng..">--}}
{{--                    </div>--}}

{{--                </div>--}}
                <div class="col-sm-3 col-md-3">
                    <div class="row">
                        <select class="col-sm-12 col-md-12 form-control" id="nganh_nghe" name="nganh_nghe">
                            <option value="">Tất cả ngành nghề</option>
                            @foreach($data['nganh_nghe'] as $row)
                                <option
                                    value="{{$row['id']}}" @if(Request::exists('nganh_nghe') && Request::get('nganh_nghe') != null && Request::get('nganh_nghe') == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-sm-3 col-md-3">
                    <div class="row">
                        <select class="col-sm-12 col-md-12 form-control" id="dia_diem" name="dia_diem">
                            <option value="">Tất cả địa điểm</option>
                            @foreach($data['dia_diem'] as $row)
                                <option
                                    value="{{$row['id']}}" @if(Request::exists('dia_diem') && Request::get('dia_diem') != null && Request::get('dia_diem') == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-box">
        <div class="row filterable-content">
{{--            @dd(count($dataNhaTuyenDung))--}}
            @if(count($dataNhaTuyenDung) > 0)
                {{--                @dd($data['nha_tuyen_dung'])--}}
                @foreach($dataNhaTuyenDung as $row)
                    <div class="col-sm-6 col-xl-3 filter-item all web illustrator">
                        <div class="gal-box">
                            <a href="{{route('nhatuyendung.chiTietNhaTuyenDung',['nha_tuyen_dung'=>$row['id']])}}">
                                <img
                                    src="@if(isset($row['get_cong_ty']['logo']) && $row['get_cong_ty']['logo'] != null){{URL::asset(env('URL_ASSET_PUBLIC').$row['get_cong_ty']['logo'])}}@else{{URL::asset(env('URL_ASSET_PUBLIC').'images/default-company-logo.jpg')}}@endif"
                                    class="img-fluid">
                            </a>
                            <div class="gall-info">
                                <h4 class="font-16 mt-0"
                                    title="@if(isset($row['get_cong_ty']['name']) && $row['get_cong_ty']['name'] != null){{$row['get_cong_ty']['name']}}@endif"
                                    style="text-transform: uppercase">@if(isset($row['get_cong_ty']['name']) && $row['get_cong_ty']['name'] != null){{$row['get_cong_ty']['name']}}@endif</h4>
                                <a>
                                    <img
                                        src="@if(isset($row['get_tai_khoan']['avatar']) && $row['get_tai_khoan']['avatar'] != null){{URL::asset(env('URL_ASSET_PUBLIC').$row['get_tai_khoan']['avatar'])}}@else{{URL::asset(env('URL_ASSET_PUBLIC').'images/default-user-icon-8.jpg')}}@endif"
                                        alt="user-img" class="rounded-circle d-none" height="24">
                                    <span
                                        class="text-muted ml-1 text-capitalize" style="font-size: 0px">@if(isset($row['get_tai_khoan']['ho_ten']) && $row['get_tai_khoan']['ho_ten'] != null){{$row['get_tai_khoan']['ho_ten']}}@endif</span>
                                </a>
                                <p class="text-center mb-0">@if(isset($row['get_bai_viet']) && $row['get_bai_viet'] != null){{count($row['get_bai_viet'])." việc đang tuyển"}}@else
                                        <span class="text-danger">{{"Chưa có bài tuyển dụng"}}</span> @endif</p>
                                {{--                        <span class="text-center"></span>--}}
                                {{--                        <a href="javascript: void(0);" class="gal-like-btn"><i class="mdi mdi-heart-outline text-muted"></i></a>--}}
                            </div> <!-- gallery info -->
                        </div> <!-- end gal-box -->
                    </div> <!-- end col -->
                @endforeach


            @else
                {{"Không tìm thấy nhà tuyển dụng nào"}}
            @endif

        </div>
        <div class="row filterable-content">
            @if(count($dataNhaTuyenDung) > 0)
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        {{ $dataNhaTuyenDung->links() }}
                    </div>
                </div>
            @endif

        </div>

    </div>
@endsection
@push('scripts')
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.js')}}"></script>
    <!-- Magnific Popup-->
    {{--    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\magnific-popup\jquery.magnific-popup.min.js')}}"></script>--}}

    <!-- Gallery Init-->
    {{--    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\pages\gallery.init.js')}}"></script>--}}
    <script>
        $(function () {
            select2Default($('#nganh_nghe'));
            select2Default($('#dia_diem'));
        })
    </script>
@endpush
