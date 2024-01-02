@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">OSPE/OSCE/IOE Scheduler</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Edit Schedule</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{ route('schedules') }}" class="btn btn-primary btn-rounded mt-2">
        <i class="fas fa-list"></i> Schedules
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
          <h5 class="card-title">Edit Schedule</h5>
          <x-alert />
          <form id="ospe-ioe-form-edit" action="{{ route('update-schedule-master',$xmScMaster->id) }}" method="POST"
            data-toggle="validator" role="form">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="exam_type_id" id="exam_type_id" required onchange=""
                    aria-label="Floating label select example">
                    <option value="">Select</option>
                    @foreach($examtype as $xmtype)
                    <option value="{{ $xmtype->id }}" @if ($xmScMaster->exam_type_id == $xmtype->id)
                      selected
                      @endif>{{ $xmtype->exam_type }}</option>
                    @endforeach
                  </select>
                  <label for="exam_type_id">Exam Type <span class="text-danger">*</span></label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="mother_subject_id" id="mother_subject_id" required onchange=""
                    aria-label="Floating label select example">
                    <option value="">Select</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" @if ($xmScMaster->mother_subject_id ==
                      $subject->id) selected @endif >{{ $subject->subject_name}}</option>
                    @endforeach
                  </select>
                  <label for="mother_subject_id">Mother Subject *</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="exam_year" id="exam_year" required onchange=""
                    aria-label="Floating label select example">
                    <option value="@php echo date('Y')+1; @endphp" @if($xmScMaster->exam_year==date('Y')+1) selected
                      @endif>
                      @php echo date('Y')+1; @endphp
                    </option>
                    @foreach(range(date('Y'), date('Y') - 5) as $y)
                    <option value="{{ $y }}" @if($xmScMaster->exam_year==$y) selected @endif>{{ $y}}
                    </option>
                    @endforeach
                  </select>
                  <label for="exam_year">Year</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="exam_session" id="exam_session" required onchange=""
                    aria-label="Floating label select example">
                    <option value="JAN" @if($xmScMaster->exam_session=="JAN") selected @endif>January
                    </option>
                    <option value="JUL" @if($xmScMaster->exam_session=="JUL") selected @endif>July
                    </option>
                  </select>
                  <label for="exam_session">Session</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="exam_date" id="exam_date"
                    value="{{$xmScMaster->exam_date}}" required maxlength="15">
                  <label for="exam_date">Date [YYYY-MM-DD]</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="hall_id" id="hall_id" required
                    aria-label="Floating label select example">
                    <option value="">Select</option>
                    @foreach($examhall as $xmhall)
                    <option value="{{ $xmhall->id }}" @if($xmScMaster->hall_id == $xmhall->id) selected
                      @endif>{{ $xmhall->hall_name}}</option>
                    @endforeach
                  </select>
                  <label for="hall_id">Hall No</label>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="time" class="form-control" name="reporting_time" id="reporting_time"
                    value="{{$xmScMaster->reporting_time}}" required maxlength="15">
                  <label for="reporting_time">Reporting Time</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="time" class="form-control" name="exam_start_time" id="exam_start_time"
                    value="{{$xmScMaster->exam_start_time}}" required maxlength="15">
                  <label for="exam_start_time">Start Time</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="time" class="form-control" name="exam_end_time" id="exam_end_time"
                    value="{{$xmScMaster->exam_end_time}}" required maxlength="15">
                  <label for="exam_end_time">End Time</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col mx-3">
                <input class="form-check-input" type="checkbox" name="is_schedule_meeting_chk"
                  id="is_schedule_meeting_chk" onclick="checkMeetingStatus()" @if($xmScMaster->is_schedule_meeting == 1)
                checked
                @endif" >
                <input type="hidden" name="is_schedule_meeting" id="is_schedule_meeting">
                <label class="form-check-label">
                  <h5> Have a Scheduled Meeting? </h5>
                </label>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="meeting_date" id="meeting_date"
                    value="{{$xmScMaster->meeting_date}}" required readonly maxlength="15">
                  <label for="meeting_date">Meeting Date</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="time" class="form-control" name="meeting_time" id="meeting_time"
                    value="{{$xmScMaster->meeting_time}}" required readonly maxlength="15">
                  <label for="meeting_time">Meeting Time</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="text-center p-2">
                  <a class="btn btn-warning" href="{{ route('schedules') }}">Cancel</a>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="text-center p-2">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
                
            checkMeetingStatus();
            
            $('#exam_date').datepicker({
                format: "yyyy-mm-dd",
                startDate: '-3d'
            });

            $('#meeting_date').datepicker({
                format: "yyyy-mm-dd",
                startDate: '-3d'
            });

            $('#reporting_time').datetimepicker({
                useCurrent: true,
                format: "hh:mm A"
            });

            $('#exam_start_time').datetimepicker({
                useCurrent: true,
                format: "hh:mm A"
            });

            $('#exam_end_time').datetimepicker({
                useCurrent: true,
                format: "hh:mm A"
            });

            $('#meeting_time').datetimepicker({
                useCurrent: true,
                format: "hh:mm A"
            });
    });

    function checkMeetingStatus() {
        if ($('#is_schedule_meeting_chk').is(':checked')) {
            $('#meeting_date').prop('readonly', false);
            $('#meeting_time').prop('readonly', false);
            $('#is_schedule_meeting').val("1");
        } else {
            $('#meeting_date').prop('readonly', true);
            $('#meeting_time').prop('readonly', true);
            $('#is_schedule_meeting').val("0");
        }
    }
  </script>
</div>
@endsection