<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $primaryKey='news_id';

    protected $table='news';

    public $timestamps=false;


    //白名单表设计中允许为空的
//    protected $fillable=[''];
    //黑名单表设计中允许为空的
    protected $guarded = [''];

}
