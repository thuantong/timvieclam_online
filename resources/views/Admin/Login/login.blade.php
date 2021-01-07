@extends('master.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-sm-12 col-md-8">
            <div class="card mt-sm-2 mt-md-4">

                <div class="row">
                    <div class="col-sm-2 col-sm-12 col-md-2 bg-primary center-element">
                        <b class="bg-primary">{{ __('Đăng nhập') }}</b>
                    </div>
                    <div class="col-sm-10 col-sm-12 col-md-10">
                        <div class="card-body">
                            <form method="POST" action="{{ route('auth.login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="user-name" class="col-sm-12 col-sm-12 col-md-4 col-form-label text-md-right">{{ __('Tên đăng nhập') }}</label>

                                    <div class="col-sm-12 col-sm-12 col-md-6">
                                        {{--                                //autocomplete="email"--}}
                                        <input id="user-name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{old('user_name') }}" required autofocus>

                                        @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-12 col-sm-12 col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                                    <div class="col-sm-12 col-sm-12 col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Nhớ mật khẩu') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @if(isset($message_register))
                                    <div class="form-group row mb-1" id="show-response-dang-ky">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <span class="text-success">{{$message_register}}</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group row mb-0">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Đăng nhập') }}
                                        </button>
                                        <a href="{{route('auth.form.register',['admin'])}}" class="text-primary">{{ __('Tạo tài khoản') }}</a>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Bạn quên mật khẩu?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </form>
                            <div class="text-center">
                                <h5 class="mt-3 text-muted">{{__('Đăng nhập với')}}</h5>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="fa fa-facebook-official"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('input').on('input',function () {
                $('#show-response-dang-ky').remove();
            })
        })
    </script>
    @endpush
