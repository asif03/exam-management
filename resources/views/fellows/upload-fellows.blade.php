@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Fellow's Information</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Upload fellow's information</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{ route('fellows.index') }}" class="btn btn-primary btn-rounded mt-2">
        <i class="fas fa-list"></i> Fellow's List
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
          <h4 class="card-title">Upload Fellow File</h4>
          <h6 class="card-subtitle">Must use <code>xlsx</code>
          </h6>
          <form class="mt-3">
            @csrf
            <div class="row mb-3">
              <div class="col">
                <input class="form-control" type="file" id="formFile" required>
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