<?php

namespace App\Http\Controllers\SoDu;

use App\Http\Controllers\Controller;
use App\Models\LoaiThe;
use App\Models\NapThe;
use App\Models\NhaTuyenDung;
use App\Models\PhanQuyen;
use App\Models\SoDu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SoDuController extends Controller
{
    private $taiKhoan;
    private $loaiTaiKhoan;
    public function __construct()
    {
        $this->middleware(['auth','email.confirm']);
        $this->middleware(function ($request, $next){
            $this->taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
            $this->loaiTaiKhoan = $this->taiKhoan->getPhanQuyen->first();
            return $next($request);
        });
    }

    public function index(){
//        dd($this->taiKhoan->getNhaTuyenDung->getSoDu);
//        dd($this->loaiTaiKhoan);
        switch ($this->loaiTaiKhoan['id']) {
            case 1:
                $data['data'] = $this->taiKhoan->getNguoiTimViec->getSoDu;

                break;
            case 2:
                $data['data'] = $this->taiKhoan->getNhaTuyenDung->getSoDu;
                break;
        }
        return view('SoDu.index',compact('data'));
    }
    public function dangKy(){
        $title = 'Đăng ký';
        try {
            $soDu = new SoDu();
            $soDu->ten_tai_khoan = Str::random(12);

            switch ($this->loaiTaiKhoan['id']) {
                case 1:
                    if ($this->taiKhoan->getNguoiTimViec->getSoDu == null) {
                        $soDuNew = $this->taiKhoan->getNguoiTimViec->getSoDu()->save($soDu);
                        Session::put('so_du', $soDuNew['tong_tien']);
                    }

                    break;
                case 2:
                    if ($this->taiKhoan->getNhaTuyenDung->getSoDu == null) {
                        $soDuNew = $this->taiKhoan->getNhaTuyenDung->getSoDu()->save($soDu);
                        Session::put('so_du', $soDuNew['tong_tien']);
                    }
                    break;
            }

            return $this->getResponse($title,200,'Đăng ký tài khoản thành công!');
        }catch (\Exception $e){
            return $this->getResponse($title,400,$e->getMessage());
        }catch (InvalidArgumentException $e) {
            return $this->getResponse($title,400,$e->getMessage());
        }catch (QueryException  $e) {
            return $this->getResponse($title,400,$e->getMessage());
        }
    }

    public function napThe(Request $request){
        try {
            $theCao = NapThe::all()->where('code',$request->code)->first();
            $loaiThe = NapThe::query()->find($theCao['id'])->getLoaiThe;
//        return $loaiThe;
            if ($theCao == null){
                return $this->getResponse('Nạp tiền thất bại',400,"Thẻ cào không tồn tại!");
            }else{
                if ($theCao['status'] != 0){
                    return $this->getResponse('Nạp tiền thất bại',400,"Thẻ cào đã được sử dụng!");
                }elseif($theCao['status'] == 0){

                    switch ($this->loaiTaiKhoan['id']) {
                        case 1:
                            //tìm số dư
                            $soDu = $this->taiKhoan->getNguoiTimViec->getSoDu;
                            $tongTien = $soDu['tong_tien'];
                            $soDu->tong_tien = $loaiThe->value + $tongTien;
                            $soDu->save();
                            //cập nhật lại trạng thái của thẻ cào
                            $theCao->status = 1;
                            $theCao->save();
                            //cập nhật lại số dư
                            Session::put('so_du', $soDu['tong_tien']);
                            break;
                        case 2:
                            //tìm số dư
                            $soDu = $this->taiKhoan->getNhaTuyenDung->getSoDu;
                            $tongTien = $soDu['tong_tien'];
                            $soDu->tong_tien = $loaiThe->value + $tongTien;
                            $soDu->save();
                            //cập nhật lại trạng thái của thẻ cào
                            $theCao->status = 1;
                            $theCao->save();
                            //cập nhật lại số dư
                            Session::put('so_du', $soDu['tong_tien']);

                            break;
                    }
                    return $this->getResponse('Nạp tiền thành công',200,"Bạn vừa nạp".$loaiThe['name']."!");

                }
            }
        }catch (\Exception $e){
            return $this->getResponse('Nạp tiền thành công',400,$e->getMessage());

        }

//        return $theCao == null;

    }
    //
}
