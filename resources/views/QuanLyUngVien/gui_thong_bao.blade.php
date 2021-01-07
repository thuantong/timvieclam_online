<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>

    <style>
        html {
            position: relative;
            /*min-height: 100%*/
        }

        body {
            overflow-x: hidden
        }
        #wrapper {
            /*max-height: 100%;*/
            overflow: hidden;
            width: 100%;
            /*background-color: #0a6aa1;*/
        }

        .content-page {
            /*margin-left: 240px;*/
            margin-left: 0px!important;
            overflow: hidden;
            /*padding: 0 15px 65px 15px;*/
            padding: 0 0px;
            /*max-height: 80vh;*/
            margin-top: 0px!important;
        }

        @media (max-width: 767.98px) {
            body {
                overflow-x: hidden;
                padding-bottom: 80px
            }

            .content-page, .enlarged .content-page {
                margin-left: 0 !important;
                padding: 0 10px
            }

        }

        .container-fluid {
            width: 100%;
            padding-right: 12px;
            padding-left: 12px;
            margin-right: auto;
            margin-left: auto;
            display: inline;
        }


        .row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -12px;
            margin-left: -12px;
            /*width: 100%;*/
        }

        @media (min-width: 576px) {
            .col-sm-12 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }
        }

        @media (max-width: 576px) {
            .col-sm-12 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;

            }
        }

        .card-box {
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #e7eaed;
            padding: 1.5rem;
            margin-bottom: 24px;
            border-radius: .25rem
        }

        @media (min-width: 768px) {
            .col-md-12 {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }
        }

        .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
            position: relative;
            width: 100%;
            padding-right: 12px;
            padding-left: 12px;
            /*display: block;*/
        }

        .p-1 {
            padding: .375rem !important
        }
        {{--        .mb-1, .my-1 {--}}
        {{--            margin-bottom: .375rem !important--}}
        {{--        }--}}
                .bg-primary {
            background-color: #8D2226 !important;
            color: white;
        }
        /**/
        a.bg-primary:focus, a.bg-primary:hover, button.bg-primary:focus, button.bg-primary:hover {
            background-color: #922327 !important;
            color: white;

        }

        .text-info {
            color: #37cde6 !important
        }

        a.text-info:focus, a.text-info:hover {
            color: #922327 !important
        }
        .w-100{
            width: 100%;
        }
        .text-center{
            text-align:center!important;
        }

    </style>
</head>

<body>

<div id="wrapper">
    <div class="content-page">
    {{--        <div class="content">--}}

    <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card-box p-1 mb-1">
                        <div class="row p-1 bg-primary text-right text-center">
                            <div class="col-sm-12 col-md-12">
                                <label style="font-size: 18px">{{env('APP_NAME')}}</label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 p-1">
                                <p>Chào {{ucwords($dataobj['nguoi_tim_viec']['get_tai_khoan']['ho_ten'])}},</p>
                                <p>Chúc mừng Bạn đã vượt qua vòng sơ tuyển của công ty <span style="color: #0D0A0A">{{ucwords($dataobj['data']['get_cong_ty']['name'])}}</span></p>
                                <p>Để xác nhận buổi tham gia phỏng vấn, {{env('APP_NAME')}} cần Bạn xác thực thông tin phỏng vấn.</p>
                                <p>Bạn vui lòng vào <a href="{{route('mail.xacThucPhongVan',['token'=>$dataobj['token']])}}">(bấm tại đây)</a> để hoàn thành.</p>


{{--                                Chào Bạn,--}}

{{--                                Chúc mừng Bạn đã vượt qua vòng sơ tuyển!--}}



{{--                                Đề nghị Bạn lưu ý đọc thật kỹ các câu hỏi dưới đây. Bạn sẽ mất khoảng 15 phút để hoàn thành tất cả các câu hỏi. Môi trường làm việc của The Coffee House rất thách thức & thường chỉ dành cho những ứng viên quyết tâm & có định hướng nghề nghiệp rõ ràng. Nếu không thật sự chắc chắn về các điều kiện dành cho vị trí này, mong Bạn vui lòng bỏ qua.--}}

{{--                                Bạn vui lòng vào (bấm tại đây) -> LINK để hoàn thành.--}}

{{--                                Link sẽ đóng vào 23h59 ngày 24/03/2018. Đề nghị Bạn hoàn thành trước thời gian này--}}

{{--                                Cám ơn Bạn rất nhiều,--}}
{{--                                Phòng Nhân sự The Coffee House.--}}

                                {{--                                    <form action="{{route('taikhoan.kichHoatTaiKhoan',$dataobj['token'])}}" method="post">--}}
                                {{--                                    </form>--}}
{{--                                <p>--}}
{{--                                    <a href="{{route('taikhoan.kichHoatTaiKhoan',$dataobj['token'])}}">{{route('taikhoan.kichHoatTaiKhoan',$dataobj['token'])}}</a>--}}
{{--                                </p>--}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        </div>--}}
    </div>
</div>
</body>

</html>
