@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Exam Schedule Position Info</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('it-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Exam Schedule Position Info</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Main row -->
      <div class="row">
        <div class="container d-flex flex-column">
          <div class="d-flex flex-row-reverse">
            <a href="{{route('exam-schedule-roles.create')}}" class="btn btn-primary">
              <i class="fa-solid fa-plus"></i> Exam Schedule Position Info
            </a>
          </div>
          <div class="mt-3">
            <x-alert />
            <table id="listposition" class="table table-striped bo" style="width:100%">
              <thead>
                <tr>
                  <th>Position Name</th>
                  <th>Remarks</th>
                  <th>Is Active?</th>
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
                    <small class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Active</small>
                    @else
                    <small class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i> In-active</small>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('exam-schedule-roles.edit', $role->id) }}">
                      <i class="fas fa-edit"></i></a>
                    @if($role->active==1)
                    <button class="btn btn-danger btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-inactive-{{ $role->id }}').submit()">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <form class="hidden" id="{{'form-inactive-'.$role->id}}"
                      action="{{ route('exam-schedule-role.inactive', $role->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                    </form>
                    @else
                    <button class="btn btn-success btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-active-{{ $role->id }}').submit()">
                      <i class="fa fa-check" aria-hidden="true"></i></button>
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

      <script>
        $(document).ready(function() {
            $('#listposition').DataTable({
                "order": [[ 1, "asc" ]]
            });
          });
      </script>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection