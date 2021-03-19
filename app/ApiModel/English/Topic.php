<?php

namespace App\ApiModel\English;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table="topic";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name'];
    public function getQuestion()
    {
        return $this->hasMany(Question::class, 'topic_id');
    }
}
