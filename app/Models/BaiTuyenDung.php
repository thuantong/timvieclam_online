<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
//    protected $dates = [
//        'created_at', 'updated_at'
//    ];
//
//    public function setStartDatetimeAttribute($date)
//    {
//        $this->attributes['created_at'] = Carbon::parse($this->attributes['created_at'])->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i');
//    }

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

}
