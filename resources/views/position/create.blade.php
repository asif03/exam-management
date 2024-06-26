@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Position Info</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('it-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('exam-schedule-roles.index')}}">Position Info</a></li>
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

      <form action="{{ route('exam-schedule-roles.store') }}" method="POST">
        @csrf
        <x-alert />
        <div class="row">
          <div class="col">
            <div class="form-floating mb-1">
              <input type="text" class="form-control" name="position_name" id="position_name"
                value="{{ old('position_name') }}" required>
              <label for="position_name">Position Name</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-1">
              <input type="text" class="form-control" name="descirption" id="descirption"
                value="{{ old('descirption') }}">
              <label for="descirption">Remarks (If Any)</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="text-left p-2">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </form>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection