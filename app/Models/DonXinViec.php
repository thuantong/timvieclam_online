<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonXinViec extends Model
{
    protected $table = 'don_xin_viec';
    protected $primaryKey = 'id';
//    protected $dateFormat = 'Y-m-d H+7:i:sO';
    public $timestamps = true;
    protected $fillable = [
        'file','ngay_phong_van','thoi_gian_phong_van','kinh_nghiem_lam_viec'
        ];
    protected $attributes = [
        'status' => 0,
    ];

    public function getBaiTuyenDung(){
        return $this->belongsTo(BaiTuyenDung::class,'bai_tuyen_dung_id');
    }
    public function getNguoiTimViec(){
        return $this->belongsTo(NguoiTimViec::class,'nguoi_tim_viec_id');

    }

}
