<?php

namespace App\Http\Controllers\QuanTam;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\NguoiTimViec;
use App\Models\NhaTuyenDung;
use App\Models\QuanTam;
use App\Models\Thich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanTamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function setQuanTam(Request $request){
        try {
            $idNhaTuyenDung = $request->id;
//            dd($idPost);
            $status = intval($request->quan_tam);
            $nguoiTimViecQuanTam = NguoiTimViec::query()->where('tai_khoan_id',Auth::user()->id)->get();
            $nhaTuyenDung = NhaTuyenDung::query()->find($idNhaTuyenDung);
            switch ($status){
                case 0:
                    $nhaTuyenDung->getNguoiTimViecQuanTam()->detach($nguoiTimViecQuanTam);
                    break;
                case 1:
                    $nhaTuyenDung->getNguoiTimViecQuanTam()->attach($nguoiTimViecQuanTam);
                    break;
            }
            $data['total_quan_tam'] = QuanTam::query()->where('nha_tuyen_dung_id',$idNhaTuyenDung)->count();
//dd($nguoiLike);
            return $data;
//            $baiTuyenDung = BaiTuyenDung::query()->find($id);
//            $baiTuyenDung->
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    //
}
