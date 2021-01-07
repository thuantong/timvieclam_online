<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobsModel extends Model
{
    protected $table = 'jobs';
    protected $primaryKey  = 'id';
    protected $attributes = [
        'isConfirm' => 0,
        'isHot' => 0,
        'gioi_tinh' => 0,
    ];
    public $timestamps = true;
    protected $fillable = ['tieu_de', 'luong', 'khu_vuc', 'han_tuyen', 'chuc_vu', 'kieu_lam_viec', 'so_luong_tuyen', 'nganh_nghe', 'kinh_nghiem', 'gioi_tinh', 'gioi_tinh_text', 'bang_cap', 'mo_ta', 'quyen_loi', 'yeu_cau_cong_viec', 'yeu_cau_ho_so', 'skill_basic', 'status', 'status_text', 'employer_id', 'isConfirm', 'isConfirm_text', 'isHot', 'isHot_text'];

    //
}
