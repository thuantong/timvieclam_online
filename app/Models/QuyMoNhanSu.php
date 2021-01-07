<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuyMoNhanSu extends Model
{
    protected $table = 'quy_mo_nhan_su';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    protected $fillable = [
//        'ho_ten',
        'name',
        'mo_ta'];
    public function getCongTy(){
        return $this->hasMany(CongTy::class,'so_nhan_vien');
    }
    //
}
