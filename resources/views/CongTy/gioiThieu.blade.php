{{-- @dd(isset($data['get_cong_ty'])) --}}
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
        <div class="card-box p-1 mb-1">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h4 class="tieu_de p-1 m-0 text-center bg-light text-uppercase cong_ty"
                        id="ten_cong_ty">@if(isset($data['get_cong_ty']) && $data['get_cong_ty'] != null) @if($data['get_cong_ty']['name'] != null){{$data['get_cong_ty']['name']}}@endif @endif</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-2 p-1">
                    <img
                        src="@if(isset($data['get_cong_ty']) && $data['get_cong_ty']['logo'] != null){{URL::asset(env('URL_ASSET_PUBLIC').$data['get_cong_ty']['logo'].'')}}@endif"
                        class="cong_ty_logo" style="width: calc(100%)">

                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <i class="cong_ty_nganh_nghe">
                                @if(isset($data['cong_ty_nganh_nghe']) && $data['cong_ty_nganh_nghe'] != null)
                                    {{implode(' - ', array_map(function($c) {
                                            return $c['name'];
                                        }, $data['cong_ty_nganh_nghe']))}}
                                @endif
                            </i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <span class="fa fa-globe"></span><span class="cong_ty_websites">
                                    @if(isset($data['get_cong_ty']) && $data['get_cong_ty'] != null)
                                    {{$data['get_cong_ty']['websites']}}
                                @endif
                                </span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <span class="icofont icofont-location-pin"></span><span class="cong_ty_dia_chi">
                                    @if(isset($data['get_cong_ty']) && $data['get_cong_ty'] != null)
                                    {{$data['get_cong_ty']['dia_chi']}}
                                @endif
                                </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <span class="fa fa-group"></span><span class="quy_mo">
                            @if(isset($data['get_cong_ty']) && $data['get_cong_ty'] != null)
                                    {{$data['get_cong_ty']['get_quy_mo_nhan_su']['name']}}
                                @endif
                             </span>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label class="mb-0">Giới thiệu:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 overflow-hidden" style="max-height: 20vh">
                            <span class="gioi_thieu">
                                    @if(isset($data['get_cong_ty']) && $data['get_cong_ty'] != null)
                                    {{--                                            @for($i = 0 ; $i < 200; $i++)--}}
                                    {{$data['get_cong_ty']['gioi_thieu']}}
                                    {{--                                                @endfor--}}

                                @endif
                                </span>
                            {{--                                <button class="btn-sm btn btn-primary">đấ</button>--}}
                        </div>

                    </div>
                    @if(isset($data['get_cong_ty']))
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-left">

                            <a href="@if(isset($data['get_cong_ty'])){{route('nhatuyendung.chiTietNhaTuyenDung',['nha_tuyen_dung'=>$data['get_nha_tuyen_dung']['id'] ])}}@endif" class="btn-sm btn btn-default text-primary p-0">[Xem chi tiết]</a>
                        </div>

                    </div>
                    @endif

                </div>
                <div class="col-sm-12 col-md-12 text-center">
                    @if(isset($data['get_cong_ty']) && intval(Session::get('loai_tai_khoan')) == 1)
                        <div class="row">
                            <div class="col-sm-6 col-md-6 text-left">
                                {{-- @dd($data['nguoi_tim_viec']['get_nha_tuyen_dung_quan_tam']) --}}
                                <div
                                    class="btn quan-tam-nha-tuyen-dung mt-2  @if(isset($data['get_nha_tuyen_dung']) && in_array($data['get_nha_tuyen_dung']['id'],$data['nguoi_tim_viec']['get_nha_tuyen_dung_quan_tam']) == true) btn-info like-animation @else btn-outline-info @endif waves-effect position-relative"
                                    id="quan-tam-nha-tuyen-dung"
                                    data-id="@if(isset($data['get_nha_tuyen_dung']) && $data['get_nha_tuyen_dung']['id'] != null){{$data['get_nha_tuyen_dung']['id']}}@endif">
                                    <i class="icofont icofont-thumbs-up">@if(isset($data['get_nha_tuyen_dung']) && in_array($data['get_nha_tuyen_dung']['id'],$data['nguoi_tim_viec']['get_nha_tuyen_dung_quan_tam']) == true){{' Đã quan tâm'}}@else{{' Quan tâm'}}@endif</i>
                                    <span class="badge badge-danger noti-icon-badge position-absolute"
                                          style="right: 0px">@if(isset($data['get_nha_tuyen_dung']) && in_array($data['get_nha_tuyen_dung']['id'],$data['nguoi_tim_viec']['get_nha_tuyen_dung_quan_tam']) == true){{count($data['get_nha_tuyen_dung']['get_nguoi_tim_viec_quan_tam'])}}@endif</span>
                                </div>

                            </div>
                            <div class="col-sm-6 col-md-6 text-right">
                                <button
                                    class="btn mt-2 @if(count($data['nguoi_tim_viec']) && in_array($data['get_nha_tuyen_dung']['id'],$data['nguoi_tim_viec']['get_bao_cao']) == false) btn-outline-primary @else btn-primary like-animation @endif waves-effect bao-cao-button-call"
                                    @if(count($data['nguoi_tim_viec']) && in_array($data['get_nha_tuyen_dung']['id'],$data['nguoi_tim_viec']['get_bao_cao']) == false) id="bao-cao-button-call" data-id="{{$data['get_nha_tuyen_dung']['id']}}" @endif
                                ><i
                                        class="fa fa-exclamation"></i>@if(count($data['nguoi_tim_viec']) && in_array($data['get_nha_tuyen_dung']['id'],$data['nguoi_tim_viec']['get_bao_cao'])){{__(' Đã báo cáo')}}@else{{__(' Báo cáo')}}@endif
                                </button>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>