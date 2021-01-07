<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KieuLamViec extends Model
{
    protected $table = 'kieu_lam_viec';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'mo_ta'];

    public function getBaiTuyenDung()
    {
        return $this->hasMany(BaiTuyenDung::class, 'kieu_lam_viec_id');
    }

    //lấy người tìm việc
    public function getNguoiTimViec(){
        return $this->hasOne(NguoiTimViec::class,'kieu_lam_viec_id');
    }
    //
}
