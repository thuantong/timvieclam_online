<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{__('Tìm việc vô song')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
{{--    <link rel="shortcut icon" href="assets\images\favicon.ico">--}}
    <!-- App css -->
    <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

<!-- Begin page -->
<div id="wrapper">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row justify-content-center my-5">
                    <div class="col-lg-12 col-xl-12 col-sm-12 mb-4">
                        <div class="error-text-box">
                            <svg viewbox="0 0 600 200">
                                <!-- Symbol-->
                                <symbol id="s-text">
                                    <text text-anchor="middle" x="50%" y="50%" dy=".35em">{{$data['code']}}!</text>
                                </symbol>
                                <!-- Duplicate symbols-->
                                <use class="text" xlink:href="#s-text"></use>
                                <use class="text" xlink:href="#s-text"></use>
                                <use class="text" xlink:href="#s-text"></use>
                                <use class="text" xlink:href="#s-text"></use>
                                <use class="text" xlink:href="#s-text"></use>
                            </svg>
                        </div>
                        <div class="text-center">
                            <h3 class="mt-0 mb-2">{{$data['title']}}</h3>
{{--                            <span>{{$data['message']}}</span>--}}
{{--                            <p>--}}
                            <p class="text-muted mb-3">{{$data['message']}}</p>

                            <a href="/" class="btn btn-success waves-effect waves-light">{{__('Trở về trang chủ')}}</a>
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->


            </div> <!-- container -->

</div>

</body>
</html>
