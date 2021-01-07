<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CongTy extends Model
{
    protected $table = 'cong_ty';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'dia_chi',
        'websites',
        'fax',
        'phone',
        'gio_lam_viec',
        'ngay_lam_viec',
        'so_nhan_vien',
        'so_chi_nhanh',
        'dia_chi_chi_nhanh',
        'logo',
        'gioi_thieu',
        'status',
        'nam_thanh_lap',
    ];

    protected $attributes = [
        'status' => 1,//đang hoạt động
    ];

    public function getNganhNghe()
    {
        return $this->belongsToMany(NganhNghe::class, 'nganh_nghe_cong_ty', 'cong_ty_id', 'nganh_nghe_id');
    }

    public function getNganhNgheId()
    {
        return $this->getNganhNghe->pluck('id');
    }

    //lấy nhà tuyền dụng
    public function getNhaTuyenDung()
    {
        return $this->belongsTo(NhaTuyenDung::class,'nha_tuyen_dung_id');
    }
    public function getNhaTuyenDungId()
    {
        return $this->getNhaTuyenDung->pluck('id');
    }
    public  function getBaiTuyenDung(){
        return $this->hasOne(BaiTuyenDung::class,'cong_ty_id');
    }
    public function getQuyMoNhanSu(){
        return $this->belongsTo(QuyMoNhanSu::class,'so_nhan_vien');
    }

}
