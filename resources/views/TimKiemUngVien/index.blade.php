@extends('master.index')
@section('content')
    <head>
{{--        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"--}}
{{--              rel="stylesheet">--}}

        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
{{--        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"--}}
{{--              type="text/css">--}}
{{--        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">--}}


    </head>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Tìm kiếm ứng viên</li>
                    </ol>
                </div>
                <h4 class="page-title">Tìm kiếm ứng viên</h4>
            </div>
        </div>
    </div>

    <div class="card-box">

        <form class="row" action="" method="get">
            <div class="col-sm-4 col-md-4">
                <div class="row">
                    <input class="form-control" name="nguoi_tim_viec" placeholder="Tên chức vụ hoặc tên ứng viên" value="@if(Request::exists('nguoi_tim_viec')){{Request::get('nguoi_tim_viec')}}@endif">
                </div>

            </div>
            <div class="col-sm-3 col-md-3">
                <div class="row">
                    <select class="col-sm-12 col-md-12 form-control" name="nganh_nghe" id="nganh_nghe">
                        <option selected value="">Tất cả ngành nghề</option>
                        @foreach($nganh_nghe as $row)
                            <option value="{{$row['id']}}" @if(Request::exists('nganh_nghe') && Request::get('nganh_nghe') != "" && Request::get('nganh_nghe') == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-sm-3 col-md-3">
                <div class="row">
                    <select class="col-sm-12 col-md-12 form-control" name="dia_diem" id="dia_diem">
                        <option selected value="">Tất cả địa điểm</option>
                        @foreach($dia_diem as $row)
                            <option value="{{$row['id']}}" @if(Request::exists('dia_diem') && Request::get('dia_diem') != "" && Request::get('dia_diem') == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-2 col-md-2">
                <button type="submit" class="btn btn-primary">Tìm</button>
            </div>
        </form>

    </div>
    <div class="card-box">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="col-sm-12 col-md-12 table table-bordered">
                        <thead class="bg-primary">
                        <tr>
                            <th style="width: 50px"></th>
                            <th>Tên</th>
{{--                            <th>Kinh nghiệm</th>--}}
                            <th>Lương</th>
                            <th>Nơi làm việc</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($data) > 0)
                            @foreach($data as $row)
                            <tr>
                                <td style="width: 100px; padding: 0" class="center-element"><img class="rounded-circle" src="@if($row['get_tai_khoan']['avatar'] != null){{URL::asset(env('URL_ASSET_PUBLIC').$row['get_tai_khoan']['avatar'])}}@else{{URL::asset(env('URL_ASSET_PUBLIC').'images/default-company-logo.jpg')}}@endif" style="width: calc(100%)"></td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 text-capitalize">@if($row['viec_can_tim'] != null){{$row['viec_can_tim']}}@endif</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 text-capitalize">@if($row['get_tai_khoan']['ho_ten'] != null){{$row['get_tai_khoan']['ho_ten']}}@endif</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">Học vấn: @if($row['get_bang_cap']['name'] != null){{$row['get_bang_cap']['name']}}@endif</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">Cấp bậc: @if($row['get_kieu_lam_viec']['name'] != null){{$row['get_kieu_lam_viec']['name']}}@endif</div>
                                    </div>
                                </td>
{{--                                <td>Kinh nghiệm</td>--}}
                                <td>{{$row['muc_luong']}} Triệu</td>
                                <td>@if($row['get_dia_diem'] != null){{$row['get_dia_diem']['name']}}@endif</td>
                                <td><a href="{{route('nhatuyendung.chiTiet',['nguoi_tim_viec'=>$row['id']])}}">Xem</a>
                                    <a href="{{route('nhantin.index',['to'=>$row['id'],'from'=>\Illuminate\Support\Facades\Auth::user()->id])}}">Nhắn tin</a>

                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4" class="text-center"><span>{{'Không tìm thấy ứng viên..'}}</span></td>
                            </tr>

                            @endif

                        </tbody>
                    </table>
                    @if(count($data) > 0)
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                {{ $data->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection
@push('scripts')
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.js')}}"></script>
    <script>
        $(function () {
            select2Default($('#nganh_nghe'));
            select2Default($('#dia_diem'));
        })
    </script>
    @endpush
