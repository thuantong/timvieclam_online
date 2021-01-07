@extends('master.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-sm-2 mt-md-4">
                <div class="card-header bg-primary text-white">{{ __('Đăng ký tài khoản') }}</div>

                <div class="card-body">
                    @include('Admin.Login.contentRegister')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
