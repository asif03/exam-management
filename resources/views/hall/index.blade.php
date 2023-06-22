@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Hall Info</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Hall</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{route('exam-halls.create')}}" class="btn btn-primary btn-rounded mt-2">
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
          <h5 class="card-title">Hall List</h5>
          <x-alert />
          <div class="table-responsive">
            <table id="listhall" class="table table-striped bo" style="width:100%">
              <thead>
                <tr>
                  <th>Block Name</th>
                  <th>Hall Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($halls as $hall)
                <tr>
                  <td>{{ $hall->block_name }}</td>
                  <td>{{ $hall->hall_name }}</td>
                  <td>
                    @if($hall->active==1)
                    <i class="fa fa-circle text-success font-12" data-bs-toggle="tooltip" data-placement="top"
                      title="Active"></i>
                    @else
                    <i class="fa fa-circle text-danger font-12" data-bs-toggle="tooltip" data-placement="top"
                      title="In Active"></i>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('exam-halls.edit', $hall->id) }}">
                      <i class="fas fa-edit"></i></a>
                    @if($hall->active==1)
                    <button class="btn btn-danger btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-inactive-{{ $hall->id }}').submit()">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <form class="hidden" id="{{'form-inactive-'.$hall->id}}"
                      action="{{ route('exam-hall.inactive', $hall->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                    </form>
                    @else
                    <button class="btn btn-success btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-active-{{ $hall->id }}').submit()">
                      <i class="fa fa-check" aria-hidden="true"></i></button>
                    <form class="hidden" id="{{'form-active-'.$hall->id}}"
                      action="{{ route('exam-hall.active', $hall->id) }}" method="POST">
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
        $('#listhall').DataTable({
            "order": [[ 1, "asc" ]]
        });
    });
  </script>
</div>
@endsection