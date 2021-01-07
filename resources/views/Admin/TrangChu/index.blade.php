@extends('master.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Trang quản trị</li>
                    </ol>
                </div>
                <h4 class="page-title">Trang quản trị</h4>
            </div>
        </div>
    </div>

    <div class="card-box">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tổng số người dùng"></i>
                    <h4 class="mt-0 font-16">Số lượng người dùng</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{\App\Models\TaiKhoan::all()->count()}}</span></h2>
{{--                    <p class="text-muted mb-0">Total income: $22506 <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>10.25%</span></p>--}}
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tổng số bài tuyển dụng đang chờ duyệt"></i>
                    <h4 class="mt-0 font-16">Bài tuyển dụng chờ duyệt</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{\App\Models\BaiTuyenDung::query()->where('status',0)->count()}}</span></h2>
{{--                    <p class="text-muted mb-0">Total sales: 2398 <span class="float-right"><i class="fa fa-caret-down text-danger mr-1"></i>7.85%</span></p>--}}
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tổng số bài tuyển dụng đang tuyển"></i>
                    <h4 class="mt-0 font-16">Bài tuyển dụng đang tuyển</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{\App\Models\BaiTuyenDung::query()->where('status',1)->count()}}</span></h2>
{{--                    <p class="text-muted mb-0">Total users: 121 M <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>3.64%</span></p>--}}
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tổng số doanh thu"></i>
                    <h4 class="mt-0 font-16">Tổng doanh thu</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{\App\Models\DonHang::query()->sum('so_luong')}}</span> Xu</h2>
{{--                    <p class="text-muted mb-0">Total revenue: $1.2 M <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>17.48%</span></p>--}}
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card-box" dir="ltr">
                    <h4 class="header-title mb-3">Người dùng hệ thống</h4>
                    <div id="chart-nguoi-dung" style="height: 300px;" class="morris-chart"></div>
                                    <div class="text-center">
                                        <p class="text-muted font-15 font-family-secondary mb-0">
                                            <span class="mx-2"><i class="fa fa-circle text-pink"></i> Nhà tuyển dụng</span>
                                            <span class="mx-2"><i class="fa fa-circle text-purple"></i> Người tìm việc</span>
                                            <span class="mx-2"><i class="fa fa-circle text-secondary"></i> Quản trị viên</span>
                                        </p>
                                    </div>
                </div> <!-- end card-box-->
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card-box" dir="ltr">
                    <h4 class="header-title mb-3">Bài tuyển dụng đã đăng trong tháng</h4>
                    <div id="chart-bai-tuyen-dung" style="height: 322px;" class="morris-chart"></div>
{{--                                    <div class="text-center">--}}
{{--                                        <p class="text-muted font-15 font-family-secondary mb-0">--}}
{{--                                            <span class="mx-2"><i class="fa fa-circle text-pink"></i> Nhà tuyển dụng</span>--}}
{{--                                            <span class="mx-2"><i class="fa fa-circle text-purple"></i> Người tìm việc</span>--}}
{{--                                            <span class="mx-2"><i class="fa fa-circle text-secondary"></i> Quản trị viên</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
                </div> <!-- end card-box-->
            </div>
        </div>
    </div>
    @endsection
@push('scripts')
{{--    @dd($data)--}}
    <!--Morris Chart-->
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\morris-js\morris.min.js')}}"></script>
    <script src="{{URL::asset(env('URL_ASSET_PUBLIC').'assets\libs\raphael\raphael.min.js')}}"></script>
    <script>
        $(function () {
            let arrayChartNguoiDung = JSON.parse('{!! $data !!}');
            // console.log(arrayChartNguoiDung)
            Morris.Donut({
                element: 'chart-nguoi-dung',
                data: arrayChartNguoiDung,
                colors: [
                    '#f672a7',
                    '#7266ba',
                    '#6c757d'

                ],
                resize: true,
                formatter: function (x, data) { return x+'%'; }
            });

            let arrayChartBaiTuyenDung = JSON.parse('{!! $dataBTD !!}');
            // console.log(arrayChartBaiTuyenDung)
            Morris.Bar({
                element: 'chart-bai-tuyen-dung',
                data: arrayChartBaiTuyenDung,
                xkey: 'x',
                ykeys: ['y'],
                labels: ['Số bài đăng'],
                resize: true,
                barColors: function (row, series, type) {
                    if (type === 'bar') {
                        var red = Math.ceil(255 * row.y / this.ymax);
                        return 'rgb(' + red + ',0,0)';
                    }
                    else {
                        return '#000';
                    }
                }
            });

        });

    </script>
    @endpush
