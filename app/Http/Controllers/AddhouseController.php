<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addhouse;
use Carbon\Carbon;

class AddhouseController extends Controller
{

  function addhouseview($product_id){
    return view('addhouse/addhouseview', compact('product_id'));
  }

    function addhouseinsert(Request $request){
      $request -> validate([
        'houseno' => 'required',
        'roadno' => 'required',
        'thana' => 'required',
        'city' => 'required',
        'pcode' => 'required',
        'district' => 'required'
      ]);
      $last_inserted_id =  Addhouse::insertGetId([
        'product_id' => $request->product_id,
        'housename' => $request->housename,
        'houseno' => $request->houseno,
        'roadno' => $request->roadno,
        'thana' => $request->thana,
        'city' => $request->city,
        'pcode' => $request->pcode,
        'district' => $request->district,
        'created_at' => Carbon::now()
      ]);

      return back()->with('status', 'Product Inserted Successfully!');
    }

    function houseviewdata($product_id){
      $house_info_all = Addhouse::where('product_id',$product_id)->paginate(5);
      return view('addhouse/viewdata', compact('house_info_all'));
    }

    function addhouseeditdata($addhouse_id){
      $single_house_info = Addhouse::where('id',$addhouse_id)->first();
      return view('addhouse/editdata', compact('single_house_info'));
    }

    function editaddhouseproductinsert(Request $request){
      $request -> validate([
        'houseno' => 'required',
        'roadno' => 'required',
        'thana' => 'required',
        'city' => 'required',
        'pcode' => 'required',
        'district' => 'required'
      ]);

      Addhouse::find($request->id)->update([
        'housename' => $request->housename,
        'houseno' => $request->houseno,
        'roadno' => $request->roadno,
        'thana' => $request->thana,
        'city' => $request->city,
        'pcode' => $request->pcode,
        'district' => $request->district,
      ]);
      return back()->with('status', 'Product Edited Successfully!');
    }

    function addhousedeletedata($addhouse_id){
      Addhouse::where('id',$addhouse_id)->first()->delete();
      return back()-> with('deletestatus','Product deleted successfully!');
    }

}
