<?php

namespace App\Http\Controllers\NopDon;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\DonXinViec;
use App\Models\NguoiTimViec;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class NopDonController extends Controller
{
    private $nguoiTimViec;

    public function __construct()
    {
        $this->middleware(['auth', 'email.confirm', 'nguoi_tim_viec']);
        $this->middleware(function ($request, $next) {
            $this->nguoiTimViec = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec;
            return $next($request);
        });
    }

    /**
     * người tìm việc : view danh sách bài viết đã ứng tuyển
     */
    public function danhSachBaiDaNopDon()
    {
        return view('User.nguoiTimViec.danhSachDaUngTuyen');
    }

    public function layDanhSachBaiDaNopDon()
    {
        $query = BaiTuyenDung::query()
            ->select(['bai_tuyen_dung.*', 'tai_khoan.ho_ten as nha_tuyen_dung_name', 'cong_ty.name as cong_ty_name', 'don_xin_viec.status as don_xin_viec_status'])
            ->leftJoin('nha_tuyen_dung', 'nha_tuyen_dung.id', '=', 'bai_tuyen_dung.nha_tuyen_dung_id')
            ->leftJoin('tai_khoan', 'tai_khoan.id', '=', 'nha_tuyen_dung.tai_khoan_id')
            ->leftJoin('cong_ty', 'cong_ty.id', '=', 'bai_tuyen_dung.cong_ty_id')
            ->leftJoin('don_xin_viec', 'bai_tuyen_dung.id', '=', 'don_xin_viec.bai_tuyen_dung_id')
            ->where('don_xin_viec.nguoi_tim_viec_id', $this->nguoiTimViec['id'])
            ->get()->toArray();
        $data['data'] = $query;
        return $data;
        dd($query);
    }

    /**
     * Chức năng nộp đơn ứng tuyển của người tìm việc
     */
    public function nopDonUngTuyen(Request $request)
    {
        $title = 'Nộp đơn ứng tuyển';
        try {
//            $check = $request->check;

            $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);

            $taiKhoan->ho_ten = $request->ho_ten;
            $taiKhoan->phone = $request->so_dien_thoai;
            $taiKhoan->save();

            $id = $request->id_bai_viet;
            $this->nguoiTimViec->gioi_tinh = $request->gioi_tinh;
            $this->nguoiTimViec->ngay_sinh = Carbon::createFromFormat('d/m/Y',$request->ngay_sinh)->format('Y-m-d');
            $this->nguoiTimViec->dia_chi = $request->dia_chi;
            $this->nguoiTimViec->exp_lam_viec = serialize($request->kinh_nghiem);
            $this->nguoiTimViec->projects = serialize($request->projects);

            $this->nguoiTimViec->save();
//            $baiTuyenDungIds = $this->nguoiTimViec->getDonXinViec->pluck('id')->toArray();
            if ($this->capNhatDonXinViec($this->nguoiTimViec, $id) == false) {
                return $this->getResponse($title, 401, 'Bạn đã ứng tuyển bài viết này rồi');
            }
            // $this->uploadFileMultiple();
            return DonXinViec::query()->where('bai_tuyen_dung_id',$id)->where('nguoi_tim_viec_id',$this->nguoiTimViec->id)->first('id');
            // return $this->getResponse($title, 200, 'Nộp đơn ứng tuyển thành công',);


        } catch (\Exception $exception) {
            return $this->getResponse($title, 400, $exception->getMessage());
        }
    }

    // public function uploadFileMultiple(Request $request){
    //     $file_names = $request->file('fileUpload');
    //     $index = 0;
    //     foreach ($file_names as $row){
    //         $data[$index] = $row->getClientOriginalName();
    //         $row->move(public_path('uploads'),$data[$index]);
    //         $index++;
    //     }

    //     if($request->has('type') && $request->type == 1){
    //         foreach ($file_names as $row){
    //             $data[$index] = $row->getClientOriginalName();
    //             // $row->move(public_path('uploads'),$data[$index]);
    //             // $index++;
    //         }
    //     }
    //     return $data;
    // }

    public function capNhatDonXinViec($nguoiTimViec, $idBaiTuyenDung)
    {
        try {
            $donTimViec = DonXinViec::query()->where('bai_tuyen_dung_id', $idBaiTuyenDung)->where('nguoi_tim_viec_id', $nguoiTimViec->id)->first();
            if ($donTimViec != null) {
                return false;
            }
            $donXinViec = new DonXinViec();
            $donXinViec->bai_tuyen_dung_id = $idBaiTuyenDung;
            $donXinViec->nguoi_tim_viec_id = $nguoiTimViec->id;
            $donXinViec->file = null;
            $donXinViec->status = 0;
            $donXinViec->save();
            // $this->uploadFileMultiple();
            return true;
        } catch (\Exception $e) {
            return $this->getResponse('Cập nhật đơn xin việc', 400, $e->getMessage());
        }
    }

    public function nopDonBuocMot(Request $request){
        $data = array();
        $data['nguoi_tim_viec'] = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec->toArray();
//                NguoiTimViec::query()->find($request->nguoi_tim_viec)->toArray();

        if ($request->has('bai_tuyen_dung') == true){
            $data['bai_tuyen_dung'] = BaiTuyenDung::query()->find($request->bai_tuyen_dung)->toArray();
        }
        return view('NopDon.buoc1',compact('data'));
    }
    public function nopDonBuocMotLuuLai(Request $request){
        $request->validate([
            'ho_ten' => 'required',
            'gioi_tinh' => 'required',
            'ngay_sinh' => 'required',
            'so_dien_thoai' => 'required|max:10|min:10',
            'dia_chi' => 'required',
            'allow_see_infomation' => 'accepted',
        ],[
            'ho_ten.required'=>'Họ và tên không được để trống',
            'gioi_tinh.required'=>'Chưa chọn giới tính',
            'ngay_sinh.required'=>'Ngày sinh không được để trống',
            'so_dien_thoai.required'=>'Số điện thoại không được để trống',
            'so_dien_thoai.max'=>'Số điện thoại tối đa 10 số',
            'so_dien_thoai.min'=>'Số điện thoại tối thiểu 10 số',
            'dia_chi.required'=>'Địa chỉ không được để trống',
            'allow_see_infomation.accepted'=>'Bạn chưa đồng ý điều khoản này',
        ]);
        $taiKhoan = TaiKhoan::query()->find(Auth::user()->id);
        $taiKhoan->ho_ten = $request->ho_ten;
        $taiKhoan->phone = $request->so_dien_thoai;
        $taiKhoan->save();
        $taiKhoan->getNguoiTimViec->dia_chi = $request->dia_chi;
        $taiKhoan->getNguoiTimViec->ngay_sinh = Carbon::createFromFormat('d/m/Y',$request->ngay_sinh)->format('Y-m-d');
        $taiKhoan->getNguoiTimViec->gioi_tinh = $request->gioi_tinh;
        $taiKhoan->getNguoiTimViec->save();
        $data=array();
        $data['nguoi_tim_viec'] = $taiKhoan->getNguoiTimViec->toArray();
        $data['nguoi_tim_viec']['exp_lam_viec'] = unserialize($data['nguoi_tim_viec']['exp_lam_viec']);
        if ($request->has('bai_tuyen_dung') == true){
            $data['bai_tuyen_dung'] = BaiTuyenDung::query()->find($request->bai_tuyen_dung)->toArray();
        }
//        dd(count($data));
        return view('NopDon.buoc2',compact('data'));
        dd($request->all());
    }
    public function nopDonBuocHaiLuuLai(Request $request){
//        dd(json_decode($request->kinh_nghiem_lam_viec,true));
//        dd($request->all());
        if ($request->hasFile('file_pdf_upload')){
            foreach ($request->file('file_pdf_upload') as $row){
                $nameFile = $row->getClientOriginalName();
                $row->move(public_path('uploads'),$nameFile);
                $dataName[] = 'uploads/'.$nameFile;
            }
        }
        $donXinViec = new DonXinViec();
        if ($request->hasFile('file_pdf_upload')) {
            $donXinViec->file = json_encode($dataName, true);
        }
        $donXinViec->kinh_nghiem_lam_viec = $request->kinh_nghiem_lam_viec;
        $donXinViec->bai_tuyen_dung_id = $request->bai_tuyen_dung;
        $donXinViec->nguoi_tim_viec_id = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec->id;
        $donXinViec->save();
        return view('NopDon.buoc3');
    }
}
