<div class="modal hide fade" id="modal-cap-nhat-exp" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">{{__('Cập nhật kinh nghiệm')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label
                        class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Tên công ty(trường học)') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="hidden" id="exp-index" value="">
                        <input type="text"
                               class="form-control"
                               value="" required autofocus title="{{ __('Nhập tên công ty') }}">

                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Chức vụ(chuyên ngành)') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        {{--                        <input type="hidden" id="exp-index" value="">--}}
                        <input type="text"
                               class="form-control"
                               value="" required autofocus title="{{ __('Nhập tên chức vụ') }}">

                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Trang web') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text"
                               class="form-control"
                               value="" required autofocus title="{{ __('Nhập trang web') }}">
                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Thời gian bắt đầu') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text" id="thoi-gian-bat-dau"
                               class="form-control from-date-exp"
                               value="01/2020" required autofocus title="{{ __('Thời gian bắt đầu') }}">
                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Thời gian kết thúc') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text" id="thoi-gian-ket-thuc"
                               class="form-control to-date-exp"
                               value="02/2020" required autofocus title="{{ __('Thời gian kết thúc') }}">
                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Mô tả') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <textarea class="form-control" required autofocus title="{{ __('Mô tả') }}"></textarea>
                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Thoát')}}</button>
                <button type="button" class="btn btn-primary" id="save-exp">{{__('Cập nhật')}}</button>
            </div>
        </div>
    </div>
</div>
