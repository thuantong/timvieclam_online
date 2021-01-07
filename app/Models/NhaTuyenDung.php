<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaTuyenDung extends Model
{
    protected $table = 'nha_tuyen_dung';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
//        'ho_ten',
        'prefix',
        'dia_chi',
        'mang_xa_hoi',
        'gioi_thieu',
        'avatar',
        'gioi_tinh',
        'nam_sinh',
        'status',
    ];
    protected $attributes = [
        'status' => 1,
    ];


    //Quan tâm người tìm việc
    public function getNguoiTimViecQuanTam()
    {
        return $this->belongsToMany(NguoiTimViec::class, 'quan_tam', 'nha_tuyen_dung_id', 'nguoi_tim_viec_id');
    }

    public function getNguoiTimViecQuanTamId()
    {
        return $this->getNguoiTimViecQuanTam->pluck('id');
    }

    //lấy tài khoản nhà tuyển dụng
    public function getTaiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'tai_khoan_id');
    }

    public function getTaiKhoanId()
    {
        return $this->getTaiKhoan->pluck('id');
    }

    //lây tin nhắn người tìm việc
    public function getTinNhanNguoiTimViec()
    {
        return $this->belongsToMany(NguoiTimViec::class, 'tin_nhan', 'nha_tuyen_dung_id', 'nguoi_tim_viec_id');
    }

    //lấy tin nhắn quản trị viên
    public function getTinNhanQuanTriVien()
    {
        return $this->belongsToMany(QuanTriVien::class, 'tin_nhan', 'nha_tuyen_dung_id', 'quan_tri_vien_id');
    }

    //lấy công ty
    public function getCongTy()
    {
        return $this->hasOne(CongTy::class, 'nha_tuyen_dung_id');
    }

    public function getCongTyId()
    {
        return $this->getCongTy->pluck('id');
    }

    //lấy bài viết
    public function getBaiViet()
    {
        return $this->hasMany(BaiTuyenDung::class, 'nha_tuyen_dung_id');
    }

    public function getBaiVietId()
    {
        return $this->getBaiViet->pluck('id');
    }

    //lấy số dư
    public function getSoDu()
    {
        return $this->hasOne(SoDu::class, 'nha_tuyen_dung_id');
    }

    public function getSoDuId()
    {
        return $this->getSoDu->pluck('id');
    }

    public function getDonHang(){
        return $this->hasMany(DonHang::class,'nha_tuyen_dung_id');
    }
    public function getBaoCao(){
        return $this->belongsToMany(NguoiTimViec::class,'bao_cao','nha_tuyen_dung_id','nguoi_tim_viec_id');

    }

}
