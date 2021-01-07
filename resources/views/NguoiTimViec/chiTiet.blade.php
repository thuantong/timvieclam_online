<div class="row" id="nguoi-tim-viec-container">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card-box text-center">
                    <form>

                        @csrf
                        <input type="file" id="update_avatar" class="d-none">

                        <img class="rounded-circle avatar-xl img-thumbnail"
                             src="@if($data['nguoi_tim_viec']['avatar'] != null){{URL::asset(env('URL_ASSET_PUBLIC').$data['nguoi_tim_viec']['avatar'])}}@elseif($data['nguoi_tim_viec']['avatar'] == null){{URL::asset(env('URL_ASSET_PUBLIC').'images\default-user-icon-8.jpg')}}@endif"
                             id="avatar-user">

                        <h4 class="mb-0">@if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1){{ucwords($data['nguoi_tim_viec']['get_tai_khoan']['ho_ten'])}}@else{{Auth::user()->ho_ten}}@endif</h4>
{{--                        <p class="text-muted">@webdesigner</p>--}}

                        {{--                            <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow--}}
                        {{--                            </button>--}}
                        {{--                            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message--}}
                        {{--                            </button>--}}

                        <div class="text-left mt-3">
                            <h4 class="font-13 text-uppercase">{{__('Giới thiệu bản thân: ')}}</h4>
                            <p class="font-13 mb-2" id="user_gioi_thieu">
                                @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                    @if($data['nguoi_tim_viec']['gioi_thieu'] == null){{'Chưa có giới thiệu'}}@else{{$data['nguoi_tim_viec']['gioi_thieu']}}@endif
                                @else
                                    <textarea class="form-control"
                                               placeholder="@if($data['nguoi_tim_viec']['gioi_thieu'] == null){{'NULL'}}@endif">@if($data['nguoi_tim_viec']['gioi_thieu'] != null){{$data['nguoi_tim_viec']['gioi_thieu']}}@endif</textarea>
                                    @endif

                            </p>
                            <p class="mb-2 font-13"><strong>{{__('Số điện thoại:')}}</strong><span
                                    class="ml-2">
                                    @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                        @if($data['nguoi_tim_viec']['get_tai_khoan']['phone'] == null){{'Chưa có giới thiệu'}}@else{{$data['nguoi_tim_viec']['get_tai_khoan']['phone']}}@endif
                                    @else
                                        <input class="form-control phone not-null" title="Số điện thoại"
                                               value="{{Auth::user()->phone}}"
                                               autocomplete="off">
                                    @endif
                                        </span>
                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                            </p>

                            <p class="mb-2 font-13"><strong>{{'Email :'}}</strong> <span
                                    class="ml-2 ">
                                    @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                        @if($data['nguoi_tim_viec']['get_tai_khoan']['email'] == null){{'Chưa có email'}}@else{{$data['nguoi_tim_viec']['get_tai_khoan']['email']}}@endif
                                    @else
                                        <input class="form-control email not-null" data-rule="email"
                                               title="Email" value="{{Auth::user()->email}}"
                                               autocomplete="off">
                                    @endif

                                </span>
                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                            </p>


                        </div>


                    </form>

                </div> <!-- end card-box -->

                <div class="card-box position-relative" id="render-skill">
                    <h4 class="header-title">{{__('Kỹ năng công việc')}}
                        @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                        @else
                            <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                    id="add-new-skill">{{__('+')}}</button>
                        @endif
                    </h4>
                    @include('User.nguoiTimViec.skillAppend')
                </div> <!-- end card-box-->

            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card-box position-relative">
                    {{--                        <button class="btn btn-primary btn-sm position-absolute" id="update-right"--}}
                    {{--                                style="top: 10px;right: 10px">{{__('Sửa')}}</button>--}}
                    <ul class="nav nav-pills navtab-bg">
                        <li class="nav-item">

                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                <i class="mdi mdi-settings-outline mr-1"></i>{{__('Thông tin cơ bản')}}
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="#about-me-exp" data-toggle="tab" aria-expanded="true"
                               class="nav-link ml-0">
                                <i class="mdi mdi-face-profile mr-1"></i>{{__('Kinh nghiệm')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#about-me-exp2" data-toggle="tab" aria-expanded="true"
                               class="nav-link ml-0">
                                <i class="mdi mdi-face-profile mr-1"></i>{{__('Hồ sơ')}}
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane" id="about-me-exp2">

                            <div class="row">
{{--                                <div class="col-sm-12 col-md-12">--}}
{{--                                    Tải ảnh CV mới lên:--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12 col-md-12">--}}
{{--                                    <form class="row" action="{{route('nguoitimviec.uploadFile')}}" method="post" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}

{{--                                        --}}{{--                                                @if($errors->any())--}}
{{--                                        <div class="col-sm-12 col-md-12">--}}
{{--                                            @error('file')--}}
{{--                                            <div class="alert alert-danger">--}}
{{--                                                {{$message}}--}}

{{--                                            </div>--}}
{{--                                            <h4></h4>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-6">--}}
{{--                                            <input type="file" name="file" id="file_pdf">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-6 col-md-6">--}}
{{--                                            <button type="submit" class="btn btn-primary">Tải lên</button>--}}
{{--                                        </div>--}}
{{--                                        --}}{{--                                                @endif--}}




{{--                                    </form>--}}

{{--                                </div>--}}
                                @if($data['nguoi_tim_viec']['file_path'] != null)
                                    <div class="col-sm-12 col-md-12">

                                        {{--                                        <a href="{{route('nguoitimviec.viewPDF',array('file_name'=>$data['nguoi_tim_viec']['file_path']))}}" target="_blank">Xem file</a>--}}
                                        {{--                                        <object data="@if($data['nguoi_tim_viec']['file_path'] != null){{URL::asset($data['nguoi_tim_viec']['file_path'])}}@endif" type="application/pdf">--}}
                                        <iframe src="@if($data['nguoi_tim_viec']['file_path'] != null){{URL::asset($data['nguoi_tim_viec']['file_path'])}}@endif" style="width: calc(100%);height: 500px"></iframe>
                                        <a href="@if($data['nguoi_tim_viec']['file_path'] != null){{URL::asset($data['nguoi_tim_viec']['file_path'])}}@endif" class="btn btn-primary waves-effect waves-light position-absolute" style="right: 0px"><i class="fa fa-arrows"></i></a>
                                        {{--                                        </object>--}}

                                        {{--                                        <dic  id="load-file-pdf">--}}

                                        {{--                                        </dic>--}}
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane" id="about-me-exp">

                            <h5 class="mb-4 text-uppercase bg-light p-2"><i class="mdi mdi-briefcase mr-1"></i>
                                {{__('Kinh nghiệm làm việc')}}
                                @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                @else
                                    <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                            id="add-new-exp">{{__('+')}}</button>
                                @endif

                            </h5>

                            <ul class="list-unstyled timeline-sm" id="exp-list">
                                @include('User.nguoiTimViec.htmlKinhNghiemLamViec')
                            </ul>

                            <h5 class="mb-3 mt-4 text-uppercase d-none bg-light p-2"><i
                                    class="mdi mdi-cards-variant mr-1"></i>
                                {{__('Dự án')}}
                                @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                @else
                                    <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                            id="add-new-project">{{__('+')}}</button>
                                @endif

                            </h5>
                            <div class="table-responsive d-none">
                                <table class="table table-bordered mb-0 table-project" id="table-project">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('Tên dự án')}}</th>
                                        <th>{{__('Thời gian bắt đầu')}}</th>
                                        <th>{{__('Ngày hoàn thành')}}</th>
                                        <th>{{__('Trạng thái')}}</th>
                                        <th>{{__('Liên kết')}}</th>
                                        @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                        @else
                                            <th>{{__('Chức năng')}}</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @include('User.nguoiTimViec.projectsAppend')

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- end timeline content-->

                        <div class="tab-pane show active" id="settings">
                            <form>
                                <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                        class="mdi mdi-account-circle mr-1"></i>{{__('Thông tin cá nhân')}}</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ho_ten">{{__('Họ và tên: ')}}</label>
                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['get_tai_khoan']['ho_ten'] != null){{ucwords($data['nguoi_tim_viec']['get_tai_khoan']['ho_ten'])}}@endif</p>
                                            @else
                                                <input type="text" class="form-control not-null" id="ho_ten"
                                                       title="Họ và tên"
                                                       placeholder="Nhập họ và tên" value="{{Auth::user()->ho_ten}}">
                                            @endif

                                            <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="gioi_tinh">{{__('Giới tính')}}</label>
                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['gioi_tinh'] != null)
                                                    @switch($data['nguoi_tim_viec']['gioi_tinh'])
                                                        @case(1)
                                                        {{'Nam'}}
                                                        @break
                                                        @case(2)
                                                            {{'Nữ'}}
                                                        @break
                                                        @endswitch
                                                    @endif</p>
                                            @else
                                                <select class="form-control not-null" id="gioi_tinh" title="Giới tính">
                                                    <option value="" disabled selected
                                                            class="text-center">{{__('Chọn giới tính')}}</option>
                                                    <option value="1"
                                                            @if($data['nguoi_tim_viec']['gioi_tinh'] != null && $data['nguoi_tim_viec']['gioi_tinh'] == 1) selected @endif>{{__('Nam')}}</option>
                                                    <option value="2"
                                                            @if($data['nguoi_tim_viec']['gioi_tinh'] != null && $data['nguoi_tim_viec']['gioi_tinh'] == 2) selected @endif>{{__('Nữ')}}</option>
                                                </select>
                                            @endif


                                            <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>

                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ngay_sinh">{{__('Ngày sinh')}}</label>
                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['ngay_sinh'] == '' || $data['nguoi_tim_viec']['ngay_sinh'] == null){{''}}@else{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$data['nguoi_tim_viec']['ngay_sinh'])->format('d/m/Y')}}@endif</p>
                                            @else
                                                <input class="form-control not-null" title="Ngày sinh"
                                                       placeholder="@if($data['nguoi_tim_viec']['ngay_sinh'] == '' || $data['nguoi_tim_viec']['ngay_sinh'] == null){{'Chọn ngày sinh'}}@endif"
                                                       id="ngay_sinh"
                                                       value="@if($data['nguoi_tim_viec']['ngay_sinh'] == '' || $data['nguoi_tim_viec']['ngay_sinh'] == null){{''}}@else{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$data['nguoi_tim_viec']['ngay_sinh'])->format('d/m/Y')}}@endif">
                                            @endif

                                            <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label
                                                for="muc_tieu_nghe_nghiep">{{__('Mục tiêu nghề nghiệp:')}}</label>
                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['muc_tieu_nghe_nghiep'] != null){{$data['nguoi_tim_viec']['muc_tieu_nghe_nghiep']}}@else{{__('Chưa có miêu tả mục tiêu nghề nghiệp')}}@endif</p>
                                            @else
                                                <textarea class="form-control" id="muc_tieu_nghe_nghiep"
                                                          placeholder="Hãy viết gì đó...">@if($data['nguoi_tim_viec']['muc_tieu_nghe_nghiep'] != null){{$data['nguoi_tim_viec']['muc_tieu_nghe_nghiep']}}@endif</textarea>
                                            @endif

                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="so_thich">{{__('Sở thích:')}}</label>
                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['so_thich'] != null){{$data['nguoi_tim_viec']['so_thich']}}@else{{__('Chưa có miêu tả sở thích')}}@endif</p>
                                            @else
                                                <textarea class="form-control" id="so_thich"
                                                          placeholder="Hãy viết gì đó...">@if($data['nguoi_tim_viec']['so_thich'] != null){{$data['nguoi_tim_viec']['so_thich']}}@endif</textarea>
                                            @endif

                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dia_chi">{{__('Địa chỉ')}}</label>

                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['dia_chi'] != null){{$data['nguoi_tim_viec']['dia_chi']}}@endif</p>
                                            @else
                                                <input type="text" class="form-control" id="dia_chi"
                                                       value="@if($data['nguoi_tim_viec']['dia_chi'] != null){{$data['nguoi_tim_viec']['dia_chi']}}@endif"
                                                       placeholder="Nhập địa chỉ">
                                            @endif

                                            {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                            {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="khu_vuc">{{__('Khu vực')}}</label>
                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['get_dia_diem'] != null){{$data['nguoi_tim_viec']['get_dia_diem']['name']}}@endif</p>
                                            @else
                                                <select class="form-control not-null" id="khu_vuc" title="Chọn khu vực">
                                                    <option disabled selected value="">{{__('Chọn khu vực')}}</option>
                                                    @foreach($data['dia_diem'] as $row)
                                                        <option value="{{$row['id']}}"
                                                                @if($data['nguoi_tim_viec']['dia_diem_id'] != null) @if($data['nguoi_tim_viec']['dia_diem_id'] == $row['id']) selected @endif @endif>{{$row['name']}}</option>
                                                    @endforeach
                                                </select>
                                            @endif

                                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                        </div>
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label for="vt_ung_tuyen">{{__('Vị trí ứng tuyển')}}</label>--}}
                                        {{--                                                <input type="text" class="form-control" id="vt_ung_tuyen"--}}
                                        {{--                                                       value="@if($data['nguoi_tim_viec']['vi_tri_tim'] != null){{$data['nguoi_tim_viec']['vi_tri_tim']}}@endif"--}}
                                        {{--                                                       placeholder="Nhập vị trí ứng tuyển">--}}
                                        {{--                                                <span class="form-text text-muted"><small>Vị trí ứng tuyển dùng để hiện cho nhà tuyển dụng thấy, hoặc để lọc bài tuyển dụng</small></span>--}}
                                        {{--                                            </div>--}}
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                        class="mdi mdi-office-building mr-1"></i>{{__('Thông tin tìm việc')}}</h5>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label>{{__('Mức lương mong muốn: ')}}</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex">
                                                @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                    <p>@if($data['nguoi_tim_viec']['muc_luong'] != null)
                                                        <div class="bg-light center-element pl-2 pr-2 border">Từ</div>
                                                        <input type="text"
                                                               class="form-control text-center font-weight-bold text-primary"
                                                               id="muc_luong_from"
                                                               value="@if($data['nguoi_tim_viec']['muc_luong'] != null){{trim(substr($data['nguoi_tim_viec']['muc_luong'],0,strpos($data['nguoi_tim_viec']['muc_luong'],'-'))).' Triệu'}}@else{{0}}@endif"
                                                               placeholder="Nhập mức lương" readonly>

                                                        <div class="bg-light center-element pl-2 pr-2 border">Đến</div>
                                                        <input type="text"
                                                               class="form-control text-center font-weight-bold text-primary"
                                                               id="muc_luong_to"
                                                               value="@if($data['nguoi_tim_viec']['muc_luong'] != null){{trim(substr($data['nguoi_tim_viec']['muc_luong'],strpos($data['nguoi_tim_viec']['muc_luong'],'-')+1)).' Triệu'}}@else{{0}}@endif"
                                                               placeholder="Nhập mức lương" readonly>

                                                    @endif
                                                @else
                                                    <input type="text"
                                                           class="form-control text-center font-weight-bold text-primary"
                                                           id="muc_luong_from"
                                                           value="@if($data['nguoi_tim_viec']['muc_luong'] != null){{trim(substr($data['nguoi_tim_viec']['muc_luong'],0,strpos($data['nguoi_tim_viec']['muc_luong'],'-')))}}@else{{0}}@endif"
                                                           placeholder="Nhập mức lương">
                                                    <input type="text"
                                                           class="form-control text-center font-weight-bold text-primary"
                                                           id="muc_luong_to"
                                                           value="@if($data['nguoi_tim_viec']['muc_luong'] != null){{trim(substr($data['nguoi_tim_viec']['muc_luong'],strpos($data['nguoi_tim_viec']['muc_luong'],'-')+1))}}@else{{0}}@endif"
                                                           placeholder="Nhập mức lương">
                                                @endif


                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                        <div class="form-group">
                                            <label for="hoc_van">{{__('Học vấn:')}}</label>

                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['get_bang_cap'] != null){{$data['nguoi_tim_viec']['get_bang_cap']['name']}}@endif</p>
                                            @else
                                                <select class="form-control not-null hoc_van" id="hoc_van"
                                                        title="Học vấn">
                                                    <option disabled selected value="">{{__('Chọn học vấn')}}</option>
                                                    @foreach($data['bang_cap'] as $row)
                                                        @if($row['id'] != 1)
                                                            <option value="{{$row['id']}}"
                                                                    @if($data['nguoi_tim_viec']['bang_cap_id'] != null) @if($data['nguoi_tim_viec']['bang_cap_id'] == $row['id']) selected @endif @endif>{{$row['name']}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @endif

                                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                        <div class="form-group">
                                            <label
                                                for="ten_truong_tot_nghiep">{{__('Tên trường tốt nghiệp: ')}}</label>

                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['ten_truong_tot_nghiep'] != null){{$data['nguoi_tim_viec']['ten_truong_tot_nghiep']}}@endif</p>
                                            @else
                                                <input class="form-control ten_truong_tot_nghiep"
                                                       value="@if($data['nguoi_tim_viec']['ten_truong_tot_nghiep'] != null){{$data['nguoi_tim_viec']['ten_truong_tot_nghiep']}}@endif"
                                                       id="ten_truong_tot_nghiep"
                                                       placeholder="VD: Trường Đại Học Công Nghiệp Thành Phố HCM.">
                                            @endif

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                        <div class="form-group">
                                            <label for="loai_cong_viec">{{__('Loại công việc')}}</label>

                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['get_kieu_lam_viec'] != null){{$data['nguoi_tim_viec']['get_kieu_lam_viec']['name']}}@endif</p>
                                            @else
                                                <select class="form-control loai_cong_viec" id="loai_cong_viec">
                                                    <option disabled selected value="">{{__('Loại công việc')}}</option>
                                                    @foreach($data['kieu_lam_viec'] as $row)
                                                        <option value="{{$row['id']}}"
                                                                @if($data['nguoi_tim_viec']['kieu_lam_viec_id'] != null) @if($data['nguoi_tim_viec']['kieu_lam_viec_id'] == $row['id']) selected @endif @endif>{{$row['name']}}</option>
                                                    @endforeach

                                                </select>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                        <div class="form-group">
                                            <label for="vt_ung_tuyen">{{__('Vị trí ứng tuyển')}}</label>

                                            @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1)
                                                <p>@if($data['nguoi_tim_viec']['vi_tri_tim'] != null){{$data['nguoi_tim_viec']['vi_tri_tim']}}@endif</p>
                                            @else
                                                <input type="text" class="form-control" id="vt_ung_tuyen"
                                                       value="@if($data['nguoi_tim_viec']['vi_tri_tim'] != null){{$data['nguoi_tim_viec']['vi_tri_tim']}}@endif"
                                                       placeholder="Nhập vị trí ứng tuyển">
                                                <span class="form-text text-muted"><small>Vị trí ứng tuyển dùng để hiện cho nhà tuyển dụng thấy, hoặc để lọc bài tuyển dụng</small></span>
                                            @endif

                                        </div>

                                    </div>
                                </div>

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i>
                                    {{__('Mạng xã hội:')}}</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-fb">Facebook</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-facebook-official"></i></span>
                                                </div>
                                                <input type="text" class="form-control social-link" id="social-fb"
                                                       value="@if($data['nguoi_tim_viec']['social'] != null){{unserialize($data['nguoi_tim_viec']['social'])[0]}}@endif"
                                                       placeholder="Url" @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1) readonly @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-tw">Twitter</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-twitter"></i></span>
                                                </div>
                                                <input type="text" class="form-control social-link" id="social-tw"
                                                       value="@if($data['nguoi_tim_viec']['social'] != null){{unserialize($data['nguoi_tim_viec']['social'])[1]}}@endif"
                                                       placeholder="Username" @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1) readonly @endif>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-insta">Instagram</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-instagram"></i></span>
                                                </div>
                                                <input type="text" class="form-control social-link"
                                                       id="social-insta"
                                                       value="@if($data['nguoi_tim_viec']['social'] != null){{unserialize($data['nguoi_tim_viec']['social'])[2]}}@endif"
                                                       placeholder="Url" @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1) readonly @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-lin">Linkedin</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-linkedin"></i></span>
                                                </div>
                                                <input type="text" class="form-control social-link" id="social-lin"
                                                       value="@if($data['nguoi_tim_viec']['social'] != null){{unserialize($data['nguoi_tim_viec']['social'])[3]}}@endif"
                                                       placeholder="Url" @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1) readonly @endif>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-sky">Skype</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-skype"></i></span>
                                                </div>
                                                <input type="text" class="form-control social-link" id="social-sky"
                                                       value="@if($data['nguoi_tim_viec']['social'] != null){{unserialize($data['nguoi_tim_viec']['social'])[4]}}@endif"
                                                       placeholder="@username" @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1) readonly @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="social-gh">Github</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-github"></i></span>
                                                </div>
                                                <input type="text" class="form-control social-link" id="social-gh"
                                                       value="@if($data['nguoi_tim_viec']['social'] != null){{unserialize($data['nguoi_tim_viec']['social'])[5]}}@endif"
                                                       placeholder="Username" @if(\Illuminate\Support\Arr::exists($data,'chi_tiet_nguoi_tim_viec') == true && $data['chi_tiet_nguoi_tim_viec'] == 1) readonly @endif>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->


                                {{--                                    <div class="text-right">--}}
                                {{--                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i--}}
                                {{--                                                class="mdi mdi-content-save"></i> Save--}}
                                {{--                                        </button>--}}
                                {{--                                    </div>--}}
                            </form>
                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div> <!-- end card-box-->

            </div> <!-- end col -->
        </div>
    </div>
</div>
