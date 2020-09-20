@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-6 offset-3">
      <div class="card">
        <div class="card-header bg-success">
          Landlord Information View
        </div>
        @if(session('deletestatus'))
        <div class="alert alert-danger">
            {{ session('deletestatus')}}
        </div>
        @endif
          @if($errors->all())
              <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </div>
          @endif

          @if($single_product_info)
          <table class="table table-borderless">
            <thead>
              <tr>
                <br>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Name :</td>
                <td>{{ $single_product_info-> name}}</td>
                <td rowspan="4">
                    <figure>
                      <img src="{{ asset('uploads/product_photos')}}/{{ $single_product_info->photograph}}" alt="not found" width="120">
                    </figure>
                    <figcaption>Photograph</figcaption>
                </td>
              </tr>
              <tr>
                <td>Phone no :</td>
                <td>{{ $single_product_info-> phone}}</td>
              </tr>
              <tr>
                <td>NID:</td>
                <td>{{ $single_product_info-> nid}}</td>
              </tr>
              <tr>
                <td>ETIN:</td>
                <td>{{ $single_product_info-> etin}}</td>
              </tr>
              <tr>
                <td>Occupation:</td>
                <td>{{ $single_product_info-> occupation}}</td>
              </tr>
              <tr>
                <td><u>House Address</u></td>
              </tr>
              <tr>
                <td>Holding/ House :</td>
                <td>{{ $single_product_info-> house_h}}</td>
                <td rowspan="4">
                    <figure>
                      <img src="{{ asset('uploads/product_house')}}/{{ $single_product_info->house_pic}}" alt="not found" width="120">
                    </figure>
                    <figcaption>House Picture</figcaption>
                </td>
              </tr>
              <tr>
                <td>Road no :</td>
                <td>{{ $single_product_info-> road_h}}</td>
              </tr>
              <tr>
                <td>Thana :</td>
                <td>{{ $single_product_info-> thana_h}}</td>
              </tr>
              <tr>
                <td>City :</td>
                <td>{{ $single_product_info-> city_h}}</td>
              </tr>
              <tr>
                <td>Post Code :</td>
                <td>{{ $single_product_info-> pcode_h}}</td>
              </tr>
              <tr>
                <td>District :</td>
                <td>{{ $single_product_info-> district_h}}</td>
              </tr>
              <tr>
                <td><u>Permanent Address</u></td>
              </tr>
              <tr>
                <td>Holding/ House :</td>
                <td>{{ $single_product_info-> house_p}}</td>
              </tr>
              <tr>
                <td>Road no :</td>
                <td>{{ $single_product_info-> road_p}}</td>
              </tr>
              <tr>
                <td>Thana :</td>
                <td>{{ $single_product_info-> thana_p}}</td>
              </tr>
              <tr>
                <td>City :</td>
                <td>{{ $single_product_info-> city_p}}</td>
              </tr>
              <tr>
                <td>Post Code :</td>
                <td>{{ $single_product_info-> pcode_p}}</td>
              </tr>
              <tr>
                <td>District :</td>
                <td>{{ $single_product_info-> district_p}}</td>
              </tr>
            </tbody>
            </table>
            <a class="btn btn-info btn-sm" href="{{ url('product/edit/data') }}/{{ Auth::user()->id }}">Edit</a>
            <a class="btn btn-danger btn-sm" href="{{ url('product/delete/data') }}/{{ Auth::user()->id }}">Delete</a>
          @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
