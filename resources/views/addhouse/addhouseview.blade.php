@extends('layouts/App')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-6 offset-3">
        <div class="card">
          <div class="card-header bg-success">
            Add House Form
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

            <form action="{{ url('add/house/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label>House Name</label>
                  <input type="hidden" name="product_id" value="{{ $product_id}}">
                  <input type="text" class="form-control" placeholder="Enter your house name" name="housename" value= "{{ old('housename') }}">
                </div>
                <label>House Address:</label>
                <div class="form-group">
                  <label>Holding/ House#</label>
                  <input type="text" class="form-control" placeholder="Enter your house no." name="houseno" value= "{{ old('houseno') }}">
                </div>
                <div class="form-group">
                  <label>Road no.</label>
                  <input type="text" class="form-control" placeholder="Enter your road no." name="roadno" value= "{{ old('roadno') }}">
                </div>
                <div class="form-group">
                  <label>Area</label>
                  <input type="text" class="form-control" placeholder="Enter your area" name="thana" value= "{{ old('thana') }}">
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" placeholder="Enter your city" name="city" value= "{{ old('city') }}">
                </div>
                <div class="form-group">
                  <label>Post Code</label>
                  <input type="number" class="form-control" placeholder="Enter your post code" name="pcode" value= "{{ old('pcode') }}">
                </div>
                <div class="form-group">
                  <label>District</label>
                  <input type="text" class="form-control" placeholder="Enter your district" name="district" value= "{{ old('district') }}">
                </div>
                <br>
                <button type="submit" class="btn btn-info">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
