<?php

namespace App\Http\Controllers\TheCao;

use App\Http\Controllers\Controller;
use App\Models\LoaiThe;
use App\Models\NapThe;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TheCaoController extends Controller
{
    public function __construct()
    {
//        $this->middleware(function ($request, $next){
//            if (Session::get('loai_tai_khoan') == 3){
//                abort(401);
//            }
//            return $next($request);
//        });
        $this->middleware(['auth','admin','email.confirm']);
    }

    public function index()
    {
        $data['loai_the'] = LoaiThe::all();
//        dd(count($data['loai_the']));
//        $data['nap_the'] = NapThe::all();
        return view('TheCao.index',compact('data'));
    }

    public function getDanhSach()
    {
        $data['data'] = NapThe::with('getLoaiThe')->where('status','!=',1)->get();

        return $data;
    }

    public function setDanhSach(Request $request)
    {
        try {
            $idOfLoaiThe = $request->id;
            $loaiThe = LoaiThe::query()->find($idOfLoaiThe);
            $napThe = new NapThe();
            $napThe->code = Str::random(12);
            $loaiThe->getNapThe()->save($napThe);
            return $this->getResponse('Nạp thẻ',200,'Nạp thẻ '.$loaiThe->name.' thành công');
        }catch (\Exception $e){
            return $this->getResponse('Nạp thẻ',400,'Nạp thẻ thất bại!');
        }

    }
//    public function

}
