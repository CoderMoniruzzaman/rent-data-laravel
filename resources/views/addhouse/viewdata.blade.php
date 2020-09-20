@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-10 offset-1">
      <div class="card">
        <div class="card-header bg-success">
          House Information View
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

            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>SL. No</th>
                      <th>House Name</th>
                      <th>House No.</th>
                      <th>Road No.</th>
                      <th>Area</th>
                      <th>City</th>
                      <th>Post Code</th>
                      <th>District</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($house_info_all as $house_info)
                    <tr>
                      <th>{{ $loop -> index + 1 }}</th>
                      <td>{{ $house_info->housename }}</td>
                      <td>{{ $house_info->houseno }}</td>
                      <td>{{ $house_info->roadno }}</td>
                      <td>{{ $house_info->thana }}</td>
                      <td>{{ $house_info->city }}</td>
                      <td>{{ $house_info->pcode }}</td>
                      <td>{{ $house_info->district }}</td>
                      <td>
                        <div class="btn-group" role="group">
                          <a class="btn btn-info btn-sm" href="{{ url('addhouse/edit/data') }}/{{ $house_info->id }}">Edit</a>
                          <a class="btn btn-danger btn-sm" href="{{ url('addhouse/delete/data') }}/{{ $house_info->id }}">Delete</a>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr class="text-center text-danger">
                      <td colspan="9"> No Data Available.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $house_info_all->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
