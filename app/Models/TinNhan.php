<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinNhan extends Model
{
    protected $table = 'tin_nhan';
    protected $primaryKey  = 'id';
    public $timestamps = true;

    protected $fillable = [
        'noi_dung','status','tai_khoan_id','to_tai_khoan_id'
    ];

    public function getTaiKhoan(){
        return $this->belongsTo(TaiKhoan::class,'tai_khoan_id');
    }
    //
}
