<div class="row" id="form-body">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0 pr-0">
        <div class="card-box mb-1">
            <div class="row">
                <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <h4 class="text-uppercase bg-light p-2">{{__('Thông Tin Cơ Bản')}}</h4></label>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Chức danh tuyển dụng:')}}<abbr class="text-danger  font-15">* </abbr></label>

                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <input class="form-control not-null tieu_de_bai_dang" id="tieu_de_bai_dang" title="Chức danh tuyển dụng">
                    <span class="form-text text-muted"><small><b>Lưu ý:</b><br>- Bạn nên đặt tên vị trí/chức danh phổ biến, đơn giản như "Nhân viên kinh doanh", "Nhân viên văn phòng".
<br>- Đây là yếu tố quan trọng thu hút các ứng viên ứng tuyển và chúng tôi gợi ý các hồ sơ phù hợp.</small></span>

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Mô tả công việc:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div id="mo-ta-editor" class="custom-editor" style="height: 200px;">

                    </div> <!-- end Snow-editor-->
                    <textarea class="form-control not-null mo_ta_cong_viec d-none" id="mo_ta_cong_viec"
                              title="Mô tả công việc"></textarea>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Yêu cầu công việc:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <textarea class="form-control not-null d-none yeu_cau_cong_viec" id="yeu_cau_cong_viec"
                                  title="Yêu cầu công việc"></textarea>
                    <div id="yeu-cau-editor" class="custom-editor" style="height: 200px;">

                    </div>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Quyền lợi được hưởng:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <textarea class="form-control break-custom not-null d-none quyen_loi_cong_viec" id="quyen_loi_cong_viec"
                                  title="Quyền lợi được hưởng"></textarea>
                    <div id="quyen-loi-editor" class="custom-editor" style="height: 200px;">

                    </div>

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Địa điểm làm việc:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null dia_diem_lam_viec" id="dia_diem_lam_viec" title="Địa điểm làm việc">
                        <option disabled selected value="">{{__('Chọn địa điểm')}}</option>
                        @if($dia_diem != null)
                            @foreach($dia_diem as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        @endif

                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Địa chỉ:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <input class="form-control not-null dia_chi_cong_viec" id="dia_chi_cong_viec" maxlength="255" title="Địa chỉ">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="row form-group">

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Hình thức nghề nghiệp:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null hinh_thuc" id="hinh_thuc" title="Hình thức">
                        <option disabled selected value="">{{__('Chọn hình thức')}}</option>
                        @if($kieu_lam_viec != null)
                            @foreach($kieu_lam_viec as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>

                            @endforeach
                        @endif

                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
            {{--            <div class="row form-group">--}}
{{--                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">--}}
{{--                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Công ty tuyển dụng:')}}</label>--}}
{{--                </div>--}}
{{--                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-9 col-md-10 col-lg-10 col-xl-10 pr-0">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12 col-md-4">--}}
{{--                                    <img src="@if(isset($data['cong_ty']) && $data['cong_ty']['logo'] != null){{URL::asset(''.$data['cong_ty']['logo'].'')}}@else{{URL::asset('images/default-company-logo.jpg')}}@endif" width="100" height="100">--}}
{{--                                    <input id="cong_ty_tuyen_dung" class="not-null" type="hidden" title="Công ty" value="@if(isset($data['cong_ty']) && $data['cong_ty']['id'] != null){{$data['cong_ty']['id']}}@endif">--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-12 col-md-8" id="cong_ty_tuyen_dung_name">@if(isset($data['cong_ty']) && $data['cong_ty']['name'] != null)<h5>{{ucwords($data['cong_ty']['name'])}}</h5>@else <h5>{{'Chưa thêm công ty tuyển dụng'}}</h5> @endif</div>--}}
{{--                            </div>--}}
{{--                            <select class="form-control not-null cong_ty_tuyen_dung" id="cong_ty_tuyen_dung"--}}
{{--                                    title="Công ty tuyển dụng">--}}
{{--                                <option value="" disabled selected>Công ty</option>--}}

{{--                                @if($data['cong_ty'] != null)--}}
{{--                                    @foreach($data['cong_ty'] as $row)--}}
{{--                                        <option value="{{$row['id']}}"--}}
{{--                                                data-img="{{URL::asset($row['logo'])}}">{{$row['name']}}</option>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}

{{--                            </select>--}}

{{--                        </div>--}}
{{--                        <div class="col-sm-3 col-md-2 col-lg-2 col-xl-2 pl-0">--}}
{{--                            <button class="btn waves-effect btn-primary call-them-moi-cong-ty" id="call-them-moi-cong-ty">Chỉnh sửa</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Công ty tuyển dụng:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-sm-9 col-md-8 col-lg-8 col-xl-8 pr-0">
                            <div class="row">
                                {{--                                    <div class="col-sm-12 col-md-4">--}}
                                {{--                                        <img src="@if(isset($data['cong_ty']) && $data['cong_ty']['logo'] != null){{URL::asset(''.$data['cong_ty']['logo'].'')}}@else{{URL::asset('images/default-company-logo.jpg')}}@endif" width="100" height="100">--}}
                                {{-- @dd($data['cong_ty']) --}}
                                <input id="cong_ty_tuyen_dung" class="not-null" title="Công ty tuyển dụng"
                                       type="hidden" title="Công ty"
                                       value="@if((count($data) > 0) && isset($data) && $data['id'] != null){{$data['id']}}@endif">

                                {{--                                    </div>--}}
                                <div class="col-sm-12 col-md-12"
                                     id="cong_ty_tuyen_dung_name">@if((count($data) > 0) && isset($data))
                                        <h5>{{Auth::user()->ho_ten}}</h5>@else <h5>{{'Chưa thêm công ty tuyển dụng'}}</h5> @endif
                                    <button class="btn btn-sm waves-effect btn-warning call-them-moi-cong-ty"
                                            id="call-them-moi-cong-ty">Chỉnh sửa
                                    </button>
                                </div>

                                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                            </div>
                            {{--                            <select class="form-control not-null cong_ty_tuyen_dung" id="cong_ty_tuyen_dung"--}}
                            {{--                                    title="Công ty tuyển dụng">--}}
                            {{--                                <option value="" disabled selected>Công ty</option>--}}

                            {{--                                @if($data['cong_ty'] != null)--}}
                            {{--                                    @foreach($data['cong_ty'] as $row)--}}
                            {{--                                        <option value="{{$row['id']}}"--}}
                            {{--                                                data-img="{{URL::asset($row['logo'])}}">{{$row['name']}}</option>--}}
                            {{--                                    @endforeach--}}
                            {{--                                @endif--}}

                            {{--                            </select>--}}

                        </div>
{{--                        <div class="col-sm-3 col-md-2 col-lg-2 col-xl-2 pl-0">--}}
{{--                            --}}
{{--                        </div>--}}
                    </div>

                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Ngành nghề:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null nganh_nghe" id="nganh_nghe" title="Ngành nghề">
                        {{--                            <option selected disabled value="">Ngành nghề</option>--}}
                        @if($nganh_nghe != null)
                            <option value="" disabled selected>Chọn ngành nghề</option>
                            @foreach($nganh_nghe as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        @endif

                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Chức vụ tuyển dụng:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null chuc_vu_tuyen" id="chuc_vu_tuyen" title="Chức vụ tuyển dụng">
                        <option value="" selected disabled>Chọn chức vụ</option>
                        @if($chuc_vu != null)
                            @foreach($chuc_vu as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right d-none">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Tên chức vụ:')}}</label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 d-none">
                    <input class="form-control ten_chuc_vu" id="ten_chuc_vu" placeholder="VD: Nhân viên kế toán"
                           title="Tên chức vụ" value="đã bỏ trường này">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Số lượng tuyển:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <input class="form-control not-null text-center so_luong_tuyen" value="0" id="so_luong_tuyen"
                           title="Số lượng tuyển">

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>




            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Hạn ứng tuyển:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input class="form-control not-null text-center han_tuyen_dung" value="{{date('d/m/Y')}}" id="han_tuyen_dung"
                           title="Hạn ứng tuyển">

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>


            </div>



{{--            mức lương--}}
            <div class="row form-group">

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Mức lương: ')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>

                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 d-md-flex">
                    <input type="text" class="form-control not-null text-center font-weight-bold text-primary muc_luong_from"
                           id="muc_luong_from" value="0" title="Mức lương"
                           placeholder="Nhập mức lương">
                    <input type="text" class="form-control not-null text-center font-weight-bold text-primary muc_luong_to"
                           id="muc_luong_to" value="0" title="Mức lương"
                           placeholder="Nhập mức lương">

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>




            <div class="row">
                <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <h4 class="text-uppercase bg-light p-2">{{__('Yêu cầu chung')}}</h4></label>
            </div>

            <div class="row form-group">

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Số năm kinh nghiệm:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <select class="form-control not-null so_kinh_nghiem" id="so_kinh_nghiem" title="Số năm kinh nghiệm">
                        <option selected disabled value="">Chọn kinh nghiệm</option>
                        @if($kinh_nghiem != null)
                        @foreach($kinh_nghiem as $row)
                            <option value="{{$row['id']}}">{{$row['name']}}</option>
                        @endforeach
@endif
                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
{{--            giới tính--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Yêu cầu giới tính:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <select class="form-control not-null gioi_tinh" id="gioi_tinh" title="Yêu cầu giới tính">
                        <option disabled selected value="">{{__('Chọn giới tính')}}</option>
                        <option value="1">{{__('Nam')}}</option>
                        <option value="2">{{__('Nữ')}}</option>
                        <option value="3">{{__('Tất cả')}}</option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
{{--            độ tuổi--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Độ tuổi:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="input-group">
                        <label class="form-control bg-light">Từ</label>
                        <input class="form-control not-null text-center do_tuoi_from" value="0" id="do_tuoi_from"
                               title="Độ tuổi">
                        <label class="form-control bg-light">Đến</label>
                        <input class="form-control not-null text-center do_tuoi_to" value="0" id="do_tuoi_to" title="Độ tuổi">
                        <label class="form-control bg-light">Tuổi</label>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

            </div>
{{--            bằng cấp yêu cầu--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Bằng cấp yêu cầu:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null bang_cap" id="bang_cap" title="Bằng cấp yêu cầu">
                        <option disabled selected value="">{{__('Chọn học vấn')}}</option>
                        @if($bang_cap != null)
                            @foreach($bang_cap as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Yêu cầu hồ sơ:')}}</label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="mt-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="ban_cap_yeu_cau" value="1">
                            <label class="custom-control-label" for="customCheck1">Tiếng Anh</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="ban_cap_yeu_cau" value="2">
                            <label class="custom-control-label" for="customCheck2">Tiếng Việt</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="ban_cap_yeu_cau" value="3">
                            <label class="custom-control-label" for="customCheck3">Tiếng Pháp</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="ban_cap_yeu_cau" value="4">
                            <label class="custom-control-label" for="customCheck4">Tiếng Trung</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="ban_cap_yeu_cau" value="5">
                            <label class="custom-control-label" for="customCheck5">Tiếng Nhật</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="ban_cap_yeu_cau" value="6">
                            <label class="custom-control-label" for="customCheck6">Tiếng Hàn Quốc</label>
                        </div>
                    </div>
{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}
                </div>

            </div>

            <div class="row">
                <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <h4 class="text-uppercase bg-light p-2">{{__('Đăng ký dịch vụ')}}</h4></label>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Số ngày đăng tin:')}}</label>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input class="form-control not-null text-center so_ngay_ton_tai" value="1" id="so_ngay_ton_tai"
                           title="Số ngày đăng tin">

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
                <span class="form-text text-muted"><small>Số ngày tin được hiển thị trên mục bài đăng tìm việc! (1000đ/1 ngày,tương ứng 1 xu)</small></span>

            </div>

            <div class="form-group row">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Đăng ký bài viết HOT:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="custom-control custom-radio">
                        <div class="row">
                            <div class="col-sm-12 col-md-2">
                                <input type="radio" id="customRadio1" name="dang_ky_bai_viet_hot" class="custom-control-input" value="1">
                                <label class="custom-control-label" for="customRadio1">{{__('Có')}}</label>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <input type="radio" id="customRadio2" name="dang_ky_bai_viet_hot" class="custom-control-input" value="0" checked>
                                <label class="custom-control-label" for="customRadio2">{{__('Không')}} </label>
                            </div>
                        </div>


                    </div>

                    <span class="form-text text-muted"><small>Số ngày tin được hiển thị trên mục bài đăng tìm việc! (1000đ/1 ngày,tương ứng 1 xu)</small></span>

                </div>
            </div>

{{--            <div class="row form-group">--}}
{{--                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">--}}
{{--                    <label>{{__('Đăng ký bài viết HOT:')}}<abbr class="text-danger  font-15">* </abbr></label>--}}
{{--                </div>--}}
{{--                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">--}}
{{--                    <input class="not-null text-center dang_ky_bai_viet_hot" value="1" id="dang_ky_bai_viet_hot" type="checkbox"--}}
{{--                           title="Số ngày đăng tin">--}}

{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}
{{--                </div>--}}
{{--                <span class="form-text text-muted"><small>Số ngày tin được hiển thị trên mục bài đăng tìm việc! (1000đ/1 ngày,tương ứng 1 xu)</small></span>--}}

{{--            </div>--}}


        </div>
    </div>

</div>
