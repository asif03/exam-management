@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Mother Subject Info</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Mother Subject</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{ route('mothersubjects.create') }}" class="btn btn-primary btn-rounded mt-2">
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
            <table id="listsubject" class="table border table-striped table-bordered text-nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Subject Name</th>
                  <th>Description</th>
                  <th>Speciality Code</th>
                  <th>Is Active?</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($subjects as $subject)
                <tr>
                  <td>{{ $subject->subject_name }}</td>
                  <td>{{ $subject->desc }}</td>
                  <td>{{ $subject->sp_code }}</td>
                  <td>
                    @if($subject->active==1)
                    <small class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Active</small>
                    @else
                    <small class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i> In-active</small>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('mothersubjects.edit', $subject->id) }}">
                      <i class="fas fa-edit"></i></a>
                    @if($subject->active==1)
                    <button class="btn btn-danger btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-inactive-{{ $subject->id }}').submit()">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <form class="hidden" id="{{'form-inactive-'.$subject->id}}"
                      action="{{ route('mothersubject.inactive', $subject->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                    </form>
                    @else
                    <button class="btn btn-success btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-active-{{ $subject->id }}').submit()">
                      <i class="fa fa-check" aria-hidden="true"></i></button>
                    <form class="hidden" id="{{'form-active-'.$subject->id}}"
                      action="{{ route('mothersubject.active', $subject->id) }}" method="POST">
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
      $('#listsubject').DataTable({
          "order": [[ 0, "asc" ]]
      });
    });
  </script>
</div>
@endsection