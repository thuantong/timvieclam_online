<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiTaiKhoan extends Model
{
    protected $table = 'loai_tai_khoan';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['name', 'prefix','role_id','account_id'];

    //
}
