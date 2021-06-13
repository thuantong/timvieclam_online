<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaDiem extends Model
{
    protected $table = 'dia_diem';
    protected $primaryKey  = 'id';
    public $timestamps = false;

    public function getBaiTuyenDung(){
        return $this->hasMany(BaiTuyenDung::class,'dia_diem_id');
    }

    //lấy người tìm việc từ địa điểm id
    public function getNguoiTimViec(){
        return $this->hasOne(NguoiTimViec::class,'dia_diem_id');
    }
    public function getNhaTuyenDung(){
        return $this->hasOne(NhaTuyenDung::class,'dia_diem_id');
    }
}
