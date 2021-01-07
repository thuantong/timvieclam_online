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

    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                <h3 class="mt-0">Bạn đã ứng tuyển thành công !</h3>

                <p class="w-75 mb-2 mx-auto">Nhà tuyển dụng đang xem hồ sơ của bạn, bạn sẽ nhận được phản hồi từ họ trong mục thông báo!.</p>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@push('scripts')
<script>
    $(function () {
        setTimeout(function () {
            window.location.href = "/";
        }, 4000);
    })
</script>
@endpush
