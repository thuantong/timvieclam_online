<?php

namespace App\Http\Controllers\NguoiTimViec;

use App\Http\Controllers\Controller;
use App\Models\BangCap;
use App\Models\DiaDiem;
use App\Models\KieuLamViec;
use App\Models\NganhNghe;
use App\Models\NguoiTimViec;
use App\Models\NhaTuyenDung;
use App\Models\TaiKhoan;
use App\Models\DonXinViec;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class NguoiTimViecControler extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function chiTiet(Request $request)
    {
        $idNguoiTimViec = $request->get('id');

        $data['nguoi_tim_viec'] = NguoiTimViec::query()->find($idNguoiTimViec)->with([
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
        ])->first()->toArray();
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
        return view('NguoiTimViec.chiTiet', compact('data', 'typeSend'));
    }

    public function timKiemNhaTuyenDung(Request $request)
    {
        $nganhNghe = NganhNghe::all()->toArray();
        $diadiem = DiaDiem::all()->toArray();
        $data['nganh_nghe'] = $nganhNghe;
        $data['dia_diem'] = $diadiem;
        if ($request->has('dia_diem') && $request->get('dia_diem') == "") {
            $request->request->remove('dia_diem');
        }
        if ($request->has('nganh_nghe') && $request->get('nganh_nghe') == "") {
            $request->request->remove('nganh_nghe');
        }

        $newRequets = $request;
//        dd($newRequets->has('dia_diem'));
//        dd($newRequets->all());
//        if ($request->has('dia_diem') && $request->get('dia_diem') == ""){
//            $request->request->remove('_token');
//        }
//        dd($request->all());
//        $nhaTuyenDung = NhaTuyenDung::query();
        $nhaTuyenDung = NhaTuyenDung::query()->with([
            'getCongTy' => function ($q) use ($newRequets) {
                if ($newRequets->has('dia_diem') && $newRequets->has('nganh_nghe')) {
                    $q->where('dia_diem_id', $newRequets->get('dia_diem'))->with([
                        'getNganhNghe' => function ($q2) use ($newRequets) {
                            $q2->where('nganh_nghe_id', $newRequets->get('nganh_nghe'));
                        }
                    ]);
                } else if ($newRequets->has('dia_diem')) {
                    $q->where('dia_diem_id', $newRequets->get('dia_diem'));
                } else if ($newRequets->has('nganh_nghe')) {
                    $q->with([
                        'getNganhNghe' => function ($q2) use ($newRequets) {
                            $q2->where('nganh_nghe_id', $newRequets->get('nganh_nghe'));
                        }
                    ]);
                } else {
                    $q->with([
                        'getNganhNghe'
                    ]);
                }

            },
//            }
            'getTaiKhoan',
            'getBaiViet' => function ($q) {
                $q->select('id', 'nha_tuyen_dung_id');
            }
        ])->get()->toArray();
//        if ($request->exists('tieu_de') && $request->get('tieu_de') != ""){
//            $nhaTuyenDung->where('')
//        }
        $index = 0;
//dd($nhaTuyenDung);
        if ($newRequets->has('dia_diem') && $newRequets->has('nganh_nghe')) {
//            dd('cc');
//            dd($nhaTuyenDung);
            if (count($nhaTuyenDung) > 0) {
                foreach ($nhaTuyenDung as $row) {
                    if ($row['get_cong_ty'] != null || ($row['get_cong_ty'] != null && array_key_exists('get_nganh_nghe', $row['get_cong_ty']) && count($row['get_cong_ty']['get_nganh_nghe'])) > 0) {
//                    $data['nha_tuyen_dung'] = array();
//                } else {
                        $data['nha_tuyen_dung'][$index] = $row;
                        $index++;
                    }

                }
                if (array_key_exists('nha_tuyen_dung', $data) == false) {
                    $data['nha_tuyen_dung'] = array();
                }
//                dd($data['nha_tuyen_dung']);
            } else {
                $data['nha_tuyen_dung'] = array();

            }

        } else if ($newRequets->has('dia_diem')) {
//            dd($nhaTuyenDung);
            if (count($nhaTuyenDung) > 0) {
                foreach ($nhaTuyenDung as $row) {
                    if ($row['get_cong_ty'] != null) {
//                    $data['nha_tuyen_dung'] = array();
//                } else {
                        $data['nha_tuyen_dung'][$index] = $row;
                        $index++;
                    };
                }
                if (array_key_exists('nha_tuyen_dung', $data) == false) {
                    $data['nha_tuyen_dung'] = array();
                }
            } else {
                $data['nha_tuyen_dung'] = array();

            }

        } else if ($newRequets->has('nganh_nghe')) {
//            dd($nhaTuyenDung);
            if (count($nhaTuyenDung) > 0) {
                foreach ($nhaTuyenDung as $row) {
                    if (count($row['get_cong_ty']['get_nganh_nghe']) > 0) {
//                    echo $index;
                        $data['nha_tuyen_dung'][$index] = $row;
                        $index++;
                    }

                }
//                dd(array_key_exists('nha_tuyen_dung',$data));
                if (array_key_exists('nha_tuyen_dung', $data) == false) {
                    $data['nha_tuyen_dung'] = array();
                }
            } else {
                $data['nha_tuyen_dung'] = array();
            }
//            return;
//dd($data['nha_tuyen_dung']);
        } else {
//            dd('cc');
            if (count($nhaTuyenDung) > 0) {
                $data['nha_tuyen_dung'] = $nhaTuyenDung;
            } else {
                $data['nha_tuyen_dung'] = array();
            }

        }

//        dd($data['nha_tuyen_dung']);
//        if ()
        $page = $request->get('page') != "" ? $request->get('page') : 1;
        $perpage = 10;
        $colection = collect($data['nha_tuyen_dung']);
        $dataNhaTuyenDung = new LengthAwarePaginator(
            $colection->forPage($page, $perpage),
            $colection->count(),
            $perpage,
            $page,
            ['path' => route($request->route()->getName())]
        );

//        dd($request->route()->getDomain());
//        dd($dataNhaTuyenDung);
//        dd($phanTrang);
//        dd($data['data']);
//        dd($data['nha_tuyen_dung']);
//        dd($request);
        return view('TimKiemNhaTuyenDung.index', compact('dataNhaTuyenDung', 'data'));
    }
