@extends('master.index')
@section('content')
    <head><!-- third party css -->
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
    </head>


    <div class="modal fade bs-example-modal-center" id="the-moi-the-cao-modal" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh sách thẻ')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                    <tr>
                                        @if($data['loai_the'] != null)
                                        @for($i = 0;$i<count($data['loai_the']);$i++)
                                            @if($i%3 == 0)
                                    </tr>
                                    <tr>

                                        @endif

                                        @if($i == (count($data['loai_the']) - 1))
                                            <td colspan="3" class="text-center">
                                                <button class="btn btn-outline-info btn-outline-trigger"
                                                        data-id="{{$data['loai_the'][$i]['id']}}">{{$data['loai_the'][$i]['name']}}</button>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <button class="btn btn-outline-info btn-outline-trigger"
                                                        data-id="{{$data['loai_the'][$i]['id']}}">{{$data['loai_the'][$i]['name']}}</button>
                                            </td>
                                        @endif

                                        @endfor
                                        @else
                                            <td colspan="3" class="text-center">Không có dữ liệu</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal" id="close">{{__('Thoát')}}</button>
{{--                    <button type="button" class="btn btn-info waves-effect waves-light" id="save">--}}
{{--                        {{__('Lưu lại')}}--}}
{{--                    </button>--}}
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách thẻ cào</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Danh sách thẻ cào')}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1 text-right">
                {{--                <div class="row">--}}
                {{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-left">--}}
                {{--                        <button class="btn btn-primary" id="them-moi">Thêm mới</button>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table" id="danh-sach-the-nap">
                                        <thead>
                                        <tr>
                                            <th>Loại Thẻ</th>
                                            <th>Code</th>
                                            <th>Tình trạng</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
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
    <script type="text/javascript">
        $(function () {
            let ajax = {
                method: 'get',
                url: '/the-cao/lay-danh-sach'
            };
            let column = [
                {data: 'get_loai_the.name'},
                {data: 'code'},
                {
                    render: function (data, type, row, meta){
                        let tinhTrang = '';
                        let colorText = '';
                        if (row.status == 0){
                            tinhTrang ='Chưa nạp';
                            colorText = 'text-info';
                        }else if(row.status == 1){
                            tinhTrang ='Đã nạp';
                            colorText = 'text-danger';
                        }
                        return '<span class="'+colorText+'">'+tinhTrang+'</span>';
                    }
                },
                {
                    render: function (data, type, row, meta){

                        return '<button class="btn btn-info waves-effect btn-copy-text">Copy</button>';
                    }
                }
            ];
            let table = '';
            table = datatableAjax($('#danh-sach-the-nap'), ajax, column);

            $.ajax({
                method: 'get',
                url: '/the-cao/lay-danh-sach'
            }).done(e => {
                console.log(e)
            });

            $(document).on('click', '.them-moi-danh-sach', function () {
                $('#the-moi-the-cao-modal').modal('show')
                // sendAjaxNoFunc('post','/the-cao/them-danh-sach',{},$(this).attr('id'));
            });
            $(document).on('click','.btn-outline-trigger',function () {
                let id = $(this).data('id');
                sendAjaxNoFunc('post','/the-cao/them-danh-sach',{id:id},'').done(e=>{
                    // console.log(e)
                    getHtmlResponse(e);
                    if (e.status == 200){
                        $('#the-moi-the-cao-modal').modal('hide');
                        table.ajax.reload();
                    }
                })

            });
            copy
            $(document).on('click','.btn-copy-text',function () {
                let value = $(this).parents('tr').find('td').eq(1).text();
                copy(value)
            })
        })
    </script>
@endpush
