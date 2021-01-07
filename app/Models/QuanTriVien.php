<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanTriVien extends Model
{
    protected $table = 'quan_tri_vien';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    protected $fillable = [
//        'ho_ten',
        'dia_chi',
        'cap_bac'];

    //lấy tin nhắn người tìm việc
    public function getTinNhanNguoiTimViec(){
        return $this->belongsToMany(NguoiTimViec::class,'tin_nhan','quan_tri_vien_id','nguoi_tim_viec_id');
    }
    //lấy tin nhắn nhà tuyển dụng
    public function getTinNhanNhaTuyenDung(){
        return $this->belongsToMany(NhaTuyenDung::class,'tin_nhan','quan_tri_vien_id','nha_tuyen_dung_id');
    }
    public function getTaiKhoan(){
        return $this->belongsTo(TaiKhoan::class,'tai_khoan_id');
    }
}
