<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BangCap extends Model
{
    protected $table = 'bang_cap';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'mo_ta'];

    public function getBaiTuyenDung(){
        return $this->hasMany(BaiTuyenDung::class,'bang_cap_id');
    }

    // lấy người tìm việc từ bằng cấp id
    public function getNguoiTimViec(){
        return $this->hasOne(NguoiTimViec::class,'bang_cal_id');
    }
    //
}
