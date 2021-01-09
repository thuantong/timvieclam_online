<?php

namespace App\Http\Controllers\NhaTuyenDung;

use App\Http\Controllers\Controller;
use App\Models\NguoiTimViec;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NhaTuyenDungController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'email.confirm', 'nha_tuyen_dung']);
    }

    public function index(Request $request)
    {
        $nguoiTimViec = NguoiTimViec::query()->with([
            'getTaiKhoan' => function ($q) use ($request) {
                if ($request->exists('nguoi_tim_viec') && $request->get('nguoi_tim_viec') != "") {
                    $q->where('ho_ten', 'like', '%' . $request->get('nguoi_tim_viec') . '%');
                }else{
                    $q;
                }
            },
            'getBangCap',
            'getKieuLamViec',
            'getDiaDiem'
        ]);
        if ($request->exists('nganh_nghe') && $request->get('nganh_nghe') != "") {
            $nguoiTimViec->where('nganh_nghe_id', $request->get('nganh_nghe'));
        }
        if ($request->exists('dia_diem') && $request->get('dia_diem') != "") {
            $nguoiTimViec->where('dia_diem_id', $request->get('dia_diem'));
        }
        $trangThaiSanSang = 1;
        $nguoiTimViec = $nguoiTimViec->where('status_job',$trangThaiSanSang)->get()->toArray();
//        dd($nguoiTimViec->get()->toArray());
//        dd($nguoiTimViec);
        $collection = collect($nguoiTimViec);
        if ($request->exists('nguoi_tim_viec') && $request->get('nguoi_tim_viec') != "") {
            $collection = $collection->where('get_tai_khoan','!=',null);
        }
//        dd($collection);
        $page = $request->get('page') != "" ? $request->get('page') : 1;
        $perpage = 10;
//        $colection = collect($data['nha_tuyen_dung']);
        $data = new LengthAwarePaginator(
            $collection->forPage($page, $perpage),
            $collection->count(),
            $perpage,
            $page,
            ['path' => route($request->route()->getName())]
        );

        return view('TimKiemUngVien.index',compact('data'));
    }
    public function chiTiet(Request $request){
        $idNguoiTimViec = $request->get('nguoi_tim_viec');

        $data['nguoi_tim_viec'] = NguoiTimViec::query()->with([
            'getTaiKhoan' => function ($q1) {
                $q1->select('id', 'ho_ten', 'email', 'phone');
            },
            'getDiaDiem' => function ($q1) {
                $q1->select('id', 'name');
            },
            'getBangCap' => function ($q1) {
                $q1->select('id', 'name');
            },
            'getKieuLamViec' => function ($q1) {
                $q1->select('id', 'name');
            }
        ])->find($idNguoiTimViec)->toArray();
//        dd($data);
        $data['nguoi_tim_viec']['ky_nang'] = unserialize($data['nguoi_tim_viec']['ky_nang']);
        $data['nguoi_tim_viec']['exp_lam_viec'] = unserialize($data['nguoi_tim_viec']['exp_lam_viec']);
        $data['nguoi_tim_viec']['projects'] = unserialize($data['nguoi_tim_viec']['projects']);
//        dd($data);
//        $data['dia_diem'] = DiaDiem::all()->toArray();
//        $data['bang_cap'] = BangCap::all()->toArray();
//        $data['kieu_lam_viec'] = KieuLamViec::all()->toArray();
        $typeSend = 1;
        $data['chi_tiet_nguoi_tim_viec'] = 1;
//        dd(1);
//        if ($request->has('getskill') == true){
//            dd('cc');
//            return view('User.nguoiTimViec.skillAppend',compact('typeSend','data'));
//        }
        return view('TimKiemUngVien.chi_tiet',compact('data','typeSend'));
    }
}
