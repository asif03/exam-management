@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Invisilator's Designation</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Designation</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{route('exam-schedule-roles.create')}}" class="btn btn-primary btn-rounded mt-2">
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
          <h5 class="card-title">Schedule List</h5>
          <x-alert />
          <div class="table-responsive">
            <table id="listposition" class="table border table-striped table-bordered text-nowrap">
              <thead>
                <tr>
                  <th>Position Name</th>
                  <th>Remarks</th>
                  <th>Active?</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                <tr>
                  <td>{{ $role->position_name }}</td>
                  <td>{{ $role->description }}</td>
                  <td>
                    @if($role->active==1)
                    <span class="badge rounded-pill text-bg-success">Active</span>
                    @else
                    <span class="badge rounded-pill text-bg-danger">In-active</span>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-sm" href="{{ route('exam-schedule-roles.edit', $role->id) }}">
                      <i class="fas fa-edit"></i></a>
                    @if($role->active==1)
                    <button class="btn btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-inactive-{{ $role->id }}').submit()">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <form class="hidden" id="{{'form-inactive-'.$role->id}}"
                      action="{{ route('exam-schedule-role.inactive', $role->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                    </form>
                    @else
                    <button class="btn btn-sm btn-primary btn-rounded"
                      onclick="event.preventDefault();document.getElementById('form-active-{{ $role->id }}').submit()">
                      <i class="fa fa-check" aria-hidden="true"></i>Activate</button>
                    <form class="hidden" id="{{'form-active-'.$role->id}}"
                      action="{{ route('exam-schedule-role.active', $role->id) }}" method="POST">
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
        $('#listposition').DataTable({
            "order": [[ 1, "asc" ]]
        });
    });
  </script>
</div>
@endsection