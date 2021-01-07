<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HangMucThanhToan extends Model
{
    protected $table = 'hang_muc_thanh_toan';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'gia'];
    //

    public function getDonHang(){
        return $this->hasMany(DonHang::class,'hang_muc_thanh_toan_id');
    }
}
