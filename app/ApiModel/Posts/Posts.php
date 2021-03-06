<?php

namespace App\ApiModel\Posts;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table="post_blog";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['title','sub_content','content'];
}
