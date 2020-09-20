@extends('layouts/App')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-10 offset-1">
        <div class="card">
          <div class="card-header bg-success">
            Tenant Registration Form
          </div>
          <div class="card-body">

            @if($errors->all())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status')}}
            </div>
            @endif

            <form action="{{ url('add/tenant/insert') }}" method="post" enctype="multipart/form-data">
              @csrf

            <table class="table table-bordered">
              <thead>
                <tr>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="4" >
                    <br><br><br><br><br><br>
                    <input type="file"  class="form-control-sm" name="photograph" style="width: 200px">
                    <br>
                    Tenant Photograph
                  </td>
                </tr>
                <tr>
                    <td>
                      <img src="{{ asset('uploads/tenant_photos/logo.png')}}" alt="not found" width="50">
                      Dhaka Metropoliton Police
                    </td>
                    <td rowspan="4">
                      <table>
                        <tr>
                          <td>Flat/Floor:</td>
                          <td>
                            <input type="text" class="form-control" name="flatno" value= "">
                          </td>
                        </tr>
                        <tr>
                          <td>House/Holding:</td>
                          <td>
                            <select class="form-control" name="addhouse_id">
                                <option >Select House</option>
                                @foreach($house_info_all as $house_info)
                                  <option value="{{ $house_info->id}}">
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
                          <option value="{{ $division->id}}">{{ $division->name}}</option>
                        @endforeach

                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Thana:
                    <input type="text" class="form-control" name="thana" value= "">
                    <input type="hidden" name="product_id" value= "{{ $product_id}}">
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
                    <input type="text" class="form-control" placeholder="Enter name" name="tenantname" value= "">
                  </td>
                  </tr>
                  <tr>
                    <td>Father's Name :</td>
                    <td colspan="3">
                      <input type="text" class="form-control" placeholder="Enter father's thana" name="fname" value= "">
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
                          <option value="1">Unmarried</option>
                          <option value="2">Married</option>
                          <option value="3">Divorced</option>
                          <option value="4">Widow/Widower</option>
                        </select>
                      </td>
                  </tr>
                <tr>
                  <td>Parmanent Address:</td>
                  <td colspan="3">
                    <textarea name="permanentaddr" rows="2" class="form-control"></textarea>
                  </td>
                </tr>
                <tr>
                  <td>Service & Office Address:</td>
                  <td colspan="3">
                    <textarea name="jobaddr" rows="2" class="form-control"></textarea>
                  </td>
                </tr>
                <tr>
                  <td>Religion: </td>
                  <td>
                    <input type="text" class="form-control"  placeholder="Enter religion" name="religion" value= "">
                  </td>
                  <td>Educational Qualification: </td>
                  <td>
                    <input type="text" class="form-control"  placeholder="Enter educational qualification" name="education" value= "">
                  </td>
                </tr>
                <tr>
                  <td>Mobile No. </td>
                  <td>
                    <input type="text" class="form-control" placeholder="Enter mobile no" name="mbno" value= "">
                  </td>
                  <td>Email ID: </td>
                  <td>
                    <input type="email" class="form-control" placeholder="Enter email ID" name="emailid" value= "">
                  </td>
                </tr>
                <tr>
                  <td>National ID No:</td>
                  <td colspan="3">
                    <input type="text" class="form-control" placeholder="Enter national ID" name="nid" value= "">
                  </td>
                </tr>
                <tr>
                  <td>Passport No(if available):</td>
                  <td colspan="3">
                    <input type="text" class="form-control" placeholder="Enter passport no" name="passportno" value= "">
                  </td>
                </tr>
                <tr>
                  <td>Emergency Contact:</td>
                </tr>
                <tr>
                  <td>Name: </td>
                  <td>
                    <input type="text" class="form-control" placeholder="Enter emergency contact name" name="impcontact" value= "">
                  </td>
                  <td>Relation: </td>
                  <td>
                    <input type="text" class="form-control" placeholder="Enter relation" name="relation" value= "">
                  </td>
                </tr>
                <tr>
                  <td>Address: </td>
                  <td>
                    <textarea name="impaddr" rows="1" class="form-control"></textarea>
                  </td>
                  <td>Mobile No: </td>
                  <td>
                    <input type="text" class="form-control" placeholder="Enter mobile no" name="impmbno" value= "">
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
                            <td><input type="text" class="form-control" name="fmembername_one" value= ""></td>
                            <td><input type="text" class="form-control" name="fmemberage_one" value= ""></td>
                            <td><input type="text" class="form-control" name="fmemberjob_one" value= ""></td>
                            <td><input type="text" class="form-control" name="fmembermbno_one" value= ""></td>
                          </tr>
                          <tr>
                            <th>2</th>
                            <td><input type="text" class="form-control" name="fmembername_two" value= ""></td>
                            <td><input type="text" class="form-control" name="fmemberage_two" value= ""></td>
                            <td><input type="text" class="form-control" name="fmemberjob_two" value= ""></td>
                            <td><input type="text" class="form-control" name="fmembermbno_two" value= ""></td>
                          </tr>
                          <tr>
                            <th>3</th>
                            <td><input type="text" class="form-control" name="fmembername_three" value= ""></td>
                            <td><input type="text" class="form-control" name="fmemberage_three" value= ""></td>
                            <td><input type="text" class="form-control" name="fmemberjob_three" value= ""></td>
                            <td><input type="text" class="form-control" name="fmembermbno_three" value= ""></td>
                          </tr>
                        </tbody>
                      </table>
                  </td>
                </tr>
                <tr>
                  <td>Maid Name: </td>
                  <td>
                    <input type="text" class="form-control" placeholder="Enter maid name" name="maidname" value= "">
                  </td>
                  <td>National ID No: </td>
                  <td>
                    <input type="text" class="form-control" placeholder="Enter National ID" name="maidnid" value= "">
                  </td>
                </tr>
                <tr>
                  <td>Mobile No: </td>
                  <td>
                    <input type="text" class="form-control" placeholder="Enter mobile no" name="maidmbno" value= "">
                  </td>
                  <td>Permanent Address: </td>
                  <td>
                    <textarea name="maidpaddr" rows="1" class="form-control"></textarea>
                  </td>
                  </tr>
                  <tr>
                    <td>Driver Name: </td>
                    <td>
                      <input type="text" class="form-control" placeholder="Enter driver name" name="drname" value= "">
                    </td>
                    <td>National ID No: </td>
                    <td>
                      <input type="text" class="form-control" placeholder="Enter National ID" name="drnid" value= "">
                    </td>
                  </tr>
                  <tr>
                    <td>Mobile No: </td>
                    <td>
                      <input type="text" class="form-control" placeholder="Enter mobile no" name="drmbno" value= "">
                    </td>
                    <td>Permanent Address: </td>
                    <td>
                      <textarea name="drpaddr" rows="1" class="form-control"></textarea>
                    </td>
                    </tr>
                    <tr>
                      <td>Previous Landlord Name: </td>
                      <td>
                        <input type="text" class="form-control" placeholder="Enter name" name="prellname" value= "">
                      </td>
                      <td>Mobile No: </td>
                      <td>
                        <input type="text" class="form-control" placeholder="Enter mobile no" name="prellmbno" value= "">
                      </td>
                    </tr>
                    <tr>
                      <td >Address: </td>
                      <td colspan="4">
                        <textarea name="prelladdr" rows="1" class="form-control"></textarea>
                      </td>
                      </tr>
                      <tr>

                        <td >Reason for leaving Previous home: </td>
                        <td colspan="4">
                          <textarea name="leavereason" rows="1" class="form-control"></textarea>
                        </td>
                        </tr>
                        <tr>
                          <td>Present Landlord Name: </td>
                          <td>
                            <input type="text" class="form-control" placeholder="Enter name" name="newllname" value= "">
                          </td>
                          <td>Mobile No: </td>
                          <td>
                            <input type="text" class="form-control" placeholder="Enter mobile no" name="newllmbno" value= "">
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
                              <br><br><br>
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
