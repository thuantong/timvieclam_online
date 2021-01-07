<?php

namespace App\Traits;

use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\DiaDiem;
use App\Models\KieuLamViec;
use App\Models\KinhNghiem;
use App\Models\NganhNghe;
use App\Models\NhaTuyenDung;
use App\Models\QuyMoNhanSu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

trait NhaTuyenDungTrait
{

    public function getEmployer()
    {
            $nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;

            $data['nha_tuyen_dung'] = $nhaTuyenDung->toArray();
            $data['kinh_nghiem'] = KinhNghiem::query()->orderBy('id', 'asc')->get();
            $data['nganh_nghe'] = NganhNghe::query()->orderBy('name', 'asc')->get();
            $data['cong_ty'] = $nhaTuyenDung->getCongTy()->first(['id', 'name', 'logo']);
            $data['chuc_vu'] = ChucVu::query()->orderBy('name', 'asc')->get();
            $data['dia_diem'] = DiaDiem::query()->orderBy('name', 'asc')->get();
            $data['kieu_lam_viec'] = KieuLamViec::query()->orderBy('name', 'asc')->get();
            $data['bang_cap'] = BangCap::query()->orderBy('name', 'asc')->get();
            $data['quy_mo_nhan_su'] = QuyMoNhanSu::query()->orderBy('id', 'asc')->get();
            return view('User.nhaTuyenDung',compact('data'));
    }

    public function setLogoCongTy(Request $request)
    {
        $nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;

        $res = $request->fileName;

        $image_array_1 = explode(";", $res);
        $image_array_2 = explode(",", $image_array_1[1]);

        $image = base64_decode($image_array_2[1]);

        $imageName = $request->name. $nhaTuyenDung->id;
        $path = public_path('images/' . $imageName);
        file_put_contents($path, $image);
//        $nhaTuyenDung->avatar = 'images/' . $imageName;
//        $nhaTuyenDung->save();
        return $this->getResponse('Cập nhật',200,'Cắt ảnh thành công!','images/' . $imageName);
//        return response();
    }

    public function confirmEmailNhaTuyenDung(Request $request)
    {

        $emailNhaTuyenDung = $request->email_nha_tuyen_dung;
        $timEmail = TaiKhoan::query()->where('email', $emailNhaTuyenDung)->exists();

        if (strtolower($emailNhaTuyenDung) == strtolower(Auth::user()->email)) {
            return $this->getResponse('Email', 200, 'ok!');
        }
        if($timEmail == 1){
            return $this->getResponse('Email', 400, 'Email đã tồn tại!');
        }

    }

    public function updateNhaTuyenDung(Request $request){
        $title = 'Cập nhật';
        try {
            $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
            $taiKhoan->ho_ten = $request->ho_ten_nhatuyendung;
            $taiKhoan->email = $request->email_nhatuyendung;
            $taiKhoan->phone = $request->phone_nhatuyendung;
//            $taiKhoan->avatar = $request->avatar_nhatuyendung;

            $nhaTuyenDung = $taiKhoan->getNhaTuyenDung;
//            $nhaTuyenDung->ho_ten = $request->ho_ten_nhatuyendung;
            $nhaTuyenDung->gioi_tinh = $request->gioi_tinh_nhatuyendung;
            $nhaTuyenDung->gioi_thieu = $request->gioi_thieu_nhatuyendung;
            $nhaTuyenDung->dia_chi = $request->dia_chi_nhatuyendung;
//            $nhaTuyenDung->avatar = $request->avatar_nhatuyendung;
            $nhaTuyenDung->mang_xa_hoi = serialize($request->social_nhatuyendung);
//            return $nhaTuyenDung;
            $taiKhoan->save();
            $nhaTuyenDung->save();
//            Session::put('avatar',$taiKhoan->avatar);
//            Session::put('ho_ten',$nhaTuyenDung->ho_ten);
            $message = 'Cập nhật thông tin cá nhân thành công';
            return $this->getResponse($title,200,$message,$nhaTuyenDung);
        }catch (\Exception $e){
            $message = 'Cập nhật thông tin cá nhân thất bại! Kiểm tra lại dữ liệu!';
            return $this->getResponse($title,400,$e->getMessage(),0);
        }

    }

    //tìm kieếm ứng viên
    public function timUngVien(){

    }

}
