<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KinhNghiem extends Model
{
    protected $table = 'kinh_nghiem';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'mo_ta'];
    public function getBaiTuyenDung(){
        return $this->hasMany(BaiTuyenDung::class,'kinh_nghiem_id');
    }
    //
}
