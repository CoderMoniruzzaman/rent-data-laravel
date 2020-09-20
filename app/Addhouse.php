<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addhouse extends Model
{
  protected $fillable = ['housename','houseno','roadno','thana','city','pcode','district'];
}
