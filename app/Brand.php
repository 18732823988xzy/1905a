<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $primaryKey='brand_id';

    protected $table='brand';

    public $timestamps=false;


    //白名单表设计中允许为空的
//    protected $fillable=[''];
    //黑名单表设计中允许为空的
    protected $guarded = [''];

}
