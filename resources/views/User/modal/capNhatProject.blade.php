<div class="modal hide fade" id="modal-cap-nhat-project" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">{{__('Cập nhật dự án')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Tên dự án') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="hidden" id="project-index" value="">
                        <input type="text"
                               class="form-control not-null"
                               value="" required autofocus title="{{ __('Nhập tên dự án') }}">

                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Thời gian bắt đầu') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text"
                               class="form-control not-null from-date-project"
                               value="01/2020" required autofocus title="{{ __('Nhập thời gian bắt đầu') }}">
                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Thời gian hoàn thành') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text"
                               class="form-control not-null to-date-project"
                               value="02/2020" required autofocus title="{{ __('Thời gian hoàn thành') }}">
                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row d-none">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Trạng thái') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        @include('User.nguoiTimViec.htmlProjectStatus')
{{--                        <input type="text"--}}
{{--                               class="form-control"--}}
{{--                               value="" required autofocus title="{{ __('Trạng thái') }}">--}}
                        <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Liên kết') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <textarea class="form-control" value="" required autofocus title="{{ __('Liên kết') }}"></textarea>
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
                <button type="button" class="btn btn-primary" id="save-du-an">{{__('Cập nhật')}}</button>
            </div>
        </div>
    </div>
</div>
