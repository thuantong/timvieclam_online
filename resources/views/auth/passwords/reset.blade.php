@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-8">
            <div class="card">
                <div class="card-header bg-primary">{{ __('Quên mật khẩu') }}</div>

                <div class="card-body">
                    <form method="get" action="{{route('password.thayDoiMatKhau')}}">
                        @csrf

{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-sm-4 col-md-4 col-form-label text-md-right">{{ __('Địa chỉ E-Mail') }}</label>--}}
{{----}}
{{--                            <div class="col-sm-6 col-md-6">--}}
                                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Request::get('email') ?? old('email') }}" required autocomplete="email" autofocus>

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-sm-6 col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-4 col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

                            <div class="col-sm-6 col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-sm-4 col-md-4">
                                <input id="new-code" type="text" class="form-control @if($errors->any()) is-invalid @endif @error('new_code') is-invalid @enderror" name="new_code" required>

                                @error('new_code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($errors->any())
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('new_code_check')}}</strong>
                                    </span>
{{--                                    <h4>{{$errors->first()}}</h4>--}}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tạo lại mật khẩu') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
