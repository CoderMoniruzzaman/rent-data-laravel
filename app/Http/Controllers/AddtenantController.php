<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addtenant;
use App\Addhouse;
use App\Division;
use Carbon\Carbon;
use Image;

class AddtenantController extends Controller
{
    function addtenantview($product_id){

      $house_info_all = Addhouse::where('product_id',$product_id)->get();

      $all_divisions = Division::all();
      return view('addtenant/addtenantview', compact('product_id','all_divisions','house_info_all'));
    }

    function addtenantinsert(Request $request){

      $request -> validate([
        'flatno' => 'required',
        'division_id' => 'required',
        'addhouse_id' => 'required',
        'thana' => 'required',
        'tenantname' => 'required',
        'fname' => 'required',
        'mstatus' => 'required',
        'permanentaddr' => 'required',
        'jobaddr' => 'required',
        'religion' => 'required',
        'education' => 'required',
        'mbno' => 'required'
      ]);

      $last_inserted_id =  Addtenant::insertGetId([
        'product_id' => $request->product_id,
        'division_id' => $request->division_id,
        'addhouse_id' => $request->addhouse_id,
        'thana' => $request->thana,
        'flatno' => $request->flatno,
        'tenantname' => $request->tenantname,
        'fname' => $request->fname,
        'mstatus' => $request->mstatus,
        'dob' => $request->dob,
        'permanentaddr' => $request->permanentaddr,
        'jobaddr' => $request->jobaddr,
        'religion' => $request->religion,
        'education' => $request->education,
        'mbno' => $request->mbno,

        'emailid' => $request->emailid,
        'passportno' => $request->passportno,
        'nid' => $request->nid,
        'impcontact' => $request->impcontact,
        'relation' => $request->relation,
        'impaddr' => $request->impaddr,
        'impmbno' => $request->impmbno,

        'fmembername_one' => $request->fmembername_one,
        'fmemberage_one' => $request->fmemberage_one,
        'fmemberjob_one' => $request->fmemberjob_one,
        'fmembermbno_one' => $request->fmembermbno_one,

        'fmembername_two' => $request->fmembername_two,
        'fmemberage_two' => $request->fmemberage_two,
        'fmemberjob_two' => $request->fmemberjob_two,
        'fmembermbno_two' => $request->fmembermbno_two,

        'fmembername_three' => $request->fmembername_three,
        'fmemberage_three' => $request->fmemberage_three,
        'fmemberjob_three' => $request->fmemberjob_three,
        'fmembermbno_three' => $request->fmembermbno_three,

        'maidname' => $request->maidname,
        'maidnid' => $request->maidnid,
        'maidmbno' => $request->maidmbno,
        'maidpaddr' => $request->maidpaddr,

        'drname' => $request->drname,
        'drnid' => $request->drnid,
        'drmbno' => $request->drmbno,
        'drpaddr' => $request->drpaddr,

        'prellname' => $request->prellname,
        'prellmbno' => $request->prellmbno,
        'prelladdr' => $request->prelladdr,
        'leavereason' => $request->leavereason,

        'newllname' => $request->newllname,
        'newllmbno' => $request->newllmbno,
        'newdate' => $request->newdate,
        'datebottom' => $request->datebottom,

        'created_at' => Carbon::now()
      ]);

      if($request->hasfile('photograph')){
        $photo_to_upload = $request->photograph;

        $filename = $last_inserted_id.".".$photo_to_upload->getClientOriginalExtension();

        Image::make($photo_to_upload)->resize(200,230)->save(base_path('public/uploads/tenant_photos/'.$filename),100);
        Addtenant::find($last_inserted_id)->update([
          'photograph' => $filename
        ]);
      }

      if($request->hasfile('signature')){
        $photo_to_upload_signature = $request->signature;

        $filename_signature = $last_inserted_id."h".".".$photo_to_upload_signature->getClientOriginalExtension();

        Image::make($photo_to_upload_signature)->resize(250,350)->save(base_path('public/uploads/tenant_photos/'.$filename_signature),100);
        Addtenant::find($last_inserted_id)->update([
          'signature' => $filename_signature
        ]);
      }

      return back()->with('status', 'Product Inserted Successfully!');
    }

    function tenantviewdata($product_id){
      $tenant_info_all = Addtenant::where('product_id',$product_id)->paginate(5);
      return view('addtenant/viewdata', compact('tenant_info_all'));
    }
    function tenantviewdatasingle($tenant_id){
      $tenant_info_single = Addtenant::find($tenant_id);
      return view('addtenant/viewdatasingle', compact('tenant_info_single'));
    }

    function tenanteditdata($tenant_id){
      $all_divisions = Division::all();
      $house_info_all = Addhouse::where('product_id',Addtenant::find($tenant_id)->product_id)->get();

      $single_tenant_info = Addtenant::find($tenant_id);
      return view('addtenant/editdata', compact('single_tenant_info','all_divisions','house_info_all'));
    }

