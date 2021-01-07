<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiThe extends Model
{
    protected $table = 'loai_the';
    protected $primaryKey  = 'id';
    protected $fillable = ['name','value'];
    public $timestamps = false;
//    protected $attributes = [
//        'tong_tien'=>'0',
//    ];
    //
    public function getNapThe(){
        return $this->hasMany(NapThe::class,'loai_the_id');
    }
}
