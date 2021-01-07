@extends('master.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Việc làm</li>
                    </ol>
                </div>
                <h4 class="page-title">Ứng tuyển việc làm</h4>
            </div>
        </div>
    </div>

    @if(count($data) > 0)
        <div class="row center-element">
            <div class="col-sm-12 col-md-8">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12 text-center bg-light">
                            <h4 class="text-capitalize p-1">Ứng tuyển việc làm: {{$data['bai_tuyen_dung']['tieu_de']}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5 class="text-capitalize">Bước 1: Cập nhật thông tin cá nhân</h5>
                        </div>
                    </div>
                    <form action="{{route('nopdon.nopDonBuocMotLuuLai')}}" method="get">
                        @csrf
                        <input type="hidden" name="bai_tuyen_dung" value="{{$data['bai_tuyen_dung']['id']}}">
                        <div class="row">
                            <div class="col-12">
                                {{--                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i--}}
                                {{--                                            class="mdi mdi-account-circle mr-1"></i>{{__('Thông tin cá nhân')}}</h5>--}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ho_ten">{{__('Họ và tên')}}<abbr style="color: red">*</abbr></label>
                                            <input type="text" class="form-control not-null @error('ho_ten') is-invalid @enderror" id="ho_ten" name="ho_ten" title="Họ và tên"
                                                   placeholder="Nhập họ và tên" value="{{Auth::user()->ho_ten}}">
                                            @error('ho_ten')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            {{--                            <span class="invalid-feedback" role="alert">--}}
                                            {{--                                                    <strong></strong>--}}
                                            {{--                                                </span>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="gioi_tinh">{{__('Giới tính')}}<abbr style="color: red">*</abbr></label>

                                            <select class="form-control not-null @error('gioi_tinh') is-invalid @enderror" id="gioi_tinh" name="gioi_tinh" title="Giới tính">
                                                <option value="" selected
                                                        class="text-center">{{__('Chọn giới tính')}}</option>
                                                <option value="1"
                                                        @if($data['nguoi_tim_viec']['gioi_tinh'] != null) @if($data['nguoi_tim_viec']['gioi_tinh'] == 1) selected @endif @endif>{{__('Nam')}}</option>
                                                <option value="2"
                                                        @if($data['nguoi_tim_viec']['gioi_tinh'] != null) @if($data['nguoi_tim_viec']['gioi_tinh'] == 2)  selected @endif @endif>{{__('Nữ')}}</option>
                                            </select>
                                            @error('gioi_tinh')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ngay_sinh">{{__('Ngày sinh')}}<abbr style="color: red">*</abbr></label>
                                            <input class="form-control not-null @error('ngay_sinh') is-invalid @enderror" title="Ngày sinh"
                                                   placeholder="@if($data['nguoi_tim_viec']['ngay_sinh'] == '' || $data['nguoi_tim_viec']['ngay_sinh'] == null){{'Chọn ngày sinh'}}@endif"
                                                   id="ngay_sinh" name="ngay_sinh"
                                                   value="@if($data['nguoi_tim_viec']['ngay_sinh'] == '' || $data['nguoi_tim_viec']['ngay_sinh'] == null){{''}}@else{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$data['nguoi_tim_viec']['ngay_sinh'])->format('d/m/Y')}}@endif">
                                            @error('ngay_sinh')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                {{--                                    <div class="row">--}}
                                {{--                                        <div class="col-6">--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label--}}
                                {{--                                                    for="muc_tieu_nghe_nghiep">{{__('Mục tiêu nghề nghiệp:')}}</label>--}}
                                {{--                                                <textarea class="form-control" id="muc_tieu_nghe_nghiep"--}}
                                {{--                                                          placeholder="Hãy viết gì đó...">@if($data['nguoi_tim_viec']['gioi_thieu'] != null){{$data['nguoi_tim_viec']['gioi_thieu']}}@endif</textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div> <!-- end col -->--}}
                                {{--                                        <div class="col-6">--}}
                                {{--                                            <div class="form-group">--}}
                                {{--                                                <label for="so_thich">{{__('Sở thích:')}}</label>--}}
                                {{--                                                <textarea class="form-control" id="so_thich"--}}
                                {{--                                                          placeholder="Hãy viết gì đó...">@if($data['nguoi_tim_viec']['so_thich'] != null){{$data['nguoi_tim_viec']['so_thich']}}@endif</textarea>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div> <!-- end col -->--}}
                                {{--                                    </div> <!-- end row -->--}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dia_chi">{{__('Điện thoại')}}<abbr style="color: red">*</abbr></label>
                                            <input type="text" class="form-control not-null @error('so_dien_thoai') is-invalid @enderror" id="so_dien_thoai" name="so_dien_thoai"
                                                   value="{{Auth::user()->phone}}" title="Điện thoại"
                                                   placeholder="Nhập địa chỉ">
                                            @error('so_dien_thoai')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                            {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dia_chi">{{__('Địa chỉ')}}<abbr style="color: red">*</abbr></label>
                                            <input type="text" class="form-control not-null @error('dia_chi') is-invalid @enderror" id="dia_chi" name="dia_chi" title="Địa chỉ"
                                                   value="@if($data['nguoi_tim_viec']['dia_chi'] != null){{$data['nguoi_tim_viec']['dia_chi']}}@endif"
                                                   placeholder="Nhập địa chỉ">
                                            @error('dia_chi')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                            {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                        </div>

                                    </div>

                                </div> <!-- end row -->

                                <div class="form-group row justify-content-end mb-2">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right">
                                        <div class="checkbox checkbox-primary">
                                            <input id="allow-see-infomation" name="allow_see_infomation" type="checkbox"
                                                   class="form-control d-none  @error('allow_see_infomation') is-invalid @enderror">
                                            <label for="allow-see-infomation" class="mb-0">
                                                Đồng ý cho nhà tuyển dụng có thể truy cập thông tin cá nhân!<abbr style="color: red">*</abbr>
                                            </label>
                                            @error('allow_see_infomation')
                                            <span class="invalid-feedback text-right" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Lưu lại và tiếp tục</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    @endif
@endsection

@push('scripts')
@endpush
