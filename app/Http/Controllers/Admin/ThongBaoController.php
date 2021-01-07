<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThongBaoController extends Controller
{
    public function getThongBao(Request $request){
        $data = ThongBao::query()->where('tai_khoan_to_id',Auth::user()->id)->get()->take(15);
        for ($i = 0; $i < count($data);$i++){
            $taiKhoan = TaiKhoan::query()->find($data[$i]['tai_khoan_from_id']);
            $data[$i]['get_nguoi_gui'] = $taiKhoan;
            $data[$i]['get_nguoi_gui']['ho_ten']=ucwords($data[$i]['get_nguoi_gui']['ho_ten']);
//            $data[$i]['get_nguoi_gui']['ho_ten'] = $taiKhoan['ho_ten'];
        }
//        foreach ($data as $row){
//
//        }
        return $data->toArray();
    }
    public function capNhatTinRong(){
        $data =ThongBao::query()->where('status',0)->update(array('status'=>1));
        return true;
    }
}
