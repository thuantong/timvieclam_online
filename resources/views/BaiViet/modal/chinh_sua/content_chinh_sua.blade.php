{{-- @dd($data) --}}
<div class="row" id="form-update-body">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                    <input type="hidden" value="@if(isset($data['data']['id']) && $data['data']['id'] != null){{$data['data']['id']}}@endif" id="bai_viet_action">
                    <input class="form-control not-null tieu_de_bai_dang_update" id="tieu_de_bai_dang_update" title="Tiêu đề bài viết" value="@if(isset($data['data']['id']) && $data['data']['id'] != null){{$data['data']['tieu_de']}}@endif">
                    <span class="form-text text-muted"><small><b>Lưu ý:</b><br>- Bạn nên đặt tên vị trí/chức danh phổ biến, đơn giản như "Nhân viên kinh doanh", "Nhân viên văn phòng".
<br>- Đây là yếu tố quan trọng thu hút các ứng viên ứng tuyển và chúng tôi gợi ý các hồ sơ phù hợp.</small></span>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
{{--Mô tả công việc--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Mô tả công việc:')}}</label>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div id="mo-ta-update-editor" class="custom-editor" style="height: 200px;">
                        @if(isset($data['data']['mo_ta']) && $data['data']['mo_ta'] != null){!! $data['data']['mo_ta'] !!}@endif
                    </div> <!-- end Snow-editor-->
                        <textarea class="form-control break-custom d-none not-null mo_ta_cong_viec_update" id="mo_ta_cong_viec_update"
                                  title="Mô tả công việc">@if(isset($data['data']['mo_ta']) && $data['data']['mo_ta'] != null){{$data['data']['mo_ta']}}@endif</textarea>



                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
{{--Yêu cầu công việc--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Yêu cầu công việc:')}}</label>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div id="yeu-cau-update-editor" class="custom-editor" style="height: 200px;">
                        @if(isset($data['data']['yeu_cau_cong_viec']) && $data['data']['yeu_cau_cong_viec'] != null){!! $data['data']['yeu_cau_cong_viec'] !!}@endif
                    </div>
                        <textarea class="form-control break-custom d-none not-null yeu_cau_cong_viec_update" id="yeu_cau_cong_viec_update"
                                  title="Yêu cầu công việc" style="height: auto">@if(isset($data['data']['yeu_cau_cong_viec']) && $data['data']['yeu_cau_cong_viec'] != null){{$data['data']['yeu_cau_cong_viec']}}@endif</textarea>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
{{--Quyền lợi được hưởng--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Quyền lợi được hưởng:')}}</label>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div id="quyen-loi-update-editor" class="custom-editor" style="height: 200px;">
                        @if(isset($data['data']['quyen_loi']) && $data['data']['quyen_loi'] != null){!! $data['data']['quyen_loi'] !!}@endif
                    </div>
                        <textarea class="form-control break-custom not-null d-none quyen_loi_cong_viec_update" id="quyen_loi_cong_viec_update"
                                  title="Quyền lợi được hưởng" style="height: auto">@if(isset($data['data']['quyen_loi']) && $data['data']['quyen_loi'] != null){{$data['data']['quyen_loi']}}@endif</textarea>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

{{--địa điểm--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Địa điểm làm việc:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null dia_diem_lam_viec_update" id="dia_diem_lam_viec_update" title="Địa điểm làm việc">
                        <option disabled selected value="">{{__('Chọn địa điểm')}}</option>
                        @if($dia_diem != null)
                            @foreach($dia_diem as $row)
                                <option value="{{$row['id']}}" @if(isset($data['data']['dia_diem_id']) && $data['data']['dia_diem_id'] != null && $data['data']['dia_diem_id'] == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                            @endforeach
                        @endif

                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>
{{--địa chỉ--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Địa chỉ:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <input class="form-control not-null dia_chi_cong_viec_update" id="dia_chi_cong_viec_update" maxlength="255" title="Địa chỉ" value="@if(isset($data['data']['dia_chi']) && $data['data']['dia_chi'] != null){{$data['data']['dia_chi']}}@endif">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
{{--            hình thức--}}
            <div class="row form-group">

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Hình thức nghề nghiệp:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null hinh_thuc_update" id="hinh_thuc_update" title="Hình thức">
                        <option disabled selected value="">{{__('Chọn hình thức')}}</option>
                        @if($kieu_lam_viec != null)
                            @foreach($kieu_lam_viec as $row)
                                <option value="{{$row['id']}}" @if(isset($data['data']['kieu_lam_viec_id']) && $data['data']['kieu_lam_viec_id'] != null && $data['data']['kieu_lam_viec_id'] == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>

                            @endforeach
                        @endif

                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
{{--            ngành nghề--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Ngành nghề:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null nganh_nghe_update" id="nganh_nghe_update" title="Ngành nghề">
                        {{--                            <option selected disabled value="">Ngành nghề</option>--}}
                        @if($nganh_nghe != null)
                            <option value="" disabled selected>Chọn ngành nghề</option>
                            @foreach($nganh_nghe as $row)
                                <option value="{{$row['id']}}" @if(isset($data['data']['get_nganh_nghe']) && $data['data']['get_nganh_nghe'] != null) @if($row['id'] == $data['data']['get_nganh_nghe'][0]['id']){{'selected'}}@endif @endif>{{$row['name']}}</option>
                            @endforeach
                        @endif

                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

{{--            chức vụ--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Chức vụ tuyển dụng:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null chuc_vu_tuyen_update" id="chuc_vu_tuyen_update" title="Chức vụ tuyển dụng">
                        <option value="" selected disabled>Chọn chức vụ</option>
                        @if($chuc_vu != null)
                            @foreach($chuc_vu as $row)
                                <option value="{{$row['id']}}" @if(isset($data['data']['chuc_vu_id']) && $data['data']['chuc_vu_id'] != null && $data['data']['chuc_vu_id'] == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
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

            <div class="row d-none">
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Tên chức vụ:')}}</label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <input class="form-control not-null ten_chuc_vu_update" id="ten_chuc_vu_update" placeholder="VD: Nhân viên kế toán"
                           title="Tên chức vụ" value="trường này đã bỏ">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>
{{--số lượng tuyển--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Số lượng tuyển:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <input class="form-control not-null text-center so_luong_tuyen_update" value="@if(isset($data['data']['so_luong_tuyen']) && $data['data']['so_luong_tuyen'] != null){{$data['data']['so_luong_tuyen']}}@endif" id="so_luong_tuyen_update"
                           title="Số lượng tuyển">

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>
{{--            hạn tuyển--}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Hạn ứng tuyển:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input class="form-control not-null text-center han_tuyen_dung_update" value="@if(isset($data['data']['han_tuyen']) && $data['data']['han_tuyen'] != null){{$data['data']['han_tuyen']}}@else{{date('d/m/Y')}}@endif" id="han_tuyen_dung_update"
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
                    <input type="text" class="form-control not-null text-center font-weight-bold text-primary muc_luong_from_update"
                           id="muc_luong_from_update" value="@if(isset($data['data']['luong_from']) && $data['data']['luong_from'] != null){{$data['data']['luong_from']}}@endif" title="Mức lương"
                           placeholder="Nhập mức lương">
                    <input type="text" class="form-control not-null text-center font-weight-bold text-primary muc_luong_to_update"
                           id="muc_luong_to_update" value="@if(isset($data['data']['luong_to']) && $data['data']['luong_to'] != null){{$data['data']['luong_to']}}@endif" title="Mức lương"
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
{{--            Số năm kinh nghiệm--}}
            <div class="row form-group">

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Số năm kinh nghiệm:')}}<abbr class="text-danger  font-15">* </abbr></label>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <select class="form-control not-null so_kinh_nghiem_update" id="so_kinh_nghiem_update" title="Số năm kinh nghiệm">
                        <option selected disabled value="">Chọn kinh nghiệm</option>
                        @foreach($kinh_nghiem as $row)
                            <option value="{{$row['id']}}" @if(isset($data['data']['kinh_nghiem_id']) && $data['data']['kinh_nghiem_id'] != null && $data['data']['kinh_nghiem_id'] == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                        @endforeach

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
                    <select class="form-control not-null gioi_tinh_update" id="gioi_tinh_update" title="Yêu cầu giới tính">
                        <option disabled selected value="">{{__('Chọn giới tính')}}</option>
                        <option value="1" @if(isset($data['data']['gioi_tinh_tuyen']) && $data['data']['gioi_tinh_tuyen'] != null && $data['data']['gioi_tinh_tuyen'] == 1){{'selected'}}@endif>{{__('Nam')}}</option>
                        <option value="2" @if(isset($data['data']['gioi_tinh_tuyen']) && $data['data']['gioi_tinh_tuyen'] != null && $data['data']['gioi_tinh_tuyen'] == 2){{'selected'}}@endif>{{__('Nữ')}}</option>
                        <option value="3" @if(isset($data['data']['gioi_tinh_tuyen']) && $data['data']['gioi_tinh_tuyen'] != null && $data['data']['gioi_tinh_tuyen'] == 3){{'selected'}}@endif>{{__('Tất cả')}}</option>
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
                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="input-group">
                        <label class="form-control bg-light">Từ</label>
                        <input class="form-control not-null text-center do_tuoi_from_update" value="@if(isset($data['data']['tuoi']) && $data['data']['tuoi'] != null){{$data['data']['tuoi'][0]}}@endif" id="do_tuoi_from_update"
                               title="Độ tuổi">
                        <label class="form-control bg-light">Đến</label>
                        <input class="form-control not-null text-center do_tuoi_to_update" value="@if(isset($data['data']['tuoi']) && $data['data']['tuoi'] != null){{$data['data']['tuoi'][1]}}@endif" id="do_tuoi_to_update" title="Độ tuổi">
                        <label class="form-control bg-light">Tuổi</label>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

            </div>
            {{--bằng cấp--}}
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                                <label>{{__('Bằng cấp yêu cầu:')}}<abbr class="text-danger  font-15">* </abbr></label>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <select class="form-control not-null bang_cap_update" id="bang_cap_update" title="Bằng cấp yêu cầu">
                                    <option disabled selected value="">{{__('Chọn học vấn')}}</option>
                                    @if($bang_cap != null)
                                        @foreach($bang_cap as $row)
                                            <option value="{{$row['id']}}" @if(isset($data['data']['bang_cap_id']) && $data['data']['bang_cap_id'] != null && $data['data']['bang_cap_id'] == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                            </div>



        </div>
{{--bằng cấp --}}
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label>{{__('Yêu cầu hồ sơ:')}}</label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="mt-0">
                        <div class="custom-control custom-checkbox">
{{--                            @dd(count(unserialize($data['data']['yeu_cau_ho_so'])))--}}
                            <input type="checkbox" class="custom-control-input" id="customCheck1_update" name="ban_cap_yeu_cau_update" value="1" @if(isset($data['data']['yeu_cau_ho_so']) && $data['data']['yeu_cau_ho_so'] != null && in_array("1",$data['data']['yeu_cau_ho_so'])){{"checked"}}@endif>
                            <label class="custom-control-label" for="customCheck1_update">Tiếng Anh</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck2_update" name="ban_cap_yeu_cau_update" value="2" @if(isset($data['data']['yeu_cau_ho_so']) && $data['data']['yeu_cau_ho_so'] != null && in_array("2",$data['data']['yeu_cau_ho_so'])){{"checked"}}@endif>
                            <label class="custom-control-label" for="customCheck2_update">Tiếng Việt</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck3_update" name="ban_cap_yeu_cau_update" value="3" @if(isset($data['data']['yeu_cau_ho_so']) && $data['data']['yeu_cau_ho_so'] != null && in_array("3",$data['data']['yeu_cau_ho_so'])){{"checked"}}@endif>
                            <label class="custom-control-label" for="customCheck3_update">Tiếng Pháp</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck4_update" name="ban_cap_yeu_cau_update" value="4" @if(isset($data['data']['yeu_cau_ho_so']) && $data['data']['yeu_cau_ho_so'] != null && in_array("4",$data['data']['yeu_cau_ho_so'])){{"checked"}}@endif>
                            <label class="custom-control-label" for="customCheck4_update">Tiếng Trung</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck5_update" name="ban_cap_yeu_cau_update" value="5" @if(isset($data['data']['yeu_cau_ho_so']) && $data['data']['yeu_cau_ho_so'] != null && in_array("5",$data['data']['yeu_cau_ho_so'])){{"checked"}}@endif>
                            <label class="custom-control-label" for="customCheck5_update">Tiếng Nhật</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck6_update" name="ban_cap_yeu_cau_update" value="6" @if(isset($data['data']['yeu_cau_ho_so']) && $data['data']['yeu_cau_ho_so'] != null && in_array("6",$data['data']['yeu_cau_ho_so'])){{"checked"}}@endif>
                            <label class="custom-control-label" for="customCheck6_update">Tiếng Hàn Quốc</label>
                        </div>
                    </div>
                    {{--                    <span class="invalid-feedback" role="alert">--}}
                    {{--                            <strong></strong>--}}
                    {{--                        </span>--}}
                </div>

            </div>
            <div class="row">
                <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <h4 class="text-uppercase bg-light p-2">{{__('Thông tin dịch vụ')}}</h4></label>
            </div>
            <div class="row form-group">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Gia hạn thêm ngày:')}}</label>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input class="form-control not-null text-center so_ngay_ton_tai" value="0" id="so_ngay_ton_tai_update"
                           title="Số ngày đăng tin">

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
                <span class="form-text text-muted"><small>Số ngày tin được hiển thị trên mục bài đăng tìm việc! (1000đ/1 ngày,tương ứng 1 xu)</small></span>

            </div>
    </div>
    </div>
</div>
