<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NganhNghe extends Model
{
    protected $table = 'nganh_nghe';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name', 'mo_ta'];
    //
//    public function nh(){
//        return $this->belongsTo(TaiKhoan::class,'tai_khoan_id');
//    }
    public function getCongTy(){
        return $this->belongsToMany(CongTy::class,'nganh_nghe_cong_ty','nganh_nghe_id','cong_ty_id');
    }
    public function getCongTyId(){
        return $this->getCongTy->pluck('id');
    }
    public function getNhaTuyenDung(){
        return $this->belongsToMany(NhaTuyenDung::class,'nganh_nghe_nha_tuyen_dung','nganh_nghe_id','nha_tuyen_dung_id');
    }
    public function getNhaTuyenDungId(){
        return $this->getNhaTuyenDung->pluck('id');
    }

    public function getBaiTuyenDung(){
        return $this->belongsToMany(BaiTuyenDung::class,'bai_tuyen_dung_nganh_nghe','nganh_nghe_id','bai_tuyen_dung_id');
    }
    public function getBaiTuyenDungId(){
        return $this->getBaiTuyenDung->pluck('id');
    }
}
