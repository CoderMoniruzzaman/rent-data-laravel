@extends('layouts/App')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-6 offset-3">
        <div class="card">
          <div class="card-header bg-success">
            Landlord Information Edit Form
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
            <form action="{{ url('edit/product/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label>Name</label>
                  <input type="hidden" name="product_id" value="{{ $single_product_info->product_id}}">
                  <input type="text" class="form-control" name="name" value= "{{ $single_product_info->name}}">
                </div>
                <div class="form-group">
                  <label>Phone no.</label>
                  <input type="text" class="form-control" name="phone" value= "{{ $single_product_info->phone}}">
                </div>
                <div class="form-group">
                  <label>Photograph</label>
                  <input type="file" class="form-control"  name="photograph" >
                    <img src="{{ asset('uploads/product_photos')}}/{{ $single_product_info->photograph}}" alt="not found" width="120">
                </div>
                <div class="form-group">
                  <label>NID</label>
                  <input type="text" readonly="readonly" class="form-control" name="nid" value= "{{ Auth::user()->nid }}">
                </div>
                <div class="form-group">
                  <label>ETIN</label>
                  <input type="text" class="form-control" name="etin" value= "{{ $single_product_info->etin}}">
                </div>
                <div class="form-group">
                  <label>Occupation</label>
                  <input type="text" class="form-control" name="occupation" value= "{{ $single_product_info->occupation}}">
                </div>

                <br>
                <label>House Address:</label>
                <div class="form-group">
                  <label>Holding/ House#</label>
                  <input type="text" class="form-control" name="house_h" value= "{{ $single_product_info->house_h}}">
                </div>
                <div class="form-group">
                  <label>Road no.</label>
                  <input type="text" class="form-control" name="road_h" value= "{{ $single_product_info->road_h}}">
                </div>
                <div class="form-group">
                  <label>Thana</label>
                  <input type="text" class="form-control" name="thana_h" value= "{{ $single_product_info->thana_h}}">
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" name="city_h" value= "{{ $single_product_info->city_h}}">
                </div>
                <div class="form-group">
                  <label>Post Code</label>
                  <input type="number" class="form-control" name="pcode_h" value= "{{ $single_product_info->pcode_h}}">
                </div>
                <div class="form-group">
                  <label>District</label>
                  <input type="text" class="form-control" name="district_h" value= "{{ $single_product_info->district_h}}">
                </div>

                <br>
                <label>Permanent Address:</label>
                <div class="form-group">
                  <label>Holding/ House#</label>
                  <input type="text" class="form-control" name="house_p" value= "{{ $single_product_info->house_p}}">
                </div>
                <div class="form-group">
                  <label>Road no.</label>
                  <input type="text" class="form-control" name="road_p" value= "{{ $single_product_info->road_p}}">
                </div>
                <div class="form-group">
                  <label>Thana</label>
                  <input type="text" class="form-control" name="thana_p" value= "{{ $single_product_info->thana_p}}">
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" name="city_p" value="{{ $single_product_info->city_p}}">
                </div>
                <div class="form-group">
                  <label>Post Code</label>
                  <input type="number" class="form-control" name="pcode_p" value= "{{ $single_product_info->pcode_p}}">
                </div>
                <div class="form-group">
                  <label>District</label>
                  <input type="text" class="form-control" name="district_p" value= "{{ $single_product_info->district_p}}">
                </div>
                <div class="form-group">
                  <label>House Picture</label>
                  <input type="file" class="form-control"  name="house_pic">
                  <img src="{{ asset('uploads/product_house')}}/{{ $single_product_info->house_pic}}" alt="not found" width="120">
                </div>

                <button type="submit" class="btn btn-info btn-sm">Submit</button>
                <a class="btn btn-success btn-sm" href="{{ url('product/view/data') }}/{{ Auth::user()->id }}">Back</a>

              </form>
          </div>

        </div>

      </div>

    </div>

  </div>
@endsection
