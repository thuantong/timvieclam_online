<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SoDu extends Model
{
    protected $table = 'so_du';
    protected $primaryKey  = 'id';
    protected $fillable = ['tong_tien','ten_tai_khoan'];
    public $timestamps = false;
    protected $attributes = [
        'tong_tien'=>'0',
    ];
    public function setSoDu($data)
    {
        $this->ten_tai_khoan = Str::random(12);
        $this->tong_tien = $data['tong_tien'];
        $this->tai_khoan_id = $data['tai_khoan_id'];
        $this->save();
        return $this;
        
    }

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
