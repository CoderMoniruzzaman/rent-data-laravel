<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addtenant;
use App\Addhouse;
use App\Division;
use Carbon\Carbon;
use Image;

class AdmintenantController extends Controller
{
  function admintenantviewdata(){
    $tenant_info_all = Addtenant::paginate(20);
    return view('admin/viewdata', compact('tenant_info_all'));
  }

  function getsearchdata(Request $request){
    $string_to_send="";
    $tenant_info_all = Addtenant::where('tenantname', 'like', '%' . $request->search_id . '%')
                                ->orWhere('fname', 'like', '%' . $request->search_id . '%')->get();

    foreach($tenant_info_all as $tenant_info){
      $string_to_send .= Addtenant::find($tenant_info->id);
    }
    return view('admin/viewdata', compact('string_to_send'));
  }
}
