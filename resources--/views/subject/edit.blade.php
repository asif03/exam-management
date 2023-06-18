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
        <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
          @method('PATCH')
          @csrf
          <x-alert />
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

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
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection