@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Link Allied Subject</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Link Allied Subject</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{ route('allied-subjects.index') }}" class="btn btn-primary btn-rounded mt-2">
        <i class="fas fa-list"></i> Allied Subjects
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
          <h5 class="card-title">Link New Subject</h5>
          <form action="{{ route('allied-subjects.store') }}" method="POST">
            @csrf
            <x-alert />
            <div class="row">
              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="mother_subject_id" id="mother_subject_id"
                    aria-label="mother_subject_id" required>
                    <option value="">Select</option>
                    @foreach($motherSubjects as $motherSubject)
                    <option value="{{ $motherSubject->id }}" @if($motherSubject->id==old('id')) selected @endif>{{
                      $motherSubject->subject_name}}</option>
                    @endforeach
                  </select>
                  <label for="mother_subject_id">Mother Subject Name</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="subject_id" id="subject_id" aria-label="subject_id" required>
                    <option value="">Select</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" @if($subject->id==old('id')) selected @endif>{{
                      $subject->subject_name}}</option>
                    @endforeach
                  </select>
                  <label for="subject_id">Subject Name</label>
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection