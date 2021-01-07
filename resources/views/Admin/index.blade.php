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
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
          type="text/css">

    <!-- App css -->
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    {{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\font-awesome\font-awesome.min.css')}}" rel="stylesheet" type="text/css">--}}
<!-- typicon icon -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\typicons-icons\css\typicons.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\themify-icons\themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\font-awesome\css\font-awesome.min.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\icofont\css\icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\feather\css\feather.css')}}">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\croppie.css')}}" rel="stylesheet" type="text/css">
    {{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\2_6_4\croppie.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\demo.css')}}" rel="stylesheet" type="text/css">

    <!-- Jquery Toast css -->
    {{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-toast\jquery.toast.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vtoast\vtoast.css')}}" rel="stylesheet" type="text/css">
    {{--        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\style-customs.css')}}" rel="stylesheet" type="text/css">

</head>
{{--@if(Route::currentRouteName() == 'user.nguoiTimViec')--}}
{{--<body class="enlarged">--}}
{{--@else--}}
<body>
{{--@endif--}}
<!-- Pre-loader -->
<div id="preloader">
    <div class="progress mb-0" style="border-radius: 0px!important;">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" id="loadPage" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
    </div>
</div>
<!-- End Preloader-->

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">

        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li>
                <a href="/" class="nav-link text-white">
                    Việc làm
                </a>
            </li>
            {{--            <li class="dropdown notification-list">--}}
            {{--                <a class="nav-link dropdown-toggle  waves-effect waves-light fab fa-rocketchat font-20 call-chat">--}}
            {{--                                        <i class="fe-bell noti-icon"></i>--}}
            {{--                                        <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>--}}
            {{--                </a>--}}

            {{--            </li>--}}

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light text-white" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="icofont icofont-bell-alt noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge" id="so-luong-thong-bao"></span>
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

                    <div class="slimscroll noti-scroll" id="danh-sach-thong-bao" >


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

                    <!-- All-->
{{--                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">--}}
{{--                        View all--}}
{{--                        <i class="fi-arrow-right"></i>--}}
{{--                    </a>--}}

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light text-white" data-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img
                        src="@if(Session::get('avatar') != null){{URL::asset(Session::get('avatar'))}}@elseif(Session::get('avatar') == null){{URL::asset('images\default-user-icon-8.jpg')}}@endif"
                        alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
@if(Auth::user() != null){{ucwords(Auth::user()->ho_ten)}}@endif <i class="icofont icofont-caret-down"></i>
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
                    <a href="{{ route('auth.logout',['admin'=>true]) }}" class="dropdown-item  notify-item">
                        <i class="remixicon-logout-box-line"></i>
                        <span>Đăng xuất</span>
                        {{--                        {{ __('Logout') }}--}}
                    </a>
{{--                    <a class="dropdown-item  notify-item"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                     document.getElementById('logout-form').submit();">--}}
{{--                        <i class="remixicon-logout-box-line"></i>--}}
{{--                        <span>Đăng xuất</span>--}}
{{--                        --}}{{--                        {{ __('Logout') }}--}}
{{--                    </a>--}}

{{--                    <form id="logout-form" action="{{ route('auth.logout',['admin'=>true]) }}" method="get" class="d-none">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
                    <!-- item-->
                    {{--                    <a href=""  class="dropdown-item notify-item">--}}
                    {{--                        <i class="remixicon-logout-box-line"></i>--}}
                    {{--                        <span>Logout</span>--}}
                    {{--                    </a>--}}

                </div>
            </li>


        </ul>


        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <a href="/" class="nav-link logo text-center">
<span class="logo-lg">
<img src="assets\images\logo-sm.png" alt="" height="24">
{{--                            <img src="assets\images\logo-light.png" alt="" height="20">--}}
<!-- <span class="logo-lg-text-light">Xeria</span> -->
</span>
                    <span class="logo-sm">
<!-- <span class="logo-sm-text-dark">X</span> -->
<img src="assets\images\logo-sm.png" alt="" height="24">
</span>
                </a>
            </li>
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="icofont icofont-navigation-menu"></i>
                </button>
            </li>


            <li class="dropdown dropdown-mega d-block">

                <a class="nav-link center-element search-field" data-search="search-field">
                    <span>Tìm kiếm</span>
                </a>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">UI Components</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);">Widgets</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Nestable List</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Range Sliders</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Masonry Items</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Sweet Alerts</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Treeview Page</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Tour Page</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">Applications</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);">eCommerce Pages</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">CRM Pages</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Email</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Calendar</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Team Contacts</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Task Board</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Email Templates</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">Extra Pages</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);">Left Sidebar with User</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Menu Collapsed</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Small Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">New Header Style</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Search Result</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Gallery Pages</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Maintenance & Coming Soon</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center mt-3">
                                <h3 class="text-dark">Special Discount Sale!</h3>
                                <h4>Save up to 70% off.</h4>
                                <button class="btn btn-primary mt-3">Download Now <i
                                        class="ml-1 mdi mdi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
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

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

            {{--                <!-- start page title -->//header--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-12">--}}
            {{--                        <div class="page-title-box">--}}
            {{--                            <div class="page-title-right">--}}
            {{--                                <ol class="breadcrumb m-0">--}}
            {{--                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>--}}
            {{--                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>--}}
            {{--                                    <li class="breadcrumb-item active">Preloader</li>--}}
            {{--                                </ol>--}}
            {{--                            </div>--}}
            {{--                            <h4 class="page-title">Preloader</h4>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- end page title -->
            @yield('content')

            <!-- end row -->
                @include('Chat.index')
            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        Tống Minh Thuận - 15020551
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
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
<div class="left-search d-none position-absolute bg-white border">
    <div class="left-search-header border" style="display: flex">
        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 center-element">
            <button class="btn btn-white border text-left text-dark exit-search fa fa-times"></button>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 center-element">
            <div class="input-group">
                <input type="search" class="form-control value-search" id="value-master-search"
                       placeholder="Nhập từ khóa...">
            </div>

        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 center-element">
            <select class="form-control" id="dia-diem-master-search">
                <option selected value="-1">Chọn địa điểm</option>
                @foreach($dia_diem as $row)
                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 center-element">
            <select class="form-control" id="nganh-nghe-master-search">
                <option selected value="-1">Tất cả</option>
                @foreach($nganh_nghe as $row)
                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
            <button class="btn btn-primary text-left" id="button-master-search"><i class="fa fa-search"></i></button>

        </div>
    </div>
    <div class="left-search-content overflow-y-auto p-2" id="left-search-content">
        {{--        @include('TrangChu.items')--}}
    </div>
</div>


{{--    </div> <!-- end slimscroll-menu-->--}}
{{--</div>--}}
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vendor.min.js')}}"></script>

<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\apexcharts\apexcharts.min.js')}}"></script>
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-world-mill-en.js')}}"></script>--}}

<!-- Peity chart-->
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\peity\jquery.peity.min.js')}}"></script>
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\chat-js-customs.js')}}"></script>

<!-- Tost-->
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vtoast\vtoast.js')}}"></script>
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-toast\jquery.toast.min.js')}}"></script>--}}

<!-- toastr init js-->
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\pages\toastr.init.js')}}"></script>--}}
<!-- init js -->
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\pages\dashboard-2.init.js')}}"></script>chart--}}
<!-- Modal-Effect -->
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\custombox\custombox.min.js')}}"></script>

<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\croppie\croppie.js')}}"></script>
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\croppie\2_6_4\croppie.js')}}"></script>--}}
<!-- App js -->
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app.min.js')}}"></script>
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\customs-js-mine.js')}}"></script>
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>--}}
@stack('scripts')
<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\lay-danh-sach-viec-lam.js')}}"></script>
<script type="text/javascript">
    let getBaseURL = '{{URL::asset('/')}}';
    let avatarDefault = '{{URL::asset('images/default-company-logo.jpg')}}';
    // var currenPage = null;
    // var nextPage = null;
    const locationThongBao = () =>{
        let ajax = {
            method:'get',
            url:"/admin/thong-bao/cap-nhat-tin-rong",
            data:{}
        }
        sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
            if (e == true){
                location.href = "/admin/danh-sach-bai-duyet";
            }
        })

    }
    const htmlThongBao = (avatar,ho_ten,noi_dung)=>{
        let avatarNew = avatar == null ? avatarDefault : avatar;
        return ' <a onclick="locationThongBao()" class="dropdown-item notify-item">\n' +
            '                            <div class="notify-icon">\n' +
            '                                <img src="'+avatarNew+'" class="img-fluid rounded-circle" alt="">\n' +
            '                            </div>\n' +
            '                            <p class="notify-details">'+ho_ten+'</p>\n' +
            '                            <p class="text-muted mb-0 user-msg">\n' +
            '                                <small>'+noi_dung+'</small>\n' +
            '                            </p>\n' +
            '                        </a>';
    }
    const getDanhSachThongBao = ()=>{
        // so-luong-thong-b/**/ao
        // danh-sach-thong-bao
        let ajax = {
            method:'get',
            url:"/admin/get-thong-bao",
            data: {
            }
        }
        sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
            console.log(e);
            let count = 0;
            let html = '';
            $.each(e,function (i,v) {
                if (v.status == 0){
                    count++;
                }
                html += htmlThongBao(v.get_nguoi_gui.avatar,v.get_nguoi_gui.ho_ten,v.name);

            })

            $('#so-luong-thong-bao').html(count);
            $('#danh-sach-thong-bao').html(html);
        })
    }
    $(document).on('click', '#button-master-search', function () {
        let tieu_de = $('#value-master-search').val();
        let nganh_nghe = $('#nganh-nghe-master-search').val();
        let dia_diem = $('#dia-diem-master-search').val();
        if (nganh_nghe == -1) {
            nganh_nghe = '';
        }
        if (dia_diem == -1) {
            dia_diem = '';
        }
        let ajax = {
            method: 'get',
            url: '/tin-tuyen-dung',
// url: '/bai-viet/tim-kiem', chưa xóa route
            data: {
                tieu_de: tieu_de,
                nganh_nghe_id: nganh_nghe,
                dia_diem_id: dia_diem,
            }
        }
        getItemsDefaults($('#left-search-content'), 1, ajax, 'timkiem')
    });

    $(document).on('click', function (e) {

        if (!$(e.target).hasClass('left-search') && $(e.target).parents('.left-search').length == 0) {
            $('.exit-search').trigger('click');
        }
        if ($(e.target).hasClass('search-field') || $(e.target).parents('.search-field').length > 0) {
            $('.left-search').removeClass('d-none').fadeIn('slow');
            if ($(document).width()) {
                $('.left-search').css('width', $(document).width() + 'px');
                if ($(document).width() < 500) {
                    $('.left-search').css('width', $(document).width() + 'px');
                } else if ($(document).width() > 500) {
                    $('.left-search').css('width', ($(document).width() * 0.8) + 'px');
                }
            }
            $('.value-search').focus();
        }
    });
    $(function () {
        getDanhSachThongBao()
        select2Single($('#dia-diem-master-search'), $('.left-search-header'));
        select2Single($('#nganh-nghe-master-search'), $('.left-search-header'));
        $('.left-search').css('width', '0px');
        $('.left-search-content').css('max-height', ($(document).height() * 0.8) + 'px');
        $('.left-search-header').css('min-height', $('.navbar-custom').height() + 'px');

//exit search container
        $('.exit-search').on('click', function () {
            $('.left-search').addClass('d-none').fadeOut().css('width', '0px');
            $('.value-search').val('');

        });

        $(window).resize(function () {
            if ($(document).width()) {
                $('.left-search').css('width', $(document).width() + 'px');
                if ($(document).width() < 769) {
                    $('.left-search').css('width', $(document).width() + 'px');
                } else if ($(document).width() > 768) {
                    $('.left-search').css('width', ($(document).width() * 0.8) + 'px');
                }
            }
        });


    });
</script>
</body>
</html>


{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <title>Tìm việc làm</title>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">--}}
{{--    <meta content="Coderthemes" name="author">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <!-- App favicon -->--}}
{{--    <link rel="shortcut icon" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\images\animat-diamond-color.gif')}}">--}}

{{--    <!-- plugin css -->--}}
{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">--}}

{{--    <!-- App css -->--}}
{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">--}}
{{--    --}}{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\font-awesome\font-awesome.min.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\themify-icons\themify-icons.css')}}">--}}
{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\font-awesome\css\font-awesome.min.css')}}">--}}
{{--    <!-- ico font -->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\icofont\css\icofont.css')}}">--}}
{{--    <!-- feather Awesome -->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\feather\css\feather.css')}}">--}}
{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vtoast\vtoast.css')}}" rel="stylesheet" type="text/css">--}}

{{--    --}}{{--        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\app.min.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\style-customs.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\croppie.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\demo.css')}}" rel="stylesheet" type="text/css">--}}

{{--</head>--}}
{{--<body>--}}
{{--<!-- Begin page -->--}}
{{--<div id="wrapper">--}}

{{--    <!-- Topbar Start -->--}}
{{--    <div class="navbar-custom">--}}
{{--        @if(Auth::user() != null)--}}
{{--        <ul class="list-unstyled topnav-menu float-right mb-0">--}}

{{--            <li class="dropdown notification-list">--}}
{{--                <a class="nav-link dropdown-toggle  waves-effect waves-light fab fa-rocketchat font-20 call-chat">--}}
{{--                    --}}{{--                    <i class="fe-bell noti-icon"></i>--}}
{{--                    --}}{{--                    <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>--}}
{{--                </a>--}}

{{--            </li>--}}

{{--            <li class="dropdown notification-list">--}}
{{--                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"--}}
{{--                   role="button" aria-haspopup="false" aria-expanded="false">--}}
{{--                    <i class="icofont icofont-bell-alt noti-icon"></i>--}}
{{--                    <span class="badge badge-danger rounded-circle noti-icon-badge" id="so-tin-moi-dang">0</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right dropdown-lg">--}}

{{--                    <!-- item-->--}}
{{--                    <div class="dropdown-item noti-title">--}}
{{--                        <h5 class="m-0">--}}
{{--                                    <span class="float-right">--}}
{{--                                        <a href="" class="text-dark">--}}
{{--                                            <small>Clear All</small>--}}
{{--                                        </a>--}}
{{--                                    </span>Thông báo--}}
{{--                        </h5>--}}
{{--                    </div>--}}

{{--                    <div class="slimscroll noti-scroll" id="tab-thong-bao">--}}

{{--                    </div>--}}

{{--                    <!-- All-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">--}}
{{--                        Xem thêm--}}
{{--                        <i class="fi-arrow-right"></i>--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="dropdown notification-list">--}}
{{--                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"--}}
{{--                   href="#" role="button" aria-haspopup="false" aria-expanded="false">--}}
{{--                    <img--}}
{{--                        src="@if(Session::get('avatar') != null){{URL::asset(Session::get('avatar'))}}@elseif(Session::get('avatar') == null){{URL::asset('images\default-user-icon-8.jpg')}}@endif"--}}
{{--                        alt="user-image" class="rounded-circle">--}}
{{--                    <span class="pro-user-name ml-1">--}}
{{--                                @if(Auth::user() != null){{Auth::user()->ho_ten}}@endif <i--}}
{{--                            class="icofont icofont-caret-down"></i>--}}
{{--                            </span>--}}
{{--                </a>--}}

{{--                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">--}}
{{--                    <!-- item-->--}}
{{--                    <div class="dropdown-header noti-title">--}}
{{--                        <h6 class="text-overflow text-center m-0">@if(Auth::user() != null){{Auth::user()->ho_ten}}@endif</h6>--}}
{{--                    </div>--}}

{{--                    <!-- item-->--}}
{{--                    <a href="@if(Session::get('loai_tai_khoan') == 1 && Session::get('loai_tai_khoan') != null){{route('user.nguoiTimViec')}}@elseif(Session::get('loai_tai_khoan') == 2 && Session::get('loai_tai_khoan') != null){{route('user.nhaTuyenDung')}}@endif"--}}
{{--                       class="dropdown-item notify-item">--}}
{{--                        <i class="remixicon-account-circle-line"></i>--}}
{{--                        <span>Thông tin tài khoản</span>--}}
{{--                    </a>--}}

{{--                    <!-- item-->--}}
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

{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item  notify-item"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                        <i class="remixicon-logout-box-line"></i>--}}
{{--                        <span>Đăng xuất</span>--}}
{{--                        --}}{{--                        {{ __('Logout') }}--}}
{{--                    </a>--}}

{{--                    <form id="logout-form" action="{{ route('auth.logout') }}" method="get" class="d-none">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
{{--                    <!-- item-->--}}
{{--                    --}}{{--                    <a href=""  class="dropdown-item notify-item">--}}
{{--                    --}}{{--                        <i class="remixicon-logout-box-line"></i>--}}
{{--                    --}}{{--                        <span>Logout</span>--}}
{{--                    --}}{{--                    </a>--}}

{{--                </div>--}}
{{--            </li>--}}


{{--        </ul>--}}

{{--        @endif--}}
{{--        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">--}}
{{--            <li>--}}
{{--                @if(Auth::user() == null)--}}
{{--                    <a href="" class="nav-link logo text-center">Tìm việc làm</a>--}}
{{--                @else--}}
{{--                <a href="/" class="nav-link logo text-center">--}}
{{--                        <span class="logo-lg">--}}
{{--                            <img src="assets\images\logo-light.png" alt="" height="20">--}}
{{--                        <!-- <span class="logo-lg-text-light">Xeria</span> -->--}}
{{--                        </span>--}}
{{--                    <span class="logo-sm">--}}
{{--                            <!-- <span class="logo-sm-text-dark">X</span> -->--}}
{{--                            <img src="assets\images\logo-sm.png" alt="" height="24">--}}
{{--                        </span>--}}
{{--                </a>--}}
{{--                    @endif--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <button class="button-menu-mobile waves-effect waves-light">--}}
{{--                    <i class="icofont icofont-navigation-menu"></i>--}}
{{--                </button>--}}
{{--            </li>--}}


{{--            <li class="dropdown dropdown-mega d-block">--}}

{{--                <a class="nav-link center-element search-field" data-search="search-field">--}}
{{--                    <span>Tìm kiếm</span>--}}
{{--                </a>--}}
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
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <!-- end Topbar -->--}}

{{--    <!-- ========== Left Sidebar Start ========== -->--}}
{{--@include('master.nav')--}}
{{--<!-- Left Sidebar End -->--}}

{{--    <!-- ============================================================== -->--}}
{{--    <!-- Start Page Content here -->--}}
{{--    <!-- ============================================================== -->--}}

{{--    <div class="content-page">--}}
{{--        <div class="content">--}}

{{--            <!-- Start Content-->--}}
{{--            <div class="container-fluid">--}}

{{--            --}}{{--                <!-- start page title -->//header--}}
{{--            --}}{{--                <div class="row">--}}
{{--            --}}{{--                    <div class="col-12">--}}
{{--            --}}{{--                        <div class="page-title-box">--}}
{{--            --}}{{--                            <div class="page-title-right">--}}
{{--            --}}{{--                                <ol class="breadcrumb m-0">--}}
{{--            --}}{{--                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>--}}
{{--            --}}{{--                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>--}}
{{--            --}}{{--                                    <li class="breadcrumb-item active">Preloader</li>--}}
{{--            --}}{{--                                </ol>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                            <h4 class="page-title">Preloader</h4>--}}
{{--            --}}{{--                        </div>--}}
{{--            --}}{{--                    </div>--}}
{{--            --}}{{--                </div>--}}
{{--            <!-- end page title -->--}}
{{--            @yield('content')--}}

{{--            <!-- end row -->--}}
{{--                @include('Chat.index')--}}
{{--            </div> <!-- container -->--}}

{{--        </div> <!-- content -->--}}

{{--        <!-- Footer Start -->--}}
{{--        <footer class="footer">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        Tống Minh Thuận - 15020551--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="text-md-right footer-links d-none d-sm-block">--}}
{{--                            <a href="javascript:void(0);">About Us</a>--}}
{{--                            <a href="javascript:void(0);">Help</a>--}}
{{--                            <a href="javascript:void(0);">Contact Us</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </footer>--}}
{{--        <!-- end Footer -->--}}

{{--    </div>--}}

{{--    <!-- ============================================================== -->--}}
{{--    <!-- End Page content -->--}}
{{--    <!-- ============================================================== -->--}}


{{--</div>--}}
{{--<!-- END wrapper -->--}}
{{--<div class="left-search d-none position-absolute bg-white border">--}}
{{--    <div class="left-search-header border" style="display: flex">--}}
{{--        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">--}}
{{--            <button class="btn btn-default text-left text-dark exit-search fas fa-arrow-left"></button>--}}
{{--        </div>--}}
{{--        <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7 center-element">--}}
{{--            <div class="input-group">--}}
{{--                <input type="search" class="form-control value-search">--}}
{{--                <button class="btn btn-primary text-left"> lúp</button>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 center-element">--}}
{{--            Tìm Kiếm--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="left-search-content overflow-auto-scroll p-2">--}}
{{--        @include('TrangChu.items')--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--<!-- Vendor js -->--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vendor.min.js')}}"></script>--}}

{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\apexcharts\apexcharts.min.js')}}"></script>--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-world-mill-en.js')}}"></script>--}}

{{--<!-- Peity chart-->--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\peity\jquery.peity.min.js')}}"></script>--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\chat-js-customs.js')}}"></script>--}}

{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vtoast\vtoast.js')}}"></script>--}}

{{--<!-- init js -->--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\pages\dashboard-2.init.js')}}"></script>chart--}}

{{--<!-- App js -->--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app.min.js')}}"></script>--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\customs-js-mine.js')}}"></script>--}}
{{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\croppie\croppie.js')}}"></script>--}}
{{--<script>--}}
{{--    $(function () {--}}
{{--        $('body').css('overflow-y',auto)--}}
{{--        getThongBao()--}}
{{--    });--}}

{{--    const getThongBao = () => {--}}
{{--        let ajax = {--}}
{{--            method: 'get',--}}
{{--            url: '/admin/get-thong-bao'--}}
{{--        };--}}
{{--        sendAjaxNoFunc(ajax.method, ajax.url, {}, '').done(e => {--}}
{{--            // console.log('cc',e)--}}
{{--            let html = '';--}}
{{--            $.each(e.duyet_tin, function (i, v) {--}}
{{--                // console.log(v.status)--}}
{{--                var status = '';--}}
{{--                if(v.trang_thai_xem_tin.status == 0){--}}
{{--                    status = 'active'--}}
{{--                }else if(v.trang_thai_xem_tin.status == 1){--}}
{{--                    status = ''--}}
{{--                }--}}
{{--                html = html + '<a class="dropdown-item notify-item '+status+' border-bottom" id="xem-thong-bao">' +--}}
{{--                    '                                <div class="text-primary">' +--}}
{{--                    '                                    <img class="notify-icon bg-soft-primary" src="' + v.get_nha_tuyen_dung.avatar + '" data-id="'+v.id+'" style="height: 100%">' +--}}
{{--                    '                                    <i class="mdi mdi-comment-account-outline"></i>' +--}}
{{--                    '                                </div>' +--}}
{{--                    '                                <p class="notify-details">' +--}}
{{--                    '                                    <small class="text-muted text-left">Bài viết cần xét duyệt:</small>' +--}}
{{--                    '                                    ' + v.tieu_de + '' +--}}
{{--                    '                                    <small class="text-muted text-right">' + v.get_nha_tuyen_dung.tai_khoan.ho_ten + '</small>' +--}}
{{--                    '                                    <small class="text-info">' + v.created_at + '</small>' +--}}
{{--                    '                                </p>' +--}}
{{--                    '    ' +--}}
{{--                    '                            </a>'--}}
{{--            });--}}
{{--            $('#so-tin-moi-dang').html(e.tin_chua_doc);--}}
{{--            $('#tab-thong-bao').css('height', 'auto').html(html);--}}
{{--        })--}}
{{--    }--}}

{{--    $(document).on('click','#xem-thong-bao',function () {--}}
{{--        if($(this).hasClass('active')){--}}
{{--            let ajax = {--}}
{{--                method:'post',--}}
{{--                url:'/admin/thong-bao/chuyen-trang-thai',--}}
{{--                data : {--}}
{{--                    id:$(this).find('img').data('id')--}}
{{--                }--}}
{{--            };--}}
{{--            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=> {--}}
{{--                if(e == 200){--}}
{{--                    getThongBao()--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--    })--}}
{{--</script>--}}
{{--@stack('scripts')--}}
{{--</html>--}}
