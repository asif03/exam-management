@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Exam Type Info</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Exam Type</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{ route('examtypes.index') }}" class="btn btn-primary btn-rounded mt-2">
        <i class="fas fa-list"></i> Exam Type List
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
          <h5 class="card-title">Edit Exam Name</h5>
          <x-alert />
          <form action="{{ route('examtypes.update', $examType->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row mb-3">
              <label for="subject_name" class="col-sm-2 col-form-label">Exam Name<span>*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="exam_type" name="exam_type" value="{{$examType->exam_type}}"
                  required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection