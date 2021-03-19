<?php

namespace App\ApiModel\English;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table="question";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name','a','b','c','d','correct','name_trans','a_trans','b_trans','c_trans','d_trans','descipt','image','audio','topic_id','part_id'];
    public function getTopic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
