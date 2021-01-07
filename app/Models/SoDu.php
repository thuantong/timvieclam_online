<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SoDu extends Model
{
    protected $table = 'so_du';
    protected $primaryKey  = 'id';
    protected $fillable = ['tong_tien','ten_tai_khoan'];
    public $timestamps = false;
    protected $attributes = [
        'tong_tien'=>'0',
    ];
    public function getNguoiTimViec(){
        return $this->belongsTo(NguoiTimViec::class,'nguoi_tim_viec_id');
    }
    public function getNguoiTimViecId(){
        return $this->getNguoiTimViec->pluck('id');
    }
    public function getNhaTuyenDung(){
        return $this->belongsTo(NhaTuyenDung::class,'nha_tuyen_dung_id');
    }
    public function getNhaTuyenDungId(){
        return $this->getNhaTuyenDung->pluck('id');
    }

}
