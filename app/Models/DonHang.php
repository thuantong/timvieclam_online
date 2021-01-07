<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hang';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['so_luong', 'tong_tien'];
    //
    public function getHangMucThanhToan(){
        return $this->belongsTo(HangMucThanhToan::class,'hang_muc_thanh_toan_id');
    }

    public function getNhaTuyenDung(){
        return $this->belongsTo(NhaTuyenDung::class,'nha_tuyen_dung_id');
    }

    public function getBaiTuyenDung(){
        return $this->belongsTo(BaiTuyenDung::class,'bai_tuyen_dung_id');
    }
}
