@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Link Allied Subject</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('it-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">
              <a href="{{ route('allied-subjects.index') }}">Allied Subject Info</a>
            </li>
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

      <form action="{{ route('allied-subjects.store') }}" method="POST">
        @csrf
        <x-alert />
        <div class="row">
          <div class="col">
            <div class="form-floating mb-1">
              <select class="form-select" name="mother_subject_id" id="mother_subject_id" aria-label="mother_subject_id"
                required>
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
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection