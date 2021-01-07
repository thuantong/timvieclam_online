@extends('master.index')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-12">

            <!-- Pricing Title-->
            <div class="text-center pb-2">
                <h3 class="mb-2">Bảng dịch vụ <span class="text-primary">Nhà tuyển dụng</span></h3>
                <p class="text-muted w-50 m-auto">
                   Hệ thống tự động gửi gợi ý cho ứng viên
                </p>
            </div>

            <!-- Plans -->
            <div class="row my-3">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-pricing">
                        <div class="card-body text-center">
                            <p class="card-pricing-plan-name font-weight-bold text-uppercase">Quản lý bài tuyển dụng</p>
                            <span class="card-pricing-icon text-primary">
                                                    <i class="fe-at-sign"></i>
                                                </span>
{{--                            <h2 class="card-pricing-price">$9 <span>/ Month</span></h2>--}}
                            <ul class="card-pricing-features">
                                <li>Thêm bài tuyển dụng</li>
                                <li>Sửa bài tuyển dụng</li>
{{--                                <li>No Domain</li>--}}
{{--                                <li>1 User</li>--}}
{{--                                <li>Email Support</li>--}}
{{--                                <li>24x7 Support</li>--}}
                            </ul>
                            <button class="btn btn-primary waves-effect waves-light mt-4 btn-block"><a class="text-white" href="/dang-nhap">Đăng nhập</a></button>
                        </div>
                    </div> <!-- end Pricing_card -->
                </div> <!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card card-pricing">
                        <div class="card-body text-center">
                            <p class="card-pricing-plan-name font-weight-bold text-uppercase">Quản lý ứng viên</p>
                            <span class="card-pricing-icon text-primary">
                                                    <i class="fe-users"></i>
                                                </span>
{{--                            <h2 class="card-pricing-price">$19 <span>/ Month</span></h2>--}}
                            <ul class="card-pricing-features">
                                <li>Xác nhận hồ sơ</li>
                                <li>Đặt hẹn phỏng vấn thông qua email</li>
                                <li>Quản lý danh sách ứng viên</li>

                            </ul>
                            <button class="btn btn-primary waves-effect waves-light mt-4 btn-block"><a class="text-white" href="/dang-nhap">Đăng nhập</a></button>
                        </div>
                    </div> <!-- end Pricing_card -->
                </div> <!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card card-pricing ribbon-box">
                        <div class="ribbon-two ribbon-two-danger"><span>Tiêu biểu</span></div>
                        <div class="card-body text-center">
                            <p class="card-pricing-plan-name font-weight-bold text-uppercase">Đăng bài tuyển dụng</p>
                            <span class="card-pricing-icon bg-danger text-white">
                                                    <i class="fe-award"></i>
                                                </span>
                            <h2 class="card-pricing-price">1 xu <span>/ Tháng</span></h2>
                            <ul class="card-pricing-features">
                                <li>Đăng ký bài hot</li>
                                <li>Dễ dàng thao tác</li>
{{--                                <li>2 Domain</li>--}}
{{--                                <li>10 User</li>--}}
{{--                                <li>Email Support</li>--}}
{{--                                <li>24x7 Support</li>--}}
                            </ul>
                            <button class="btn btn-danger waves-effect mt-4 btn-block"><a class="text-white" href="/dang-nhap">Đăng nhập</a></button>
                        </div>
                    </div> <!-- end Pricing_card -->
                </div> <!-- end col -->

{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <div class="card card-pricing">--}}
{{--                        <div class="card-body text-center">--}}
{{--                            <p class="card-pricing-plan-name font-weight-bold text-uppercase">Enterprise Pack</p>--}}
{{--                            <span class="card-pricing-icon text-primary">--}}
{{--                                                    <i class="fe-aperture"></i>--}}
{{--                                                </span>--}}
{{--                            <h2 class="card-pricing-price">$39 <span>/ Month</span></h2>--}}
{{--                            <ul class="card-pricing-features">--}}
{{--                                <li>100 GB Storege</li>--}}
{{--                                <li>Unlimited Bandwidth</li>--}}
{{--                                <li>10 Domain</li>--}}
{{--                                <li>Unlimited User</li>--}}
{{--                                <li>Email Support</li>--}}
{{--                                <li>24x7 Support</li>--}}
{{--                            </ul>--}}
{{--                            <button class="btn btn-primary waves-effect waves-light mt-4 btn-block">Sign Up</button>--}}
{{--                        </div>--}}
{{--                    </div> <!-- end Pricing_card -->--}}
{{--                </div> <!-- end col -->--}}

            </div>
            <!-- end row -->

        </div> <!-- end col-->
    </div>
    @endsection
