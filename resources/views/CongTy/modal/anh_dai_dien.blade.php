<div class="modal fade bs-example-modal-center congty" id="doi_anh_dai_dien" tabindex="-1" role="dialog"
     aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Cập nhật ảnh đại diện')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="demo-wrap upload-demo">
                    {{--                        <div class="container">--}}
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="upload-msg">
                                Đang tải ảnh
                            </div>
                            <div class="upload-demo-wrap">
                                <div id="upload-demo"></div>
                            </div>
                        </div>
                    </div>
                    {{--                        </div>--}}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect"
                        data-dismiss="modal" id="close">{{__('Thoát')}}</button>
                <button type="button" class="btn btn-info waves-effect waves-light" id="save">
                    {{__('Lưu lại')}}
                </button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
