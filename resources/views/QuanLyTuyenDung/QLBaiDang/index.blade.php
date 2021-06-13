@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\quill\quill.core.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\quill\quill.bubble.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\quill\quill.snow.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
              rel="stylesheet">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <!-- third party css -->
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    {{--    Thêm mới công ty - modal--}}
    @include('CongTy.modal.themMoi')
    @include('CongTy.modal.xemAnhDaiDien')
    @include('CongTy.modal.anh_dai_dien')
    @include('BaiViet.modal.chinh_sua.modal')
    {{--    modal thêm mới --}}
    <div class="modal fade bs-example-modal-lg" id="ly-do-tu-choi-modal" tabindex="-1" role="dialog"  data-backdrop="static" data-keyboard="false"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Lý do từ chối bài tuyển dụng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <textarea class="form-control" readonly></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <b>Bạn hãy chỉnh lại bài tuyển dụng để được phê duyệt nhé!</b>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
{{--                    @include('BaiViet.buttonDangBai')--}}
{{--                    <button type="button" class="btn btn-primary" id="save-cong-ty">Lưu lại</button>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" id="them-moi-modal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Thêm mới bài tuyển dụng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>

                <div class="modal-body">
                    @include('BaiViet.contentBaiDang')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    @include('BaiViet.buttonDangBai')
                    {{--                    <button type="button" class="btn btn-primary" id="save-cong-ty">Lưu lại</button>--}}
                </div>
            </div>
        </div>
    </div>
    {{--    modal update --}}
    <div class="modal fade bs-example-modal-lg" id="cap-nhat-modal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Cập nhật bài tuyển dụng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>

                <div class="modal-body">
                    @include('BaiViet.contentCapNhatBaiDang')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    @include('BaiViet.buttonDangBai')
                    {{--                    <button type="button" class="btn btn-primary" id="save-cong-ty">Lưu lại</button>--}}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Trang chủ</a></li>
                        <li class="breadcrumb-item"><a>Quản Lý Tuyển Dụng</a></li>
                        <li class="breadcrumb-item active">Quản Lý Bài Tuyển Dụng</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Quản Lý Bài Đăng')}}</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-box p-1 mb-1 text-center">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="row">

                            <div class="col-sm-12 col-md-12">
                                <label>Địa điểm</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control qltd-search-field" id="qltd-dia-diem">
                                    <option value="">Tất cả</option>
                                    @if($dia_diem != null)
                                    @foreach($dia_diem as $row)
                                        <option value="{{$row['id']}}">{{$row['name']}}</option>
                                        @endforeach
                                        @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <label>Ngành nghề</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control  qltd-search-field" id="qltd-nganh-nghe">
                                    <option value="">Tất cả</option>
                                    @if($nganh_nghe != null)
                                    @foreach($nganh_nghe as $row)
                                        <option value="{{$row['id']}}">{{$row['name']}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <label>Chức vụ</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control qltd-search-field" id="qltd-chuc-vu">
                                    <option value="">Tất cả</option>
                                    @if($nganh_nghe != null)
                                    @foreach($chuc_vu as $row)
                                        <option value="{{$row['id']}}">{{$row['name']}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="row">

                            <div class="col-sm-12 col-md-12">
                                <label>Mức lương</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control qltd-search-field" id="qltd-muc-luong">
                                    <option selected value="">Tất cả</option>
                                    <option value="1">Từ 2 triệu</option>
                                    <option value="2">Từ 5 triệu</option>
                                    <option value="3">Từ 10 triệu</option>
                                    <option value="4">Từ 20 triệu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <label>Kinh nghiệm</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control  qltd-search-field" id="qltd-kinh-nghiem">
                                    <option value="">Tất cả</option>
                                    @if($kinh_nghiem != null)
                                    @foreach($kinh_nghiem as $row)
                                        <option value="{{$row['id']}}">{{$row['name']}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <label>Bài hot</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control  qltd-search-field" id="qltd-bai-hot">
                                    <option value="">Tất cả</option>
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="row">

                            <div class="col-sm-12 col-md-12">
                                <label>Bài Viết</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <select class="form-control qltd-search-field" id="qltd-bai-viet">
                                    <option  value="">Tất cả</option>
                                    <option selected value="1">Đang tuyển dụng</option>
                                    <option value="2">Đã bị từ chối</option>
                                    <option value="0">Chờ được duyệt</option>
                                    <option value="0">Bị từ chối - Đã chỉnh sửa</option>
                                    <option value="4">Đã tạm ngưng</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 text-right">
                        <div class="row">

                            <div class="col-sm-12 col-md-12 text-center">
                                <label>Ngày Đăng Tin Từ:</label>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control text-center" id="qltd-ngay-dang" value="{{ date('d/m/Y') }}">
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4 col-md-4 center-element text-right">
                        <button class="btn btn-primary btn-sm" id="search-qltd">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="card-box p-1 mb-1 text-center">

                <div class="table-responsive">
                    <table class="table table-bordered datatable-check table-hover mb-0" id="quan-ly-bai-dang">
                        <thead  class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Tên chức vụ</th>
                            <th>Tên công ty tuyển dụng</th>
                            <th>Hạn bài đăng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\responsive.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.flash.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.print.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.keyTable.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.select.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\select2\select2.min.js')}}"></script>

    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\quill\quill.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript">
        let table = null;
        let HTMLcongTy = null;
        let getBaseURL = '{{URL::asset('/')}}';
        const initEventCapNhatCongTy = ()=>{
            $('#doi_anh_dai_dien').data('type','them-moi-cong-ty')
            select2Default($('select#from_day'));
            select2Default($('select#to_day'));
            select2Default($('select#quy_mo_nhan_su'));
            select2MultipleDefault($('select#linh_vuc_hoat_dong'),'Chọn Ngành nghề')
            // $('select#from_day,select#to_day,select#quy_mo_nhan_su').select2({
            //     dropdownParent: $('div#cap-nhat-cong-ty ')
            // });
            // $('select#linh_vuc_hoat_dong').select2({
            //     placeholder: ' Chọn Ngành nghề',
            //     allowClear: false
            // });



            $("#so_luong_chi_nhanh").TouchSpin({
                min: 0,
                buttondown_class: "btn btn-primary waves-effect",
                buttonup_class: "btn btn-primary waves-effect"
            });
            lichNam($('#nam_thanh_lap'));

            $('#from_time,#to_time').datetimepicker({
                format: 'HH:mm',
                widgetPositioning: {
                    vertical: 'bottom',
                    horizontal: 'right'
                },
                icons: {
                    time: "icofont icofont-clock-time",
                    date: "icofont icofont-ui-calendar",
                    up: "icofont icofont-rounded-up",
                    down: "icofont icofont-rounded-down",
                    next: "icofont icofont-rounded-right",
                    previous: "icofont icofont-rounded-left"
                },
            });
            hoverEventLogo();
        }
        const hoverEventLogo = () => {
            $("div#logo_cong_ty").hover(function () {
                if ($(window).width() >= 576) {
                    $(this).find('div.hover-me').fadeIn('fast');
                }
            }, function () {
                if ($(window).width() >= 576) {
                    $(this).find('div.hover-me').fadeOut('fast');
                }
            });
        }
    </script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\date-picker-vi.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\quanLyBaiDang.js')}}"></script>
    @include('BaiViet.scriptThemMoi')
    <script type="text/javascript">
        $(function () {
            $('.qltd-search-field').each(function () {
                select2Default($(this))
            })
            lichNgay($('#qltd-ngay-dang'))
            // select2Default($('#qltd-chuc-vu'))
            // select2Default($('#qltd-dia-diem'))
            // select2Default($('#qltd-nganh-nghe'))
            // select2Default($('#qltd-kinh-nghiem'))
            // select2Default($('#qltd-bai-hot'))
            getInitHtml();
        });
        $(document).on('click', '#form-update-body button#call-them-moi-cong-ty', function () {
            $('div.modal#them-moi-cong-ty').modal('show');
            $('div.modal#them-moi-cong-ty').data('type', 'cong_ty_tuyen_dung');
            $('div.modal#doi_anh_dai_dien').data('type', 'cap-nhat-cong-ty');

        });

        $(document).on('click','.them-moi-danh-sach',function () {
            $('#them-moi-modal').modal('show');
        });

        var quill = new Quill("#them-moi-modal #mo-ta-editor", {
            theme: "snow",
            // placeholder: 'Compose an epic...',
            modules: {toolbar: [ ["bold", "italic", "underline"], [{list: "ordered"}, {list: "bullet"}], [{align: []}], [], ["clean"]]}
        });
        var quill2 = new Quill("#them-moi-modal #yeu-cau-editor", {
            theme: "snow",
            // placeholder: 'Compose an epic...',
            modules: {toolbar: [ ["bold", "italic", "underline"], [{list: "ordered"}, {list: "bullet"}], [{align: []}], [], ["clean"]]}
        });
        var quill3 = new Quill("#them-moi-modal #quyen-loi-editor", {
            theme: "snow",
            // placeholder: 'Compose an epic...',
            modules: {toolbar: [ ["bold", "italic", "underline"], [{list: "ordered"}, {list: "bullet"}], [{align: []}], [], ["clean"]]}
        });

        $(document).on('focusout','.custom-editor .ql-editor',function () {
            let __this = $(this);
            let value = $(this).html();
            let __parent = $(this).parents('.custom-editor').parent();

            if ($.trim(__this.text()).length == 0){
                __this.html("");
            }
            if ($.trim(__this.text()).length == 0){
                __parent.find('textarea').addClass('is-invalid');
                __parent.find('textarea').parent().find('.invalid-feedback').addClass('text-left').find('strong').text(__parent.find('textarea').attr('title') + ' không được để trống');
            }else{
                __parent.find('textarea').removeClass('is-invalid');
            }
            __parent.find('textarea').val(""+value+"");
        });

        $(document).on('click','#search-qltd',function () {
            let diaDiem = $('#qltd-dia-diem').val();
            let nganhNghe = $('#qltd-nganh-nghe').val();
            let chucVu = $('#qltd-chuc-vu').val();
            let mucLuong = $('#qltd-muc-luong').val();
            let kinhNghiem = $('#qltd-kinh-nghiem').val();
            let baiHot = $('#qltd-bai-hot').val();
            let baiViet = $('#qltd-bai-viet').val();
            let ngay_dang = $('#qltd-ngay-dang').val();

            table.ajax.url('/quan-ly-tuyen-dung/quan-ly-bai-dang/get-danh-sach?dia_diem='+diaDiem+'&nganh_nghe='+nganhNghe+'&chuc_vu='+chucVu+'&muc_luong='+mucLuong+'&kinh_nghiem='+kinhNghiem+'&bai_hot='+baiHot+'&bai_viet='+baiViet+'&ngay_dang='+ngay_dang).load();
            // table.
        })
        // $(document).on('click','#quan-ly-bai-dang .chinh_sua',function () {
        //     let __this = $(this);
        //     let id = __this.parent().data('id');
        //     let ajax = {
        //         method: 'get',
        //         url : '/bai-viet/thong-tin&baiviet='+id+'&chitiet=0',
        //         data : {
        //             action : id
        //         }
        //     }
        //     sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
        //         // console.log('dataa',e);
        //         let data = e;
        //         let __modalFormCapNhat = $('#cap-nhat-modal').find('#form-update-body');
        //
        //         __modalFormCapNhat.find('#tieu_de_bai_dang_update').val(data.tieu_de);
        //         __modalFormCapNhat.find('#cong_ty_tuyen_dung_update').val(data.cong_ty_id).trigger('change.select2');
        //         __modalFormCapNhat.find('#chuc_vu_tuyen_update').val(data.chuc_vu_id).trigger('change.select2');
        //
        //         __modalFormCapNhat.find('#ten_chuc_vu_update').val(data.ten_chuc_vu);
        //         __modalFormCapNhat.find('#so_luong_tuyen_update').val(data.so_luong_tuyen);
        //         __modalFormCapNhat.find('#so_kinh_nghiem_update').val(data.kinh_nghiem_id).trigger('change.select2');
        //
        //         __modalFormCapNhat.find('#do_tuoi_from_update').val(data.tuoi[0]);
        //         __modalFormCapNhat.find('#do_tuoi_to_update').val(data.tuoi[1]);
        //         __modalFormCapNhat.find('#han_tuyen_dung_update').val(data.han_tuyen);
        //
        //         let arrayNganhNghe = [];
        //
        //         $.each(data.get_nganh_nghe,function (i,v) {
        //             arrayNganhNghe.push(v.id);
        //         });
        //         __modalFormCapNhat.find('#nganh_nghe_update').val(arrayNganhNghe).trigger('change.select2');
        //         __modalFormCapNhat.find('#muc_luong_from_update').val(data.luong[0]);
        //         __modalFormCapNhat.find('#muc_luong_to_update').val(data.luong[1]);
        //
        //         __modalFormCapNhat.find('#bang_cap_update').val(data.bang_cap_id).trigger('change.select2');
        //         __modalFormCapNhat.find('#gioi_tinh_update').val(data.gioi_tinh_tuyen).trigger('change.select2');
        //         __modalFormCapNhat.find('#dia_diem_lam_viec_update').val(data.dia_diem_id).trigger('change.select2');
        //         __modalFormCapNhat.find('#hinh_thuc_update').val(data.kieu_lam_viec_id).trigger('change.select2');
        //         __modalFormCapNhat.find('#mo_ta_cong_viec_update').val(data.mo_ta);
        //         __modalFormCapNhat.find('#yeu_cau_cong_viec_update').val(data.yeu_cau_cong_viec);
        //         __modalFormCapNhat.find('#quyen_loi_cong_viec_update').val(data.quyen_loi);
        //         __modalFormCapNhat.find('#dia_chi_cong_viec_update').val(data.dia_chi);
        //         __modalFormCapNhat.find('#so_ngay_ton_tai_update').val(data.so_luong_ngay_dang_tin.so_luong);
        //         __modalFormCapNhat.find('#dang_ky_bai_viet_hot_update').val(data.isHot);
        //
        //         $('#cap-nhat-modal').modal('show');
        //
        //     })
        //
        // });
    </script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\js\app\chinh_sua_bai_tuyen_dung.js')}}"></script>
@endpush
