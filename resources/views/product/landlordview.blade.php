@extends('layouts/App')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-6 offset-3">
        <div class="card">
          <div class="card-header bg-success">
            Landlord Signup Form
          </div>
          <div class="card-body">

            @if($errors->all())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            @if(App\Product::where('product_id',Auth::user()->id)->first())
              @if(session('status'))
              <div class="alert alert-success">
                  {{ session('status')}}
              </div>
              @endif
            @else

            <form action="{{ url('add/product/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label>Name</label>
                  <input type="hidden" name="product_id" value="{{ $product_id}}">
                  <input type="text" class="form-control" placeholder="Enter your name" name="name" value= "{{ old('name') }}">
                </div>
                <div class="form-group">
                  <label>Phone no.</label>
                  <input type="text" class="form-control" placeholder="Enter your phone no." name="phone" value= "{{ old('phone') }}">
                </div>
                <div class="form-group">
                  <label>Photograph</label>
                  <input type="file" class="form-control"  name="photograph">
                </div>
                <div class="form-group">
                  <label>NID</label>
                  <input type="text" readonly="readonly" class="form-control" name="nid" value= "{{ Auth::user()->nid }}">
                </div>
                <div class="form-group">
                  <label>ETIN</label>
                  <input type="text" class="form-control" placeholder="Enter your ETIN" name="etin" value= "{{ old('etin') }}">
                </div>
                <div class="form-group">
                  <label>Occupation</label>
                  <input type="text" class="form-control" placeholder="Enter your Occupation" name="occupation" value= "{{ old('occupation') }}">
                </div>

                <br>
                <label>House Address:</label>
                <div class="form-group">
                  <label>Holding/ House#</label>
                  <input type="text" class="form-control" placeholder="Enter your house no." name="house_h" value= "{{ old('house_h') }}">
                </div>
                <div class="form-group">
                  <label>Road no.</label>
                  <input type="text" class="form-control" placeholder="Enter your road no." name="road_h" value= "{{ old('road_h') }}">
                </div>
                <div class="form-group">
                  <label>Thana</label>
                  <input type="text" class="form-control" placeholder="Enter your thana" name="thana_h" value= "{{ old('thana_h') }}">
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" placeholder="Enter your city" name="city_h" value= "{{ old('city_h') }}">
                </div>
                <div class="form-group">
                  <label>Post Code</label>
                  <input type="number" class="form-control" placeholder="Enter your post code" name="pcode_h" value= "{{ old('pcode_h') }}">
                </div>
                <div class="form-group">
                  <label>District</label>
                  <input type="text" class="form-control" placeholder="Enter your district" name="district_h" value= "{{ old('district_h') }}">
                </div>

                <br>
                <label>Permanent Address:</label>
                <div class="form-group">
                  <label>Holding/ House#</label>
                  <input type="text" class="form-control" placeholder="Enter your house no." name="house_p" value= "{{ old('house_p') }}">
                </div>
                <div class="form-group">
                  <label>Road no.</label>
                  <input type="text" class="form-control" placeholder="Enter your road no." name="road_p" value= "{{ old('road_p') }}">
                </div>
                <div class="form-group">
                  <label>Thana</label>
                  <input type="text" class="form-control" placeholder="Enter your thana" name="thana_p" value= "{{ old('thana_p') }}">
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" placeholder="Enter your city" name="city_p" value= "{{ old('city_p') }}">
                </div>
                <div class="form-group">
                  <label>Post Code</label>
                  <input type="number" class="form-control" placeholder="Enter your post code" name="pcode_p" value= "{{ old('pcode_p') }}">
                </div>
                <div class="form-group">
                  <label>District</label>
                  <input type="text" class="form-control" placeholder="Enter your district" name="district_p" value= "{{ old('district_p') }}">
                </div>
                <div class="form-group">
                  <label>House Picture</label>
                  <input type="file" class="form-control"  name="house_pic">
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
              </form>
              @endif
          </div>

        </div>

      </div>

    </div>

  </div>
@endsection
