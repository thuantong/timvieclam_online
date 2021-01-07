<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
{{--    <title>TMTJobs</title>--}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\images\animat-diamond-color.gif')}}">

    <!-- plugin css -->
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\themify-icons\themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\font-awesome\css\font-awesome.min.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\icofont\css\icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\icon\feather\css\feather.css')}}">
    <!-- App css -->
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
{{--    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\style-customs.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\croppie.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\css\croppie\demo.css')}}" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'css/app.css') }}" rel="stylesheet">
</head>
<body style="background-image: url('{{URL::asset(env('URL_ASSET_PUBLIC').'images/default/kDRPs.jpg')}}')!important;">
    <div id="app">
        <nav class="navbar-custom bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
{{--                    {{ config('app.name', 'Tìm việc online') }}--}}
                    {{env('APP_NAME')}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li>
                            <a href="/" class="nav-link text-white">
                                Việc làm
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                            @if (strtolower(Route::currentRouteName()) != 'auth.form.login')
                                    <a class="nav-link text-white" href="{{ route('auth.form.login') }}">{{ __('Đăng nhập') }}</a>
                            @endif

                            </li>

                            @if (strtolower(Route::currentRouteName()) != 'auth.form.register')
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('auth.form.register')}}">{{ __('Đăng ký tài khoản') }}</a>
                                </li>
                            @endif
                        @else

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

{{--        <main class="py-4">--}}
            <div class="container-fluid py-4">
                @yield('content')
            </div>

{{--        </main>--}}
    </div>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\vendor.min.js')}}"></script>

    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\apexcharts\apexcharts.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>
    {{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
    {{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-vectormap\jquery-jvectormap-world-mill-en.js')}}"></script>--}}

    <!-- Peity chart-->
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\peity\jquery.peity.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\chat-js-customs.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\croppie\croppie.js')}}"></script>

    <!-- init js -->
    {{--<script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\pages\dashboard-2.init.js')}}"></script>chart--}}

    <!-- App js -->
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app.min.js')}}"></script>
    @stack('scripts')
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\customs-js-mine.js')}}"></script>
</body>
</html>
