<div class="modal fade" id="modal-nop-don" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">{{__('Ứng tuyển: ')}}{{$data['tieu_de']}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="progressbarwizard">

                    <ul class="nav nav-pills nav-justified form-wizard-header mb-0" id="tab-nop-don-header">
                        <li class="nav-item waves-effect">
                            <a href="#thong-tin-ca-nhan" data-toggle="tab" class="nav-link">
                                <span class="number">1.</span>
                                <span class="d-none d-sm-inline">Thông tin cá nhân</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect">
                            <a href="#profile-tab-2" data-toggle="tab" class="nav-link">
                                <span class="number">2.</span>
                                <span class="d-none d-sm-inline">Thông tin xin việc</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect">
                            <a href="#finish-2" data-toggle="tab" class="nav-link">
                                <span class="number">3.</span>
                                <span class="d-none d-sm-inline">Hoàn tất</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content b-0 mb-0" id="tab-nop-don">

                        <div id="bar" class="progress mb-3" style="height: 7px;">
                            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                        </div>

                        <div class="tab-pane" id="thong-tin-ca-nhan">
                            <div class="row">
                                <div class="col-12">
{{--                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i--}}
{{--                                            class="mdi mdi-account-circle mr-1"></i>{{__('Thông tin cá nhân')}}</h5>--}}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ho_ten">{{__('Họ và tên: ')}}</label>
                                                <input type="text" class="form-control not-null" id="ho_ten" title="Họ và tên"
                                                       placeholder="Nhập họ và tên" value="{{Auth::user()->ho_ten}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gioi_tinh">{{__('Giới tính')}}</label>

                                                <select class="form-control not-null" id="gioi_tinh" title="Giới tính">
                                                    <option value="" disabled selected
                                                            class="text-center">{{__('Chọn giới tính')}}</option>
                                                    <option value="1"
                                                            @if($data['nguoi_tim_viec']['gioi_tinh'] != null) @if($data['nguoi_tim_viec']['gioi_tinh'] == 1) selected @endif @endif>{{__('Nam')}}</option>
                                                    <option value="2"
                                                            @if($data['nguoi_tim_viec']['gioi_tinh'] != null) @if($data['nguoi_tim_viec']['gioi_tinh'] == 2)  selected @endif @endif>{{__('Nữ')}}</option>
                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>

                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ngay_sinh">{{__('Ngày sinh')}}</label>
                                                <input class="form-control not-null" title="Ngày sinh"
                                                       placeholder="@if($data['nguoi_tim_viec']['ngay_sinh'] == '' || $data['nguoi_tim_viec']['ngay_sinh'] == null){{'Chọn ngày sinh'}}@endif"
                                                       id="ngay_sinh"
                                                       value="@if($data['nguoi_tim_viec']['ngay_sinh'] == '' || $data['nguoi_tim_viec']['ngay_sinh'] == null){{''}}@else{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$data['nguoi_tim_viec']['ngay_sinh'])->format('d/m/Y')}}@endif">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
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
                                                <label for="dia_chi">{{__('Điện thoại')}}</label>
                                                <input type="text" class="form-control not-null" id="so_dien_thoai"
                                                       value="{{Auth::user()->phone}}" title="Điện thoại"
                                                       placeholder="Nhập địa chỉ">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                                {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                                {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dia_chi">{{__('Địa chỉ')}}</label>
                                                <input type="text" class="form-control not-null" id="dia_chi" title="Địa chỉ"
                                                       value="@if($data['nguoi_tim_viec']['dia_chi'] != null){{$data['nguoi_tim_viec']['dia_chi']}}@endif"
                                                       placeholder="Nhập địa chỉ">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                                {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                                {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                            </div>

                                        </div>

                                    </div> <!-- end row -->

                                    <div class="form-group row justify-content-end mb-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right">
                                            <div class="checkbox checkbox-primary">
                                                <input id="allow-see-infomation" type="checkbox" class="form-control d-none">
                                                <label for="allow-see-infomation" class="mb-0">
                                                    Đồng ý cho nhà tuyển dụng có thể truy cập thông tin cá nhân!
                                                </label>
                                                <span class="invalid-feedback text-right" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <div class="tab-pane" id="profile-tab-2">
                            <div class="row" id="about-me-exp">
                                <div class="ajax-nop-don d-none"></div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h5 class="mb-4 text-uppercase bg-light p-2"><i class="mdi mdi-briefcase mr-1"></i>
                                        {{__('Kinh nghiệm làm việc(hoặc thời gian học tập)')}}
                                        <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                                id="add-new-exp">{{__('+')}}</button>
                                    </h5>

                                    <ul class="list-unstyled timeline-sm" id="exp-list">
                                        @include('User.nguoiTimViec.htmlKinhNghiemLamViec')

                                    </ul>

                                    <h5 class="mb-3 mt-4 d-none text-uppercase bg-light p-2"><i
                                            class="mdi mdi-cards-variant mr-1"></i>
                                        {{__('Dự án')}}
                                        <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                                id="add-new-project">{{__('+')}}</button>

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
                                                <th>{{__('Chức năng')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @include('User.nguoiTimViec.projectsAppend')
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div>

                        <div class="tab-pane" id="finish-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                        <h3 class="mt-0">Bạn đã ứng tuyển thành công !</h3>

                                        <p class="w-75 mb-2 mx-auto">Nhà tuyển dụng đang xem hồ sơ của bạn, bạn sẽ nhận được phản hồi từ họ trong mục thông báo!.</p>

{{--                                        <div class="mb-3">--}}
{{--                                            <div class="custom-control custom-checkbox">--}}
{{--                                                <input type="checkbox" class="custom-control-input" id="customCheck3">--}}
{{--                                                <label class="custom-control-label" for="customCheck3">I agree with the Terms and Conditions</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <ul class="list-inline mb-0 wizard d-none">
                            <li class="previous list-inline-item">
                                <a href="javascript: void(0);" class="btn btn-secondary">Trở lại</a>
                            </li>
                            <li class="next list-inline-item float-right">
                                <button class="btn btn-secondary waves-effect" id="luu-nop-ho-so">Tiếp theo</button>
                            </li>
                        </ul>

                    </div> <!-- tab-content -->
                </div> <!-- end #progressbarwizard-->
            </div>
            <div class="modal-footer">

                    <div class="col-sm-6 col-md-6 col-xl-6 col-xl-6">
                        <button class="btn btn-primary waves-effect float-left">Trở lại</button>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xl-6 col-xl-6 pl-1">
                        <span class="text-danger d-none"></span>
                        <button class="btn btn-primary waves-effect float-right">Tiếp theo</button>
                    </div>

{{--                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">{{__('Thoát')}}</button>--}}
{{--                <button type="button" class="btn btn-primary float-right" id="save-exp">{{__('Cập nhật')}}</button>--}}
            </div>
        </div>
    </div>
</div>
