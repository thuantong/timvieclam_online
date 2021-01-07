<?php

namespace App\Http\Controllers\NguoiTimViec;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\HangMucThanhToan;
use App\Models\LuuBai;
use App\Models\NguoiTimViec;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LuuBaiController extends Controller
{
    private $nguoiTimViec;
    public function __construct()
    {
        $this->middleware(['auth','email.confirm','nguoi_tim_viec']);
        $this->middleware(function ($request, $next) {
            $this->nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec;
            return $next($request);
        });
    }
    public function index(){
        return view('User.nguoiTimViec.danhSachBaiLuu');
    }
    public function getDanhSachBaiLuu(){
        $query = BaiTuyenDung::query()
            ->select(['bai_tuyen_dung.*','tai_khoan.ho_ten as nha_tuyen_dung_name','cong_ty.name as cong_ty_name'])
            ->leftJoin('luu_bai','bai_tuyen_dung.id','=','luu_bai.bai_tuyen_dung_id')
            ->leftJoin('nha_tuyen_dung','nha_tuyen_dung.id','=','bai_tuyen_dung.nha_tuyen_dung_id')
            ->leftJoin('tai_khoan','tai_khoan.id','=','nha_tuyen_dung.tai_khoan_id')
            ->leftJoin('cong_ty','cong_ty.id','=','bai_tuyen_dung.cong_ty_id')
            ->where('luu_bai.nguoi_tim_viec_id',$this->nguoiTimViec['id'])
            ->get()->toArray();
        $data['data'] = $query;
        return $data;
        dd($query);
    }
    //
}
