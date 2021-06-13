<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BaiTuyenDung extends Model
{
    protected $table = 'bai_tuyen_dung';
    protected $primaryKey = 'id';
//    protected $dateFormat = 'Y-m-d H+7:i:sO';
    public $timestamps = false;
    protected $fillable = [
        'tieu_de',
        'luong',
        'luong_from',
        'luong_to',
        'ten_chuc_vu',
        'dia_chi',
        'tuoi',
        'han_tuyen',
        'so_luong_tuyen',
        'kinh_nghiem',
        'gioi_tinh_tuyen',
        'bang_cap',
        'mo_ta',
        'quyen_loi',
        'yeu_cau_cong_viec',
        'yeu_cau_ho_so',
        'ky_nang_basic',
        'han_bai_viet',
        'websites',
        'status',
        'isHot',
        'created_at',
        'update_at'
    ];

    protected $attributes = [
        'isHot' => 0,
        'status' => 0,
    ];
    protected $casts = [
        'created_at' => 'datetime:H:i - d/m/Y',
        'update_at' => 'datetime:H:i - d/m/Y,',
        'han_tuyen' => 'datetime:d/m/Y',

    ];

    public function getTuoiAttribute()
    {
        return unserialize($this->attributes['tuoi']);
    }

    public function getYeuCauHoSoAttribute()
    {
        return unserialize($this->attributes['yeu_cau_ho_so']);
    }

    //lấy nhà tuyển dụng
    public function getNhaTuyenDung()
    {
        return $this->belongsTo(NhaTuyenDung::class, 'nha_tuyen_dung_id');
    }


    public function getNhaTuyenDungId()
    {
        return $this->getNhaTuyenDung->pluck('id');
    }

//    public function getNganhNghe()
//    {
//        return $this->belongsToMany(NganhNghe::class, 'bai_tuyen_dung_nganh_nghe', 'bai_tuyen_dung_id', 'nganh_nghe_id');
//    }
    public function getNganhNghe()
    {
        return $this->belongsToMany(NganhNghe::class, 'bai_tuyen_dung_nganh_nghe', 'bai_tuyen_dung_id', 'nganh_nghe_id');
    }
    //đơn xin việc
    public function getDonXinViec(){
        return $this->hasMany(DonXinViec::class,'bai_tuyen_dung_id');
//        return $this->belongsToMany(NguoiTimViec::class,'don_xin_viec','bai_tuyen_dung_id','nguoi_tim_viec_id')->withTimestamps();
    }
    public function getDonXinViecId()
    {
        return $this->getDonXinViec->pluck('id');
    }

    public function getNganhNgheId()
    {
        return $this->getNganhNghe->pluck('id');
    }

    public function getNganhNgheName()
    {
        return $this->getNganhNghe->pluck('name');
    }

    public function getDonHang()
    {
        return $this->hasOne(DonHang::class, 'bai_tuyen_dung_id');
    }

    public function getCongTy()
    {
        return $this->belongsTo(CongTy::class, 'cong_ty_id');

    }

    public function getChucVu()
    {
        return $this->belongsTo(ChucVu::class, 'chuc_vu_id');

    }

    public function getKieuLamViec()
    {
        return $this->belongsTo(KieuLamViec::class, 'kieu_lam_viec_id');
    }

    public function getDiaDiem()
    {
        return $this->belongsTo(DiaDiem::class, 'dia_diem_id');
    }

    public function getBangCap()
    {
        return $this->belongsTo(BangCap::class, 'bang_cap_id');
    }

    public function getDuyetTin(){
        return $this->hasOne(DuyetBai::class,'bai_dang_id');
    }
    public function getKinhNghiem(){
        return $this->belongsTo(KinhNghiem::class,'kinh_nghiem_id');
    }

    public function getBaiThich(){
        return $this->belongsToMany(NguoiTimViec::class,'thich','bai_tuyen_dung_id','nguoi_tim_viec_id');
    }
    public function getBaiThichID(){
        return $this->getBaiThich->pluck('id');
    }
    public function getLuuBai(){
        return $this->belongsToMany(NguoiTimViec::class,'luu_bai','bai_tuyen_dung_id','nguoi_tim_viec_id');
    }

    public static function getAllBaiTuyenDung(){
        return BaiTuyenDung::query()->with([
            'getNhaTuyenDung'=>function($query2){
                $query2->with([
                    'getTaiKhoan'=>function($q3){
                        $q3->select('id','ho_ten','phone','avatar');
                    },
                    'getQuyMoNhanSu',
                    'getNganhNghe'
                ]);
            }

        ])
        
        
        ->get()->toArray();
        // return $data;
    }

    public static function getChiTiet($post)
    {
        $data = BaiTuyenDung::with([
            'getNhaTuyenDung' => function ($subquery) {
                $subquery->select('id', 'tai_khoan_id','dia_chi','gioi_thieu','dia_diem_id','so_luong_nhan_vien_id','websites')->with(
                    [
                        'getTaiKhoan' => function ($q) {
                            $q->select('id', 'ho_ten','avatar');
                        },
                        'getNguoiTimViecQuanTam'=>function($q){
                            $q->count();
                        },
                        'getQuyMoNhanSu'=> function ($subquery2){
                                        $subquery2->select('id', 'name');
                                    },
                                    'getDiaDiem' => function ($q) {
                                        $q->select('id', 'name');
                                    },
                        'getNganhNghe'
                    ]
                );
            },
            'getDonXinViec',
            'getLuuBai',
            'getDonHang' => function ($subquery) {
                $subquery->select('id', 'so_luong', 'bai_tuyen_dung_id');
            },
            'getDiaDiem' => function ($subquery) {
                $subquery->select('id', 'name');
            },
            // 'getCongTy' => function ($subquery) {
            //     $subquery->select('id', 'name', 'logo','dia_chi','gioi_thieu','websites','so_nhan_vien')->with(
            //         [
            //             'getQuyMoNhanSu'=> function ($subquery2){
            //             $subquery2->select('id', 'name');
            //         },
            //         'getNganhNghe'
            //         ]
                
            //     )->get();
            // },
            // 'getCongTy',
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
        ])->select(['id', 'tieu_de', 'ten_chuc_vu', 'luong_from','yeu_cau_ho_so','luong_to', 'tuoi', 'gioi_tinh_tuyen', 'so_luong_tuyen', 'isHot', 'status', 'han_tuyen', 'nha_tuyen_dung_id', 'dia_diem_id', 'chuc_vu_id', 'kinh_nghiem_id', 'cong_ty_id', 'kieu_lam_viec_id', 'bang_cap_id','mo_ta','yeu_cau_cong_viec','quyen_loi','dia_chi'])->find($post)->toArray();
        // dd($data);
        // $data['get_luu_bai'] = collect($data['get_luu_bai'])->pluck('id')->toArray();
        // $data['get_don_xin_viec'] = collect($data['get_don_xin_viec'])->pluck('id')->toArray();
       
        //get số ngày đăng tin
        return self::getSoNgayDangTin($data);
    }

    public static function getSoNgayDangTin($data)
    {
        $data['so_luong_ngay_dang_tin'] = DonHang::query()->select('so_luong')->where('bai_tuyen_dung_id', $data['id'])->where('hang_muc_thanh_toan_id', 1)->first()->toArray();
        
        return self::getNguoiTimViecLienQuan($data);
    }

    public static function getNguoiTimViecLienQuan($data)
    {
        if (Session::has('loai_tai_khoan')) {
            if (intval(Session::get('loai_tai_khoan')) == 1) {
                $user = TaiKhoan::query()->find(Auth::user()->id)->getNguoiTimViec();
                
                $nguoiTimViecTim = $user->with([
                    'getNhaTuyenDungQuanTam' => function ($subquery) {
                                $subquery->select('nha_tuyen_dung.id')->withPivot('nguoi_tim_viec_id', 'nha_tuyen_dung_id');
                            },
                    'getBaoCao' => function ($subquery) {
                                $subquery->select('nha_tuyen_dung.id')->withPivot('nguoi_tim_viec_id', 'nha_tuyen_dung_id');
                            },
                            'getLuuBai',
                            'getDonXinViec'

                ]);

                $data['nguoi_tim_viec'] = $nguoiTimViecTim->first()->toArray();
                $data['nguoi_tim_viec']['get_luu_bai'] = collect($data['nguoi_tim_viec']['get_luu_bai'])->pluck('id')->toArray();
                $data['nguoi_tim_viec']['get_bao_cao'] = collect($data['nguoi_tim_viec']['get_bao_cao'])->pluck('id')->toArray();
                $data['nguoi_tim_viec']['get_don_xin_viec'] = collect($data['nguoi_tim_viec']['get_don_xin_viec'])->pluck('bai_tuyen_dung_id')->toArray();
                $data['nguoi_tim_viec']['get_nha_tuyen_dung_quan_tam'] = collect($data['nguoi_tim_viec']['get_nha_tuyen_dung_quan_tam'])->pluck('pivot.nha_tuyen_dung_id')->toArray();
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
        return self::getBaiGoiY($data);
    }
    public static function getBaiGoiY($data)
    {
        //get bài tuyển dụng gợi ý
        $newQuery = BaiTuyenDung::with([
            'getNhaTuyenDung' => function ($subquery) {
                $subquery->select('id', 'tai_khoan_id')->with(
                    [
                        'getTaiKhoan' => function ($q) {
                            $q->select('id', 'ho_ten','avatar');
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
        

        ]);

        if ($data['kieu_lam_viec_id'] != null) {
            $newQuery->where('kieu_lam_viec_id', $data['kieu_lam_viec_id']);
        }
        $trangThaiDaDuyet = 1;

        $data['bai_tuyen_dung_goi_y'] = $newQuery->distinct('id')->with(['getNhaTuyenDung'=>function($q){$q->select('id','tai_khoan_id')->with(['getTaiKhoan'=>function($q2){$q2->select('id','ho_ten','avatar');}]);}])->where('status', $trangThaiDaDuyet)->orWhere('tieu_de','like','%' . $data['tieu_de'] . '%')->paginate(10, ['id', 'tieu_de', 'ten_chuc_vu', 'luong_from', 'luong_to', 'isHot', 'status', 'han_tuyen', 'nha_tuyen_dung_id', 'dia_diem_id', ], 'page');
        $data['trang_hien_tai'] = $data['bai_tuyen_dung_goi_y']->currentPage();
        $data['check_trang'] = $data['bai_tuyen_dung_goi_y']->nextPageUrl();
        return $data;
    }

}
