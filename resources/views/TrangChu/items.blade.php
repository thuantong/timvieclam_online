
@if(count($data['bai_tuyen_dung']['data']) != 0)

    <input type="hidden" class="item-container-page" data-current="{{$data['trang_hien_tai']}}" data-pageurl="{{$data['check_trang']}}">
    @foreach($data['bai_tuyen_dung']['data'] as $row)

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-white ribbon-box iteam-click" data-id="{{$row['id']}}">
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 center-element">

                <img src="{{URL::asset(env('URL_ASSET_PUBLIC').$row['get_cong_ty']['logo'])}}" class="border" style="width: calc(100%)">

            </div>
            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><h5 class="mb-0"><a class="xem-chi-tiet-post" href="{{route('baiviet.getThongTinBaiViet',[$row['id'],'chitiet'=>1])}}"><span title="{{$row['tieu_de']}}" class="text-capitalize">{{$row['tieu_de']}}</span></a>
                        </h5></div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text text-uppercase"><i><span title="{{$row['get_cong_ty']['name']}}">{{$row['get_cong_ty']['name']}}</span></i>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-xl-4 text"><span title="{{$row['luong_from']}}{{' - '}}{{$row['luong_to']}}{{' Triệu'}}"><span class="icofont icofont-money"></span>{{$row['luong_from']}}{{' - '}}{{$row['luong_to']}}{{' Triệu'}}</span></div>
                            <div class="col-sm-4 col-md-4 col-xl-4 text"><span title="{{$row['get_dia_diem']['name']}}"><span class="icofont icofont-location-pin"></span>{{$row['get_dia_diem']['name']}}</span></div>
                            <div class="col-sm-4 col-md-4 col-xl-4 text"><span title="{{$row['han_tuyen']}}"><span class="fa fa-calendar-plus-o"></span> {{$row['han_tuyen']}}</span></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(intval($row['isHot']) == 1)
        <div class="ribbon-two ribbon-two-danger floats-right"><span class="right-custom">Hot</span>
        </div>
        @endif
{{--        <div class="arrow-item d-none"></div>--}}
    </div>
    @endforeach
@else
    <div class="row">
        <div class="col-sm-12 col-md-12 bg-primary text-white text-center">
            {{__('Không tìm thấy việc làm')}}
        </div>
    </div>

@endif



@push('scripts')
    <script type="text/javascript">
        $(function () {
        //search
        // let widthImage_search = $('.left-search-content .iteam-click').find('img').parent().width();
        // let heightImage_search = widthImage_search;
        // $('.left-search-content .iteam-click').find('img').css('width', widthImage_search).css('height', heightImage_search);
        // $(window).resize(function () {
        //     widthImage_search = $('.left-search-content .iteam-click').find('img').parent().width();
        //     heightImage_search = widthImage_search;
        //     // console.log($('.iteam-click').find('img').parent().width());
        //     $('.left-search-content .iteam-click').find('img').css('width', widthImage_search).css('height', heightImage_search);
        //
        // });
        // //container index
        // let widthImage = $('#container-items .iteam-click').find('img').parent().width();
        // let heightImage = widthImage;
        //
        // $('#container-items .iteam-click').find('img').css('width', widthImage).css('height', heightImage);
        // //mũi tên
        $('#container-items .iteam-click').on('click', function () {
            // console.log($(this).height());
            let haflHeight = parseFloat($(this).height())*0.4;
            $(this).find('.arrow-item').css('top',haflHeight+'px');
            if($(document).width() >= 576){
                $('#container-items .iteam-click').removeClass('iteam-click-focus');
                $(this).addClass('iteam-click-focus');
                $('.arrow-item').addClass('d-none');
                $(this).find('.arrow-item').removeClass('d-none');
            }else if($(document).width() < 576){
                $('.arrow-item').addClass('d-none');
            }
        });
        // //resize post
        // $(window).resize(function () {
        //     widthImage = $('#container-items .iteam-click').find('img').parent().width();
        //     heightImage = widthImage;
        //     $('#container-items .iteam-click').find('img').css('width', widthImage).css('height', heightImage);
        //     console.log('cái con cặc')
        // });
        })
    </script>
    @endpush

