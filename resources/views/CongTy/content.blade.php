<div class="row center-element">


<div class="col-sm-12 col-md-8">
    <div class="card-box">
        <input id="object-fillter" type="hidden"
               value="@if(isset($data['data']) && $data['data']['id'] != null){{$data['data']['id']}}@endif"
        >
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="logo_cong_ty">{{__('Logo: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 center-element position-relative">
                <div style="width: 8rem;height: 8rem;" id="logo_cong_ty">
                    <img src="@if(isset($data['data']) && $data['data']['logo'] != null){{URL::asset(env('URL_ASSET_PUBLIC').$data['data']['logo'].'')}}@else{{URL::asset(env('URL_ASSET_PUBLIC').'images/default-company-logo.jpg')}}@endif"
                         class="avatar-xl img-thumbnail"
                         data-data="{{$data['data']['logo']}}" name="logo_cong_ty"
                         alt="profile-image" tabindex="-1" style="width: 100%;height: 100%">
                    <div class="position-absolute hover-me"
                         style="display:none;width: 8rem;height: 8rem;top:0">
                        <div class="position-relative center-element"
                             style="width: 100%;height: 100%;background-color: rgba(50, 58, 70, .55)">
                            <div>
                                <div class="row mt-1 mb-1">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <button class="btn btn-success btn-sm logo_cong_ty_change">Đổi ảnh
                                        </button>
                                        <input type="file" class="d-none logo_cong_ty_file">
                                    </div>
                                </div>
                                <div class="row mt-1 mb-1">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <button class="btn btn-light btn-sm logo_cong_ty_view">Xem ảnh</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-1 mb-1 d-block d-md-none">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <button class="btn btn-success btn-sm logo_cong_ty_change">Đổi ảnh</button>
                        </div>
                    </div>
                    <div class="row mt-1 mb-1 d-block d-md-none">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <button class="btn btn-light btn-sm logo_cong_ty_view">Xem ảnh</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="ten_cong_ty"><abbr class="text-danger  font-15">* </abbr>{{__('Tên công ty: ')}}
                </label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
                <input class="form-control not-null" id="ten_cong_ty" title="Tên công ty"
                       value="@if(isset($data['data']) && $data['data']['name'] != null){{$data['data']['name']}}@endif">
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="link_website">{{__('Website: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <input class="form-control" id="link_website" title="Website"
                       value="@if(isset($data['data']) && $data['data']['websites'] != null){{$data['data']['websites']}}@endif">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="email_cong_ty"><abbr class="text-danger  font-15">* </abbr>{{__('Email: ')}}
                </label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <input class="form-control not-null" id="email_cong_ty" data-rule="email" title="Email"
                       value="@if(isset($data['data']) && $data['data']['email'] != null){{$data['data']['email']}}@endif">
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="dien_thoai_cong_ty"><abbr
                        class="text-danger  font-15">* </abbr>{{__('Điện thoại: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <input class="form-control not-null" id="dien_thoai_cong_ty" maxlength="10"
                       title="Điện thoại"
                       value="@if(isset($data['data']) && $data['data']['phone'] != null){{$data['data']['phone']}}@endif">
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="dia_chi_chinh"><abbr
                        class="text-danger  font-15">* </abbr>{{__('Địa chỉ chính: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
                <input class="form-control not-null" id="dia_chi_chinh" title="Địa chỉ chính"
                       value="@if(isset($data['data']) && $data['data']['dia_chi'] != null){{$data['data']['dia_chi']}}@endif">
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="dia_chi_chinh"><abbr
                        class="text-danger  font-15">* </abbr>{{__('Địa điểm: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
                <select class="form-control not-null" id="dia_diem" title="Địa điểm">
                    <option disabled selected value="">Chọn địa điểm</option>
                    @if($data['dia_diem'] != null)
                        @foreach($data['dia_diem'] as $row)
                            <option value="{{$row['id']}}" @if(isset($data['data']['dia_diem_id']) && $data['data']['dia_diem_id'] != null) @if($row['id'] == $data['data']['dia_diem_id']){{'selected'}}@endif @endif>{{$row['name']}}</option>
                        @endforeach
                    @endif
                </select>
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="so_luong_chi_nhanh">{{__('Số lượng chi nhánh: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-left">
                <input class="form-control" id="so_luong_chi_nhanh" title="Số lượng chi nhánh" readonly
                       value="@if(isset($data['data']) && $data['data']['dia_chi_chi_nhanh'] != null){{count($data['data']['dia_chi_chi_nhanh'])}}@else{{0}}@endif">

                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>

            </div>
        </div>

        <div class="row form-group  @if(isset($data['data']) && $data['data']['dia_chi_chi_nhanh'] == null){{'d-none'}}@endif" id="dia_chi_chi_nhanh">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="dia_chi_chi_nhanh">{{__('Địa chỉ chi nhánh: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left" id="dia_chi_chi_nhanh_append">
                @if(isset($data['data']) && $data['data']['dia_chi_chi_nhanh'] != null)
                    @for($i = 0 ,$row = $data['data']['dia_chi_chi_nhanh']; $i < count($row);$i++)
                        {{--                            @foreach($data['data']['dia_chi_chi_nhanh'] as $row)--}}
                        <div class="xoa-element">Địa chỉ chi nhánh số {{$i+1}}:<input class="form-control dia_chi_chi_nhanh child-not-null" title="Địa chỉ chi nhánh" value="{{$row[$i]}}"><span class="invalid-feedback" role="alert">
                                                            <strong></strong>
                                                        </span></div>
                        {{--                                <input class="form-control dia_chi_chi_nhanh child-not-null" title="Địa chỉ chi nhánh"--}}
                        {{--                                                               value="{{$row}}">--}}
                        {{----}}

                        {{--                                @endforeach--}}
                    @endfor
                @endif
                {{--
                {{--                        <input value="dasd">--}}

            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label><abbr
                        class="text-danger  font-15">* </abbr>{{__('Giờ làm việc: ')}}</label>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 pr-md-0">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text pl-1 pr-1">{{__('Từ')}}</span>
                    </div>

                    <input class="form-control not-null" style="border-left: none" id="from_time"
                           value="@if(isset($data['data']) && $data['data']['gio_lam_viec'] != null){{$data['data']['gio_lam_viec'][0]}}@else{{date('08:00')}}@endif">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 pl-md-0">
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text pl-0 pr-0">{{__('Đến')}}</span>
                    </div>
                    <input class="form-control not-null" style="border-left: none" id="to_time"
                           value="@if(isset($data['data']) && $data['data']['gio_lam_viec'] != null){{$data['data']['gio_lam_viec'][1]}}@else{{date('17:30')}}@endif">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>

                </div>

            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label><abbr
                        class="text-danger  font-15">* </abbr>{{__('Ngày làm việc: ')}}</label>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 pr-md-0 text-center">
                <div class="input-group">
                    <div class="input-group-append pl-1 pr-1"
                         style="position: absolute;z-index: 1;left: -6px;">
                        <span class="input-group-text pl-1 pr-1">{{__('Từ')}}</span>
                    </div>
                    <select class="form-control text-center not-null" id="from_day" title="Ngày làm việc">
                        <option value="" selected disabled>Chọn thứ</option>
                        <option value="1" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][0] == 1){{'selected'}}@endif @endif>{{__('Chủ nhật')}}</option>
                        <option value="2" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][0] == 2){{'selected'}}@endif @endif>{{__('Thứ hai')}}</option>
                        <option value="3" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][0] == 3){{'selected'}}@endif @endif>{{__('Thứ ba')}}</option>
                        <option value="4" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][0] == 4){{'selected'}}@endif @endif>{{__('Thứ tư')}}</option>
                        <option value="5" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][0] == 5){{'selected'}}@endif @endif>{{__('Thứ năm')}}</option>
                        <option value="6" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][0] == 6){{'selected'}}@endif @endif>{{__('Thứ sáu')}}</option>
                        <option value="7" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][0] == 7){{'selected'}}@endif @endif>{{__('Thứ bảy')}}</option>
                        <option value="8" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][0] == 8){{'selected'}}@endif @endif>{{__('Sáng - Thứ bảy')}}</option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 pl-md-0 text-center">
                <div class="input-group">
                    <div class="input-group-append pl-1 pr-1"
                         style="position: absolute;z-index: 1;left: -6px;">
                        <span class="input-group-text pl-0 pr-0">{{__('Đến')}}</span>
                    </div>
                    <select class="form-control not-null" id="to_day" title="Ngày làm việc">
                        <option value="" selected disabled>Chọn thứ</option>
                        <option value="1" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][1] == 1){{'selected'}}@endif @endif>{{__('Chủ nhật')}}</option>
                        <option value="2" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][1] == 2){{'selected'}}@endif @endif>{{__('Thứ hai')}}</option>
                        <option value="3" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][1] == 3){{'selected'}}@endif @endif>{{__('Thứ ba')}}</option>
                        <option value="4" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][1] == 4){{'selected'}}@endif @endif>{{__('Thứ tư')}}</option>
                        <option value="5" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][1] == 5){{'selected'}}@endif @endif>{{__('Thứ năm')}}</option>
                        <option value="6" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][1] == 6){{'selected'}}@endif @endif>{{__('Thứ sáu')}}</option>
                        <option value="7" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][1] == 7){{'selected'}}@endif @endif>{{__('Thứ bảy')}}</option>
                        <option value="8" @if(isset($data['data']) && $data['data']['ngay_lam_viec'] != null) @if($data['data']['ngay_lam_viec'][1] == 8){{'selected'}}@endif @endif>{{__('Sáng - Thứ bảy')}}</option>
                    </select>
                    {{--                            <input class="form-control" id="to_day" value="{{date('D')}}">--}}
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="quy_mo_nhan_su"><abbr
                        class="text-danger  font-15">* </abbr>{{__('Quy mô nhân sự: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
                <select class="form-control not-null" id="quy_mo_nhan_su" title="Quy mô nhân sự">

                    <option disabled selected value="">Quy mô nhân sự</option>
                    @if($data['quy_mo_nhan_su'] != null)
                        @foreach($data['quy_mo_nhan_su'] as $row)
                            <option value="{{$row['id']}}" @if(isset($data['data']['so_nhan_vien']) && $data['data']['so_nhan_vien'] != null) @if($row['id'] == $data['data']['so_nhan_vien']){{'selected'}}@endif @endif>{{$row['name']}}</option>
                        @endforeach
                    @endif
                </select>
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="linh_vuc_hoat_dong"><abbr
                        class="text-danger  font-15">* </abbr>{{__('Lĩnh vực: ')}}
                </label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">

                <select id="linh_vuc_hoat_dong" class="form-control not-null" multiple="multiple"
                        tabindex="-1"
                        title="Lĩnh vực"
                        aria-hidden="true">
                    <option value="" disabled>Ngành Nghề</option>
                    @if($data['nganh_nghe'] != null)
                        @foreach($data['nganh_nghe'] as $row)
                            <option value="{{$row['id']}}" @if(isset($data['data']['nganh_nghe_ids']) && $data['data']['nganh_nghe_ids'] != null) @if(in_array($row['id'],$data['data']['nganh_nghe_ids']) == true){{'selected'}}@endif @endif>{{$row['name']}}</option>
                        @endforeach
                    @endif
                </select>
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>

            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="fax_cong_ty">{{__('FAX: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <input class="form-control" id="fax_cong_ty" value="@if(isset($data['data']) && $data['data']['fax'] != null){{$data['data']['fax']}}@endif">
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="nam_thanh_lap"><abbr
                        class="text-danger  font-15">* </abbr>{{__('Năm thành lập: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <input class="form-control not-null" id="nam_thanh_lap" value="@if(isset($data['data']) && $data['data']['nam_thanh_lap'] != null){{$data['data']['nam_thanh_lap']}}@else{{date('Y')}}@endif">
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                <label for="logo_cong_ty"><abbr
                        class="text-danger  font-15">* </abbr>{{__('Giới thiệu công ty: ')}}</label>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 center-element position-relative">
                <textarea class="form-control not-null break-custom" id="gioi_thieu_cong_ty">@if(isset($data['data']) && $data['data']['gioi_thieu'] != null){{$data['data']['gioi_thieu']}}@endif</textarea>
                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 col-md-12">
                <button class="btn btn-primary" type="button" id="save-cong-ty">Lưu lại</button>
            </div>
        </div>
    </div>
</div>

</div>
{{--@push('scripts')--}}
{{--@include('BaiViet.scriptThemMoi')--}}
{{--@endpush--}}
