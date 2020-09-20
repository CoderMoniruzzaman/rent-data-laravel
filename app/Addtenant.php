<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addtenant extends Model
{
  protected $fillable = ['division_id','addhouse_id','thana','flatno','tenantname','fname',
      'mstatus','dob','permanentaddr','jobaddr','religion','education','mbno','emailid','passportno',
      'nid','impcontact','relation','impaddr','impmbno','fmembername_one','fmemberage_one',
    'fmemberjob_one','fmembermbno_one','fmembername_two','fmemberage_two','fmemberjob_two',
  'fmembermbno_two','fmembername_three','fmemberage_three','fmemberjob_three','fmembermbno_three',
'maidname','maidnid','maidmbno','maidpaddr','drname','drnid','drmbno','drpaddr','prellname',
'prellmbno','prelladdr','leavereason','newllname','newllmbno','newdate','datebottom','photograph','signature'];
}
