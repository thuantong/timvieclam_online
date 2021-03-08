<?php

namespace App\Http\Controllers\BaiViet;

use App\Http\Controllers\Controller;
use App\Models\BaiTuyenDung;
use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\CongTy;
use App\Models\DiaDiem;
use App\Models\DonHang;
use App\Models\DonXinViec;
use App\Models\DuyetBai;
use App\Models\HangMucThanhToan;
use App\Models\KieuLamViec;
use App\Models\KinhNghiem;
use App\Models\LuuBai;
use App\Models\NganhNghe;
use App\Models\NguoiTimViec;
use App\Models\NhaTuyenDung;
//use Carbon\Carbon;
use App\Models\QuanTam;
use App\Models\QuanTriVien;
use App\Models\QuyMoNhanSu;
use App\Models\TaiKhoan;
use App\Models\Thich;
use App\Models\ThongBao;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Cknow\Money\Money;

class
BaiVietController extends Controller
{
    protected $nhaTuyenDung;
    protected $tienDangTin;
    protected $hangMucThanhToan;
    protected $baiViet;
    protected $thanhToanBaiHot;

    public function __construct()
    {
//        $this->middleware(['auth','email.confirm']);
//        dd(Auth::check());
//        if (Auth::user() != null) {
//        $this->middleware(function ($request, $next) {
//                $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;
//                $this->hangMucThanhToan = HangMucThanhToan::query()->find('1');//đăng bài viết
//                $this->tienDangTin = $this->hangMucThanhToan->first()->gia;//1 xu 1 ngày
//                return $next($request);
//
//        });
//        }


    }

    public function getTienDangTin()
    {
        return $this->tienDangTin;
    }

    public function getSoDu()
    {
        return $this->nhaTuyenDung->getSoDu;
    }

    public function khoiTaoThongTin()
    {
        $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;
//        $mucTienThanhToan = HangMucThanhToan::query();
        $this->hangMucThanhToan = HangMucThanhToan::query()->find(1);//đăng bài viết
        $this->thanhToanBaiHot = HangMucThanhToan::query()->find(2)->first()->gia;//bài hot
//        $tongTienDangTin =
        $this->tienDangTin = $this->hangMucThanhToan->first()->gia;//1 xu 1 ngày
    }

    /**
     * Form Chức năng đăng bài viết
     * @return view: BaiViet.index
     */
    public function index()
    {
//        dd(Carbon::now('Asia/Ho_Chi_Minh')->timestamp);
        $checkSoDu = $this->checkDangKySoDu('Đăng bài tuyển dụng', '/dang-bai-viet');
//        dd($checkSoDu);
        if ($checkSoDu['status'] == 400) {
            return view('SoDu.index', compact('checkSoDu'));
        }

        $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;

        $data['kinh_nghiem'] = KinhNghiem::query()->orderBy('id', 'asc')->get();
        $data['nganh_nghe'] = NganhNghe::query()->orderBy('name', 'asc')->get();
        $data['cong_ty'] = $this->nhaTuyenDung->getCongTy()->first(['id', 'name', 'logo']);
        $data['chuc_vu'] = ChucVu::query()->orderBy('name', 'asc')->get();
        $data['dia_diem'] = DiaDiem::query()->orderBy('name', 'asc')->get();
        $data['kieu_lam_viec'] = KieuLamViec::query()->orderBy('name', 'asc')->get();
        $data['bang_cap'] = BangCap::query()->orderBy('name', 'asc')->get();
        $data['quy_mo_nhan_su'] = QuyMoNhanSu::query()->orderBy('id', 'asc')->get();
//        dd($data);
        return view('BaiViet.index', compact('data'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function savePost(Request $request)
    {

        $this->khoiTaoThongTin();
//        return $this->thanhToanBaiHot;
        $title = "Thêm mới";
        try {
            $baiViet = new BaiTuyenDung();
            $baiViet->tieu_de = $request->tieu_de_bai_dang;//
//        công ty tuyển

            $baiViet->ten_chuc_vu = $request->ten_chuc_vu;//
            $baiViet->so_luong_tuyen = $request->so_luong_tuyen;//
            $baiViet->kinh_nghiem_id = $request->so_kinh_nghiem;//
            $baiViet->han_tuyen = Carbon::createFromFormat('d/m/Y', $request->han_tuyen_dung)->format('Y-m-d');//
//ngành nghề
            $baiViet->luong = "truong nay da bo";
            $baiViet->luong_from = intval($request->muc_luong[0]);
            $baiViet->luong_to = intval($request->muc_luong[1]);
            $baiViet->gioi_tinh_tuyen = $request->gioi_tinh;//

            $baiViet->mo_ta = $request->mo_ta_cong_viec;//
            $baiViet->quyen_loi = $request->quyen_loi_cong_viec;//
            $baiViet->yeu_cau_cong_viec = $request->yeu_cau_cong_viec;//
            $baiViet->dia_chi = $request->dia_chi_cong_viec;//
            $baiViet->tuoi = serialize($request->do_tuoi);//
            $nganh_nghe = $request->nganh_nghe;//

            $baiViet->bang_cap_id = $request->bang_cap;//
            $baiViet->chuc_vu_id = $request->chuc_vu_tuyen;//
            $baiViet->dia_diem_id = $request->dia_diem_lam_viec;//
            $baiViet->kieu_lam_viec_id = $request->hinh_thuc;//
            $baiViet->isHot = $request->is_hot;//
            $baiViet->cong_ty_id = $request->cong_ty_tuyen_dung;//
            $baiViet->yeu_cau_ho_so = serialize($request->yeu_cau_ho_so);
            $baiViet->created_at = Carbon::now('Asia/Ho_Chi_Minh');
//            $baiViet->update_at = Carbon::now('Asia/Ho_Chi_Minh');
//            return $this->tienDangTin * $request->so_ngay_ton_tai;
            if ($request->get('is_hot') == 1){
                $this->tienDangTin += $this->thanhToanBaiHot;
            }
            if ($this->kiemTraSoDu($this->tienDangTin * $request->so_ngay_ton_tai) == false) {
                return $this->getResponse('Nạp thêm xu', 405, 'Số dư của bạn hiện không đủ xu!');
            }

            $this->nhaTuyenDung->getBaiViet()->save($baiViet);

            $this->baiViet = $baiViet;
            $baiViet->getNganhNghe()->detach();
            $baiViet->getNganhNghe()->attach($nganh_nghe);

            $this->luuVaoDuyetTin($this->baiViet);
            $tongTienLuuTin = floatval($this->tienDangTin) * floatval($request->so_ngay_ton_tai);
            $this->ghiHoaDon($baiViet, $tongTienLuuTin, $request->so_ngay_ton_tai);

            return $this->getResponse($title, 200, 'Thêm mới bài viết thành công!');

        } catch (\Exception $e) {
            return $this->getResponse($title, 400, $e->getMessage());
        }

    }

    /**
     * kiểm tra số dư
     * @param $tienDangTin
     * @return bool
     */
    public function kiemTraSoDu($tienDangTin)
    {
        $laySoDu = $this->getSoDu();
        if ($tienDangTin > $laySoDu['tong_tien']) {
            return false;
        } else {
            $this->capNhatSoDu($tienDangTin);
            return true;
        }

    }

    /**
     * cập nhấy số dư
     * @param $tienDangTin
     * @return array
     */
    public function capNhatSoDu($tienDangTin)
    {
        try {
            $soDu = $this->getSoDu()->tong_tien;
            $soTienThuc = $soDu - $tienDangTin;
            $this->getSoDu()->tong_tien = $soTienThuc;
            $this->getSoDu()->save();
            Session::put('so_du', $this->getSoDu()->tong_tien);
        } catch (\Exception $e) {
            return $this->getResponse('Cập nhật số dư', 400, $e->getMessage());
        }

    }

    /**
     * ghi hóa đơn
     * @param $tienDangTin
     * @param $soNgayDangTin
     * @return array
     */
    public function ghiHoaDon($baiViet, $tienDangTin, $soNgayDangTin)
    {
        try {
            $donHang = new DonHang();
            $donHang->so_luong = $soNgayDangTin;
            $donHang->tong_tien = $tienDangTin;
            $this->hangMucThanhToan->getDonHang()->save($donHang);
            $this->nhaTuyenDung->getDonHang()->save($donHang);
            $baiViet->getDonHang()->save($donHang);
        } catch (\Exception $e) {
            return $this->getResponse('Ghi hóa đơn', 400, $e->getMessage());
        }

    }

    public function luuVaoDuyetTin($baiViet)
    {
        try {
            $duyetTin = new DuyetBai();
            $duyetTin->status = 0;//chưa đọc
            $duyetTin->isReject = 0;//chưa từ chối
//            $duyetTin->noi_dung = "";//chưa đọc
//            $duyetTin->bai_dang_id = $baiVietId;
//            $duyetTin->save();
//            $baiViet = BaiTuyenDung::query()->find($baiVietID);
            $baiViet->getDuyetTin()->save($duyetTin);
        } catch (\Exception $e) {
            return $this->getResponse('Lưu duyệt tin', 400, $e->getMessage());

        }
    }

    public function getViewNopDon(Request $request)
    {
        $post = $request->get('id');
        $data = BaiTuyenDung::query()->with('getNhaTuyenDung', 'getNganhNghe', 'getCongTy', 'getChucVu', 'getKieuLamViec', 'getDiaDiem', 'getBangCap', 'getKinhNghiem')->find($post)->toArray();
        $data['get_nha_tuyen_dung']['ho_ten'] = NhaTuyenDung::query()->find($data['get_nha_tuyen_dung']['id'])->getTaiKhoan['ho_ten'];
//        $data['luong'] = unserialize($data['luong']);
        $data['tuoi'] = unserialize($data['tuoi']);
        $data['tieu_de'] = ucwords($data['tieu_de']);
        $data['bai_da_thich']['data'] = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec->getBaiThich->pluck('id')->toArray();
        $data['bai_da_thich']['total'] = Thich::query()->where('bai_tuyen_dung_id', $post)->count();
        $data['cong_ty_nganh_nghe'] = CongTy::query()->find($data['cong_ty_id'])->getNganhNghe()->get()->toArray();
        $data['quy_mo_nhan_su'] = CongTy::query()->find($data['cong_ty_id'])->getQuyMoNhanSu()->get()->toArray();
        $data['quy_mo_nhan_su'] = $data['quy_mo_nhan_su'][0];

        $data['don_xin_viec']['total'] = DonXinViec::query()->where('bai_tuyen_dung_id', $post)->count();
        $data['don_xin_viec']['data'] = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec->getDonXinViec()->get()->pluck('id')->toArray();

        $nguoiTimViec = NguoiTimViec::query()->where('tai_khoan_id', Auth::user()->id)->get()->toArray();
        $data['nguoi_tim_viec'] = $nguoiTimViec[0];
        $data['nguoi_tim_viec']['exp_lam_viec'] = unserialize($data['nguoi_tim_viec']['exp_lam_viec']);
        $data['nguoi_tim_viec']['projects'] = unserialize($data['nguoi_tim_viec']['projects']);
        $typeSend = 1;
        return view('NopDon.modal.content', compact('data', 'typeSend'));
    }
    //chi tiết bài tuyển dụng
    public function getThongTinBaiViet($post, Request $request)
    {
        $data = BaiTuyenDung::query()->with([
            'getNhaTuyenDung'=>function($q){
            $q->with([
                'getTaiKhoan'=>function($q2){
                $q2->select('id','avatar','ho_ten');
                }
            ]);
            }
            , 'getNganhNghe', 'getCongTy', 'getChucVu', 'getKieuLamViec', 'getDiaDiem', 'getBangCap', 'getKinhNghiem'])->find($post)->toArray();
//        $data['get_nha_tuyen_dung']['ho_ten'] = NhaTuyenDung::query()->find($data['get_nha_tuyen_dung']['id'])->getTaiKhoan['ho_ten'];
        $data['so_luong_ngay_dang_tin'] = DonHang::query()->select('so_luong')->where('bai_tuyen_dung_id', $data['id'])->where('hang_muc_thanh_toan_id', 1)->first()->toArray();
//        $data['luong'] = unserialize($data['luong']);
        $data['tuoi'] = unserialize($data['tuoi']);
        $data['tieu_de'] = $data['tieu_de'];
//dd($data);
        if (Session::get('loai_tai_khoan') != null) {
            if (intval(Session::get('loai_tai_khoan')) == 1) {
                $nguoiTimViecQuery = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec()->first();
                $data['bai_da_luu']['data'] = $nguoiTimViecQuery->getLuuBai->pluck('id')->toArray();
                //lấy nhà tuyern dụng đã quan tâm
                $data['nha_tuyen_dung_da_quan_tam']['data'] = $nguoiTimViecQuery->getNhaTuyenDungQuanTam->pluck('id')->toArray();
                $data['don_xin_viec']['data'] = $nguoiTimViecQuery->getDonXinViec()->get()->pluck('id')->toArray();
                $data['don_xin_viec']['data'] = $nguoiTimViecQuery->getDonXinViec()->get()->pluck('bai_tuyen_dung_id')->toArray();
//                $data['don_xin_viec']['data'] = $nguoiTimViecQuery->with([
//                    'getDonXinViec'
//                ])->get()->pluck('id','bai_tuyen_dung_id')->toArray();
                $data['bao_cao']['data'] = $nguoiTimViecQuery->getBaoCao()->get()->pluck('id')->toArray();
                $nguoiTimViec = $nguoiTimViecQuery->toArray();
                $data['nguoi_tim_viec'] = $nguoiTimViec;
                $data['nguoi_tim_viec']['exp_lam_viec'] = unserialize($data['nguoi_tim_viec']['exp_lam_viec']);
                $data['nguoi_tim_viec']['projects'] = unserialize($data['nguoi_tim_viec']['projects']);
            }
        }
//        dd($data);
        $newQuery = BaiTuyenDung::with([
            'getNhaTuyenDung' => function ($subquery) {
                $subquery->select('id', 'tai_khoan_id')->with(
                    [
                        'getTaiKhoan' => function ($q) {
                            $q->select('id', 'ho_ten');
                        }
                    ]
                );
            },
            'getDonHang' => function ($subquery) {
                $subquery->select('id', 'so_luong as so_ngay_bai_dang', 'bai_tuyen_dung_id');
            },
            'getDiaDiem' => function ($subquery) {
                $subquery->select('id', 'name as dia_diem');
            },
            'getCongTy' => function ($subquery) {
                $subquery->select('id', 'name as cong_ty_name', 'logo as cong_ty_logo');
            },

        ]);
        if ($data['kieu_lam_viec_id'] != null) {
            $newQuery->where('kieu_lam_viec_id', $data['kieu_lam_viec_id']);
        }
//        $query->where('tieu_de', 'like', '%' . $tieuDe . '%');
        $trangThaiDaDuyet = 1;
//        $newQuery->orWhere('tieu_de','like','%' . $data['tieu_de'] . '%')->where('status',$trangThaiDaDuyet);

        // $data['bai_tuyen_dung'] = $newQuery->distinct('id')->where('status', $trangThaiDaDuyet)->orWhere('tieu_de','like','%' . $data['tieu_de'] . '%')->orderBy('isHot', 'desc')->paginate(10, ['id', 'tieu_de', 'ten_chuc_vu', 'luong_from', 'luong_to', 'isHot', 'status', 'han_tuyen', 'nha_tuyen_dung_id', 'dia_diem_id', 'cong_ty_id'], 'page');
        $data['bai_tuyen_dung'] = $newQuery->distinct('id')->where('status', $trangThaiDaDuyet)->orWhere('tieu_de','like','%' . $data['tieu_de'] . '%')->paginate(10, ['id', 'tieu_de', 'ten_chuc_vu', 'luong_from', 'luong_to', 'isHot', 'status', 'han_tuyen', 'nha_tuyen_dung_id', 'dia_diem_id', 'cong_ty_id'], 'page');
        
        $data['trang_hien_tai'] = $data['bai_tuyen_dung']->currentPage();
        $data['check_trang'] = $data['bai_tuyen_dung']->nextPageUrl();
        //        if ($request->has('kieu_lam_viec') == true && $request->get('kieu_lam_viec') != null) {
//            $query->where('kieu_lam_viec_id', $request->get('kieu_lam_viec'));
//        }
//        $newQuery = BaiTuyenDung::
        $data['bai_da_luu']['total'] = LuuBai::query()->where('bai_tuyen_dung_id', $post)->count();

        $data['nha_tuyen_dung_da_quan_tam']['total'] = QuanTam::query()->where('nha_tuyen_dung_id', $data['get_nha_tuyen_dung']['id'])->count();

        $data['cong_ty_nganh_nghe'] = CongTy::query()->find($data['cong_ty_id'])->getNganhNghe()->get()->toArray();
        $data['quy_mo_nhan_su'] = CongTy::query()->find($data['cong_ty_id'])->getQuyMoNhanSu()->get()->toArray();
        $data['quy_mo_nhan_su'] = $data['quy_mo_nhan_su'][0];

        $data['get_nha_tuyen_dung']['tai_khoan'] = TaiKhoan::query()->find($data['get_nha_tuyen_dung']['tai_khoan_id'])->toArray();
        $data['don_xin_viec']['total'] = DonXinViec::query()->where('bai_tuyen_dung_id', $post)->count();

        $typeSend = 1;
        return view('BaiViet.chiTiet', compact('data', 'typeSend'));
    }

    /**
     * Xem chi tiết nhanh
     * @param $post
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getThongTinBaiVietClick($post, Request $request)
    {

        $query = BaiTuyenDung::with([
            'getNhaTuyenDung' => function ($subquery) {
                $subquery->select('id', 'tai_khoan_id')->with(
                    [
                        'getTaiKhoan' => function ($q) {
                            $q->select('id', 'ho_ten');
                        }
                    ]
                );
            },
            'getDonHang' => function ($subquery) {
                $subquery->select('id', 'so_luong', 'bai_tuyen_dung_id');
            },
            'getDiaDiem' => function ($subquery) {
                $subquery->select('id', 'name');
            },
            'getCongTy' => function ($subquery) {
                $subquery->select('id', 'name', 'logo');
            },
            'getNganhNghe',
            'getChucVu' => function ($subquery) {
                $subquery->select('id', 'name');
            },
            'getKinhNghiem' => function ($subquery) {
                $subquery->select('id', 'name');
            },
            'getKieuLamViec' => function ($subquery) {
                $subquery->select('id', 'name');
            },
            'getBangCap' => function ($subquery) {
                $subquery->select('id', 'name');
            },
        ])->select(['id', 'tieu_de', 'ten_chuc_vu', 'luong_from','luong_to', 'tuoi', 'gioi_tinh_tuyen', 'so_luong_tuyen', 'isHot', 'status', 'han_tuyen', 'nha_tuyen_dung_id', 'dia_diem_id', 'chuc_vu_id', 'kinh_nghiem_id', 'cong_ty_id', 'kieu_lam_viec_id', 'bang_cap_id'])->find($post)->toArray();
        $data = $query;
//        $data['luong'] = unserialize($data['luong']);
        $data['tuoi'] = unserialize($data['tuoi']);
        $data['tieu_de'] = ucwords($data['tieu_de']);

        if (Session::has('loai_tai_khoan')) {
            if (intval(Session::get('loai_tai_khoan')) == 1) {
                $nguoiTimViecTim = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec()->first();
                    $data['bai_da_luu']['data'] = $nguoiTimViecTim->getLuuBai->pluck('id')->toArray();
                $data['don_xin_viec']['data'] = $nguoiTimViecTim->getDonXinViec()->get()->pluck('id')->toArray();
                $data['don_xin_viec']['data'] = $nguoiTimViecTim->getDonXinViec()->get()->pluck('bai_tuyen_dung_id')->toArray();
                    $nguoiTimViecTim->with([
                    'getNhaTuyenDungQuanTam' => function ($subquery) {
                        $subquery->select('nha_tuyen_dung.id')->withPivot('nguoi_tim_viec_id', 'nha_tuyen_dung_id');
                    },
//                    'getDonXinViec' => function ($subquery) {
//                        $subquery->select('id', 'nguoi_tim_viec_id', 'bai_tuyen_dung_id');
//                    },
                    'getBaoCao' => function ($subquery) {
                        $subquery->select('nha_tuyen_dung.id')->withPivot('nguoi_tim_viec_id', 'nha_tuyen_dung_id');
                    },
                ]);
                $data['nguoi_tim_viec'] = $nguoiTimViecTim->get()->toArray()[0];
//                $data['bai_da_luu']['data'] = $data['nguoi_tim_viec']['get_luu_bai'];
                $data['nguoi_tim_viec']['exp_lam_viec'] = unserialize($data['nguoi_tim_viec']['exp_lam_viec']);
                $data['nguoi_tim_viec']['projects'] = unserialize($data['nguoi_tim_viec']['projects']);
                $data['nguoi_tim_viec']['social'] = unserialize($data['nguoi_tim_viec']['social']);
                $data['nguoi_tim_viec']['ky_nang'] = unserialize($data['nguoi_tim_viec']['ky_nang']);

            }
        } else {
            $data['bai_da_luu']['data'] = array();
            //lấy nhà tuyern dụng đã quan tâm
            $data['nha_tuyen_dung_da_quan_tam']['data'] = array();
            $data['don_xin_viec']['data'] = array();
            $data['nguoi_tim_viec'] = array();
            $data['nguoi_tim_viec']['exp_lam_viec'] = array();
            $data['nguoi_tim_viec']['projects'] = array();
            $data['nha_tuyen_dung_da_bao_cao']['data'] = array();
        }

        $data['bai_da_luu']['total'] = LuuBai::query()->where('bai_tuyen_dung_id', $post)->count();

        $data['nha_tuyen_dung_da_quan_tam']['total'] = QuanTam::query()->where('nha_tuyen_dung_id', $data['get_nha_tuyen_dung']['id'])->count();
        $data['don_xin_viec']['total'] = DonXinViec::query()->where('bai_tuyen_dung_id', $post)->count();
//dd($data);
        switch (intval($request->get('chitiet'))) {
            case 0:
                return $data;
            case 1:
                $typeSend = 1;
                return view('BaiViet.chiTiet', compact('data', 'nguoiTimViec', 'typeSend'));
        }
    }

    /**
     * Luu bài người tuyển dụng
     * @param Request $request
     * @return string
     */
    public function likePost(Request $request)
    {
        try {
            $idPost = $request->id;
//            dd($idPost);
            $status = intval($request->thich);
            $nguoiLike = NguoiTimViec::query()->where('tai_khoan_id', Auth::user()->id)->first();
//            return $nguoiLike;
            $baiTuyenDung = BaiTuyenDung::query()->find($idPost);
            switch ($status) {
                case 0:
                    $baiTuyenDung->getLuuBai()->detach($nguoiLike);
                    break;
                case 1:
                    $baiTuyenDung->getLuuBai()->attach($nguoiLike);
                    break;
            }
            $data['total_thich'] = LuuBai::query()->where('bai_tuyen_dung_id', $idPost)->count();
//dd($nguoiLike);
            return $data;
//            $baiTuyenDung = BaiTuyenDung::query()->find($id);
//            $baiTuyenDung->
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Chức năng tìm kiếm bài viết
     * @param Request $request
     * @return array
     */
    public function timKiemBaiViet(Request $request)
    {
        $page = $request->get('page');

        $tieuDe = $request->get('tieu_de');
        $nganhNghe = $request->get('nganh_nghe_id') == null ? null : $request->get('nganh_nghe_id');
        $diaDiem = $request->get('dia_diem_id') == null ? null : $request->get('dia_diem_id');


        $query = BaiTuyenDung::query()->select(['bai_tuyen_dung.*', 'dia_diem.name as dia_diem', 'cong_ty.name as cong_ty_name', 'cong_ty.logo as cong_ty_logo'])
            ->leftJoin('bai_tuyen_dung_nganh_nghe', 'bai_tuyen_dung.id', '=', 'bai_tuyen_dung_nganh_nghe.bai_tuyen_dung_id')
            ->leftJoin('dia_diem', 'bai_tuyen_dung.dia_diem_id', '=', 'dia_diem.id')
            ->leftJoin('cong_ty', 'bai_tuyen_dung.cong_ty_id', '=', 'cong_ty.id')
            ->where('bai_tuyen_dung.status', 1)
            ->where('bai_tuyen_dung.tieu_de', 'like', '%' . $tieuDe . '%')
            ->orWhere('bai_tuyen_dung.ten_chuc_vu', 'like', '%' . $tieuDe . '%');

        if ($nganhNghe != null) {
            $query->where('bai_tuyen_dung_nganh_nghe.nganh_nghe_id', $nganhNghe);
        }
        if ($diaDiem != null) {
            $query->where('bai_tuyen_dung.dia_diem_id', $diaDiem);
        }
        $data['bai_tuyen_dung'] = $query
            ->distinct('bai_tuyen_dung.id')
            ->orderBy('bai_tuyen_dung.isHot', 'desc')
            ->orderBy('bai_tuyen_dung.created_at', 'desc')
            ->paginate(10, '*', 'page', $page);


        $data['trang_hien_tai'] = $data['bai_tuyen_dung']->currentPage();
        $data['check_trang'] = $data['bai_tuyen_dung']->nextPageUrl();
//        dd($data);

//        return $data;
        return view('TrangChu.items', compact('data'));
    }

    //
    public function layTatCaBaiViet(Request $request)
    {
        $nguoiTimViecALL = NguoiTimViec::query()->with([
            'getTaiKhoan'
        ])->get()->toArray();
//        dd($nguoiTimViecALL);
        $trangThaiDaDuyet = 1;
        $page = $request->get('page');
//        dd($request->has('getTin'));
        if ($request->has('getTin') == false) {
            switch ($request->has('nganh_nghe_id') == true && $request->get('nganh_nghe_id') != null) {
                case true :
//                if ($request->has('getTin') == false) {
                    //init value
                    $tieuDe = $request->get('tieu_de');
                    $nganhNghe = $request->get('nganh_nghe_id') == null ? null : $request->get('nganh_nghe_id');
                    $diaDiem = $request->get('dia_diem_id') == null ? null : $request->get('dia_diem_id');
                    $query = NganhNghe::query()->find($nganhNghe)->getBaiTuyenDung()->newQuery()->with([
                        'getNhaTuyenDung' => function ($subquery) {
                            $subquery->select('id', 'tai_khoan_id')->with(
                                [
                                    'getTaiKhoan' => function ($q) {
                                        $q->select('id', 'ho_ten');
                                    }
                                ]
                            );
                        },
                        'getDonHang' => function ($subquery) {
                            $subquery->select('id', 'so_luong as so_ngay_bai_dang', 'bai_tuyen_dung_id');
                        },
                        'getDiaDiem' => function ($subquery) {
                            $subquery->select('id', 'name as dia_diem');
                        },
                        'getCongTy' => function ($subquery) {
                            $subquery->select('id', 'name as cong_ty_name', 'logo as cong_ty_logo');
                        },

                    ]);

                    $query->where('tieu_de', 'like', '%' . $tieuDe . '%');
//                    $query->orWhere('ten_chuc_vu', 'like', '%' . $tieuDe . '%');
                    if ($diaDiem != null) {
                        $query->where('dia_diem_id', $diaDiem);
                    }

//                }
//                dd($query->distinct('id')->where('status',1)->get()->toArray());
                    $data['bai_tuyen_dung'] = $query->distinct('bai_tuyen_dung.id')->where('status', $trangThaiDaDuyet)->paginate(10, ['bai_tuyen_dung.id', 'bai_tuyen_dung.tieu_de', 'bai_tuyen_dung.ten_chuc_vu', 'luong_from','luong_to', 'bai_tuyen_dung.isHot', 'bai_tuyen_dung.status', 'bai_tuyen_dung.han_tuyen', 'bai_tuyen_dung.nha_tuyen_dung_id', 'bai_tuyen_dung.dia_diem_id', 'bai_tuyen_dung.cong_ty_id'], 'page', $page);
//                dd($data['bai_tuyen_dung']->toArray());
                    break;
                case false:
                    $query = BaiTuyenDung::with([
                        'getNhaTuyenDung' => function ($subquery) {
                            $subquery->select('id', 'tai_khoan_id')->with(
                                [
                                    'getTaiKhoan' => function ($q) {
                                        $q->select('id', 'ho_ten');
                                    }
                                ]
                            );
                        },
                        'getDonHang' => function ($subquery) {
                            $subquery->select('id', 'so_luong as so_ngay_bai_dang', 'bai_tuyen_dung_id');
                        },
                        'getDiaDiem' => function ($subquery) {
                            $subquery->select('id', 'name as dia_diem');
                        },
                        'getCongTy' => function ($subquery) {
                            $subquery->select('id', 'name as cong_ty_name', 'logo as cong_ty_logo');
                        },

                    ]);
                    if ($request->has('getTin') == false) {
                        //init value
                        $tieuDe = $request->get('tieu_de');
//                        $countSpace = substr_count($tieuDe, ' ');
//                        for ($i = 0;$i<$countSpace;$i++){
//                            echo trim(substr($tieuDe, 0, strrpos($tieuDe," ")));
//                            $tieuDe = trim(substr($tieuDe, strrpos($tieuDe," ")));
//                            if ($countSpace-1 == $i){
//                                echo $tieuDe;
//                            }
//                        }
//                        echo $tieuDe;
//                        dd(substr($tieuDe, strrpos($tieuDe," ")));
//                    $nganhNghe = $request->get('nganh_nghe_id') == null ? null : $request->get('nganh_nghe_id');
                        $diaDiem = $request->get('dia_diem_id') == null ? null : $request->get('dia_diem_id');

                        $query->where('tieu_de', 'like', '%' . $tieuDe . '%');
//                        if ($countSpace > 0) {
//                            for ($i = 0; $i < $countSpace; $i++) {
//                                $query->orWhere('tieu_de', 'like', '%' . trim(substr($tieuDe, 0, strrpos($tieuDe, " "))) . '%');
//                                $tieuDe = trim(substr($tieuDe, strrpos($tieuDe, " ")));
//                                if ($countSpace - 1 == $i) {
//                                    $query->orWhere('tieu_de', 'like', '%' . trim(substr($tieuDe, 0, strrpos($tieuDe, " "))) . '%');
//
////                                echo $tieuDe;
//                                }
//                            }
//                        }

//                    $query->orWhere('ten_chuc_vu', 'like', '%' . $tieuDe . '%');
                        if ($diaDiem != null) {
                            $query->where('dia_diem_id', $diaDiem);
                        }
//                    dd($query->distinct('id')->where('status',1)->get()->toArray());
                        $data['bai_tuyen_dung'] = $query->distinct('id')->where('status', $trangThaiDaDuyet)->paginate(10, ['id', 'tieu_de', 'ten_chuc_vu', 'luong_from','luong_to', 'isHot', 'status', 'han_tuyen', 'nha_tuyen_dung_id', 'dia_diem_id', 'cong_ty_id'], 'page', $page);

//                    $query->where('nganh_nghe_id','');

                    }

                    break;
            }
        }
//        dd($query->get()->toArray());
        //tìm kiếm

//        dd($query->get()->toArray());
//        dd($allNganhNghe);

//        dd($diaDiem);
//        $data['bai_tuyen_dung'] = $query->distinct('id')->where('status',$trangThaiDaDuyet)->get(['id','tieu_de','ten_chuc_vu','luong','isHot','status','han_tuyen', 'nha_tuyen_dung_id','dia_diem_id','cong_ty_id'])->toArray();
//        $data['bai_tuyen_dung'] = $query->distinct('id')->where('status',$trangThaiDaDuyet)->paginate(10, ['id','tieu_de','ten_chuc_vu','luong','isHot','status','han_tuyen', 'nha_tuyen_dung_id','dia_diem_id','cong_ty_id'], 'page', $page);
        $data['trang_hien_tai'] = $data['bai_tuyen_dung']->currentPage();
        $data['check_trang'] = $data['bai_tuyen_dung']->nextPageUrl();

//        dd($data);
        return view('TrangChu.items', compact('data'));

    }

    public function chinhSua(Request $request)
    {
        $id = $request->get('id');
        $baiTuyenDung = BaiTuyenDung::query()->find($id);
        $baiTuyenDung->getNganhNgheId();
//        $baiTuyenDung['luong'] = unserialize($baiTuyenDung['luong']);
        $baiTuyenDung['tuoi'] = unserialize($baiTuyenDung['tuoi']);

        $data['data'] = $baiTuyenDung->toArray();
        $data['data']['get_nganh_nghe'] = $data['data']['get_nganh_nghe'][0]['id'];

        $this->nhaTuyenDung = TaiKhoan::query()->find(Auth::user()->id)->getNhaTuyenDung;
//dd($data);
        $data['kinh_nghiem'] = KinhNghiem::query()->orderBy('id', 'asc')->get();

        $data['nganh_nghe'] = NganhNghe::query()->orderBy('name', 'asc')->get();
        $data['cong_ty'] = $this->nhaTuyenDung->getCongTy()->first(['id', 'name', 'logo'])->toArray();
        $data['chuc_vu'] = ChucVu::query()->orderBy('name', 'asc')->get();
        $data['dia_diem'] = DiaDiem::query()->orderBy('name', 'asc')->get();
        $data['kieu_lam_viec'] = KieuLamViec::query()->orderBy('name', 'asc')->get();
        $data['bang_cap'] = BangCap::query()->orderBy('name', 'asc')->get();
        $data['quy_mo_nhan_su'] = QuyMoNhanSu::query()->orderBy('id', 'asc')->get();
//        dd($data['data']['get_nganh_nghe']);
//        dd($data);
//        dd(array_search("12",array_column($data['data']['get_nganh_nghe'],'id')));
        return view('BaiViet.modal.chinh_sua.content_chinh_sua', compact('data'));
        return $baiTuyenDung;
    }

    public function luuChinhSua(Request $request)
    {
        $this->khoiTaoThongTin();
        $title = "Chỉnh sửa bài tuyển dụng";
        try {
            $id = $request->id;
            $tieu_de_bai_dang = $request->tieu_de_bai_dang;
            $nganh_nghe = $request->nganh_nghe;
            $chuc_vu_tuyen = $request->chuc_vu_tuyen;
            $ten_chuc_vu = $request->ten_chuc_vu;
            $so_luong_tuyen = $request->so_luong_tuyen;
            $so_kinh_nghiem = $request->so_kinh_nghiem;
            $han_tuyen_dung = $request->han_tuyen_dung;
            $muc_luong = $request->muc_luong;
            $do_tuoi = $request->do_tuoi;
            $bang_cap = $request->bang_cap;
            $gioi_tinh = $request->gioi_tinh;
            $dia_diem_lam_viec = $request->dia_diem_lam_viec;
            $hinh_thuc = $request->hinh_thuc;
            $mo_ta_cong_viec = $request->mo_ta_cong_viec;
            $yeu_cau_cong_viec = $request->yeu_cau_cong_viec;
            $quyen_loi_cong_viec = $request->quyen_loi_cong_viec;
            $dia_chi_cong_viec = $request->dia_chi_cong_viec;
            $yeu_cau_ho_so = $request->yeu_cau_ho_so;
//            so_ngay_ton_tai

            if ($timBaiTuyenDung = BaiTuyenDung::query()->find($id)) {
                if ($request->so_ngay_ton_tai > 0){
//                    if ($timBaiTuyenDung->status != 1 || $timBaiTuyenDung->status != 2){
//
//                    }
                    if ($timBaiTuyenDung->status == 4){
                        $timBaiTuyenDung->status = 1;
                        $timBaiTuyenDung->han_bai_viet = Carbon::now($this->tzHoChiMinh())->addDays($request->so_ngay_ton_tai);
                    }else{
                        $timBaiTuyenDung->han_bai_viet = Carbon::parse($timBaiTuyenDung->han_bai_viet)->addDays($request->so_ngay_ton_tai);
                    }
                    $donHang = $timBaiTuyenDung->getDonHang;
                    $this->tienDangTin *= floatval($request->so_ngay_ton_tai);
//                    return $this->tienDangTin;
                    $this->capNhatSoDu($this->tienDangTin);
                    $donHang->so_luong += floatval($request->so_ngay_ton_tai);
                    $donHang->tong_tien += floatval($this->tienDangTin);

                    $donHang->save();
                }
                $timBaiTuyenDung->tieu_de = $tieu_de_bai_dang;
                $timBaiTuyenDung->ten_chuc_vu = $ten_chuc_vu;
                $timBaiTuyenDung->so_luong_tuyen = $so_luong_tuyen;
                $timBaiTuyenDung->kinh_nghiem_id = $so_kinh_nghiem;
                $timBaiTuyenDung->han_tuyen = Carbon::createFromFormat('d/m/Y', $han_tuyen_dung)->format('Y-m-d');//
//ngành nghề
                $timBaiTuyenDung->luong_from = $muc_luong[0];
                $timBaiTuyenDung->luong_to = $muc_luong[1];
                $timBaiTuyenDung->yeu_cau_ho_so = serialize($yeu_cau_ho_so);

                $timBaiTuyenDung->gioi_tinh_tuyen = $gioi_tinh;//

                $timBaiTuyenDung->mo_ta = $mo_ta_cong_viec;//
                $timBaiTuyenDung->quyen_loi = $quyen_loi_cong_viec;//
                $timBaiTuyenDung->yeu_cau_cong_viec = $yeu_cau_cong_viec;//
                $timBaiTuyenDung->dia_chi = $dia_chi_cong_viec;//
                $timBaiTuyenDung->tuoi = serialize($do_tuoi);//

                $timBaiTuyenDung->bang_cap_id = $bang_cap;//
                $timBaiTuyenDung->chuc_vu_id = $chuc_vu_tuyen;//
                $timBaiTuyenDung->dia_diem_id = $dia_diem_lam_viec;//
                $timBaiTuyenDung->kieu_lam_viec_id = $hinh_thuc;//
                $timBaiTuyenDung->getNganhNghe()->detach();
                $timBaiTuyenDung->getNganhNghe()->attach($nganh_nghe);
                $timBaiTuyenDung->save();
                return $this->getResponse($title, 200, "Chỉnh sửa bài tuyển dụng thành công!");
            }
        } catch (\Exception $exception) {
//            return $exception->getMessage();
            return $this->getResponse($title, 400, "Chỉnh sửa bài tuyển dụng thất bại!");
        }

        return $timBaiTuyenDung == null;

    }
    public function guiLaiXacNhan(Request $request){
        $id = $request->id;
        $title = "Thông báo";
        $baiTuyenDung = BaiTuyenDung::query()->find($id);
        $baiDuyen = DuyetBai::query()->where('bai_dang_id',$id)->first();
        try {
            $baiTuyenDung->status = 0;//chờ duyệt
            $baiDuyen->status = 0;//chờ duyệt
            $baiDuyen->save();
//            $baiTuyenDung->han_bai_viet = Carbon::now($this->tzHoChiMinh())->toDateTimeString();
            $baiTuyenDung->save();
            //thêm thông báo :
            $taiKhoanQTV = QuanTriVien::query()->find($baiDuyen->quan_tri_vien_id)->getTaiKhoan;
            $this->themThongBao("Gửi lại yêu cầ xác nhận bài tuyển dụng: ".$baiTuyenDung->tieu_de,Auth::user()->id,$taiKhoanQTV->id);
//            $newThongBao = new ThongBao();
//            $newThongBao->name = "gửi lại xác nhận bài tuyển dụng: ".$baiTuyenDung->tieu_de;
//            $newThongBao->tai_khoan_from_id = Auth::user()->id;
//            $newThongBao->tai_khoan_to_id = $baiDuyen->id;
//            $newThongBao->save();
            return $this->getResponse($title,200,'Gửi phê duyệt bài tuyển dụng thành công!');
        }catch (\Exception $e){
            return $this->getResponse($title,400,'Gửi phê duyệt bài tuyển dụng thất bại!');
        }
    }
}
