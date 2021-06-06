<div class="row">
    <small class="col-sm-12 col-md-12">
       <i>Hạn nộp hồ sơ: 
       <span class="han_nop">@if (isset($data['han_tuyen'])){{$data['han_tuyen']}}@endif</span>
        - Mức lương:
       <span class="salary_from">@if (isset($data['luong_from'])){{$data['luong_from']}}@endif</span>
        triệu đến 
       <span class="salary_to">@if (isset($data['luong_to'])){{$data['luong_to']}}@endif</span>
        triệu
    </i>  </small>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">
                <u>Mô
                    tả công việc:</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mo_ta_cong_viec" id="mo_ta_cong_viec">
                @if(isset($data['mo_ta']) && $data['mo_ta'] != null){!! $data['mo_ta'] !!}@endif
            </div>
        </div>

        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">
                <u>Yêu
                    cầu công việc</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 yeu_cau_cong_viec" id="yeu_cau_cong_viec">
                @if(isset($data['yeu_cau_cong_viec']) && $data['yeu_cau_cong_viec'] != null){!! $data['yeu_cau_cong_viec'] !!}@endif
            </div>
        </div>
        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">
                <u>Quyền
                    lợi được hưởng</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 quyen_loi_cong_viec"
                 id="quyen_loi_cong_viec">
                @if(isset($data['quyen_loi']) && $data['quyen_loi'] != null){!! $data['quyen_loi'] !!}@endif
            </div>
        </div>
        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left"><u >Địa
                    chỉ</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="dia_chi">
                <span class="dia_chi_cv">@if(isset($data['dia_chi']) && $data['dia_chi'] != null){{$data['dia_chi']}}@endif</span> 
                @if(isset($data['get_dia_diem']))-
                <a href="{{route('trangchu.index',['dia_diem_id'=>$data['get_dia_diem']['id']])}}"
                   class="text-primary">@if(isset($data['get_dia_diem']) && $data['get_dia_diem'] != null)
                        ({{$data['get_dia_diem']['name']}})@endif</a>@endif
            </div>
        </div>

        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left"><u>Tính
                    chất công việc</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 chuc_vu" id="chuc_vu">
                
                {{-- @if(isset($data['get_chuc_vu']) && $data['get_chuc_vu'] != null) --}}
                    <div
                        class="btn btn-white border waves-effect"><a class="text-dark"
                                                                     href="@if(isset($data['get_chuc_vu']) && $data['get_chuc_vu'] != null){{route('trangchu.index',['chuc_vu'=>$data['get_chuc_vu']['id']])}}@endif">@if(isset($data['get_chuc_vu']) && $data['get_chuc_vu'] != null){{$data['get_chuc_vu']['name']}}@endif</a>
                    </div>
                    {{-- @endif --}}
            </div>
        </div>

        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left"><u>Chức
                    vụ</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 chuc_vu">
               
                {{-- @if($data['get_kieu_lam_viec'] != null) --}}
                    <div
                        class="btn btn-white border waves-effect"><a class="text-dark"
                                                                     href="@if(isset($data['get_kieu_lam_viec']) && $data['get_kieu_lam_viec'] != null){{route('trangchu.index',['kieu_lam_viec'=>$data['get_kieu_lam_viec']['id']])}}@endif">@if(isset($data['get_kieu_lam_viec']) && $data['get_kieu_lam_viec'] != null){{$data['get_kieu_lam_viec']['name']}}@endif</a>
                    </div>
                    {{-- @endif --}}
            </div>
        </div>
        @if (isset($data['get_nganh_nghe']))
            <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left"><u>Ngành
                    nghề</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 nganh_nghe"
                 id="nganh_nghe">
                @if($data['get_nganh_nghe'] != null)
                    {{implode('', array_map(function($c) {
echo '<a class="btn btn-white waves-effect border text-dark loc-nganh-nghe" href="'.route('trangchu.index',['nganh_nghe'=>$c['id']]).'" data-id="'.$c['id'].'">'.$c['name'].'</a> ';
                        }, $data['get_nganh_nghe']))}}
                @endif
            </div>
        </div>
        @endif
        
        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left"><u>Yêu
                    cầu bằng cấp</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 yc_bang_cap"
                 id="yc_bang_cap">
                @if(isset($data['get_bang_cap']) && $data['get_bang_cap'] != null)
                    {{$data['get_bang_cap']['name']}}
                @endif
            </div>
        </div>
        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left"><u>Yêu
                    cầu kinh nghiệm</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 kinh_nghiem"
                 id="kinh_nghiem">
                @if(isset($data['get_kinh_nghiem']) && $data['get_kinh_nghiem'] != null)
                    {{$data['get_kinh_nghiem']['name']}}
                @endif
            </div>
        </div>

        {{-- @if($data['yeu_cau_ho_so'] != null && unserialize($data['yeu_cau_ho_so']) != null) --}}
            {{-- @if(count(unserialize($data['yeu_cau_ho_so'])) != 0) --}}
        <div class="form-group row">
            <h4
                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left"><u>Hồ
                    sơ yêu cầu</u></h4>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ho_so_yeu_cau_cv"
                 id="ho_so_yeu_cau">
                    @if (isset($data['yeu_cau_ho_so']))
                    {{ implode(', ', array_map(function($c) {
                        switch($c){
                            case 1:
                            return 'Tiếng Anh';
                           
                            case 2:
                            return 'Tiếng Việt';
                            
                            case 3:
                            return 'Tiếng Pháp';
                           
                            case 4:
                            return 'Tiếng Trung';
                          
                            case 5:
                            return 'Tiếng Nhật';
                         
                            case 6:
                            return 'Tiếng Hàn Quốc';

                        }
                 
                    }, unserialize($data['yeu_cau_ho_so']))) }} 
                    @endif
                                                                        
            </div>
        </div>
            {{-- @endif --}}
        {{-- @endif --}}
    </div>
</div>