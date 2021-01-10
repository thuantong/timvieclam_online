@extends('master.index')
@section('content')
    <head>
        @include('script_js.datetimepicker.css')
        @include('script_js.sweetalert.css')
    </head>
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

        <form action="{{route('nopdon.nopDonBuocHaiLuuLai')}}" method="post" enctype="multipart/form-data" id="form-buoc-hai">

@csrf
            <input type="hidden" id="kinh-nghiem-lam-viec" name="kinh_nghiem_lam_viec">
            <input type="hidden" name="bai_tuyen_dung" value="{{$data['bai_tuyen_dung']['id']}}">
            <div class="row center-element">
                <div class="col-sm-12 col-md-8">
                    <div class="card-box">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 class="text-capitalize bg-light p-1">Ứng tuyển việc làm: {{$data['bai_tuyen_dung']['tieu_de']}}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h5 class="text-capitalize">Bước 2: Cập nhật thông tin xin việc</h5>
                </div>
            </div>


                        <div class="row center-element" id="about-me-exp">
                            <div class="ajax-nop-don d-none"></div>
                            <div class="col-sm-12 col-md-8">
                                <h5 class="mb-4 text-uppercase bg-light p-2"><i class="mdi mdi-briefcase mr-1"></i>
                                    {{__('Kinh nghiệm làm việc(hoặc thời gian học tập)')}}
                                    <button type="button" class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                            id="add-new-exp">{{__('+')}}</button>
                                </h5>

                                <ul class="list-unstyled timeline-sm" id="exp-list">
                                    {{--                    @dd($data['nguoi_tim_viec'])--}}
                                    @if($data['nguoi_tim_viec']['exp_lam_viec'] != null)
                                        @foreach($data['nguoi_tim_viec']['exp_lam_viec'] as $row)
                                            <li class="timeline-sm-item">
                                    <span
                                        class="timeline-sm-date time-exp"><b>{{$row['from_date']}}</b><br>đến<br><b>{{$row['to_date']}}</b></span>
                                                <div class="btn-group btn-group-sm mb-1" style="float: none;">

                                                    <button type="button"
                                                            class="btn btn-sm btn-warning mr-1 cap-nhat-exp">{{__('Cập nhật')}}</button>
                                                    <button type="button" class="btn btn-sm btn-danger ml-1 mr-1 xoa1-exp">{{__('Xóa')}}</button>
                                                </div>

                                                <h5 class="mt-0 mb-1 company-name-exp"
                                                    style="text-transform: capitalize">{{$row['tenCtyVaChucVu']}}</h5>

                                                <p class="company-link-exp">{{$row['websites']}}</p>
                                                <p class="text-muted mt-2 description-exp">{{$row['mo_ta']}}</p>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                                <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i
                                        class="mdi mdi-cards-variant mr-1"></i>
                                    {{__('Hồ sơ xin việc')}}
                                    <button type="button" class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                            id="add-new-file-upload"
                                            onclick="document.getElementById('add-new-file-upload-input').click()">{{__('Thêm hồ sơ')}}</button>
                                    <small class="text-danger">Hướng dẫn: Chọn các mục cùng lúc với nhau</small>
                                    <input type="file" multiple name="file_pdf_upload[]" class="d-none"
                                           id="add-new-file-upload-input">
                                </h5>

                                <div class="row">
                                    <div class="col-sm-12 col-md-12" id="render-file-upload">

                                    </div>
                                    <div class="col-sm-12 col-md-12" id="render-file-upload-iframe">
                                        <!-- <iframe src=""></iframe> -->
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="button" id="nopDonUngTuyen" class="btn btn-success waves-effect waves-light">Lưu lại và tiếp tục</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    @endif
    @include('User.modal.capNhatExp')

@endsection

@push('scripts')
    @include('script_js.sweetalert.script')
    @include('script_js.datetimepicker.script')
        <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\cap-nhat-kinh-nghiem.js')}}"></script>
    <script>
        $(function () {
            $('input[type=file]').change(function (e) {
                $('#render-file-upload').text(" +" +e.target.files.length+" mục được chọn")

                // $(this).parents('.giz-upload').find('.element-to-paste-filename').text(e.target.files[0].name);
            });
        })
    </script>
@endpush
