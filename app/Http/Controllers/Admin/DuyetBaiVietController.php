<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\DonHang;
use App\Models\DuyetBai;
use App\Models\NhaTuyenDung;
use App\Models\QuanTriVien;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Spatie\ResponseCache\Facades\ResponseCache;
class DuyetBaiVietController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);

    }
    public function index(){
        if (Session::get('loai_tai_khoan') != 3){
            abort(404);
        }
//        dd(QuanTriVien::query()->where('tai_khoan_id',1)->get());
//        dd(Carbon::now($this->tzHoChiMinh())->toDateTimeString());

//        dd(date('H:i'));
        return view('Admin.DuyetTin.index');
    }

    public function getDanhSachDuyetTin(){
//        $allBaiDuyet = DuyetBai::with('getBaiTuyenDung')->orderBy('created_at','desc')->get()->toArray();
//        $allBaiDuyet = BaiTuyenDung::query()->select(['bai_tuyen_dung.tieu_de','tai_khoan.ho_ten','bai_tuyen_dung.created_at','bai_tuyen_dung.created_at'])
        $allBaiDuyet = BaiTuyenDung::query()->select(['bai_tuyen_dung.*','tai_khoan.ho_ten','don_hang.so_luong as so_ngay_bai_dang'])
            ->leftJoin('duyet_bai','bai_tuyen_dung.id','=','duyet_bai.bai_dang_id')
            ->leftJoin('nha_tuyen_dung','bai_tuyen_dung.nha_tuyen_dung_id','=','nha_tuyen_dung.id')
            ->leftJoin('tai_khoan','tai_khoan.id','=','nha_tuyen_dung.tai_khoan_id')
            ->leftJoin('don_hang','bai_tuyen_dung.id','=','don_hang.bai_tuyen_dung_id')
            ->where('bai_tuyen_dung.status',0)
//            ->orderBy('bai_tuyen_dung.status','desc')
            ->orderBy('bai_tuyen_dung.created_at','desc')
//            ->order
            ->get()->toArray();
//        return $allBaiDuyet;

//        for($i = 0;$i<count($allBaiDuyet);$i++){
//            $allBaiDuyet[$i]['created_at'] = Carbon::parse($allBaiDuyet[$i]['created_at'])->setTimezone('Asia/Ho_Chi_Minh')->format('H:i , d/m/Y');
//        }
        $data['data'] = $allBaiDuyet;
        return $data;
    }

    public function getBaiTuyenDung(Request $request){
        $id = $request->get('id');
        $data = BaiTuyenDung::query()->with('getNhaTuyenDung','getNganhNghe','getCongTy','getChucVu','getKieuLamViec','getDiaDiem','getBangCap','getKinhNghiem')->find($id)->toArray();
        $data['get_nha_tuyen_dung']['ho_ten'] = NhaTuyenDung::query()->find($data['get_nha_tuyen_dung']['id'])->getTaiKhoan['ho_ten'];
//        $data['luong'] = unserialize($data['luong']);

        return $data;
    }

    public function confirmBaiTuyenDung(Request $request){
        $title = "Thông báo";
        $id = $request->id;
        $baiTuyenDung = BaiTuyenDung::query()->find($id);
        try {
            $donHang = DonHang::query()->where('bai_tuyen_dung_id',$baiTuyenDung->id)->first();
            $baiTuyenDung->status = 1;//accept
            $baiTuyenDung->han_bai_viet = Carbon::now($this->tzHoChiMinh())->addDays($donHang->so_luong)->toDateTimeString();
                $baiTuyenDung->save();
                // ResponseCache::clear();
            return $this->getResponse($title,200,'Phê duyệt bài viết '.$baiTuyenDung->tieu_de.' Thành công!');
        }catch (\Exception $e){
            return $this->getResponse($title,400,'Phê duyệt bài viết '.$baiTuyenDung->tieu_de.' Thất bại!');
        }
    }
    //từ chối
    public function rejectBaiTuyenDung(Request $request){
        $title = "Thông báo";
        $id = $request->id;//id btd
        $baiTuyenDung = BaiTuyenDung::query()->find($id);
//        return $baiTuyenDung;
        $baiDuyet = DuyetBai::query()->where('bai_dang_id',$id)->first();
//        return $baiDuyet;
        try {
            $baiTuyenDung->status = 2;
            $baiDuyet->status = 3;//từ chối
            $baiDuyet->noi_dung = $request->noi_dung;

            $quanTriVien = QuanTriVien::query()->where('tai_khoan_id',Auth::user()->id)->first();
            $baiDuyet->quan_tri_vien_id = $quanTriVien->id;
            $baiDuyet->save();
//            $baiTuyenDung->noi_dung =
//            $baiTuyenDung->han_bai_viet = Carbon::now($this->tzHoChiMinh())->toDateTimeString();
             $baiTuyenDung->save();
            return $this->getResponse($title,200,'Phê duyệt bài viết '.$baiTuyenDung->tieu_de.' Thành công!');
        }catch (\Exception $e){
//            return $e->getMessage();
            return $this->getResponse($title,400,$e->getMessage());
            return $this->getResponse($title,400,'Phê duyệt bài viết '.$baiTuyenDung->tieu_de.' Thất bại!');
        }
    }


}
