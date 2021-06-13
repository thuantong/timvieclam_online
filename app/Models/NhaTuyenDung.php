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
        'email',
        'dia_chi',
        'websites',
        'fax',
        'phone',
        'gio_lam_viec',
        'ngay_lam_viec',
        'so_nhan_vien',
        'so_chi_nhanh',
        'dia_chi_chi_nhanh',
        'logo',
        'gioi_thieu',
       
        'nam_thanh_lap',
    ];
    protected $attributes = [
        'status' => 1,
    ];

    public function getGioLamViecAttribute(){
        return unserialize($this->attributes['gio_lam_viec']);
    }
    public function getNgayLamViecAttribute(){
        return unserialize($this->attributes['ngay_lam_viec']);
    }
    public function getDiaChiChiNhanhAttribute(){
        return unserialize($this->attributes['dia_chi_chi_nhanh']);
    }
    // public function getNganhNgheIdsAttribute(){
    //     return $this->getNganhNgheId();
    // }

    public function getDiaDiem()
    {
        return $this->belongsTo(DiaDiem::class,'dia_diem_id');
    }
    public function getQuyMoNhanSu(){
        return $this->belongsTo(QuyMoNhanSu::class,'so_luong_nhan_vien_id');
    }

    public function getNganhNghe()
    {
        return $this->belongsToMany(NganhNghe::class, 'nganh_nghe_nha_tuyen_dung', 'nha_tuyen_dung_id', 'nganh_nghe_id');
    }

    public function getNganhNgheId()
    {
        return $this->getNganhNghe->pluck('id');
    }


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
