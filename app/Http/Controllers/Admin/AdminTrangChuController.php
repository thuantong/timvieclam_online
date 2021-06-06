<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\CongTy;
use App\Models\DuyetBai;
use App\Models\NguoiTimViec;
use App\Models\NhaTuyenDung;
use App\Models\QuanTriVien;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminTrangChuController extends Controller
{
    private $quanTriVien;

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            $this->quanTriVien = TaiKhoan::query()->find(Auth::user()->id)->getQuanTriVien;
            return $next($request);
        });

//        if (Session::get('loai_tai_khoan') !== 'admin3'){
//            abort(404);
//        }
    }

    public function index()
    {
        if (Session::get('loai_tai_khoan') != 3) {
            return redirect('/');
        }

        $tongSoTK = TaiKhoan::query()->count();
        $tongSoNhaTuyenDung = ((float)NhaTuyenDung::query()->count() / (float)$tongSoTK) * 100;
        $tongSoNguoiTimViec = ((float)NguoiTimViec::query()->count() / (float)$tongSoTK) * 100;
        $tongSoQuanTriVien = ((float)QuanTriVien::query()->count() / (float)$tongSoTK) * 100;
        $newData[0] = array(
            'value' => $tongSoNhaTuyenDung, 'label' => 'Nhà tuyển dụng'
        );
        $newData[1] = array(
            'value' => $tongSoNguoiTimViec, 'label' => 'Người tìm việc'
        );
        $newData[2] = array(
            'value' => $tongSoQuanTriVien, 'label' => 'Quản trị viên'
        );

        $data = json_encode($newData, true);
//        dd(date('m')->subMonths(2));

        $thangNay = BaiTuyenDung::query()->whereMonth('created_at', '=', Carbon::now()->subMonths(0)->month)->count();
        $thangNay_tru_1 = BaiTuyenDung::query()->whereMonth('created_at', '=', Carbon::now()->subMonths(1)->month)->count();
        $thangNay_tru_2 = BaiTuyenDung::query()->whereMonth('created_at', '=', Carbon::now()->subMonths(2)->month)->count();
        $thangNay_tru_3 = BaiTuyenDung::query()->whereMonth('created_at', '=', Carbon::now()->subMonths(3)->month)->count();
        $thangNay_tru_4 = BaiTuyenDung::query()->whereMonth('created_at', '=', Carbon::now()->subMonths(4)->month)->count();
        $thangNay_tru_5 = BaiTuyenDung::query()->whereMonth('created_at', '=', Carbon::now()->subMonths(5)->month)->count();
//        dd(Carbon::now()->subMonths(5)->format('m-Y'));
        if($thangNay>0){
            $index = 0;
            if ($thangNay_tru_5 > 0) {
                $chartBTD[$index] = array(
                    'x' => 'Tháng ' . Carbon::now()->subMonths(5)->format('m-Y'),
                    'y' => $thangNay_tru_5
                );
                $index++;
            }
            if ($thangNay_tru_4 > 0) {
                $chartBTD[$index] = array(
                    'x' => 'Tháng ' . Carbon::now()->subMonths(4)->format('m-Y'),
                    'y' => $thangNay_tru_4
                );
                $index++;
            }
            if ($thangNay_tru_3 > 0) {
                $chartBTD[$index] = array(
                    'x' => 'Tháng ' . Carbon::now()->subMonths(3)->format('m-Y'),
                    'y' => $thangNay_tru_3
                );
                $index++;
            }
            if ($thangNay_tru_2 > 0) {
                $chartBTD[$index] = array(
                    'x' => 'Tháng ' . Carbon::now()->subMonths(2)->format('m-Y'),
                    'y' => $thangNay_tru_2
                );
                $index++;
            }
            if ($thangNay_tru_1 > 0) {
                $chartBTD[$index] = array(
                    'x' => 'Tháng ' . Carbon::now()->subMonths(1)->format('m-Y'),
                    'y' => $thangNay_tru_1
                );
                $index++;
            }
            if ($thangNay > 0) {
                $chartBTD[$index] = array(
                    'x' => 'Tháng ' . Carbon::now()->subMonths(0)->format('m-Y'),
                    'y' => $thangNay
                );
            }
        }else{
            $chartBTD = [];
        }
        

// dd($chartBTD);
        $dataBTD = json_encode($chartBTD, true);
//        dd(json_decode($dataBTD, true));
//        dd($thangNay);
//                dd(Session::get('loai_tai_khoan'));
//        $baiDuyet = json_decode(CongTy::with('getNhaTuyenDung','getNganhNghe')->get());
//        $data = $baiDuyet['created_at'];
//        dd(json_decode($data));
//        dd($baiDuyet);
//        dd($baiDuyet[0]->get_nha_tuyen_dung->id);
//        dd($baiDuyet[0]->get_duyet_tin);
//        dd($baiDuyet[4]['get_nha_tuyen_dung']['id']);
//        dd(json_decode(BaiTuyenDung::with('getDuyetTin','getNhaTuyenDung')->where('status','=',0)->get()));

//        dd(Carbon::parse($data['duyet_tin'][0]['created_at'])->diffForHumans(null,null,true,2));
        return view('Admin.TrangChu.index', compact('data', 'dataBTD'));
    }

    public
    function getThongbao()
    {
//        $baiDuyet = BaiTuyenDung::with('getDuyetTin', 'getNhaTuyenDung')->get()->toArray();
//        $tinChuaDoc = DuyetBai::all()->where('status', 0)->count();
//        Carbon::setLocale('vi');
//        if ($baiDuyet != null) {
//            for ($i = 0; $i < count($baiDuyet); $i++) {
//                $baiDuyet[$i]['created_at'] = Carbon::parse($baiDuyet[$i]['created_at'])->diffForHumans(null, null, true, 2);
//                $baiDuyet[$i]['get_nha_tuyen_dung']['tai_khoan'] = NhaTuyenDung::query()->find($baiDuyet[$i]['get_nha_tuyen_dung']['id'])->getTaiKhoan->toArray();
//                $baiDuyet[$i]['trang_thai_xem_tin'] = DuyetBai::query()->where('bai_dang_id', $baiDuyet[$i]['id'])->first('status');
//            }
//
//            $data['duyet_tin'] = $baiDuyet;
//            $data['tin_chua_doc'] = $tinChuaDoc;
//        }

        return [];
    }

    public
    function chuyenTrangThaiDaXem(Request $request)
    {
        try {
            $baiViet = DuyetBai::query()->where('bai_dang_id', $request->id)->first();
//        return $baiViet;
            $baiViet->status = 1;
            $baiViet->save();

//        $data['tin_chua_doc'] = DuyetBai::all()->where('status',0)->count();
            return 200;
        } catch (\Exception $e) {
            return 400;
        }

    }
//
}
