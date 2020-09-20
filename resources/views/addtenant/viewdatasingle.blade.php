@extends('layouts/App')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-10 offset-1">
        <div class="card">
          <div class="card-header bg-success">
            Tenant Information View
          </div>
          <div class="card-body">

            <table class="table table-bordered">
              <thead>
                <tr>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td rowspan="4" >
                    <img src="{{ asset('uploads/tenant_photos')}}/{{$tenant_info_single->photograph}}" alt="not found" width="150">
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
                          <td>{{ $tenant_info_single->flatno}}</td>
                        </tr>
                        <tr>
                          <td>House/Holding:</td>
                          <td>{{ App\Addhouse::find($tenant_info_single->addhouse_id)->houseno}}</td>
                        </tr>
                        <tr>
                          <td>Area:</td>
                          <td>{{ App\Addhouse::find($tenant_info_single->addhouse_id)->thana}}</td>
                        </tr>
                        <tr>
                          <td>Post Code:</td>
                          <td>{{ App\Addhouse::find($tenant_info_single->addhouse_id)->pcode}}</td>
                        </tr>
                      </table>
                    </td>
                </tr>
                <tr>
                  <td>Division:
                    {{ App\Division::find($tenant_info_single->division_id)->name }}
                  </td>
                </tr>
                <tr>
                  <td>Thana: {{$tenant_info_single->thana}}</td>
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
                    <td colspan="3">{{$tenant_info_single->tenantname}}</td>
                  </tr>
                  <tr>
                    <td>Father's Name :</td>
                    <td colspan="3">{{ $tenant_info_single->fname}}</td>
                  </tr>
                  <tr>
                      <td>Date of Birth :</td>
                      <td>{{ ($tenant_info_single->dob ? date('d-m-Y', strtotime($tenant_info_single->dob)) : '')}}</td>
                      <td>Marital Status :</td>
                      <td>
                        {{($tenant_info_single->mstatus == 1)?'Unmarried':
                            (($tenant_info_single->mstatus == 2)?'Married':
                            (($tenant_info_single->mstatus == 3)?'Divorced':
                            (($tenant_info_single->mstatus == 4)?'Widow/Widower': '')))  }}
                        </td>
                  </tr>
                <tr>
                  <td>Parmanent Address:</td>
                  <td colspan="3">{{$tenant_info_single->permanentaddr}}</td>
                </tr>
                <tr>
                  <td>Service & Office Address:</td>
                  <td colspan="3">{{$tenant_info_single->jobaddr}}</td>
                </tr>
                <tr>
                  <td>Religion: </td>
                  <td>{{ $tenant_info_single->religion}}</td>
                  <td>Educational Qualification: </td>
                  <td>{{$tenant_info_single->education}}</td>
                </tr>
                <tr>
                  <td>Mobile No. </td>
                  <td>{{$tenant_info_single->mbno}}</td>
                  <td>Email ID: </td>
                  <td>{{$tenant_info_single->emailid}}</td>
                </tr>
                <tr>
                  <td>National ID No:</td>
                  <td colspan="3">{{$tenant_info_single->nid}}</td>
                </tr>
                <tr>
                  <td>Passport No(if available):</td>
                  <td colspan="3">{{$tenant_info_single->passportno}}</td>
                </tr>
                <tr>
                  <td>Emergency Contact:</td>
                </tr>
                <tr>
                  <td>Name: </td>
                  <td>{{$tenant_info_single->impcontact}}</td>
                  <td>Relation: </td>
                  <td>{{$tenant_info_single->relation}}</td>
                </tr>
                <tr>
                  <td>Address: </td>
                  <td>{{$tenant_info_single->impaddr}}</td>
                  <td>Mobile No: </td>
                  <td>{{$tenant_info_single->impmbno}}</td>
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
                            <td>{{ $tenant_info_single->fmembername_one}}</td>
                            <td>{{ $tenant_info_single->fmemberage_one}}</td>
                            <td>{{ $tenant_info_single->fmemberjob_one}}</td>
                            <td>{{ $tenant_info_single->fmembermbno_one}}</td>
                          </tr>
                          <tr>
                            <th>2</th>
                            <td>{{ $tenant_info_single->fmembername_two}}</td>
                            <td>{{ $tenant_info_single->fmemberage_two}}</td>
                            <td>{{ $tenant_info_single->fmemberjob_two}}</td>
                            <td>{{ $tenant_info_single->fmembermbno_two}}</td>
                          </tr>
                          <tr>
                            <th>3</th>
                            <td>{{ $tenant_info_single->fmembername_three}}</td>
                            <td>{{ $tenant_info_single->fmemberage_three}}</td>
                            <td>{{ $tenant_info_single->fmemberjob_three}}</td>
                            <td>{{ $tenant_info_single->fmembermbno_three}}</td>
                          </tr>
                        </tbody>
                      </table>
                  </td>
                </tr>
                <tr>
                  <td>Maid Name: </td>
                  <td>{{$tenant_info_single->maidname}}</td>
                  <td>National ID No: </td>
                  <td>{{$tenant_info_single->maidnid}}</td>
                </tr>
                <tr>
                  <td>Mobile No: </td>
                  <td>{{$tenant_info_single->maidmbno}}</td>
                  <td>Permanent Address: </td>
                  <td>{{$tenant_info_single->maidpaddr}}</td>
                </tr>
                <tr>
                    <td>Driver Name: </td>
                    <td>{{$tenant_info_single->drname}}</td>
                    <td>National ID No: </td>
                    <td>{{$tenant_info_single->drnid}}</td>
                  </tr>
                  <tr>
                    <td>Mobile No: </td>
                    <td>{{$tenant_info_single->drmbno}}</td>
                    <td>Permanent Address: </td>
                    <td>{{$tenant_info_single->drpaddr}}</td>
                    </tr>
                    <tr>
                      <td>Previous Landlord Name: </td>
                      <td>{{$tenant_info_single->prellname}}</td>
                      <td>Mobile No: </td>
                      <td>{{$tenant_info_single->prellmbno}}</td>
                    </tr>
                    <tr>
                      <td >Address: </td>
                      <td colspan="4">{{$tenant_info_single->prelladdr}}</td>
                    </tr>
                    <tr>
                      <td >Reason for leaving Previous home: </td>
                      <td colspan="4">{{$tenant_info_single->leavereason}}</td>
                    </tr>
                    <tr>
                      <td>Present Landlord Name: </td>
                      <td>{{$tenant_info_single->prellname}}</td>
                      <td>Mobile No: </td>
                      <td>{{$tenant_info_single->prellmbno}} </td>
                    </tr>
                    <tr>
                      <td>Date of Living in the new home:</td>
                      <td>{{ ($tenant_info_single->newdate ? date('d-m-Y', strtotime($tenant_info_single->newdate)) : '')}}</td>
                    </tr>
                    <tr>
                      <br><br>
                      <td><br><br><br>{{ ($tenant_info_single->datebottom ? date('d-m-Y', strtotime($tenant_info_single->datebottom)) : '')}}<br>Date</td>
                      <td></td>
                      <td></td>
                      <td>
                      <br><br><br>
                      <img src="{{ asset('uploads/tenant_photos')}}/{{$tenant_info_single->signature}}" alt="not found" width="150">
                      <br>Tenant Signature
                      </td>
                    </tr>
                </tbody>
              </table>

              <a class="btn btn-success btn-sm" href="{{ url('tenant/view/data') }}/{{ $tenant_info_single->product_id }}">Back</a>
              </form>
          </div>

        </div>

      </div>

    </div>

  </div>
@endsection
