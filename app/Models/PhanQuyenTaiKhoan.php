<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanQuyenTaiKhoan extends Model
{
    protected $table = 'phan_quyen_tai_khoan';
    protected $primaryKey  = 'id';

    protected $fillable = [
        'tai_khoan_id', 'phan_quyen_id'
    ];
    //
}
