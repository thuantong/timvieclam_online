<?php

namespace App\ApiModel\English;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table="part";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name'];
}
