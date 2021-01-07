<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaoCao extends Model
{
    protected $table = 'bao_cao';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['mo_ta', 'picture', 'nha_tuyen_dung_id'];

//    protected $attributes = [
//        'isHot' => 0,
//        'status' => 0,
//        'gioi_tinh' => 1,
//    ];
    //
}
