<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiTimViec extends Model
{
    protected $table = 'nguoi_tim_viec';
    protected $primaryKey  = 'id';
    public $timestamps = false;

    protected $fillable = [
//        'ho_ten',
        'viec_can_tim',
        'gioi_thieu',
        'dia_chi',
        'gioi_tinh',
        'ngay_sinh',
        'ky_nang',
        'exp_lam_viec',
        'projects',
        'vi_tri_tim',
        'so_thich',
        'avatar',
        'status',
        'file_path',
        'social',
        'muc_luong',
        'ten_truong_tot_nghiep',
        'tag_jobs',
        'muc_tieu_nghe_nghiep',
        'status_job',
    ];
    protected $attributes = [
        'status_job'=>0,
        'status' => 1,
        'gioi_tinh' => 1,
    ];

    public function getExpLamViecAttribute(){
        return unserialize($this->attributes['exp_lam_viec']);
    }
    public function getProjectsAttribute(){
        return unserialize($this->attributes['projects']);
    }
    public function getSocialAttribute(){
        return unserialize($this->attributes['social']);
    }
    public function getKyNangAttribute(){
        return unserialize($this->attributes['ky_nang']);
    }

    //Tài khoản người tìm việc
    public function getTaiKhoan(){
        return $this->belongsTo(TaiKhoan::class,'tai_khoan_id');
    }
    public function getTaiKhoanId(){
        return $this->getTaiKhoan->pluck('id');
    }


    //Lấy số dư người tìm việc
    public function getSoDu(){
        return $this->hasOne(SoDu::class,'nguoi_tim_viec_id');
    }
    public function getSoDuId(){
        return $this->getSoDu->pluck('id');
    }

    //Quan tâm nhà tuyển dụng
    public function getNhaTuyenDungQuanTam(){
        return $this->belongsToMany(NhaTuyenDung::class,'quan_tam','nguoi_tim_viec_id','nha_tuyen_dung_id');
    }
    public function getNhaTuyenDungQuanTamId(){
        return $this->getNhaTuyenDungQuanTam->pluck('id');
    }

    //lấy tin nhắn nhà tuyển dụng
    public function getTinNhanNhaTuyenDung(){
        return $this->belongsToMany(NhaTuyenDung::class,'tin_nhan','nguoi_tim_viec_id','nha_tuyen_dung_id');
    }

    //lấy tin nhắn quản trị viên
    public function getTinNhanQuanTriVien(){
        return $this->belongsToMany(QuanTriVien::class,'tin_nhan','nguoi_tim_viec_id','quan_tri_vien_id');
    }

    public function getBaiThich(){
        return $this->belongsToMany(BaiTuyenDung::class,'thich','nguoi_tim_viec_id','bai_tuyen_dung_id');
    }
    public function getDonXinViec(){
        return $this->hasMany(DonXinViec::class,'nguoi_tim_viec_id');
//        return $this->belongsToMany(BaiTuyenDung::class,'don_xin_viec','nguoi_tim_viec_id','bai_tuyen_dung_id')->withTimestamps();
    }

    public function getLuuBai(){
        return $this->belongsToMany(BaiTuyenDung::class,'luu_bai','nguoi_tim_viec_id','bai_tuyen_dung_id');
    }
    public function getBaoCao(){
        return $this->belongsToMany(NhaTuyenDung::class,'bao_cao','nguoi_tim_viec_id','nha_tuyen_dung_id');

    }
    //lấy địa điểm
    public function getDiaDiem(){
        return $this->belongsTo(DiaDiem::class,'dia_diem_id');
    }
    //lấy bằng cấp
    public function getBangCap(){
        return $this->belongsTo(BangCap::class,'bang_cap_id');
    }
    //lấy kiểu công việc
    public function getKieuLamViec(){
        return $this->belongsTo(KieuLamViec::class,'kieu_lam_viec_id');
    }
}
