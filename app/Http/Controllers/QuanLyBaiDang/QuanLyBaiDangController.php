<?php

namespace App\Http\Controllers\QuanLyBaiDang;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\DiaDiem;
use App\Models\KieuLamViec;
use App\Models\KinhNghiem;
use App\Models\NganhNghe;
use App\Models\QuyMoNhanSu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class QuanLyBaiDangController extends Controller
{
    private $nhaTuyenDung;
    public function __construct()
    {
        $this->middleware(['auth','email.confirm','nha_tuyen_dung']);
        $this->middleware(function ($request, $next) {
            $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;
            return $next($request);
        });
    }

    public function index(){
//        $btd = BaiTuyenDung::query()->whereDate(['han_tuyen','>=',Carbon::now()->format('d/m/Y'));
//
//        dd($btd->get()->toArray());
//        dd(Carbon::createFromFormat('d/m/Y','23/12/2020'));
        $data['kinh_nghiem'] = KinhNghiem::query()->orderBy('id', 'asc')->get();
        $data['nganh_nghe'] = NganhNghe::query()->orderBy('name', 'asc')->get();
        $data['cong_ty'] = $this->nhaTuyenDung->getCongTy()->orderBy('created_at', 'desc')->first()->toArray();
        $data['chuc_vu'] = ChucVu::query()->orderBy('name', 'asc')->get();
        $data['dia_diem'] = DiaDiem::query()->orderBy('name', 'asc')->get();
        $data['kieu_lam_viec'] = KieuLamViec::query()->orderBy('name', 'asc')->get();
        $data['bang_cap'] = BangCap::query()->orderBy('name', 'asc')->get();
        $data['quy_mo_nhan_su'] = QuyMoNhanSu::query()->orderBy('id', 'asc')->get();
//        dd($data);
        return view('QuanLyTuyenDung.QLBaiDang.index',compact('data'));
    }
    public function getDanhSach(Request $request){
//        $data['data'] = BaiTuyenDung::with(['getChucVu','getKieuLamViec','getNhaTuyenDung','getCongTy','getDiaDiem','getBangCap','getNganhNghe',
//
//            'getDuyetTin'=>function($q){
//            $q->select('id','noi_dung','bai_dang_id');
//            }
//        ])->get()->toArray();

        $query = BaiTuyenDung::with([
            'getNhaTuyenDung' => function ($subquery) {
                $subquery->select('id', 'tai_khoan_id')->with(
                    [
                        'getTaiKhoan' => function ($q) {
                            $q->select('id', 'ho_ten')->where('id',Auth::user()->id);
                        }
                    ]
                );
            },
            'getChucVu',
            'getDonHang' => function ($subquery) {
                $subquery->select('id', 'so_luong as so_ngay_bai_dang', 'bai_tuyen_dung_id');
            },
            'getDiaDiem' => function ($subquery) use ($request) {
                if ($request->exists('dia_diem') && $request->get('dia_diem') != "") {
                    $subquery->select('id', 'name')->where('id', $request->get('dia_diem'));
                } else {
                    $subquery;
                }

            },
            'getCongTy' => function ($subquery) {
                $subquery->select('id', 'name', 'logo');
            },
            'getNganhNghe' =>function($q) use ($request){
                if ($request->exists('nganh_nghe') && $request->get('nganh_nghe') != "") {
                    $q->where('nganh_nghe_id',$request->get('nganh_nghe'));
                }else{
                    $q;
                }

            },
            'getDuyetTin'=>function($q){
            $q->select('id','noi_dung','bai_dang_id');
            }

        ]);

        if ($request->exists('tieu_de') && $request->get('tieu_de') != "") {
            $query->where('tieu_de', 'like', '%' . $request->get('tieu_de') . '%');
        }
        if ($request->exists('chuc_vu') && $request->get('chuc_vu') != "") {
            $query->where('chuc_vu_id',$request->get('chuc_vu'));
        }
        if ($request->exists('muc_luong') && $request->get('muc_luong') != "") {
            switch ($request->get('muc_luong')){
                case 1:
                    $muc_luong_id = 2;
                    break;
                case 2:
                    $muc_luong_id = 5;
                    break;
                case 3:
                    $muc_luong_id = 10;
                    break;
                case 4:
                    $muc_luong_id = 20;
                    break;
            }
            $query->where('luong_from','<=',$muc_luong_id);
        }
        if ($request->exists('kieu_lam_viec') && $request->get('kieu_lam_viec') != "") {
            $query->where('kieu_lam_viec_id',$request->get('kieu_lam_viec'));
        }
        if ($request->exists('kinh_nghiem') && $request->get('kinh_nghiem') != "") {
            $query->where('kinh_nghiem_id',$request->get('kinh_nghiem'));
        }
        if ($request->exists('bai_hot') && $request->get('bai_hot') != "") {
            $query->where('isHot',$request->get('bai_hot'));
        }
        if ($request->exists('ngay_dang') && $request->get('ngay_dang') != "") {
            $query->where('created_at','>=',Carbon::createFromFormat("d/m/Y",$request->get('ngay_dang'))->toDateString());
        }
        if ($request->exists('bai_viet') && $request->get('bai_viet') != "") {
            $query->where('status',$request->get('bai_viet'));
        }else if($request->exists('bai_viet') && $request->get('bai_viet') == "") {
            $query;
        }else{
            $trangThaiDangChoDuyet = 0;
            $query->where('status',$trangThaiDangChoDuyet);
//            $query;
        }
        // dd($query->get()->toArray());
        $dataNew = $query->distinct('id');

        // $dataNew = $dataNew->orderBy('status', 'asc')->orderBy('han_tuyen', 'desc')->get()->toArray();
        $dataNew = $dataNew->get()->toArray();
//            dd($dataNew);
        $colect = collect($dataNew);
        if ($request->exists('dia_diem') && $request->get('dia_diem') != "") {
            $colect = $colect->whereNotNull('get_dia_diem');
        }
        if ($request->exists('nganh_nghe') && $request->get('nganh_nghe') != "") {
            $colect = $colect->where('get_nganh_nghe','!=',array());
        }
        $colect = $colect->whereNotNull('get_nha_tuyen_dung.get_tai_khoan');
        $data['data'] = $colect->values()->toArray();

//        $data = $this->nhaTuyenDung->with('getBaiViet')->get();
        $index = 0;
//        dd(json_decode($data));
//        foreach ($data['get_bai_viet'] as $row){
//            $layThem[$index] = $row->with('getCongTy')->get();
//        }
//        dd($data);
        return $data;
    }
}