    function edittenantproductinsert(Request $request){

      print_r($request->all());

      $request -> validate([
        'flatno' => 'required',
        'division_id' => 'required',
        'addhouse_id' => 'required',
        'thana' => 'required',
        'tenantname' => 'required',
        'fname' => 'required',
        'mstatus' => 'required',
        'permanentaddr' => 'required',
        'jobaddr' => 'required',
        'religion' => 'required',
        'education' => 'required',
        'mbno' => 'required'
      ]);

      if($request->hasFile('photograph')){
          if(Addtenant::find($request->id)->photograph == 'defaultphoto.jpg'){
            $photo_to_upload = $request->photograph;
            $filename = $request->id.".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(200,230)->save(base_path('public/uploads/tenant_photos/'.$filename),100);
            Addtenant::find($request->id)->update([
            'photograph' => $filename
            ]);
        }
        else{
            $delete_this_file = Addtenant::find($request->id)->photograph;
            unlink(base_path('public/uploads/tenant_photos/'.$delete_this_file));

            $photo_to_upload = $request->photograph;
            $filename = $request->id.".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(200,230)->save(base_path('public/uploads/tenant_photos/'.$filename),100);
            Addtenant::find($request->id)->update([
            'photograph' => $filename
            ]);
        }
      }

      if($request->hasFile('signature')){
          if(Addtenant::find($request->id)->signature == 'defaultsig.jpg'){
            $photo_to_upload = $request->signature;
            $filename = $request->id."h".".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(150,80)->save(base_path('public/uploads/tenant_photos/'.$filename),100);
            Addtenant::find($request->id)->update([
            'signature' => $filename
            ]);
        }
        else{
            $delete_this_file = Addtenant::find($request->id)->signature;
            unlink(base_path('public/uploads/tenant_photos/'.$delete_this_file));

            $photo_to_upload = $request->signature;
            $filename = $request->id."h".".".$photo_to_upload->getClientOriginalExtension();
            Image::make($photo_to_upload)->resize(150,80)->save(base_path('public/uploads/tenant_photos/'.$filename),100);
            Addtenant::find($request->id)->update([
            'signature' => $filename
            ]);
        }
      }

      Addtenant::find($request->id)->update([
        'product_id' => $request->product_id,
        'division_id' => $request->division_id,
        'addhouse_id' => $request->addhouse_id,
        'thana' => $request->thana,
        'flatno' => $request->flatno,
        'tenantname' => $request->tenantname,
        'fname' => $request->fname,
        'mstatus' => $request->mstatus,
        'dob' => $request->dob,
        'permanentaddr' => $request->permanentaddr,
        'jobaddr' => $request->jobaddr,
        'religion' => $request->religion,
        'education' => $request->education,
        'mbno' => $request->mbno,

        'emailid' => $request->emailid,
        'passportno' => $request->passportno,
        'nid' => $request->nid,
        'impcontact' => $request->impcontact,
        'relation' => $request->relation,
        'impaddr' => $request->impaddr,
        'impmbno' => $request->impmbno,

        'fmembername_one' => $request->fmembername_one,
        'fmemberage_one' => $request->fmemberage_one,
        'fmemberjob_one' => $request->fmemberjob_one,
        'fmembermbno_one' => $request->fmembermbno_one,

        'fmembername_two' => $request->fmembername_two,
        'fmemberage_two' => $request->fmemberage_two,
        'fmemberjob_two' => $request->fmemberjob_two,
        'fmembermbno_two' => $request->fmembermbno_two,

        'fmembername_three' => $request->fmembername_three,
        'fmemberage_three' => $request->fmemberage_three,
        'fmemberjob_three' => $request->fmemberjob_three,
        'fmembermbno_three' => $request->fmembermbno_three,

        'maidname' => $request->maidname,
        'maidnid' => $request->maidnid,
        'maidmbno' => $request->maidmbno,
        'maidpaddr' => $request->maidpaddr,

        'drname' => $request->drname,
        'drnid' => $request->drnid,
        'drmbno' => $request->drmbno,
        'drpaddr' => $request->drpaddr,

        'prellname' => $request->prellname,
        'prellmbno' => $request->prellmbno,
        'prelladdr' => $request->prelladdr,
        'leavereason' => $request->leavereason,

        'newllname' => $request->newllname,
        'newllmbno' => $request->newllmbno,
        'newdate' => $request->newdate,
        'datebottom' => $request->datebottom,
        'created_at' => Carbon::now()
      ]);
      return back()->with('status', 'Product Edited Successfully!');
    }

    function tenantdeletedata($tenant_id){
      Addtenant::find($tenant_id)->delete();
      return back()-> with('deletestatus','Product deleted successfully!');

    }
}
