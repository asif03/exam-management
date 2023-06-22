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
      <a href="{{ route('exam-halls.index') }}" class="btn btn-primary btn-rounded mt-2">
        <i class="fas fa-list"></i> Hall List
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
          <h5 class="card-title">New Hall</h5>
          <x-alert />
          <form action="{{ route('exam-halls.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="block_id" id="block_id" aria-label="block_id" required>
                    <option value="">Select</option>
                    @foreach($blocks as $block)
                    <option value="{{ $block->id }}" @if($block->id==old('block_id')) selected @endif>{{
                      $block->block_name}}</option>
                    @endforeach
                  </select>
                  <label for="block_id">Block Name</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="hall_name" id="hall_name" value="{{ old('hall_name') }}"
                    required>
                  <label for="hall_name">Hall Name</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="text-center p-2">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection