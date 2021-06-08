@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\multi-select.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.css')}}" rel="stylesheet"
              type="text/css">
        <!-- ION Slider -->
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\ion-rangeslider\ion.rangeSlider.css')}}"
              rel="stylesheet" type="text/css">
        {{--        <link href="assets\libs\bootstrap-select\bootstrap-select.min.css" rel="stylesheet" type="text/css">--}}
        <link
            href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
            rel="stylesheet">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.css')}}"
              rel="stylesheet" type="text/css">

        {{--        date picker--}}
        <link
            href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}"
            rel="stylesheet"
            type="text/css">
    </head>
    {{--                    <!-- start page title -->//header--}}
    @include('User.modal.capNhatExp')
    @include('User.modal.capNhatProject')
    @include('NopDon.modal.master')
    @include('TrangChu.modalRutGon')
    {{--<!-- @include('BaoCao.modalBaoCao') -->--}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Việc làm</li>
                    </ol>
                </div>
                <h4 class="page-title">Việc làm</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 pb-2 p-0">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card text-right mb-0" style="border-bottom: none">
                        <a href="/" class="mr-1" style="right: 0">Xem tất cả</a>
                    </div>

                </div>
            </div>
            <div class="card overflow-auto-scroll mb-0">

                <div class="card-body" id="container-items">

                    
                    @include('TrangChu.items')
                    {{--                    <div class="processing-input text-center">--}}
                    {{--                        <button class="btn btn-white" type="button" disabled="">--}}
                    {{--                            Đang tải <span class="spinner-border spinner-border-sm mr-1" role="status"--}}
                    {{--                                           aria-hidden="true"></span>--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}

                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card text-center mb-0" style="border-top: none">
                         {{$data['bai_tuyen_dung']->links()}} 
                    </div>

                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-6 col-xl-6 pr-0">
            <div class="card">
                <div class="card-body pb-0">
                    
                        @include('BaiViet.contentRutGon')

                </div>
 
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script type="text/javascript">

        let loaiTaiKhoan = '{{Session::get('loai_tai_khoan')}}'
        let idBaiTuyenDung = '';
        let currenPage = null;
        let nextPage = null;
        let next_page_check = null;

        const getProcessing = () => {
            return '<div class="row">\n' +
                '                                            <div class="col-md-12 muc_luong">\n' +
                '                                                <div class="bg-light w-100 mb-1 box-thumbnail"\n' +
                '                                                     style="height: 25px"></div>\n' +
                '\n' +
                '                                            </div>\n' +
                '                                        </div>'
            // return '<div class="processing-input text-center"><button class="btn btn-white" type="button" disabled="">\n' +
            //     '                 Đang tải <span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>\n' +
            //     '    </button></div>';
        }

        const getThongTinChiTietPost = (e) => {
            // console.log('con cac ne', e);
            let baseURL = '{{ URL::asset('/') }}';
                // console.log("bc"+baseURL);
            // console.log('con cac dđne', e['don_xin_viec']['data'].length);
            // return;
            if (e != null) {
                if (parseInt(loaiTaiKhoan) == 1) {
                    // console.log(e.bai_da_luu.data.findIndex(x=>x.id == e.id))

                    if (e.bai_da_luu.data !== undefined) {
                        // if (e.bai_da_luu.data.includes(e.id) == true) {
                        if (e.bai_da_luu.data.findIndex(x => x == e.id) != -1) {
                            $('.trang-chu-like-post').removeClass('btn-outline-primary');
                            $('.trang-chu-like-post').addClass('btn-primary');
                            $('.trang-chu-like-post').addClass('like-animation');
                            $('.trang-chu-like-post').find('i').text(' Đã lưu');

                        } else {
                            $('.trang-chu-like-post').removeClass('btn-primary');
                            $('.trang-chu-like-post').removeClass('like-animation');
                            $('.trang-chu-like-post').addClass('btn-outline-primary');
                            $('.trang-chu-like-post').find('i').text(' Lưu bài');

                        }
                    }
                    //
                    if (e.don_xin_viec.data != null) {
                        // get_don_xin_viec
                        if (e.don_xin_viec.data != null && e.don_xin_viec.data.findIndex(x => x == e.id) != -1) {
                            $('.call-modal-nop-don').removeClass('btn-outline-warning');
                            $('.call-modal-nop-don').addClass('btn-warning');
                            $('.call-modal-nop-don').addClass('like-animation');
                            $('.call-modal-nop-don').find('i').text('Đã ứng tuyển');
                            $('.call-modal-nop-don').removeAttr('id');

                        } else {
                            $('.call-modal-nop-don').removeClass('btn-warning');
                            $('.call-modal-nop-don').removeClass('like-animation');
                            $('.call-modal-nop-don').addClass('btn-outline-warning');
                            $('.call-modal-nop-don').find('i').text('Nộp đơn');
                            $('.call-modal-nop-don').attr('id', 'call-modal-nop-don');
                        }
                    }

                }
                $('.call-nhan-tin-tuyen-dung').attr('id','call-nhan-tin-tuyen-dung');
                let getBasicURL = '{{URL::asset('/')}}';
                let idTaiKhoanDangNhap = null;
                @if(Auth::user() != null)
                idTaiKhoanDangNhap = '{{Auth::user()->id}}';
                @endif
                $('.call-nhan-tin-tuyen-dung').attr('href',getBasicURL+'nhan-tin-nguoi-dung?to='+e.get_nha_tuyen_dung.tai_khoan_id+'&from='+idTaiKhoanDangNhap);

                $('.tieu-de-chi-tiet').data('id', e.id);
                idBaiTuyenDung = $('.tieu-de-chi-tiet').data('id');
                //lượt thích
                // total_thich
                $('.tong-luot-thich').text(e.bai_da_luu.total);
                $('.tong-ung-tuyen').text(e.don_xin_viec.total);

                // return;

                //end
                //case báo cáo
                if (parseInt(loaiTaiKhoan) == 1) {
                    if (e.nguoi_tim_viec.get_bao_cao != null) {
                        if (e.nguoi_tim_viec.get_bao_cao.findIndex(x => x.id == e.get_nha_tuyen_dung.id) != -1) {
                            // if (e.nguoi_tim_viec.get_bao_cao.includes(parseInt(e.nha_tuyen_dung_id)) == true){
                            $('.bao-cao-button-call').removeClass('btn-outline-primary');
                            $('.bao-cao-button-call').addClass('btn-primary');
                            $('.bao-cao-button-call').addClass('like-animation');
                            $('.bao-cao-button-call').find('i').text(' Đã báo cáo');
                            $('.bao-cao-button-call').removeAttr('id');
                        } else {
                            $('.bao-cao-button-call').removeClass('btn-primary');
                            $('.bao-cao-button-call').removeClass('like-animation');
                            $('.bao-cao-button-call').addClass('btn-outline-primary');
                            $('.bao-cao-button-call').find('i').text(' Báo cáo');
                            $('.bao-cao-button-call').data('id', e.nha_tuyen_dung_id).attr('id', 'bao-cao-button-call');
                        }
                    }
                } else {
                    $('.bao-cao-button-call').addClass('thong-bao-phan-quyen')
                }


                $('.tieu-de-chi-tiet').text(e.tieu_de);
                $('.cong_ty').text(e.get_cong_ty.name);
                $('.name_nguoi_dang').text(e.get_nha_tuyen_dung.get_tai_khoan.ho_ten);
                $('.chuc_vu').text(e.get_chuc_vu.name);
                $('.han_nop').text(e.han_tuyen);
                $('.kinh_nghiem').text(e.get_kinh_nghiem.name);
                $('.kieu_lam_viec').text(e.get_kieu_lam_viec.name);
                $('.yc_bang_cap').text(e.get_bang_cap.name);

            
                $('.cong_ty_logo').attr('src',baseURL+e.get_cong_ty.logo);
                $('.cong_ty_websites').text(" "+e.get_cong_ty.websites);
                $('.cong_ty_dia_chi').text(" "+e.get_cong_ty.dia_chi);
                $('.quy_mo').text(" "+e.get_cong_ty.get_quy_mo_nhan_su.name);
                $('.gioi_thieu').text(" "+e.get_cong_ty.gioi_thieu);
                
                
                $('.mo_ta_cong_viec').html(e.mo_ta);
                $('.yeu_cau_cong_viec').html(e.yeu_cau_cong_viec);
                $('.quyen_loi_cong_viec').html(e.quyen_loi);
                $('.dia_chi_cv').html(e.dia_chi);
                $('.cong_ty_nganh_nghe').text(e.get_cong_ty.get_nganh_nghe.map(function(element){return element.name}).join(" - "));
                $('.ho_so_yeu_cau_cv').text(e.yeu_cau_ho_so.map(function(element){
                    
                    switch (element) {
                        case "1":
                            return 'Tiếng Anh';
                           
                            case "2":
                                
                            return 'Tiếng Việt';
                            
                            case "3":
                            return 'Tiếng Pháp';
                           
                            case "4":
                            return 'Tiếng Trung';
                          
                            case "5":
                            return 'Tiếng Nhật';
                         
                            case "6":
                            return 'Tiếng Hàn Quốc';

                    }
             
                }).join(", "));
               
                // return;
                let gioi_tinh = '';
                switch (parseInt(e.gioi_tinh_tuyen)) {
                    case 1:
                        gioi_tinh = 'Nam';
                        break;
                    case 2:
                        gioi_tinh = 'Nữ';
                        break;
                    case 3:
                        gioi_tinh = 'Tất cả';
                        break;
                }
                $('.gioi_tinh_tuyen').text(gioi_tinh);

                $('.so_luong_tuyen').text(e.so_luong_tuyen);
                $('.dia_diem').text(e.get_dia_diem.name);

                let array_nganh_nghe = [];
                $.each(e.get_nganh_nghe, function (i, v) {
                    array_nganh_nghe.push(v.name);
                });

                $('.nganh_nghe').text(array_nganh_nghe.join(' - '));


                $('.muc_luong').text(e.luong_from + ' - ' + e.luong_to + ' Triệu');
                
                $('.xem-chi-tiet-rut-gon').attr('href', '/bai-viet/thong-tin&baiviet=' + e.id + '&chitiet=1');
                $('.xem-chi-tiet-rut-gon').attr('target', '_blank');
              
            } else if (e == null) {
                // init animation like
                $('.trang-chu-like-post').removeClass('btn-primary');
                $('.trang-chu-like-post').removeClass('like-animation');
                $('.trang-chu-like-post').addClass('btn-outline-primary');
                $('.trang-chu-like-post').find('i').text(' Lưu bài');
                //end

                $('.xem-chi-tiet-rut-gon').removeAttr('href');


                $('.tong-luot-thich').html('');

                $('.tieu-de-chi-tiet').html(getProcessing());
                $('.cong_ty').html(getProcessing());
                $('.name_nguoi_dang').html(getProcessing());
                $('.chuc_vu').html(getProcessing());
                $('.han_nop').html(getProcessing());
                $('.kinh_nghiem').html(getProcessing());
                $('.kieu_lam_viec').html(getProcessing());
                $('.yc_bang_cap').html(getProcessing());
                $('.call-nhan-tin-tuyen-dung').removeAttr('id');
                $('.call-nhan-tin-tuyen-dung').removeAttr('href');
                $('.gioi_tinh_tuyen').html(getProcessing());
                $('.so_luong_tuyen').html(getProcessing());
                $('.dia_diem').html(getProcessing());
                $('.nganh_nghe').html(getProcessing());
                $('.muc_luong').html(getProcessing());

                $('.cong_ty_logo').html(getProcessing());
                $('.cong_ty_websites').html(getProcessing());
                $('.cong_ty_dia_chi').html(getProcessing());
                $('.quy_mo').html(getProcessing());
                $('.gioi_thieu').html(getProcessing());
                
                
                $('.mo_ta_cong_viec').html(getProcessing());
                $('.yeu_cau_cong_viec').html(getProcessing());
                $('.quyen_loi_cong_viec').html(getProcessing());
                $('.dia_chi_cv').html(getProcessing());
                $('.cong_ty_nganh_nghe').html(getProcessing());
               
            }

        };
        $(document).on('click', '#call-modal-nop-don', function () {
            window.location.href = "/nguoi-tim-viec/nop-don-buoc-mot?bai_tuyen_dung=" + idBaiTuyenDung;
        });
        let widthImage = $('#container-items .iteam-click').find('img').parent().width();
        let heightImage = widthImage;


        const getDataThongTinBaiViet = (element) => {

            let __this = element;
            let ajax = {
                method: 'get',
                url: '/bai-viet/thong-tin&baiviet=' + __this.data('id') + '&chitiet=0',
                data: {}
            };
            // console.log('checked',__this.hasClass('iteam-click-focus'))
            // __this.Class('iteam-click-active');
            if (__this.hasClass('iteam-click-focus') == true) {
                if (__this.hasClass('iteam-click-active') == false) {
                    getThongTinChiTietPost(null);

                    sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(r => {
                        // console.log('thongtin', r);
                        getThongTinChiTietPost(r);
                        __this.addClass('iteam-click-active')
                    });
                }

            }
        }
    </script>



    <script
        src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>
    <script
        src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\lay-danh-sach-viec-lam.js')}}"></script>


    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\chuc-nang-bao-cao.js')}}"></script>
    <script type="text/javascript">
    
        $(function () {
            // $('body').scrollTop(0);
            $('#container-items .iteam-click').find('img').css('width', widthImage).css('height', heightImage);
            $('.content-detail-left').css('height',$('#container-items').height()-100+"px");
            // console.log($('#container-items').height())
            // //init lấy danh sách việc làm | lấy page 1
            // getItemsDefaults($('#container-items'), ajaxBaiViet.data.page,ajaxBaiViet);
            // //end init
            if ($(document).width() >= 576) {
                setTimeout(function () {
                $('#container-items .iteam-click').eq(0).trigger('click');
            }, 500);
            }
            

//like || quan tâm bài viết
            $('.trang-chu-like-post').on('click', function () {
                let __this = $(this);
                let idPost = $('#container-items .iteam-click.iteam-click-focus').data('id');
                if (__this.hasClass('btn-outline-primary') == true) {
                    __this.removeClass('btn-outline-primary');
                    __this.addClass('btn-primary');
                    __this.addClass('like-animation');
                    __this.find('i').text('Đã lưu');
                    let ajax = {
                        method: 'post',
                        url: '/bai-viet/like',
                        data: {
                            id: idPost,
                            thich: 1
                        }
                    };
                    // console.log('lưu',ajax)
                    // return;
                    sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '')
                        .done(e => {
                            // console.log(e)
                            $('.tong-luot-thich').text(e.total_thich);
                        });
                } else if (__this.hasClass('btn-primary') == true) {
                    __this.removeClass('btn-primary');
                    __this.removeClass('like-animation');
                    __this.addClass('btn-outline-primary');
                    __this.find('i').text('Lưu bài')
                    let ajax = {
                        method: 'post',
                        url: '/bai-viet/like',
                        data: {
                            id: idPost,
                            thich: 0
                        }
                    };
                    // console.log('chưa lưu',ajax)
                    // return;
                    sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '')
                        .done(e => {
                            console.log(e)
                            $('.tong-luot-thich').text(e.total_thich);
                        });

                }

            });

            $(document).on('click', '#container-items .iteam-click', function () {
                // console.log($(this).height());
                let __this = $(this);
                let haflHeight = parseFloat(__this.height()) * 0.4;
                __this.find('.arrow-item').css('top', haflHeight + 'px');
                if ($(document).width() >= 576) {
                    $('#container-items .iteam-click').removeClass('iteam-click-focus');

                    $('#container-items .iteam-click').not(__this).removeClass('iteam-click-active');
                    __this.addClass('iteam-click-focus');
                    $('.arrow-item').addClass('d-none');
                    __this.find('.arrow-item').removeClass('d-none');
                    getDataThongTinBaiViet(__this);

                    
                } else if ($(document).width() < 576) {
                    
                    $('#container-items .iteam-click').removeClass('iteam-click-focus');

                    $('#container-items .iteam-click').not(__this).removeClass('iteam-click-active');
                    __this.addClass('iteam-click-focus');
                    $('.arrow-item').addClass('d-none');
                    __this.find('.arrow-item').removeClass('d-none');
                    getDataThongTinBaiViet(__this);
                    $('#modal-content-rut_gon').modal('show');
                }
            });
            let formDataFileUpload = new FormData();
            let formDataFileUpload_check = [];
            $(document).on('change', '#add-new-file-upload-input', function (e) {
                // var tmppath = URL.createObjectURL(e.target.files[0]);
                // console.log( $(this).get(0).files.length);
                let __this = $(this);
                var formData = formDataFileUpload;
                let countFile = 0;
                for (var i = 0; i < __this.get(0).files.length; ++i) {
                    // console.log($(this).get(0).files[i].type);
                    let findTheSame = formDataFileUpload_check.includes(__this.get(0).files[i].name);
                    // console.log(findTheSame); console.log(formDataFileUpload_check);
                    if (findTheSame == false && $(this).get(0).files[i].type == "application/pdf") {
                        formData.append("fileUpload[]", __this.get(0).files[i]);
                        formDataFileUpload_check.push(__this.get(0).files[i].name);
                        countFile++;
                        // $('#render-file-upload').append('<span>' + __this.get(0).files[i].name + '</span><br>');
                    }

                    // names.push($(this).get(0).files[i].name);
                    // console.log(findTheSame)
                }
                let data = formData;
// console.log(data.getAll('fileUpload[]').length)
                // return;
                if (data.getAll('fileUpload[]').length > 0) {
                    $.ajax({
                        method: 'post',
                        url: '/nguoi-tim-viet/upload-file-multiple',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        processData: false,
                        contentType: false,
                    }).done(e => {
                        let response = e;
                        for (let i = 0; i < response.length; i++) {
                            let link_res = '{{URL::asset(env('URL_ASSET_PUBLIC').'/uploads')}}' + '/' + response[i];
                            $('#render-file-upload').append('<a href="' + link_res + '" target="_blank">' + response[i] + '</a><br>');
                            // $('#render-file-upload-iframe').append('<iframe src="'+'{{URL::asset('/uploads')}}'+'/'+response[i]+'" style="width:100%"></iframe>');
                        }
                        // console.log(data.getAll('fileUpload[]'));
                        for (let [name, value] of data) {
                            let checkFileSame = response.includes(name);
                            if (checkFileSame == true) {
                                console.log('true')
                                data.delete(name);
                            } else {
                                console.log('false')
                            }

                            // console.log(name)
                            // console.log(value)
                            // alert('${name} = ${value}'); // key1 = value1, then key2 = value2
                        }
                        // console.log(data.getAll('fileUpload[]'))
                        // // console.log(data.get('fileUpload[]'));
                        // console.log(e);
                    })
                }


                // success: function (res) {
                //     sendAjaxNoFunc('post', '/nguoi-tim-viet/upload-file-multiple', data, '').done(e => {
                //         console.log(e);
                //     })
                //     // console.log(formData);
                // }
            });
//         $(document).on('click', '#add-new-file-upload', function () {
//             $('#add-new-file-upload-input').trigger('click');
//         });
        })
        ;
    </script>
    // <!-- Plugins js-->
    // {{--    --}}{{--    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\twitter-bootstrap-wizard\jquery.bootstrap.wizard.min.js')}}"></script>--}}

    // {{--    --}}{{--    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\cap-nhat-kinh-nghiem.js')}}"></script>--}}
    // {{--    --}}{{--    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\cap-nhat-project.js')}}"></script>--}}


    // {{--    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\chuc-nang-nop-don-ung-tuyen.js')}}"></script>--}}

@endpush
