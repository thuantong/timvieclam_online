<?php

namespace App\Http\Controllers\PhanQuyen;

use App\Http\Controllers\Controller;
use App\Models\PhanQuyen;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PhanQuyenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','email.confirm','admin']);
    }
    public function index(){
//       $taiKhoan = TaiKhoan::query()->find(Auth::user()->id)->phan_quyens()->attach([1,2,3]);
//       $taiKhoan = TaiKhoan::query()->find(Auth::user()->id)->phan_quyens()->attach([1,2,3]);
//       $taiKhoan = TaiKhoan::with('phan_quyens')->get();
//      dd(json_decode($taiKhoan));
//        User::with('roles')->get();
//       $taiKhoan = PhanQuyen::query()->tai_khoans()->pluck('role_id')
//       dd(Session::get('role'));
////        first xoa quyen
//        $taiKhoan->phan_quyens()->detach();
//        $role = [1,2,3];
//        $taiKhoan->phan_quyens()->attach($role);
//dd($taiKhoan);
//       $taiKhoanTim = TaiKhoan::query()->find(2)->phan_quyens()->get();
        $taiKhoan = TaiKhoan::all();
//        dd($taiKhoan);
        return view('Admin.PhanQuyen.index',compact('taiKhoan'));
    }
    public function setPhanQuyen(Request $request){
        $id = $request->id;
        $roles = $request->roles;
        $taiKhoan = TaiKhoan::query()->find($id);
        $taiKhoan->phan_quyens()->detach();
        $taiKhoan->phan_quyens()->attach($roles);
        return 200;
    }
    //
}
