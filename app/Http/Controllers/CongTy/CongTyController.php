<?php

namespace App\Http\Controllers\CongTy;

use App\Http\Controllers\Controller;
use App\Models\CongTy;
use App\Models\DiaDiem;
use App\Models\NganhNghe;
use App\Models\NhaTuyenDung;
use App\Models\QuyMoNhanSu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Traits\UploadImage;
class CongTyController extends Controller
{
    use UploadImage;
    private $nhaTuyenDung;

    public function __construct()
    {

        $this->middleware(['auth','email.confirm','nha_tuyen_dung']);
        $this->middleware(function ($request, $next) {
//            abort(404);
        // $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;

        return $next($request);
    });

//        function getNhaTuyenDung()
//        {
//            $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;
//        }

//        $nhaTuyenDung = ;
//        dd($nhaTuyenDung);
    }
    public function getData(){
        
        $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
        $data =$taiKhoan->getNhaTuyenDung->toArray();
        $data['nganh_nghe_ids'] = $taiKhoan->getNhaTuyenDung->getNganhNgheId()->toArray();
      
        // if($checkCongty != null){
        //     $data['data'] = $checkCongty->getCongTy()->first();
        //     if ($data['data'] != null){
        //         $getNganhNghe = $data['data']->getNganhNgheId()->toArray();
        //         $data['data'] = $data['data']->toArray();
        //         $data['data']['nganh_nghe_ids'] = $getNganhNghe;
        //         $data['data']['dia_chi_chi_nhanh'] = unserialize($data['data']['dia_chi_chi_nhanh']);
        //         $data['data']['gio_lam_viec'] = unserialize($data['data']['gio_lam_viec']);
        //         $data['data']['ngay_lam_viec'] = unserialize($data['data']['ngay_lam_viec']);
        //     }
    
        // }else{
        //      $data['data'] = array();
        // }
    
        
        return $data;
    }
    public function index()
    {

        $data = $this->getData();
        // dd($data);
        // dd(TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung->toArray());
        return view('CongTy.index', compact('data'));
    }

    public function getDanhSach()
    {
//        $nhaTuyenDung = ;
//        ->getCongTy()->orderBy('created_at','desc')->get()
//        $congTy =   CongTy::with('getNhaTuyenDung')->groupBy('id');
//        $congTy =   CongTy::with('getNhaTuyenDung')->groupBy('getNhaTuyenDung.id')->get();
//        $data['data'] = collect($congTy)->toArray()->groupBy('id');
//        $sortDirection = 'desc';
        $getCongTy['data'] = $this->nhaTuyenDung;
//        $data = $getCongTy[0];
//        $data['data'] = NhaTuyenDung::with('getCongTy')->get();
//        for ($i= 0;$i<1000;$i++){
//            $data['data'][$i] = array(
//                'id'=> $i+1,
//                'name' => 'Công ty TNHH MTV Phương Dâm'.$i,
//                'email' => 'phuongdam@gmail.com'.$i,
//                'phone' => '0121111111'.$i,
//                'website' => 'websites.com'.$i,
//                'chucnang' => 'chức năng'.$i,
//            );
//        }
//        $res['data'] = $data;
        return $getCongTy['data'] != null ? $getCongTy : $getCongTy = [];

    }

    public function setDanhSach(Request $request)
    {

        $title = 'Cập nhật';
        try {
            if ($request->id == null){
                $congTyNew = new NhaTuyenDung();
            }else{
                $congTyNew = NhaTuyenDung::query()->find($request->id);
            }
            $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
            // $taiKhoan->avatar = $request->logo_cong_ty != null ? $request->logo_cong_ty : 'images/default-company-logo.jpg';
            $taiKhoan->avatar = $request->avatar != null &&  $request->avatar != 'images/default-company-logo.jpg' ? $this->getImageFromBase64($request->avatar) : 'images/default-company-logo.jpg';
            
            $taiKhoan->ho_ten = $request->ten_cong_ty;
            $taiKhoan->save();
            
            $congTyNew->websites = $request->link_website;
            $congTyNew->email = $request->email_cong_ty;
            $congTyNew->phone = $request->dien_thoai_cong_ty;
            $congTyNew->dia_chi = $request->dia_chi_chinh;
            $congTyNew->dia_diem_id = $request->dia_diem_id;
            $congTyNew->gio_lam_viec = serialize($request->gio_lam_viec);
            $congTyNew->ngay_lam_viec = serialize($request->ngay_lam_viec);
            $congTyNew->so_luong_nhan_vien_id = $request->quy_mo_nhan_su;
            $congTyNew->fax = $request->fax_cong_ty;
            // $congTyNew->logo = $request->logo_cong_ty != null ? $request->logo_cong_ty : 'images/default-company-logo.jpg';
            $congTyNew->gioi_thieu = $request->gioi_thieu_cong_ty;
            $congTyNew->so_chi_nhanh = $request->so_luong_chi_nhanh;
            $congTyNew->so_chi_nhanh = $request->so_luong_chi_nhanh;
            $congTyNew->tai_khoan_id = Auth::user()->id;
            $congTyNew->nam_thanh_lap = $request->nam_thanh_lap;

            
            $congTyNew->save();
            
            $nganhNghe = $request->linh_vuc_hoat_dong;
            // $nhaTuyenDung = $this->nhaTuyenDung;
            // if ($request->id == null){
            //     $nhaTuyenDung->getCongTy()->save($congTyNew);
            // }

            $congTyNew->getNganhNghe()->detach();
            $congTyNew->getNganhNghe()->attach($nganhNghe);

            $message = 'Cập nhật công ty thành công!';
            return $this->getResponse($title, 200, $message, $congTyNew);
        } catch (\Exception $e) {
            $message = 'Cập nhật công ty thất bại! Kiểm tra lại dữ liệu!';
            return $this->getResponse($title, 400, $e . $message, 0);
        }

//        return $request;
    }

