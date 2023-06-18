@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Subject Info</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('it-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Subject Info</li>
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
            <a href="{{route('subjects.create')}}" class="btn btn-primary">
              <i class="fa fa-plus" aria-hidden="true"></i> Add Subject
            </a>
          </div>
          <div class="mt-3">
            <x-alert />
            <table id="listsubject" class="table table-striped bo" style="width:100%">
              <thead>
                <tr>
                  <th>Subject Name</th>
                  <th>Description</th>
                  <th>FCPS</th>
                  <th>MCPS</th>
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
                  <td>{{ $subject->fcps_flg }}</td>
                  <td>{{ $subject->mcps_flg }}</td>
                  <td>{{ $subject->sp_code }}</td>
                  <td>
                    @if($subject->active==1)
                    <small class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Active</small>
                    @else
                    <small class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i> In-active</small>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('subjects.edit', $subject->id) }}">
                      <i class="fas fa-edit"></i></a>
                    </a>
                    @if($subject->active==1)
                    <button class="btn btn-danger btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-inactive-{{ $subject->id }}').submit()">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <form class="hidden" id="{{'form-inactive-'.$subject->id}}"
                      action="{{ route('subject.inactive', $subject->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                    </form>
                    @else
                    <button class="btn btn-success btn-sm"
                      onclick="event.preventDefault();document.getElementById('form-active-{{ $subject->id }}').submit()">
                      <i class="fa fa-check" aria-hidden="true"></i></button>
                    <form class="hidden" id="{{'form-active-'.$subject->id}}"
                      action="{{ route('subject.active', $subject->id) }}" method="POST">
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
            $('#listsubject').DataTable({
                "order": [[ 0, "asc" ]]
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