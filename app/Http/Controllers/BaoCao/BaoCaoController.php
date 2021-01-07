<?php

namespace App\Http\Controllers\BaoCao;

use App\Http\Controllers\Controller;
use App\Models\BaoCao;
use App\Models\NhaTuyenDung;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaoCaoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','email.confirm']);
    }

    public function setBaoCao(Request $request){
        $title = 'Báo Cáo Nhà Tuyển Dụng';
        try {
            $idNTD = $request->id;
            $nhaTuyenDung = NhaTuyenDung::query()->find($idNTD)->getTaiKhoan;
            $idNTV = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec;

            $noi_dung = $request->noi_dung;
            $baoCao = new BaoCao();
            $baoCao->nha_tuyen_dung_id = $idNTD;
            $baoCao->nguoi_tim_viec_id = $idNTV['id'];
            $baoCao->mo_ta = $noi_dung;
            $baoCao->save();
            return $this->getResponse($title,200,'Bạn vừa báo cáo nhà tuyển dụng: '.$nhaTuyenDung['ho_ten']);
        }catch (\Exception $exception){
            return $this->getResponse($title,400,'Báo cáo thất bại');
        }

//        $data['nh'] =
//        return
    }
}
