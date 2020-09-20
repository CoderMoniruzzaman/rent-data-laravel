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

            <form action="{{ url('edit/addhouse/product/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label>Name</label>
                  <input type="hidden" name="product_id" value="{{ $single_house_info->product_id}}">
                  <input type="hidden" name="id" value="{{ $single_house_info->id}}">

                  <input type="text" class="form-control" name="housename" value= "{{ $single_house_info->housename}}">
                </div>
                <br>
                <label>House Address:</label>
                <div class="form-group">
                  <label>Holding/ House#</label>
                  <input type="text" class="form-control" name="houseno" value= "{{ $single_house_info->houseno}}">
                </div>
                <div class="form-group">
                  <label>Road no.</label>
                  <input type="text" class="form-control" name="roadno" value= "{{ $single_house_info->roadno}}">
                </div>
                <div class="form-group">
                  <label>Area</label>
                  <input type="text" class="form-control" name="thana" value= "{{ $single_house_info->thana}}">
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" class="form-control" name="city" value= "{{ $single_house_info->city}}">
                </div>
                <div class="form-group">
                  <label>Post Code</label>
                  <input type="number" class="form-control" name="pcode" value= "{{ $single_house_info->pcode}}">
                </div>
                <div class="form-group">
                  <label>District</label>
                  <input type="text" class="form-control" name="district" value= "{{ $single_house_info->district}}">
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
