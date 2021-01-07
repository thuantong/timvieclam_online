<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinNhan extends Model
{
    protected $table = 'tin_nhan';
    protected $primaryKey  = 'id';
    public $timestamps = true;

    protected $fillable = [
        'noi_dung','status'
    ];


    //
}
