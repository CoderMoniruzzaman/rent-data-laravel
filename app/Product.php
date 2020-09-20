<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','phone','etin','occupation','house_h','road_h','thana_h',
    'city_h','pcode_h','district_h','house_p','road_p','thana_p',
    'city_p','pcode_p','district_p','photograph','house_pic' ];
}
