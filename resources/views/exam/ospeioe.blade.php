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
            <li class="breadcrumb-item text-muted active" aria-current="page">Schedule Entry</li>
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
          <h5 class="card-title">Entry New Schedule</h5>
          <form id="ospe-ioe-form" action="{{ route('next-ospeioe') }}" method="POST" data-toggle="validator"
            role="form" onsubmit="return submitForm(this);">
            @csrf
            <x-alert />

            <div class="row">
              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="exam_type_id" id="exam_type_id" required onchange=""
                    aria-label="Floating label select example">
                    <option value="">Select</option>
                    @foreach($examtype as $xmtype)
                    <option value="{{ $xmtype->id }}">{{ $xmtype->exam_type}}</option>
                    @endforeach
                  </select>
                  <label for="exam_type_id">Exam Type</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="mother_subject_id" id="mother_subject_id" required onchange=""
                    aria-label="Floating label select example">
                    <option value="">Select</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                    @endforeach
                  </select>
                  <label for="mother_subject_id">Mother Subject</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="exam_year" id="exam_year" required onchange=""
                    aria-label="Floating label select example">

                    <option value="@php echo date('Y'); @endphp">@php echo date('Y'); @endphp</option>
                    @foreach(range(date('Y')-1, date('Y') - 25) as $y)
                    <option value="{{ $y }}">{{ $y}}</option>
                    @endforeach
                  </select>
                  <label for="exam_year">Year</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="exam_session" id="exam_session" required onchange=""
                    aria-label="Floating label select example">
                    <option selected value="JAN">January</option>
                    <option value="JUL">July</option>
                  </select>
                  <label for="exam_session">Session</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="exam_date" id="exam_date" value="" required
                    maxlength="15">
                  <label for="exam_date">Date [YYYY-MM-DD]</label>
                </div>
              </div>
              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="hall_id" id="hall_id" required onchange=""
                    aria-label="Floating label select example">
                    <option value="">Select</option>
                    @foreach($examhall as $xmhall)
                    <option value="{{ $xmhall->id }}">{{ $xmhall->hall_name}}</option>
                    @endforeach
                  </select>
                  <label for="hall_id">Hall No</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="reporting_time" id="reporting_time" value="" required
                    maxlength="15">
                  <label for="reporting_time">Reporting Time</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="exam_start_time" id="exam_start_time" value="" required
                    maxlength="15">
                  <label for="exam_start_time">Start Time</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="exam_end_time" id="exam_end_time" value="" required
                    maxlength="15">
                  <label for="exam_end_time">End Time</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="is_schedule_meeting_chk"
                    id="is_schedule_meeting_chk" onclick="billingDeal()">
                  <input type="hidden" name="is_schedule_meeting" id="is_schedule_meeting">
                  <label class="form-check-label">
                    <h5> Have a Scheduled Meeting?</h5>
                  </label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="meeting_date" id="meeting_date" value="" required
                    readonly maxlength="15">
                  <label for="meeting_date">Meeting Date</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" name="meeting_time" id="meeting_time" value="" required
                    readonly maxlength="15">
                  <label for="meeting_time">Meeting Time</label>
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

  <script>
    var date = new Date();

    let mn = parseInt(date.getMonth())+1;
    mn = mn.toString().length==1 ? '0' + mn : mn;
    let dt = date.getDate();
    dt = dt.toString().length==1 ? '0' + dt : dt;
    var formattedDate = date.getFullYear()+"-"+mn+"-"+dt;

    var new_time = DateFormat(date);
    var next_time = AddMinutesToDate(date, 50);
    var next_time_fiveminplus = AddMinutesToDate(date, 5);
    $("#exam_date").val(formattedDate);
    //$("#meeting_date").val(formattedDate);
    $("#reporting_time").val(new_time);
    //$("#meeting_time").val(DateFormat(AddMinutesToDate(date, -5)));
    $("#exam_start_time").val(DateFormat(next_time_fiveminplus));
    $("#exam_end_time").val(DateFormat(next_time));
    var have_schedule;

    function submitForm() {
      if (!$('#hall_id').val()) {
        alert("hall_no Can't be Empty.");
        return false;
    }
    else if (!$('#mother_subject_id').val()) {
        alert("Subject Can't be Empty.");
        return false;
    }
    else if (!$('#exam_type_id').val()) {
        alert("Exam type Can't be Empty.");
        return false;
    }
    else{
        return confirm('Do you want to save?');
    }
    }

    function AddMinutesToDate(date, minutes) {
      return new Date(date.getTime() + minutes*60000);
    }
    function DateFormat(date){
      var days = date.getDate();
      var year = date.getFullYear();
      var month = (date.getMonth()+1);
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var newformat = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12;
      hours = hours ? hours : 12;
      minutes = minutes < 10 ? '0' + minutes : minutes;
      var new_time = hours + ':' + minutes + ' ' + newformat;
      return new_time;
    }
  </script>
</div>
@endsection