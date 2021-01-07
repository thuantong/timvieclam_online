<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NapThe extends Model
{
    protected $table = 'nap_the';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    protected $fillable = [
        'code','status'
    ];
    protected $attributes = [
        'status'=>0
    ];

    public function getLoaiThe(){
        return $this->belongsTo(LoaiThe::class,'loai_the_id');
    }
    //
}
