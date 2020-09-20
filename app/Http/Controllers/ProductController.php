<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    function producthome(){
      return view('product/home');
    }
    function addproductlandlordview($product_id){
      return view('product/landlordview', compact('product_id'));
    }
    function addproductinsert(Request $request){

      $request -> validate([
        'name' => 'required',
        'phone' => 'required',
        'etin' => 'required',
        'occupation' => 'required',
        'nid' => 'unique:products,nid'
      ]);
      $last_inserted_id =  Product::insertGetId([
        'product_id' => $request->product_id,
        'name' => $request->name,
        'phone' => $request->phone,
        'nid' => $request->nid,
        'etin' => $request->etin,
        'occupation' => $request->occupation,

        'house_h' => $request->house_h,
        'road_h' => $request->road_h,
        'thana_h' => $request->thana_h,
        'city_h' => $request->city_h,
        'pcode_h' => $request->pcode_h,
        'district_h' => $request->district_h,

        'house_p' => $request->house_p,
        'road_p' => $request->road_p,
        'thana_p' => $request->thana_p,
        'city_p' => $request->city_p,
        'pcode_p' => $request->pcode_p,
        'district_p' => $request->district_p,
        'created_at' => Carbon::now()

      ]);

      if($request->hasfile('photograph')){
        $photo_to_upload = $request->photograph;

        $filename = $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();

        Image::make($photo_to_upload)->resize(200,230)->save(base_path('public/uploads/product_photos/'.$filename),100);
        Product::find($last_inserted_id)->update([
          'photograph' => $filename
        ]);
      }

      if($request->hasfile('house_pic')){
        $photo_to_upload_house = $request->house_pic;

        $filename_house = $last_inserted_id."h".".".$photo_to_upload_house->getClientOriginalExtension();

        Image::make($photo_to_upload_house)->resize(250,350)->save(base_path('public/uploads/product_house/'.$filename_house),100);
        Product::find($last_inserted_id)->update([
          'house_pic' => $filename_house
        ]);
      }
       return back()->with('status', 'Product Inserted Successfully!');
    }

    function productviewdata($product_id){
      $single_product_info = Product::where('product_id',$product_id)->first();
      return view('product/viewdata', compact('single_product_info'));
    }

    function producteditdata($product_id){
      $single_product_info = Product::where('product_id',$product_id)->first();
      return view('product/editdata', compact('single_product_info'));
    }

    function editproductinsert(Request $request){
      $request -> validate([
        'name' => 'required',
        'phone' => 'required',
        'etin' => 'required',
        'occupation' => 'required',
      ]);

      if($request->hasFile('photograph')){
          if(Product::where('product_id',$request->product_id)->first()->photograph == 'defaultphoto.jpg'){
            $photo_to_upload = $request->photograph;
            $filename = $request->product_id.".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(200,230)->save(base_path('public/uploads/product_photos/'.$filename),100);
            Product::where('product_id',$request->product_id)->first()->update([
            'photograph' => $filename
            ]);
        }
        else{
            $delete_this_file = Product::where('product_id',$request->product_id)->first()->photograph;
            unlink(base_path('public/uploads/product_photos/'.$delete_this_file));

            $photo_to_upload = $request->photograph;
            $filename = $request->product_id.".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(200,230)->save(base_path('public/uploads/product_photos/'.$filename),100);
            Product::where('product_id',$request->product_id)->first()->update([
            'photograph' => $filename
            ]);
        }
      }

      if($request->hasFile('house_pic')){
          if(Product::where('product_id',$request->product_id)->first()->house_pic == 'defaultpic.jpg'){
            $photo_to_upload = $request->house_pic;
            $filename = $request->product_id."h".".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(200,220)->save(base_path('public/uploads/product_house/'.$filename),100);
            Product::where('product_id',$request->product_id)->first()->update([
            'house_pic' => $filename
            ]);
        }
        else{
            $delete_this_file = Product::where('product_id',$request->product_id)->first()->house_pic;
            unlink(base_path('public/uploads/product_house/'.$delete_this_file));

            $photo_to_upload = $request->house_pic;
            $filename = $request->product_id."h".".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(200,220)->save(base_path('public/uploads/product_house/'.$filename),100);
            Product::where('product_id',$request->product_id)->first()->update([
            'house_pic' => $filename
            ]);
        }
      }

      Product::where('product_id',$request->product_id)->first()->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'etin' => $request->etin,
        'occupation' => $request->occupation,

        'house_h' => $request->house_h,
        'road_h' => $request->road_h,
        'thana_h' => $request->thana_h,
        'city_h' => $request->city_h,
        'pcode_h' => $request->pcode_h,
        'district_h' => $request->district_h,

        'house_p' => $request->house_p,
        'road_p' => $request->road_p,
        'thana_p' => $request->thana_p,
        'city_p' => $request->city_p,
        'pcode_p' => $request->pcode_p,
        'district_p' => $request->district_p,
        'created_at' => Carbon::now()

      ]);
      return back()-> with('status','Product edited successfully!');
    }

    function productdeletedata($product_id){
      Product::where('product_id',$product_id)->first()->delete();
      return back()-> with('deletestatus','Product deleted successfully!');
    }
}
