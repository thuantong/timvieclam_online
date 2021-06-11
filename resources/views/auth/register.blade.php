@extends('master.index')

@section('content')

    <div class="row justify-content-center py-4">
        <div class="col-sm-12 col-sm-12 col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Đăng ký tài khoản') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-12 col-md-4 col-form-label text-md-right ho_ten">{{ __('Họ và tên') }}</label>

                            <div class="col-sm-12 col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email-confirmed" class="col-sm-12 col-md-4 col-form-label text-md-right">{{ __('Địa chỉ E-Mail') }}</label>
                            <div class="col-sm-12 col-md-6">
                                <input id="email-confirmed" type="email" class="form-control @error('email_confirmed') is-invalid @enderror" name="email_confirmed" value="{{ old('email_confirmed') }}" required autocomplete="off">

                                @error('email_confirmed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user-name" class="col-sm-12 col-md-4 col-form-label text-md-right">{{ __('Tên tài khoản') }}</label>

                            <div class="col-sm-12 col-md-6">
                                <input id="user-name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="off">

                                @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-12 col-md-4 col-form-label text-md-right">{{ __('Số điện thoại') }}</label>

                            <div class="col-sm-12 col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="off">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-12 col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-sm-12 col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-12 col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

                            <div class="col-sm-12 col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-12 col-md-4 col-form-label text-md-right">{{ __(' ') }}</label>

                            <div class="col-sm-12 col-md-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="loai_tai_khoan" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label" for="customRadio1">{{__('Tài khoản tìm việc')}}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="loai_tai_khoan" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="customRadio2">{{__('Tài khoản tuyển dụng')}} </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-12 col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng ký') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(function () {
            let backround = "{{URL::asset(env('URL_ASSET_PUBLIC').'images/default/kDRPs.jpg')}}";
            $('body').css('background-image','url('+backround+')');

            $('.custom-control-label').on('click',function(){
                let __this = $(this)
                let valueCheck = __this.parent().find('input').val();

                if(valueCheck == 2){
                    $('.ho_ten').text("Tên công ty")
                    
                }else{
                    
                    $('.ho_ten').text("Họ và tên")
                }
            })
        })
    </script>
@endpush
