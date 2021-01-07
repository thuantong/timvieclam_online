<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    protected $table = 'phan_quyen';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    protected $fillable = ['name','mo_ta'];
    public function getTaiKhoan(){
        return $this->belongsToMany(TaiKhoan::class, 'phan_quyen_tai_khoan','phan_quyen_id','tai_khoan_id');
    }
    public function getTaiKhoanId(){
        return $this->getTaiKhoan->pluck('id');
    }

    public function getTacVu(){
        return $this->belongsToMany(TacVu::class, 'tac_vu_phan_quyen','phan_quyen_id','tac_vu_id');
    }
    public function getTacVuId(){
        return $this->getTacVu->pluck('id');
    }

//    public function tai_khoans()
//    {
//        return $this->belongsToMany(TaiKhoan::class, 'loai_tai_khoan','role_id','account_id');
//    }
//    public function getTaiKhoanIdsAttribute()
//    {
//        return $this->tai_khoans->pluck('id');
//    }
//    protected $attributes = [
//        'status' => 1,
//    ];
    //
}
