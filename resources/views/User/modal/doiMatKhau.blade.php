<div class="modal fade" id="modal-doi-mat-khau" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">{{__('Đổi mật khẩu')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="post-mat-khau-moi" method="post" action="{{route('user.doiMatKhau')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="password-old"
                               class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-form-label text-sm-center text-md-right">{{ __('Nhập mật khẩu cũ') }}</label>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <input id="password-old" type="password" title="Mật khẩu cũ"
                                   class="password-old form-control not-null check-min" name="password-old"
                                   value="" required autofocus>

{{--                            @error('password-old')--}}
                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
{{--                            @enderror--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-new"
                               class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-form-label text-sm-center text-md-right">{{ __('Nhập mật khẩu mới') }}</label>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <input id="password-new" type="password" title="Mật khẩu mới"
                                   class="password-new form-control not-null check-min" name="password-new"
                                   value="" required autofocus>

{{--                            @error('password-new')--}}
                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
{{--                            @enderror--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="re-password-new"
                               class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-form-label text-sm-center text-md-right">{{ __('Nhập lại mật khẩu mới') }}</label>

                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <input id="re-password-new" type="password"
                                   class="re-password-new form-control not-null check-min"
                                   name="re-password-new" value="" required autofocus title="{{ __('Nhập lại mật khẩu mới') }}">

{{--                            @error('re-password-new')--}}
                            <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
{{--                            @enderror--}}
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Thoát')}}</button>
                <button type="button" class="btn btn-primary" id="save-doi-mat-khau">{{__('Lưu lại')}}</button>
            </div>
        </div>
    </div>
</div>

