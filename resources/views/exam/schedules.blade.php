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
            <li class="breadcrumb-item text-muted active" aria-current="page">Schedules</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 d-flex justify-content-end">
      <a href="{{ route('show-ospeioe') }}" class="btn btn-primary btn-rounded mt-2"><i class="fas fa-plus"></i> Add
        New</a>
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
          <h5 class="card-title">Schedule List</h5>
          <div class="table-responsive">
            <table id="scheduleInfoTable" class="table border table-striped table-bordered text-nowrap">
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
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#myscheduleInfoTableTable').DataTable({});
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
  </script>
</div>
@endsection