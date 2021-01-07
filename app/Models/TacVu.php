<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TacVu extends Model
{
    protected $table = 'tac_vu';
    protected $primaryKey  = 'id';
    protected $fillable = ['name','mo_ta'];
    public $timestamps = false;

    public function getPhanQuyen(){
        return $this->belongsToMany(PhanQuyen::class, 'tac_vu_phan_quyen','tac_vu_id','phan_quyen_id');
    }

    public function getPhanQuyenId(){
        return $this->getPhanQuyen->pluck('id');
    }
    //
}
