<div class="modal fade bs-example-modal-center" id="bao-cao-modal" tabindex="-1" role="dialog"
     aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel">{{__('Báo cáo')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="action-check">
                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-sm-12 col-md-4 col-form-label text-md-right">{{ __(' ') }}</label>

                    <div class="col-sm-12 col-md-6">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="loai_bao_cao" class="custom-control-input"
                                   value="1" checked>
                            <label class="custom-control-label" for="customRadio1">{{__('Nhà tuyển dụng')}}</label>
                        </div>
                        {{--                        <div class="custom-control custom-radio">--}}
                        {{--                            <input type="radio" id="customRadio2" name="loai_tai_khoan" class="custom-control-input" value="2">--}}
                        {{--                            <label class="custom-control-label" for="customRadio2">{{__('Tài khoản tuyển dụng')}} </label>--}}
                        {{--                        </div>--}}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 col-md-12 text-center">
                        <h4>{{$data['get_nha_tuyen_dung']['get_tai_khoan']['ho_ten']}}</h4>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                           class="col-sm-12 col-md-4 col-form-label text-md-right">{{ __('Nội dung báo cáo') }}</label>
                    <div class="col-sm-12 col-md-6">
                        <textarea class="form-control break-custom not-null" id="noi-dung-bao-cao"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary save" id="save">Lưu lại</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