    public function updateDanhSach(Request $request)
    {

//        $congTyNew->ten_cong_ty = serialize($request->linh_vuc_hoat_dong);
        $id = $request->id;
//        return $id;
        $title = 'Cập nhật';
        try {
            $congTyNew = CongTy::query()->find($id);
            $congTyNew->name = $request->ten_cong_ty;
            $congTyNew->websites = $request->link_website;
            $congTyNew->email = $request->email_cong_ty;
            $congTyNew->phone = $request->dien_thoai_cong_ty;
            $congTyNew->dia_chi = $request->dia_chi_chinh;
            $congTyNew->gio_lam_viec = serialize($request->gio_lam_viec);
            $congTyNew->ngay_lam_viec = serialize($request->ngay_lam_viec);
            $congTyNew->so_nhan_vien = $request->quy_mo_nhan_su;
            $congTyNew->fax = $request->fax_cong_ty;
            $congTyNew->logo = $request->logo_cong_ty;
            $congTyNew->gioi_thieu = $request->gioi_thieu_cong_ty;
            $congTyNew->so_chi_nhanh = $request->so_luong_chi_nhanh;
            $congTyNew->dia_chi_chi_nhanh = serialize($request->dia_chi_chi_nhanh);
            $congTyNew->nam_thanh_lap = $request->nam_thanh_lap;
            $congTyNew->save();

            $nganhNghe = $request->linh_vuc_hoat_dong;
//            $nhaTuyenDung = NhaTuyenDung::query()->find(Auth::user()->id);
//            $nhaTuyenDung->getCongTy()->save($congTyNew);
            $congTyNew->getNganhNghe()->detach();
            $congTyNew->getNganhNghe()->attach($nganhNghe);

            $message = 'Cập nhật công ty thành công!';
            return $this->getResponse($title, 200, $message, 0);
        } catch (\Exception $e) {
            $message = 'Cập nhật công ty thất bại! Kiểm tra lại dữ liệu!';
            return $this->getResponse($title, 400, $e . $message, 0);
        }

//        return $request;
    }

    public function getCapNhat(Request $request)
    {
//        $nganhNghe = NganhNghe::all();
//        $id = $request->get('id');
//        $congTy = CongTy::query()->find($id);
//        $layNganhNghe = $congTy->getNganhNgheId()->toArray();

        $data['id'] = $request->get('id');
        $data['cong_ty'] = CongTy::query()->find($data['id']);
        $data['mang_nganh_nghe'] = $data['cong_ty']->getNganhNgheId()->toArray();
        $data['nganh_nghe'] = NganhNghe::all();

//        return in_array(3,$layNganhNghe) == true;
//        return $layNganhNghe;
        return view('CongTy.modal.capNhat', compact('data'));
    }

    public function xoaDanhSach(Request $request)
    {
        $title = 'Xóa';
        try {
            $id = $request->id;
            $congTy = CongTy::query()->find($id);
            $congTy->getNganhNghe()->detach();
            $congTy->delete();
            $message = 'Xóa công ty' . $congTy->name . ' thành công!';
            return $this->getResponse($title, 200, $message);
        } catch (\Exception $e) {
            $message = 'Xóa công ty thất bại!';
            return $this->getResponse($title, 400, $message);
        }

        return $id;
    }
    //
    public function getContent(){
        $data = $this->getData();

        return view('CongTy.content',compact('data'));
    }
}
