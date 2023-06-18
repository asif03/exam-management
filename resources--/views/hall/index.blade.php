@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Hall Info</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('it-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Hall Info</li>
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
            <a href="{{route('exam-halls.create')}}" class="btn btn-primary">
              <i class="fa-solid fa-plus"></i> Hall Info
            </a>
          </div>
          <div class="mt-3">
            <x-alert />
            <table id="listhall" class="table table-striped bo" style="width:100%">
              <thead>
                <tr>
                  <th>Block Name</th>
                  <th>Hall Name</th>
                  <th>Is Active?</th>
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
                    <small class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Active</small>
                    @else
                    <small class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i> In-active</small>
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

      <script>
        $(document).ready(function() {
            $('#listhall').DataTable({
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