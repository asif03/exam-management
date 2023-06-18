@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">OSPE IOE Scheduler </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('exam-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">OSPE/IOE Scheduler</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="container-fluid">
    <section class="content">
      <div class="row">
        <div class="container">
          <form class="p-2 border border-success border-2 rounded" id="ospe-ioe-form"
            action="{{ route('next-ospeioe') }}" method="POST" data-toggle="validator" role="form"
            onsubmit="return submitForm(this);">
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

      <div class="row mx-1 mt-2">
        <div class="col-12 border border-danger border-2 rounded container">
          <table id="scheduleInfoTable" class="table table-hover table-warning">
            <thead>
              <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Mother Subject</th>
                <th>Date</th>
                <th>Reporting Time</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Hall No</th>
                <th>Schedule?</th>
                <th>Meeting Date</th>
                <th>Meeting Time</th>
                <th>Active?</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->

    <script>
      $(document).ready(function() {
        $('#myscheduleInfoTableTable').DataTable( {
            responsive: true
        } );

        billingDeal();
        getListFn();
      });

      function getListFn() {

      $.ajax({
        type: "get",
         url: '{{URL::to('/exam/get-sche-master')}}',
        data: null,
        dataType: "json",
        success: function(data) {

          dataTab = $('#scheduleInfoTable').DataTable({
            "aaData": data,
            "columns": [{
                "data": "id"
              },
              {
                "data": "exam_type_id"
              },
              {
                "data": "subject_name"
              },
              {
                "data": "exam_date"
              },
              {
                "data": "reporting_time"
              },
              {
                "data": "exam_start_time" //5
              },
              {
                "data": "exam_end_time"
              },
              {
                "data": "hall_id"
              },
              {
                "data": "is_schedule_meeting" //8
              },
              {
                "data": "meeting_date"
              },
              {
                "data": "meeting_time" //10
              },
              {
                "data": "active" //11
              },
              {
                "data": function(data, type, row, meta) {
                  urie = "{{ route('edit-schedule-master','lid')}}";
                  urie = urie.replace('lid', data.id);
                  return '<a href="' + urie + '" class = "editor-edit"> Edit</a>';
                },
                "className": "text-indigo-600 hover:text-indigo-900",
                "orderable": false,
              },
            ],
            "columnDefs": [{
              "targets": [0],
              "visible": false,
            },
            { targets : [8,11],
              render : function (data, type, row) {
                return data == '0' ? 'No' : 'Yes';
          }
        },

          ]
          });
        }
      });
       dataTab.destroy();
    }

      function billingDeal(){
          if ($('#is_schedule_meeting_chk').is(':checked')) {
        $('#meeting_date').prop('readonly', false);
        $('#meeting_time').prop('readonly', false);
        $('#is_schedule_meeting').val("1");
      }else{
        $('#meeting_date').prop('readonly', true);
        $('#meeting_time').prop('readonly', true);
        $('#is_schedule_meeting').val("0");
      }
      }

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
  <!-- /.content-wrapper -->
  @endsection