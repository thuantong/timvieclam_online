<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TacVuPhanQuyen extends Model
{
    protected $table = 'tac_vu_phan_quyen';
    protected $primaryKey  = 'id';

    protected $fillable = [
        'tac_vu_id', 'phan_quyen_id'
    ];
}
