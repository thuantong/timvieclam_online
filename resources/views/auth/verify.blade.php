@extends('master.index')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8">
            <div class="card">
                <div class="card-header bg-primary">{{ __('Xác thực thông tin Email của bạn') }}</div>

                <div class="card-body">
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    {{ __('Để sử dụng dịch vụ của ứng đụng trang,') }}
                    {{ __('Bạn cần xác thực lại thông tin email! Và sau đó, kiểm tra lại hộp thư của emai: ')}}
                    <div class="form-group row mb-0">
                        <div class="col-sm-12 col-md-12">
                            <div class="input-group">
                                <input class="form-control email-not-null" id="email" value="{{Auth::user()->email}}">
                                <button class="btn btn-primary" id="gui-xac-nhan-email">Gửi xác thực email</button>
                                
                                <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                            </div>
                            <p><small>Nếu không thấy mail, vui lòng kiểm tra lại email hoặc kiểm tra mục thư rác!</small></p>
                            <span class="text-success message-response"></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    {{--    init valiable of confirm email--}}
    <script type="text/javascript">
        let data_action_confifm = '{{Auth::user()->id}}';
    </script>
    <script type="text/javascript" src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets/js/app/chuc-nang-gui-confirm-email.js')}}"></script>
{{--    <script type="text/javascript">--}}
{{--        $(document).on('click','#gui-xac-nhan-email',function () {--}}
{{--            let __this = $(this);--}}
{{--            let error = 0;--}}
{{--            error += notNullMessage($('.not-null'));--}}
{{--            if (error == 0){--}}
{{--                let ajax = {--}}
{{--                    method:'post',--}}
{{--                    url:'/tai-khoan/xac-nhan-email',--}}
{{--                    data : {--}}
{{--                        action : '{{Auth::user()->id}}',--}}
{{--                        email : $('#email').val()--}}
{{--                    }--}}
{{--                }--}}
{{--                sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,__this.attr('id')).done(r=>{--}}
{{--                    console.log(r);--}}
{{--                    getHtmlResponse(r);--}}
{{--                    if (r.status == 200){--}}
{{--                        $('.message-response').text(r.message);--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
    @endpush
