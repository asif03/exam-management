@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Trainee Subject Enrollment</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Trainee Subject Enrollment</li>
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
        <form id="sub-sw-form" action="{{ route('next-trainee-sub-mig') }}" method="POST" data-toggle="validator"
          role="form" onsubmit="return submitForm(this);">
          @csrf
          <x-alert />

          <div class="row">
            <div class="col">
              <div class="form-floating mb-1">
                <input type="text" class="form-control" name="ref_no" id="ref_no" value="" required maxlength="15">
                <label for="ref_no">Ref. No</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <input type="text" class="form-control" name="ref_date" id="ref_date" value="" required maxlength="15"
                  data-target="#ref_date" data-toggle="datetimepicker">
                <label for="ref_date">Date [YYYY-MM-DD]</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <select class="form-select" name="gender" id="gender" required>
                  <option value="">Select</option>
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select>
                <label for="gender">Gender</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-floating mb-1">
                <input type="text" class="form-control" name="candidate_name" id="candidate_name" value="" required
                  maxlength="15">
                <label for="candidate_name">Candidate Name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input rad" type="radio" name="degree_type" id="degree_type" value="fcps"
                  checked>
                <label class="form-check-label">
                  FCPS
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input rad" type="radio" name="degree_type" id="degree_type" value="md">
                <label class="form-check-label">
                  MD
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input rad" type="radio" name="degree_type" id="degree_type" value="ms" chcked>
                <label class="form-check-label">
                  MS
                </label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-1">
                <select class="form-select" name="from_subject_id" id="from_subject_id" required onchange=""
                  aria-label="Floating label select example">
                  <option value="">Select</option>
                  @foreach($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                  @endforeach
                </select>
                <label for="from_subject_id">Subject</label>
              </div>
            </div>
          </div>

          <div class=" row">
            <div class="col">
              <div class="form-floating mb-1">
                <input type="text" class="form-control" name="registration_no" id="registration_no" value="" required
                  maxlength="55">
                <label for="registration_no">Reg. No</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <select class="form-select" name="to_subject_id" id="to_subject_id" required onchange=""
                  aria-label="Floating label select example">
                  <option value="">Select</option>
                  @foreach($subjects as $subject)
                  <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                  @endforeach
                </select>
                <label for="to_subject_id">To Subject</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col text-center p-2">
              <button type="submit" class="btn btn-primary">Save & Download</button>
            </div>
          </div>
        </form>

        <script type="text/javascript">
          $(function () {
            $('#ref_date').datetimepicker({
              format: 'YYYY-MM-DD'
            });
          });
  
          function submitForm() {
            if (!$('#from_subject_id').val()) {
              altMsg("From Subject", 1);
              return false;
            }else if (!$('#to_subject_id').val()) {
              altMsg("To Subject", 1);
              return false;
            }
            else{
              return confirm('Do you want to save?');
            }
          }
  
          function altMsg(msgBody, optn){
            var extmsg = "";
            if(optn == 1){
              extmsg = " Can't be Empty.";
            }else if(optn == 2){
              extmsg = " Not Selected.";
            }
            return alert(msgBody+""+extmsg);
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