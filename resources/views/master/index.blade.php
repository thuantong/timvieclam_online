<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>

    {{--    <title>Tìm việc làm</title>--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\images\animat-diamond-color.gif')}}">

    <!-- plugin css -->
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css')}}"
          rel="stylesheet"
          type="text/css">
    <!-- App css -->
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\bootstrap.min.css')}}" rel="stylesheet"
          type="text/css">
    <!-- typicon icon -->
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\typicons-icons\css\typicons.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\themify-icons\themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\font-awesome\css\font-awesome.min.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\icofont\css\icofont.css')}}">
    @include('script_js.select2.css')
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\feather\css\feather.css')}}">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\croppie.css')}}" rel="stylesheet"
          type="text/css">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\demo.css')}}" rel="stylesheet" type="text/css">

    <!-- Jquery Toast css -->
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vtoast\vtoast.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\style-customs.css')}}" rel="stylesheet"
          type="text/css">

</head>
{{--@if(Route::currentRouteName() == 'user.nguoiTimViec')--}}
{{--<body class="enlarged">--}}
{{--@else--}}
<body>
{{--@endif--}}
<!-- Pre-loader -->
{{--<div class="progress mb-0">--}}
{{--    <div class="progress-bar progress-bar-striped progress-bar-animated" id="loadPage" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>--}}
{{--</div>--}}
{{----}}
<div id="preloader">
    <div class="progress mb-0" style="border-radius: 0px!important;">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" id="loadPage" role="progressbar"
             aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
    </div>
    {{--    <div id="status">--}}
    {{--        <div class="progress mb-0">--}}
    {{--            <div class="progress-bar progress-bar-striped progress-bar-animated" id="loadPage" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>--}}
    {{--        </div>--}}
    {{--        <div class="bouncingLoader">--}}
    {{--            <div></div>--}}
    {{--            <div></div>--}}
    {{--            <div></div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</div>
<!-- End Preloader-->

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">

        <ul class="list-unstyled topnav-menu float-right mb-0">
            @if(Session::get('loai_tai_khoan') != 3)
            <li>

                <a href="/" class="nav-link d-none d-md-block text-white">
                    Việc làm
                </a>
            </li>
            @endif
            @if (strtolower(Route::currentRouteName()) != 'auth.form.login' && strtolower(Route::currentRouteName()) != 'auth.form.register')
                    @if(Session::get('loai_tai_khoan') != 3)
                <li class="d-none d-md-block">
                    <a class="nav-link center-element search-field-new-query" id="search-field-new-query"
                       data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                       aria-controls="collapseExample">
                        <span class="text-white">Tìm kiếm</span>
                    </a>
                </li>
                        @endif
            @endif

            @if(Auth::user() != null)


                @if(Session::exists('loai_tai_khoan') && Session::get('loai_tai_khoan') == 2)
                    {{--                    <li>--}}
                    {{--                        <a href="{{route('nhatuyendung.index')}}" class="nav-link text-white">--}}
                    {{--                            Tìm kiếm ứng viên--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                @endif
                {{--            <li class="dropdown notification-list">--}}
                {{--                <a class="nav-link dropdown-toggle  waves-effect waves-light fab fa-rocketchat font-20 call-chat">--}}
                {{--                                        <i class="fe-bell noti-icon"></i>--}}
                {{--                                        <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>--}}
                {{--                </a>--}}

                {{--            </li>--}}

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle d-none waves-effect waves-light text-white"
                       data-toggle="dropdown" href="#"
                       role="button" aria-haspopup="false" aria-expanded="false" id="goi-danh-sach-thong-bao">
                        <i class="icofont icofont-bell-alt noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                    <span class="float-right">
{{--                                        <a href="" class="text-dark">--}}
                                        {{--                                            <small>Clear All</small>--}}
                                        {{--                                        </a>--}}
                                    </span>Thông báo
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll" id="danh-sach-thong-bao">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-soft-primary text-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Doug Dukes commented on Admin Dashboard
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="assets\images\users\avatar-2.jpg" class="img-fluid rounded-circle" alt="">
                                </div>
                                <p class="notify-details">Mario Drummond</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="assets\images\users\avatar-4.jpg" class="img-fluid rounded-circle" alt="">
                                </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-soft-warning text-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light text-white"
                       data-toggle="dropdown"
                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img
                            src="@if(Auth::user()->avatar != null){{URL::asset(env('URL_ASSET_PUBLIC').Auth::user()->avatar)}}@elseif(Auth::user()->avatar == null){{URL::asset(env('URL_ASSET_PUBLIC').'images\default-user-icon-8.jpg')}}@endif"
                            alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                                @if(Auth::user() != null){{ucwords(Auth::user()->ho_ten)}}@endif <i
                                class="icofont icofont-caret-down"></i>
                            </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow text-center m-0">@if(Auth::user() != null){{ucwords(Auth::user()->ho_ten)}}@endif</h6>
                        </div>

                        <!-- item-->
                        <a href="@if(Session::get('loai_tai_khoan') == 1){{route('user.nguoiTimViec')}}@elseif(Session::get('loai_tai_khoan') == 2){{route('user.nhaTuyenDung')}}@endif"
                           class="dropdown-item notify-item">
                            <i class="remixicon-account-circle-line"></i>
                            <span>Thông tin tài khoản</span>
                        </a>

                        <!-- item-->
                        {{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                        {{--                        <i class="remixicon-settings-3-line"></i>--}}
                        {{--                        <span>Settings</span>--}}
                        {{--                    </a>--}}

                        {{--                    <!-- item-->--}}
                        {{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                        {{--                        <i class="remixicon-wallet-line"></i>--}}
                        {{--                        <span>My Wallet <span class="badge badge-success float-right">3</span> </span>--}}
                        {{--                    </a>--}}

                        {{--                    <!-- item-->--}}
                        {{--                    <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                        {{--                        <i class="remixicon-lock-line"></i>--}}
                        {{--                        <span>Lock Screen</span>--}}
                        {{--                    </a>--}}

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item  notify-item"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="remixicon-logout-box-line"></i>
                            <span>Đăng xuất</span>
                            {{--                        {{ __('Logout') }}--}}
                        </a>

                        <form id="logout-form" action="{{ route('auth.logout') }}" method="get" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @else

                {{--                @if(\Illuminate\Support\Facades\Request::exists('admin'))--}}
                {{--                <li>--}}
                {{--                    <a href="{{URL::asset('/dang-nhap?admin')}}" class="nav-link text-white">--}}
                {{--                        Đăng nhập--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                    @else--}}
                <li class="d-md-block d-none">
                    <a href="{{URL::asset('/xem-chuc-nang-nha-tuyen-dung')}}" class="nav-link text-white">
                        Dành cho nhà tuyển dụng
                    </a>
                </li>
                @if (strtolower(Route::currentRouteName()) == 'auth.form.login')
                    <li class="nav-item">
                        <a class="nav-link text-white"
                           href="{{ route('auth.form.register')}}">{{ __('Đăng ký tài khoản') }}</a>
                    </li>

                @elseif(strtolower(Route::currentRouteName()) == 'auth.form.register')
                    <li>
                        <a href="{{URL::asset('/dang-nhap')}}" class="nav-link text-white">
                            Đăng nhập
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{URL::asset('/dang-nhap')}}" class="nav-link text-white">
                            Đăng nhập
                        </a>
                    </li>
                @endif


                {{--                    @endif--}}
            @endif
            <li>
                <button class="button-menu-mobile waves-effect waves-light nav-link">
                    <i class="text-white icofont icofont-navigation-menu"></i>
                </button>
            </li>

        </ul>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <a href="/@if(Session::get('loai_tai_khoan') == 3){{'admin'}}@endif" class="nav-link logo text-center">
            <span class="logo">
                <span class="logo-lg-text-light text-white">{{env('APP_NAME')}}@if(Session::get('loai_tai_khoan') == 3){{'AD'}}@endif</span>
{{--                            <img src="assets\images\logo-sm.png" alt="" height="24">--}}
            {{--                            <img src="assets\images\logo-light.png" alt="" height="20">--}}
            <!-- <span class="logo-lg-text-light">Xeria</span> -->
            </span>
                    {{--                    <span class="logo-sm">--}}
                    {{--                        <span class="logo-sm-text-dark text-white">TMJ</span>--}}
                    {{--                        </span>--}}
                </a>
            </li>



            <li class="dropdown dropdown-mega d-block">

                {{--                {{Auth::user()}}--}}
                {{--                @if(Auth::user() != null)--}}
                {{--                <a class="nav-link center-element search-field" data-search="search-field">--}}
                {{--                    <span class="text-white">Tìm kiếm</span>--}}
                {{--                </a>--}}

                {{--                <a class="nav-link center-element search-field-new-query" id="search-field-new-query">--}}
                {{--                    <span class="text-white">Tìm kiếm</span>--}}
                {{--                </a>--}}


                {{--                @endif--}}
                {{--                <div class="dropdown-menu dropdown-megamenu">--}}
                {{--                    <div class="row">--}}
                {{--                        <div class="col-sm-6">--}}

                {{--                            <div class="row">--}}
                {{--                                <div class="col-md-4">--}}
                {{--                                    <h5 class="text-dark mt-0">UI Components</h5>--}}
                {{--                                    <ul class="list-unstyled megamenu-list">--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Widgets</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Nestable List</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Range Sliders</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Masonry Items</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Sweet Alerts</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Treeview Page</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Tour Page</a>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}

                {{--                                <div class="col-md-4">--}}
                {{--                                    <h5 class="text-dark mt-0">Applications</h5>--}}
                {{--                                    <ul class="list-unstyled megamenu-list">--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">eCommerce Pages</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">CRM Pages</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Email</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Calendar</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Team Contacts</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Task Board</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Email Templates</a>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}

                {{--                                <div class="col-md-4">--}}
                {{--                                    <h5 class="text-dark mt-0">Extra Pages</h5>--}}
                {{--                                    <ul class="list-unstyled megamenu-list">--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Left Sidebar with User</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Menu Collapsed</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Small Left Sidebar</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">New Header Style</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Search Result</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Gallery Pages</a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="javascript:void(0);">Maintenance & Coming Soon</a>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-sm-4">--}}
                {{--                            <div class="text-center mt-3">--}}
                {{--                                <h3 class="text-dark">Special Discount Sale!</h3>--}}
                {{--                                <h4>Save up to 70% off.</h4>--}}
                {{--                                <button class="btn btn-primary mt-3">Download Now <i--}}
                {{--                                        class="ml-1 mdi mdi-arrow-right"></i></button>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                </div>--}}
            </li>
        </ul>

    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
@include('master.nav')
<!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page pr-0 pl-0 pr-lg-1 pl-lg-1">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                @if (strtolower(Route::currentRouteName()) != 'auth.form.login' && strtolower(Route::currentRouteName()) != 'auth.form.register')
                    <div class="collapse position-fixed bg-primary" id="collapseExample"
                         style="z-index: 2;width: calc(70%)">
                        <div class="card-box m-1 p-1 bg-primary border-primary" style="border-radius: 0px">
                            {{--                        <div class="row">--}}
                            <div class="row">
                                <div class="col-sm-12 col-md-12 ">
                                    <form class="row" method="get" action="/" id="tim-kiem-bai-tuyen-dung-master">
                                        @csrf
                                        <div class="col-sm-12 col-md-4 center-element">
                                            <div class="input-group">
                                                <input type="search" class="form-control value-search"
                                                       id="value-master-search" name="tieu_de"
                                                       placeholder="Nhập từ khóa..."
                                                       value="@if(Request::exists('tieu_de') && Request::get('tieu_de') != ""){{Request::get('tieu_de')}}@endif">
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-md-3 center-element">
                                            <select class="form-control" id="dia-diem-master-search" name="dia_diem">
                                                <option selected value="">Tất cả địa điểm</option>
                                                @foreach($dia_diem as $row)
                                                    <option
                                                        value="{{$row['id']}}" @if(Request::exists('dia_diem') && Request::get('dia_diem') != "" && Request::get('dia_diem') == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-3 center-element">
                                            <select class="form-control" id="nganh-nghe-master-search"
                                                    name="nganh_nghe">
                                                <option selected value="">Tất cả ngành nghề</option>
                                                @foreach($nganh_nghe as $row)
                                                    <option
                                                        value="{{$row['id']}}" @if(Request::exists('nganh_nghe') && Request::get('nganh_nghe') != "" && Request::get('nganh_nghe') == $row['id']){{'selected'}}@endif>{{$row['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-2 col-md-2  center-element">
                                            {{--                                        <button type="submit" class="btn btn-warning waves-effect waves-light text-left" id="nang-cao-button-master-search">ff</button>--}}
                                            <button type="button"
                                                    class="btn btn-white waves-effect waves-light text-left"
                                                    id="button-master-search"><i class="fa fa-search"></i></button>
                                            <a class="nav-link center-element fillter" id="fillter-new-query"
                                               data-toggle="collapse" data-target="#collapseExample2"
                                               aria-expanded="false" aria-controls="collapseExample">
                                                <span class="text-white"><i class="fa fa-filter"></i></span>
                                            </a>
                                        </div>
                                        <div class="collapse bg-primary" id="collapseExample2"
                                             style="z-index: 2;width: calc(70%)">
                                            <div class="card-box m-1 p-1 bg-primary border-primary"
                                                 style="border-radius: 0px">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 ">
                                                        <div class="row pl-1 pr-1">
                                                            <label class="col-sm-12 col-md-12">Mức lương</label>
                                                            <select class="form-control col-sm-12 col-md-12"
                                                                    name="muc_luong">
                                                                <option selected value="">Tất cả mức lương</option>
                                                                <option
                                                                    value="1" @if(Request::exists('muc_luong') && Request::get('muc_luong') != "" && Request::get('muc_luong') == 1){{'selected'}}@endif>
                                                                    Từ 2 triệu
                                                                </option>
                                                                <option
                                                                    value="2" @if(Request::exists('muc_luong') && Request::get('muc_luong') != "" && Request::get('muc_luong') == 2){{'selected'}}@endif>
                                                                    Từ 5 triệu
                                                                </option>
                                                                <option
                                                                    value="3" @if(Request::exists('muc_luong') && Request::get('muc_luong') != "" && Request::get('muc_luong') == 3){{'selected'}}@endif>
                                                                    Từ 10 triệu
                                                                </option>
                                                                <option
                                                                    value="4" @if(Request::exists('muc_luong') && Request::get('muc_luong') != "" && Request::get('muc_luong') == 4){{'selected'}}@endif>
                                                                    Từ 20 triệu
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 ">
                                                        <div class="row pl-1 pr-1">
                                                            <label class="col-sm-12 col-md-12">Chức vụ</label>
                                                            <select class="form-control col-sm-12 col-md-12"
                                                                    name="chuc_vu">
                                                                <option selected value="">Tất cả mức lương</option>
                                                                @foreach($chuc_vu as $row)
                                                                    <option
                                                                        value="{{$row['id']}}">{{$row['name']}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            {{--                        </div>--}}
                        </div>

                    </div>
                @endif
            <!-- end page title -->
                @yield('content')

            <!-- end row -->
{{--                @include('Chat.index')--}}
            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                @if (strtolower(Route::currentRouteName()) != 'auth.form.login' && strtolower(Route::currentRouteName()) != 'auth.form.register')
                    <div class="row">
                        <div class="col-sm-12 col-md-12 mb-4">
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12"><b class="text-white">Việc làm theo địa
                                                điểm</b></div>
                                        @for($i=0; $i<4;$i++)
                                            <a class="col-sm-12 col-md-12 text-white waves-effect waves-light"
                                               href="{{URL::asset('/?dia_diem='.$dia_diem[$i]['id'])}}">{{$dia_diem[$i]['name']}}</a>
                                        @endfor
                                        <a class="col-sm-12 col-md-12 text-white waves-effect waves-light"
                                           href="{{URL::asset('/danh-sach-viec-lam?type=1')}}"
                                           style="text-decoration: underline">Xem tất cả<span
                                                class="pl-1 fa fa-angle-double-right"></span></a>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12"><b class="text-white">Việc làm theo ngành
                                                nghề</b></div>
                                        @for($i=0; $i<4;$i++)
                                            <a class="col-sm-12 col-md-12 text-white waves-effect waves-light"
                                               href="{{URL::asset('/?nganh_nghe='.$nganh_nghe[$i]['id'])}}">{{$nganh_nghe[$i]['name']}}</a>
                                        @endfor
                                        <a class="col-sm-12 col-md-12 text-white waves-effect waves-light"
                                           href="{{URL::asset('/danh-sach-viec-lam?type=2')}}"
                                           style="text-decoration: underline">Xem tất cả<span
                                                class="pl-1 fa fa-angle-double-right"></span></a>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12"><b class="text-white">Việc làm theo kiểu làm
                                                việc</b></div>
                                        @for($i=0; $i<4;$i++)
                                            <a class="col-sm-12 col-md-12 text-white waves-effect waves-light"
                                               href="{{URL::asset('/?kieu_lam_viec='.$kieu_lam_viec[$i]['id'])}}">{{$kieu_lam_viec[$i]['name']}}</a>
                                        @endfor
                                        <a class="col-sm-12 col-md-12 text-white waves-effect waves-light"
                                           href="{{URL::asset('/danh-sach-viec-lam?type=3')}}"
                                           style="text-decoration: underline">Xem tất cả<span
                                                class="pl-1 fa fa-angle-double-right"></span></a>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12"><b class="text-white">Việc làm theo chức vụ</b>
                                        </div>
                                        @for($i=0; $i<4;$i++)
                                            <a class="col-sm-12 col-md-12 text-white waves-effect waves-light"
                                               href="{{URL::asset('/?chuc_vu='.$chuc_vu[$i]['id'])}}">{{$chuc_vu[$i]['name']}}</a>
                                        @endfor
                                        <a class="col-sm-12 col-md-12 text-white waves-effect waves-light"
                                           href="{{URL::asset('/danh-sach-viec-lam?type=4')}}"
                                           style="text-decoration: underline">Xem tất cả<span
                                                class="pl-1 fa fa-angle-double-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row bg-active">
                    <div class="col-sm-12 col-md-6">

                        <p class="pt-2"><b class="text-white">Website đăng tin tuyển dụng và tìm việc làm</b></p>
                        <p><b class="text-white">Tên: Tống Minh Thuận @email: tongminhthuan0405@gmail.com</b></p>

                    </div>
                    <div class="col-sm-12 col-md-6 center-element">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="{{route('trangchu.gioiThieuVeChungToi')}}"
                               class="text-white waves-effect waves-light">Thông tin</a>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>

{{--Chức năng tìm kiếm--}}
<!-- END wrapper -->
{{--<div class="left-search d-none position-absolute bg-white border">--}}
{{--    <div class="left-search-header border" style="display: flex">--}}
{{--        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 center-element">--}}
{{--            <button class="btn btn-white border text-left text-dark exit-search fa fa-times"></button>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 center-element">--}}
{{--            <div class="input-group">--}}
{{--                <input type="search" class="form-control value-search" id="value-master-search"--}}
{{--                       placeholder="Nhập từ khóa...">--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 center-element">--}}
{{--            <select class="form-control" id="dia-diem-master-search">--}}
{{--                <option selected value="-1">Tất cả</option>--}}
{{--                @foreach($dia_diem as $row)--}}
{{--                    <option value="{{$row['id']}}">{{$row['name']}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 center-element">--}}
{{--            <select class="form-control" id="nganh-nghe-master-search">--}}
{{--                <option selected value="-1">Tất cả</option>--}}
{{--                @foreach($nganh_nghe as $row)--}}
{{--                    <option value="{{$row['id']}}">{{$row['name']}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">--}}
{{--            <button class="btn btn-primary text-left" id="button-master-search"><i class="fa fa-search"></i></button>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="left-search-content overflow-y-auto p-2 bg-light" id="left-search-content">--}}
{{--        --}}{{--        @include('TrangChu.items')--}}
{{--    </div>--}}
{{--</div>--}}


{{--    </div> <!-- end slimscroll-menu-->--}}
{{--</div>--}}
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vendor.min.js')}}"></script>

<!-- Peity chart-->
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\peity\jquery.peity.min.js')}}"></script>--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\chat-js-customs.js')}}"></script>--}}

<!-- Tost-->
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vtoast\vtoast.js')}}"></script>
<!-- Modal-Effect -->
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\custombox\custombox.min.js')}}"></script>

<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\croppie\croppie.js')}}"></script>
<!-- App js -->
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app.min.js')}}"></script>
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\customs-js-mine.js')}}"></script>
@include('script_js.select2.script')
@stack('scripts')
<!-- Vendor js -->

<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\lay-danh-sach-viec-lam.js')}}"></script>
<script type="text/javascript">

    $(document).on('click', '#button-master-search', function () {
        $('#tim-kiem-bai-tuyen-dung-master').submit()

    });

    $(function () {
        // $('body').scrollTop(0);
        fullSizePage();
        $('#loadPage').css('width', '80%');
        $(window).on('load', function () {
            $('#loadPage').parent().fadeOut('slow')
        });
        @if (strtolower(Route::currentRouteName()) != 'auth.form.login' && strtolower(Route::currentRouteName()) != 'auth.form.register')
        select2Default($('#dia-diem-master-search'));
        select2Default($('#nganh-nghe-master-search'));
        @endif

    });

</script>
</body>
</html>
