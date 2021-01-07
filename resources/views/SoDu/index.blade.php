@extends('master.index')
@section('content')

    <div class="modal fade bs-example-modal-center" id="nap_the_modal" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Nạp thẻ')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row form-group center-element">
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <label>Code: </label>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <input value="" class="form-control not-null" title="Code" id="code">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal" id="close">{{__('Thoát')}}</button>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="save">
                        {{__('Lưu lại')}}
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Trang chủ</a></li>
                        <li class="breadcrumb-item active">Số dư</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Số dư')}}</h4>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1 text-right">
                {{--                <div class="row">--}}
                {{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-left">--}}
                {{--                        <button class="btn btn-primary" id="them-moi">Thêm mới</button>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                @if(isset($checkSoDu))
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center text-danger">
{{--                        {{'Bạn phải đăng ký số dư để sử dụng chức năng '.strtolower($checkSoDu['reset'][0])}}--}}
                        {{'Bạn phải đăng ký số dư để sử dụng chức năng '.$checkSoDu['reset'][0]['ten_chuc_nang']}}
                        <span class="d-none" id="check-so-du-chuc-nang">{{$checkSoDu['reset'][0]['href']}}</span>
{{--                        {{'Sau khi đăng ký thành công chọn!!'}}<a href="{{URL::asset($checkSoDu['reset'][0]['href'])}}">Đăng tin</a>--}}
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        @if(Session::exists('so_du') == false)
                        <button class="btn btn-light waves-effect" id="dang_ky_so_du">Đăng ký số dư</button>
                            @else
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Tài Khoản</th>
                                                <th>Số Xu</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{$data['data']['ten_tai_khoan']}}</td>
                                                <td>@money_xu($data['data']['tong_tien'])</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <button class="btn btn-primary waves-effect" id="nap_the">Nạp thẻ</button>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#dang_ky_so_du').on('click',function () {
                sendAjaxNoFunc('post','/so-du-tai-khoan/dang-ky',{},$(this).attr('id')).done(e =>{
                    getHtmlResponse(e);
                    if(e.status == 200){
                        let hrefContent = $('#check-so-du-chuc-nang').text();
                        if (hrefContent != undefined){
                            window.location.href = hrefContent;
                        }else{
                            window.location.href = '{{route('sodu.index')}}';
                        }
                    }
                });
            });
            $('#nap_the').on('click',function () {
                $('#nap_the_modal').modal('show')
            });
            $('#nap_the_modal #save').on('click',function () {
                let code = $(this).parents('.modal').find('#code').val();
                sendAjaxNoFunc('post','/so-du-tai-khoan/nap-the',{code:code},$(this).attr('id')).done(e=>{
                    // console.log(e);
                    getHtmlResponse(e);
                    if (e.status == 200){
                        // $('#nap_the_modal').modal('hide');
                        window.location.href = '{{route('sodu.index')}}';
                    }
                })
            });

        })
    </script>
    @endpush
