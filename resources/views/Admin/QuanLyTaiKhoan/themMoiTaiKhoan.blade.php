<div class="modal fade" id="modal-them-moi-tai-khoan" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">{{__('Tạo mới tài khoản')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{--                <form method="POST" action="{{ route('auth.register',['admin']) }}">--}}
{{--                    @csrf--}}

                    <div class="form-group row">
                        {{--                            <input type="hidden" id="roleRegister" name="roleRegister" value="{{$role}}">--}}
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Họ và tên') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control not-null" name="name" value="" required autocomplete="off" autofocus>

                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tên tài khoản hoặc Email:') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control not-null" name="email" value="" required autocomplete="off">

                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Số điện thoại') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control not-null" name="phone" value="" required autocomplete="off">

                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control not-null" name="password" required autocomplete="new-password">

{{--                            @error('password')--}}
                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
{{--                            @enderror--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __(' ') }}</label>

                                                <div class="col-md-6">
                                                    @if($data['phan_quyen'] != null)

                                                    @foreach($data['phan_quyen'] as $row)
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio{{$row['id']}}" name="loai_tai_khoan" class="custom-control-input" value="{{$row['id']}}">
                                                        <label class="custom-control-label" for="customRadio{{$row['id']}}">{{$row['name']}}</label>
                                                    </div>
                                                    @endforeach
                                                    @endif
{{--                                                    <div class="custom-control custom-radio">--}}
{{--                                                        <input type="radio" id="customRadio2" name="loai_tai_khoan" class="custom-control-input" value="2">--}}
{{--                                                        <label class="custom-control-label" for="customRadio2">{{__('Tài khoản tuyển dụng')}} </label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="custom-control custom-radio">--}}
{{--                                                        <input type="radio" id="customRadio3" name="loai_tai_khoan" class="custom-control-input" value="3" checked>--}}
{{--                                                        <label class="custom-control-label" for="customRadio3">{{__('Admin')}} </label>--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>


{{--                </form>--}}

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">{{__('Thoát')}}</button>
                <button type="button" class="btn btn-primary float-right" id="save">{{__('Lưu lại')}}</button>
            </div>
        </div>
    </div>
</div>
