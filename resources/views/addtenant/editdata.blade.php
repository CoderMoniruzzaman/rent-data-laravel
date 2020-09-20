@extends('layouts/App')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-10 offset-1">
        <div class="card">
          <div class="card-header bg-success">
            Tenant Information Edit Form
          </div>
          <div class="card-body">

            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status')}}
            </div>
            @endif

            @if($errors->all())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('edit/tenant/product/insert') }}" method="post" enctype="multipart/form-data">
              @csrf

            <table class="table table-bordered">
              <thead>
                <tr>
                  <input type="hidden" name="product_id" value= "{{ $single_tenant_info->product_id}}">
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="4" >
                    <img src="{{ asset('uploads/tenant_photos')}}/{{$single_tenant_info->photograph}}" alt="not found" width="150">
                    <input type="file"  class="form-control-sm" name="photograph" style="width: 200px" >
                    <br>
                    Tenant Photograph
                  </td>
                </tr>
                <tr>
                    <td nowrap>
                      <img src="{{ asset('uploads/tenant_photos/logo.png')}}" alt="not found" width="50">
                      Dhaka Metropoliton Police
                    </td>
                    <td rowspan="4">
                      <table>
                        <tr>
                          <td>Flat/Floor:</td>
                          <td>
                            <input type="text" class="form-control" name="flatno" value= "{{$single_tenant_info->flatno}}">
                          </td>
                        </tr>
                        <tr>
                          <td>House/Holding:</td>
                          <td>
                            <select class="form-control" name="addhouse_id">
                                <option >Select House</option>
                                @foreach($house_info_all as $house_info)
                                  <option value="{{ $house_info->id}}"{{ $house_info->id == $single_tenant_info->addhouse_id ? 'selected' : '' }}>
                                    {{ $house_info->housename." ,".$house_info->houseno.",".$house_info->roadno.","
                                      .$house_info->thana.",".$house_info->city.",".$house_info->pcode.$house_info->district}}
                                  </option>
                                @endforeach
                            </select>

                          </td>
                        </tr>
                        <tr>
                          <td>Area:</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Post Code:</td>
                          <td></td>
                        </tr>
                      </table>
                    </td>
                </tr>
                <tr>
                  <td>Division:
                    <select class="form-control" name="division_id">
                        <option >Select Division</option>
                        @foreach($all_divisions as $division)
                          <option value="{{ $division->id}}"{{ $division->id == $single_tenant_info->division_id ? 'selected' : '' }}>{{ $division->name}}</option>
                        @endforeach

                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Thana:
                    <input type="hidden" name="id" value="{{$single_tenant_info->id}}">
                    <input type="text" class="form-control" name="thana" value="{{ $single_tenant_info->thana }}">
                  </td>
                </tr>
              </tbody>
            </table>
            <h1 class="text-center"><u>Tenant Registration Form</u></h1>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <br>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>Tenant/Landlord Name :</td>
                    <td colspan="3">
                      <input type="text" class="form-control" name="tenantname" value=" {{ $single_tenant_info->tenantname }}">
                    </td>
                  </tr>
                  <tr>
                    <td>Father's Name :</td>
                    <td colspan="3">
                      <input type="text" class="form-control" name="fname" value=" {{ $single_tenant_info->fname }}">
                    </td>
                  </tr>
                  <tr>
                      <td>Date of Birth :</td>
                      <td>
                        <input type="date" class="form-control" name="dob" value= "">
                      </td>
                      <td>Marital Status :</td>
                      <td>
                        <select class="form-control" name="mstatus">
                          <option value="">Select</option>
                          <option value="1"{{ $single_tenant_info->mstatus == 1 ? 'selected' : '' }}>Unmarried</option>
                          <option value="2"{{ $single_tenant_info->mstatus == 2 ? 'selected' : '' }}>Married</option>
                          <option value="3"{{ $single_tenant_info->mstatus == 3 ? 'selected' : '' }}>Divorced</option>
                          <option value="4"{{ $single_tenant_info->mstatus == 4 ? 'selected' : '' }}>Widow/Widower</option>
                        </select>
                      </td>
                  </tr>
                <tr>
                  <td>Parmanent Address:</td>
                  <td colspan="3">
                    <textarea name="permanentaddr" rows="2" class="form-control">{{$single_tenant_info->permanentaddr}}</textarea>
                  </td>
                </tr>
                <tr>
                  <td>Service & Office Address:</td>
                  <td colspan="3">
                    <textarea name="jobaddr" rows="2" class="form-control">{{ $single_tenant_info->jobaddr}}</textarea>
                  </td>
                </tr>
                <tr>
                  <td>Religion: </td>
                  <td>
                    <input type="text" class="form-control" name="religion" value= "{{$single_tenant_info->religion}}">
                  </td>
                  <td>Educational Qualification: </td>
                  <td>
                    <input type="text" class="form-control" name="education" value= "{{$single_tenant_info->education}}">
                  </td>
                </tr>
                <tr>
                  <td>Mobile No. </td>
                  <td>
                    <input type="text" class="form-control" name="mbno" value= "{{$single_tenant_info->mbno}}">
                  </td>
                  <td>Email ID: </td>
                  <td>
                    <input type="email" class="form-control" name="emailid" value= "{{$single_tenant_info->emailid}}">
                  </td>
                </tr>
                <tr>
                  <td>National ID No:</td>
                  <td colspan="3">
                    <input type="text" class="form-control" name="nid" value= "{{$single_tenant_info->nid}}">
                  </td>
                </tr>
                <tr>
                  <td>Passport No(if available):</td>
                  <td colspan="3">
                    <input type="text" class="form-control" name="passportno" value= "{{$single_tenant_info->passportno}}">
                  </td>
                </tr>
                <tr>
                  <td>Emergency Contact:</td>
                </tr>
                <tr>
                  <td>Name: </td>
                  <td>
                    <input type="text" class="form-control" name="impcontact" value= "{{$single_tenant_info->impcontact}}">
                  </td>
                  <td>Relation: </td>
                  <td>
                    <input type="text" class="form-control" name="relation" value= "{{$single_tenant_info->relation}}">
                  </td>
                </tr>
                <tr>
                  <td>Address: </td>
                  <td>
                    <textarea name="impaddr" rows="1" class="form-control">{{$single_tenant_info->impaddr}}</textarea>
                  </td>
                  <td>Mobile No: </td>
                  <td>
                    <input type="text" class="form-control" name="impmbno" value= "{{$single_tenant_info->impmbno}}">
                  </td>
                </tr>
                <tr>
                  <td>Family/Mess Member Information :</td>
                </tr>
                <tr>
                  <td colspan="4">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Service</th>
                            <th>Mobile No</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>1</th>
                            <td><input type="text" class="form-control" name="fmembername_one" value= "{{$single_tenant_info->fmembername_one}}"></td>
                            <td><input type="text" class="form-control" name="fmemberage_one" value= "{{$single_tenant_info->fmemberage_one}}"></td>
                            <td><input type="text" class="form-control" name="fmemberjob_one" value= "{{$single_tenant_info->fmemberjob_one}}"></td>
                            <td><input type="text" class="form-control" name="fmembermbno_one" value= "{{$single_tenant_info->fmembermbno_one}}"></td>
                          </tr>
                          <tr>
                            <th>2</th>
                            <td><input type="text" class="form-control" name="fmembername_two" value= "{{$single_tenant_info->fmembername_two}}"></td>
                            <td><input type="text" class="form-control" name="fmemberage_two" value= "{{$single_tenant_info->fmemberage_two}}"></td>
                            <td><input type="text" class="form-control" name="fmemberjob_two" value= "{{$single_tenant_info->fmemberjob_two}}"></td>
                            <td><input type="text" class="form-control" name="fmembermbno_two" value= "{{$single_tenant_info->fmembermbno_two}}"></td>
                          </tr>
                          <tr>
                            <th>3</th>
                            <td><input type="text" class="form-control" name="fmembername_three" value= "{{$single_tenant_info->fmembername_three}}"></td>
                            <td><input type="text" class="form-control" name="fmemberage_three" value= "{{$single_tenant_info->fmemberage_three}}"></td>
                            <td><input type="text" class="form-control" name="fmemberjob_three" value= "{{$single_tenant_info->fmemberjob_three}}"></td>
                            <td><input type="text" class="form-control" name="fmembermbno_three" value= "{{$single_tenant_info->fmembermbno_three}}"></td>
                          </tr>
                        </tbody>
                      </table>
                  </td>
                </tr>
                <tr>
                  <td>Maid Name: </td>
                  <td>
                    <input type="text" class="form-control" name="maidname" value= "{{$single_tenant_info->maidname}}">
                  </td>
                  <td>National ID No: </td>
                  <td>
                    <input type="text" class="form-control" name="maidnid" value= "{{$single_tenant_info->maidnid}}">
                  </td>
                </tr>
                <tr>
                  <td>Mobile No: </td>
                  <td>
                    <input type="text" class="form-control" name="maidmbno" value= "{{$single_tenant_info->maidmbno}}">
                  </td>
                  <td>Permanent Address: </td>
                  <td>
                    <textarea name="maidpaddr" rows="1" class="form-control">{{$single_tenant_info->maidpaddr}}</textarea>
                  </td>
                  </tr>
                  <tr>
                    <td>Driver Name: </td>
                    <td>
                      <input type="text" class="form-control" name="drname" value= "{{$single_tenant_info->drname}}">
                    </td>
                    <td>National ID No: </td>
                    <td>
                      <input type="text" class="form-control" name="drnid" value= "{{$single_tenant_info->drnid}}">
                    </td>
                  </tr>
                  <tr>
                    <td>Mobile No: </td>
                    <td>
                      <input type="text" class="form-control" name="drmbno" value= "{{$single_tenant_info->drmbno}}">
                    </td>
                    <td>Permanent Address: </td>
                    <td>
                      <textarea name="drpaddr" rows="1" class="form-control">{{$single_tenant_info->drpaddr}}</textarea>
                    </td>
                    </tr>
                    <tr>
                      <td>Previous Landlord Name: </td>
                      <td>
                        <input type="text" class="form-control" name="prellname" value= "{{$single_tenant_info->prellname}}">
                      </td>
                      <td>Mobile No: </td>
                      <td>
                        <input type="text" class="form-control" name="prellmbno" value= "{{$single_tenant_info->prellmbno}}">
                      </td>
                    </tr>
                    <tr>
                      <td >Address: </td>
                      <td colspan="4">
                        <textarea name="prelladdr" rows="1" class="form-control">{{$single_tenant_info->prelladdr}}</textarea>
                      </td>
                      </tr>
                      <tr>

                        <td >Reason for leaving Previous home: </td>
                        <td colspan="4">
                          <textarea name="leavereason" rows="1" class="form-control">{{$single_tenant_info->leavereason}}</textarea>
                        </td>
                        </tr>
                        <tr>
                          <td>Present Landlord Name: </td>
                          <td>
                            <input type="text" class="form-control" name="newllname" value= "{{$single_tenant_info->newllname}}">
                          </td>
                          <td>Mobile No: </td>
                          <td>
                            <input type="text" class="form-control" name="newllmbno" value= "{{$single_tenant_info->newllmbno}}">
                          </td>
                        </tr>
                        <tr>
                            <td>Date of Living in the new home:</td>
                            <td>
                              <input type="date" class="form-control" name="newdate" value= "">
                            </td>
                        </tr>
                        <tr>
                          <br>
                          <br>
                            <td>
                              <br><br><br>
                              <input type="date" class="form-control" name="datebottom" value= "">
                              Date
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                              <img src="{{ asset('uploads/tenant_photos')}}/{{$single_tenant_info->signature}}" alt="not found" width="150">
                              <input type="file" class="form-control"  name="signature">
                              Tenant Signature
                            </td>
                        </tr>
                </tbody>
              </table>

                <button type="submit" class="btn btn-info">Submit</button>
              </form>
          </div>

        </div>

      </div>

    </div>

  </div>
@endsection
