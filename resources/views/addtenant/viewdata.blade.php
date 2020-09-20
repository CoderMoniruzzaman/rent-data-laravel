@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 ">
      <div class="card">
        <div class="card-header bg-success">
          Tenant Information View All
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
                      <th>Flat/Floor</th>
                      <th>House No</th>
                      <th>Road No</th>
                      <th>Area</th>
                      <th>Thana</th>
                      <th>Tenant Name</th>
                      <th>Father's Name</th>
                      <th>Permanent Address</th>
                      <th>Job & Office Address</th>
                      <th>Mobile No</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($tenant_info_all as $tenant_info)
                    <tr>
                      <th>{{ $loop -> index + 1 }}</th>
                      <td>{{ $tenant_info->flatno }}</td>
                      <td>{{ App\Addhouse::find($tenant_info->addhouse_id)->houseno}}</td>
                      <td>{{ App\Addhouse::find($tenant_info->addhouse_id)->roadno}}</td>
                      <td>{{ App\Addhouse::find($tenant_info->addhouse_id)->thana}}</td>
                      <td>{{ $tenant_info->thana }}</td>
                      <td>{{ $tenant_info->tenantname }}</td>
                      <td>{{ $tenant_info->fname }}</td>
                      <td>{{ $tenant_info->permanentaddr }}</td>
                      <td>{{ $tenant_info->jobaddr }}</td>
                      <td>{{ $tenant_info->mbno }}</td>
                      <td>
                        <div class="btn-group" role="group">
                          <a class="btn btn-success btn-sm" href="{{ url('tenant/view/data/single') }}/{{ $tenant_info->id }}">View</a>
                          <a class="btn btn-info btn-sm" href="{{ url('tenant/edit/data') }}/{{ $tenant_info->id }}">Edit</a>
                          <a class="btn btn-danger btn-sm" href="{{ url('tenant/delete/data') }}/{{ $tenant_info->id }}">Delete</a>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr class="text-center text-danger">
                      <td colspan="12"> No Data Available.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                {{ $tenant_info_all->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
