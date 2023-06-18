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
        <form action="{{ route('subjects.store') }}" method="POST">
          @csrf
          <x-alert />
          <div class="row mb-3">
            <label for="subjectName" class="col-sm-2 col-form-label">Subject Name<span>*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="subject_name" name="subject_name" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="desc" name="desc">
            </div>
          </div>
          <div class="row mb-3">
            <label for="fcps_flg" class="col-sm-2 col-form-label">Subject For</label>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="fcps_flg" name="fcps_flg" value="Y">
                <label class="form-check-label" for="fcps">
                  FCPS
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="mcps_flg" name="mcps_flg" value="Y">
                <label class="form-check-label" for="mcps_flg">
                  MCPS
                </label>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="specilityCode" class="col-sm-2 col-form-label">Specility Code</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sp_code" name="sp_code" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection