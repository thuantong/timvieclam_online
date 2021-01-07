<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'chuc_vu';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'mo_ta'];

    public function getBaiTuyenDung(){
        return $this->hasMany(BaiTuyenDung::class,'chuc_vu_id');
    }
    //
}