//    public function paginate($items, $perPage = 10, $page = null, $options = ['path'=>url('/')])
//    {
//        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
//        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
//    }
    public function uploadFile(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:pdf,docx|max:2048',
        ],[
            'file.required'=>'Chưa chọn file',
            'file.mimes'=>'File không đúng định dạng, File phải có định dạng kiểu: :values',
            'file.max'=>'File không được quá 2mb',
        ]);

        $fileName = time().'.'.$request->file('file')->extension();
        $request->file('file')->move(public_path('uploads'),$fileName);
        $nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec;
        $nguoiTimViec->file_path = 'uploads/'.$fileName;
        $nguoiTimViec->save();
//        return response()->file(URL::asset($nguoiTimViec->file_path));
        return redirect()->back();
    }

    public function uploadFileMultiple(Request $request){
        $file_names = $request->file('fileUpload');
        $index = 0;
        foreach ($file_names as $row){
            $data[$index] = $row->getClientOriginalName();
            $row->move(public_path('uploads'),$data[$index]);
            $index++;
        }

        if($request->has('type') && $request->type == 1){
            $donTimKiem = DonXinViec::query()->find($request->don_xin_viec);
            foreach ($file_names as $row){
                $data[$index] = 'uploads/'.$row->getClientOriginalName();
                // $row->move(public_path('uploads'),$data[$index]);
                // $index++;
            }
            $donTimKiem->file = json_encode($data);
            $donTimKiem->save();
            return $this->getResponse("Nộp đơn ứng tuyển", 200, 'Nộp đơn ứng tuyển thành công');

        }
        return $data;
    }
    public function viewPDF(Request $request){
        $filename = 'Pham-Thi-Nga-Apply-giaovie1nquannhiem.pdf';
        $path = storage_path($filename);
        dd($path);
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }
}
