@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Subject Info</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Subject</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{ route('subjects.index') }}" class="btn btn-primary btn-rounded mt-2">
        <i class="fas fa-list"></i> Subject List
      </a>
    </div>
  </div>
</div>


<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Subject</h5>
          <x-alert />

          <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row mb-3">
              <label for="subject_name" class="col-sm-2 col-form-label">Subject Name<span>*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="subject_name" name="subject_name"
                  value="{{$subject->subject_name}}" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="desc" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="desc" name="desc" value="{{$subject->desc}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="fcps_flg" class="col-sm-2 col-form-label">Subject For</label>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="fcps" name="fcps" value="{{$subject->fcps_flg}}"
                    onchange="chkFcps()" @if($subject->fcps_flg=='Y') checked @endif value="Y">
                  <label class="form-check-label" for="fcps">
                    FCPS
                  </label>
                  <input type="hidden" name="fcps_flg" id="fcps_flg" value="{{$subject->fcps_flg}}" />
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="mcps" name="mcps" value="{{$subject->mcps_flg}}"
                    onchange="chkMcps()" @if($subject->mcps_flg=='Y') checked @endif>
                  <label class="form-check-label" for="mcps_flg">
                    MCPS
                  </label>
                  <input type="hidden" name="mcps_flg" id="mcps_flg" value="{{$subject->mcps_flg}}" />
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="sp_code" class="col-sm-2 col-form-label">Specility Code</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="sp_code" name="sp_code" value="{{$subject->sp_code}}">
              </div>
            </div>
            <button type="submit" class="btn btn-primary text-center">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function chkFcps() {
    if ($('#fcps').is(":checked")) {
      $("#fcps_flg").val('Y');
    } else {
      $("#fcps_flg").val('N');
    }
  }

  function chkMcps() {
    if ($('#mcps').is(":checked")) {
      $("#mcps_flg").val('Y');
    } else {
      $("#mcps_flg").val('N');
    }
  }
  </script>
</div>
@endsection