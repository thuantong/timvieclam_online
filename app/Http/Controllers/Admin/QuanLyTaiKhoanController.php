<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhanQuyen;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuanLyTaiKhoanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $data['phan_quyen'] = PhanQuyen::all()->toArray();

        return view('Admin.QuanLyTaiKhoan.index', compact('data'));
    }

    public function getDanhSachTaiKhoan()
    {
        $data['data'] = TaiKhoan::query()->with([
            'getPhanQuyen'=>function($q){
                $q->orderBy('id','desc');
            }
        ])->get()->toArray();
        return $data;
        dd($data);
    }

    public function getTacVu(Request $request)
    {
        $dataAjax = $request->toArray();
        $id = $dataAjax['data']['id'];
        $data['tai_khoan_phan_quyen'] = TaiKhoan::query()->find($id)->getPhanQuyenId()->toArray();
        $data['phan_quyen'] = PhanQuyen::all()->toArray();
        $data['id'] = $id;
        return view('Admin.QuanLyTaiKhoan.viewPhanQuyen', compact('data'));
    }

    public function khoaTaiKhoan(Request $request)
    {
        $title = "Khóa tài khoản";

        try {
            $id = $request->id;
            $name = $request->name;
            $statusTamKhoa = 2;
            $taiKhoan = TaiKhoan::query()->find($id);
            $taiKhoan->status = $statusTamKhoa;
            $taiKhoan->save();
            return $this->getResponse($title, 200, "Khóa tài khoản " . $name . " thành công!");
        } catch (\Exception $exception) {
            return $this->getResponse($title, 400, "Khóa tài khoản thất bại!");
        }

    }
    public function moKhoaTaiKhoan(Request $request)
    {
        $title = "Mở khóa tài khoản";

        try {
            $id = $request->id;
            $name = $request->name;
            $statusMoKhoa = 0;
            $taiKhoan = TaiKhoan::query()->find($id);
            $taiKhoan->status = $statusMoKhoa;
            $taiKhoan->save();
            return $this->getResponse($title, 200, "Mở khóa tài khoản " . $name . " thành công!");
        } catch (\Exception $exception) {
            return $this->getResponse($title, 400, "Mở khóa tài khoản thất bại!");
        }

    }
    public function setTacVuPhanQuyen(Request $request){
        $title = "Phân quyền tài khoản";

        try {
            $id = $request->idQuyen;
            $idTK = $request->idTK;
            $findUser = TaiKhoan::query()->find($idTK);
            //lấy quyền người tìm việc == 1
            $findUser->getPhanQuyen()->detach();
            $findUser->getPhanQuyen()->attach($id);

            return $this->getResponse($title, 200, "Phân quyền tài khoản thành công!");
        } catch (\Exception $exception) {
            return $this->getResponse($title, 400, "Phân quyền tài khoản thất bại!");
        }
    }
}
