@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Subject Info</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">User</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-rounded mt-2">
        <i class="fas fa-plus"></i> Add New
      </a>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">User List</h5>
          <x-alert />
          <div class="table-responsive">
            <table id="listuser" class="table border table-striped table-bordered text-nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if($user->active==1)
                    <span class="badge rounded-pill text-bg-success">Active</span>
                    @else
                    <span class="badge rounded-pill text-bg-danger">In-active</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('examtypes.edit', $user->id) }}">
                      <i class="fas fa-edit"></i>
                    </a>&nbsp;|&nbsp;
                    @if($user->active==1)
                    <button class="btn btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-inactive-{{ $user->id }}').submit()">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <form class="hidden" id="{{'form-inactive-'.$user->id}}"
                      action="{{ route('user.inactive', $user->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                    </form>
                    @else
                    <button class="btn-sm btn btn-primary btn-rounded"
                      onclick="event.preventDefault();document.getElementById('form-active-{{ $user->id }}').submit()">
                      <i class="fa fa-check" aria-hidden="true"></i> Activate</button>
                    <form class="hidden" id="{{'form-active-'.$user->id}}"
                      action="{{ route('user.active', $user->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                    </form>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
        $('#listuser').DataTable({
            "order": [[ 0, "asc" ]]
        });
      });
  </script>
</div>
@endsection