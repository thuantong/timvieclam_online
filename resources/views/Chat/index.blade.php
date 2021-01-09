<div class="col-sm-12 col-md-12">
    <form action="{{route('nhantin.nhanTin')}}" class="row" method="post">
        @csrf
        <div class="col-sm-12 col-md-6 text-white"></div>
        <div class="col-sm-12 col-md-6">
            <div class="row">
                <div class="col-sm-12 col-md-12 bg-primary" >
                    {{--                @dd(\App\Models\TaiKhoan::query()->find($denTaiKhoan))--}}
                    <h5 class="text-white"><img src="{{URL::asset(env('URL_ASSET_PUBLIC').\App\Models\TaiKhoan::query()->find($denTaiKhoan)['avatar'])}}" class="pr-1" style="width: 30px;">{{\App\Models\TaiKhoan::query()->find($denTaiKhoan)['ho_ten']}}</h5>
                    <input type="hidden" name="action_send" value="{{$denTaiKhoan}}">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 pr-3 border content-chat overflow-auto-scroll bg-white">

                    @include('Chat.content')
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 p-0 footer-chat">
                    <div class="input-group" style="bottom: 0px!important;">
                        <input type="text" class="form-control" name="content_message" value="" placeholder="Nhập tin nhắn...">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </div>
            </div>
        </div>




    </form>


</div>
