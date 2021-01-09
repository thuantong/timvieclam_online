<?php

namespace App\Http\Controllers\NhaTuyenDung;

use App\Http\Controllers\Controller;
use App\Models\CongTy;
use App\Models\NhaTuyenDung;
use App\Models\QuanTam;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChiTietNhaTuyenDungController extends Controller
{
    public function chiTietNhaTuyenDung(Request $request)
    {
//        dd($request->get('nha_tuyen_dung'));
        $id = $request->get('nha_tuyen_dung');
        $nhaTuyenDung = NhaTuyenDung::query()->where('id', $id);
        $nhaTuyenDung->with(['getTaiKhoan', 'getCongTy',
            'getBaiViet' => function ($q) {
                $q->with([
                    'getCongTy' => function ($q2) {
                        $q2->select('id', 'name','logo');
                    },
                    'getDiaDiem'
                ])->where('status',1);
            }

        ]);
        $data = $nhaTuyenDung->get()->first()->toArray();
//        dd($data);
        $data['cong_ty_nganh_nghe'] = CongTy::query()->find($data['get_cong_ty']['id'])->getNganhNghe()->get()->toArray();
        $data['quy_mo_nhan_su'] = CongTy::query()->find($data['get_cong_ty']['id'])->getQuyMoNhanSu()->get()->toArray();
        $data['quy_mo_nhan_su'] = $data['quy_mo_nhan_su'][0];
        if (Session::exists('loai_tai_khoan') && intval(Session::get('loai_tai_khoan')) == 1) {
            $nguoiTimViecQuery = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec()->first();
            $data['nha_tuyen_dung_da_quan_tam']['data'] = $nguoiTimViecQuery->getNhaTuyenDungQuanTam->pluck('id')->toArray();

        }
        $data['nha_tuyen_dung_da_quan_tam']['total'] = QuanTam::query()->where('nha_tuyen_dung_id', $data['id'])->count();

        $newNTD = NhaTuyenDung::query()->where('id', $id);

        $data['cong_viec_dang_tuyen'] = count($newNTD->with([
            'getBaiViet' => function ($q) {
                $q->select('id','nha_tuyen_dung_id')->where('status',1);
            }
        ])->get()->first()->toArray()['get_bai_viet']);
        $data['cong_viec_da_ngung'] = count($newNTD->with([
            'getBaiViet' => function ($q) {
                $q->select('id','nha_tuyen_dung_id')->where('status',4);
            }
        ])->get()->first()->toArray()['get_bai_viet']);
//        dd($data['cong_viec_dang_tuyen']);
//        $nhaTuyenDung->with(['getBaiTuyenDung','getTaiKhoan']);
//        dd($nhaTuyenDung->get()->first()->toArray());
        return view('chiTietNhaTuyenDung.index', compact('data'));
    }
}
