<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    protected $table = 'thong_bao';
    protected $primaryKey  = 'id';
    public $timestamps = true;
    protected $fillable = ['name','status'];
    protected $casts = [
        'created_at' => 'datetime:H:i - d/m/Y',
        'update_at' => 'datetime:H:i - d/m/Y,',
    ];
    //
}
