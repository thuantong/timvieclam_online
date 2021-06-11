<div class="left-side-menu left-side-menu-custom pt-0">

    <div class="slimscroll-menu">
    {{--        {{'Số dư'.Session::get('so_du')}}--}}

    <!--- Sidemenu -->
        <div id="sidebar-menu">
            {{--{{Session::get('loai_tai_khoan')}}--}}
            {{--{{json_encode(Session::get('role'))}}--}}
            <ul class="metismenu" id="side-menu">
{{--                {{Session::has('so_du') == true}}--}}
                <li class="d-block d-md-none">
                    <a href="{{URL::asset('/')}}" class="waves-effect">
                        <i class="fa fa-file-text-o"></i>
                        <span>{{__('Việc làm')}}</span>
                    </a>
                </li>
                @if(Auth::user() != null)
                    @if(Session::get('loai_tai_khoan') != 3)
                        <li class="d-md-none d-sm-block">
                            <a class="center-element search-field-new-query waves-effect" id="search-field-new-query"
                               data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                               aria-controls="collapseExample">
                                <span>Tìm kiếm</span>
                            </a>
                        </li>
                    @endif

                    <li class="">
                        @if(Session::get('loai_tai_khoan') != 3 && Session::get('loai_tai_khoan') != 1)
                            @if(Session::exists('so_du') == false)
                                <a href="{{route('sodu.index')}}" class="waves-effect text-center">
                                    <i class="fa fa-usd"></i>
                                    <span>{{__('Chưa đăng ký số dư')}}</span>
                                </a>
                            @else
                                <div class="input-group center-element">
                                    <span class="text-center"><b>{{__('Số dư: ')}}&nbsp;</b></span>
                                    <a class="waves-effect" href="{{route('sodu.index')}}">@money_xu(Session::get('so_du'))</a>
                                    {{--                        <span class="text-center"></span>--}}
                                    <span class="text-center"><b>&nbsp;Xu</b></span>
                                </div>

                            @endif
                    </li>
                @endif
{{--                người tìm việc--}}
                @if(Session::get('loai_tai_khoan') == 1)
                    <li>
                        <a href="{{route('nguoitimviec.index')}}" class="waves-effect">
                            <i class="fa fa-file-text-o"></i>
                            <span>{{__('Bài đã lưu')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('nopdon.danhSachBaiDaNopDon')}}" class="waves-effect">
                            <i class="fa fa-list-alt"></i>
                            <span>{{__('Kiểm tra ứng tuyển')}}</span>
                        </a>
                    </li>

                @endif

                {{--                Phần Nhà tuyển dụng--}}
                @if(Session::get('loai_tai_khoan') == 2)
                    <li>
                        <a href="{{route('baiviet.index')}}" class="waves-effect">
                            <i class="fa fa-file-text-o"></i>
                            <span>{{__('Đăng bài tuyển dụng')}}</span>
                        </a>
                    </li>
                    <li class="menu-title">{{__('Quản lý tuyển dụng')}}</li>
                    <li>
                        <a href="{{route('congty.index')}}" class="waves-effect">
                            <i class="fa fa-building"></i>
                            <span>{{__('Quản lý Công Ty')}}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('quanlybaidang.index')}}" class="waves-effect">
                            <i class="fa fa-list-alt"></i>
                            {{-- <span>{{__('Quản lý bài đăng').'('.\App\Models\TaiKhoan::query()->find(\Illuminate\Support\Facades\Auth::user()->id)->getNhaTuyenDung->getBaiViet()->count().")"}}</span> --}}
                            {{-- <span>{{__('Quản lý bài đăng').'('.\App\Models\TaiKhoan::query()->find(\Illuminate\Support\Facades\Auth::user()->id)->getNhaTuyenDung->getBaiViet()->count().")"}}</span> --}}
                        </a>
                    </li>

                    <li>
                        <a href="{{route('quanlyungvien.index')}}" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>{{__('Quản lý ứng viên')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('nhatuyendung.index')}}" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>{{__('Tìm ứng viên')}}</span>
                        </a>
                    </li>
                @endif
{{--                <li class="menu-title">{{__('Dịch vụ')}}</li>--}}

{{--                @if(Session::get('loai_tai_khoan') == 2)--}}
{{--                    <li>--}}
{{--                        <a href="javascript: void(0);" class="waves-effect">--}}
{{--                            <i class="fa fa-list-alt"></i>--}}
{{--                            <span>{{__('Đăng ký bài hot')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="javascript: void(0);" class="waves-effect">--}}
{{--                            <i class="fa fa-users"></i>--}}
{{--                            <span>{{__('Đăng ký bài viết tin cậy')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endif--}}

                @if(Session::get('loai_tai_khoan') == 2)
                    <li class="menu-title">{{__('Chức năng khác')}}</li>



                @endif
                @if(Session::exists('loai_tai_khoan') && Session::get('loai_tai_khoan') == 1)
                    <li>
                        <a href="{{route('nguoitimviec.timKiemNhaTuyenDung')}}" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>Tìm kiếm nhà tuyển dụng</span>
                        </a>
                    </li>
                @endif
                @if(Session::get('loai_tai_khoan') == 3)
                    <li class="menu-title">{{__('Quản trị viên')}}</li>

                    <li>
                        <a href="{{route('admin.duyetbaiviet')}}" class="waves-effect">
                            <i class="fa fa-check-square-o"></i>
                            <span>{{__('Duyệt bài viết')}}</span>
                        </a>
                    </li>

{{--                    <li>--}}
{{--                        <a href="" class="waves-effect">--}}
{{--                            <i class="fa fa-users"></i>--}}
{{--                            <span>{{__('Quản lý tài khoản')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>{{__('Quản lý tài khoản')}}</span>
                            <span class="menu-arrow" data-icon="&#9699;"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{route('admin.danhSachTacVu')}}">Phân quyền bộ phận</a>
                            </li>
                            <li>
                                <a href="{{route('admin.danhSachTaiKhoan')}}">Phân quyền tài khoản</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{route('thecao.index')}}" class="waves-effect">
                            <i class="fa fa-credit-card"></i>
                            <span>{{__('Thẻ nạp')}}</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{route('nhantin.danhSach')}}" class="waves-effect">
                        <i class="fa fa-envelope"></i>
                        <span>{{__('Tin nhắn')}}</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item  notify-item"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="remixicon-logout-box-line"></i>
                        <span>Đăng xuất</span>
                        {{--                        {{ __('Logout') }}--}}
                    </a>
                </li>

                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
