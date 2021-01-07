@extends('master.index')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">{{ __('Thông tin xác thực Email') }}</div>

                    <div class="card-body">
                        {{--                    @if (session('resent'))--}}
                        {{--                        <div class="alert alert-success" role="alert">--}}
                        {{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
                        {{--                        </div>--}}
                        {{--                    @endif--}}


                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <span
                                    class="@if($status == 200) text-success @elseif($status == 400) text-danger @endif message-response">{{$message}}</span>
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
        let status = '{{$status}}';
        let loai = '{{Session::get('loai_tai_khoan')}}';
        $(function () {
            // console.log(loai)
            switch (parseInt(status)) {
                case 200:
                    setTimeout(function () {
                        let redirectTo = null;
                        switch (parseInt(loai)) {
                            case 1:
                                redirectTo = '/';
                                break;
                            case 2:
                                redirectTo = '{{route('user.nhaTuyenDung')}}';
                                break;
                            case 3:
                                redirectTo = '{{route('admin.index')}}';
                                break
                        }
                        if (loai == null){
                            redirectTo = '/';
                        }
                        location.href = redirectTo;
                    }, 2000);
                    break;
                case 400:
                    break;
            }


        })
    </script>
@endpush
