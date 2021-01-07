<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuyetBai extends Model
{
    protected $table = 'duyet_bai';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['status','noi_dung'];
    protected $attributes = [
        'isReject' => 0,
    ];
    //
    public function getBaiTuyenDung(){
        return $this->belongsTo(BaiTuyenDung::class,'bai_dang_id');
    }
}
