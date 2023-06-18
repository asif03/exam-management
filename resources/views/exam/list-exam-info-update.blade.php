@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Training Institute Information Update List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('exam-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Training Institute Info Update List</li>
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
        <div class="text-center p-2">

          <form action="{{ route('exam-info-update-file') }}" method="GET">
            @csrf
            <div class="row">
              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="exam_year" id="exam_year" required
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
                  <select class="form-select" name="exam_session" id="exam_session" required
                    aria-label="Floating label select example">
                    <option selected value="JAN">January</option>
                    <option value="JUL">July</option>
                  </select>
                  <label for="exam_session">Session</label>
                </div>
              </div>

              <div class="col">
                <div class="form-floating mb-1">
                  <select class="form-select" name="subject_id" id="subject_id" required
                    aria-label="Floating label select example">
                    <option value="">Select</option>
                    <option value="-1">All Subjects</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                    @endforeach
                  </select>
                  <label for="subject_id">Subject</label>
                </div>
              </div>
            </div>

            <div class="text-center p-2">
              <button type="submit" id="" onclick="" class="btn btn-outline-danger">Export Excel</button>
              <a class="btn btn-outline-success" href="{{ route('exam-info-update') }}">Add</a>
            </div>
          </form>
        </div>

        <table id="exInfoTable" class="table table-hover table-danger">
          <thead>
            <tr>
              <th>ID</th>
              <th>Subject</th>
              <th>Name</th>
              <th>Roll</th>
              <th>BMDC</th>
              <th>Year</th>
              <th>Sessiion</th>
              <th>Mobile</th>
              <th>Action</th>

            </tr>
          </thead>
        </table>

      </div>

      <script>
        $(document).ready(function() {
          getListFn();
          });
      
          function getListFn() {
            let exmYear = $( "#exam_year" ).val();
            let exmSess = $( "#exam_session" ).val();
      
            $.ajax({
              type: "get",
               url: '{{URL::to('/exam-info-data')}}', 
              //url: '/exam-info-data', 
              data: { exYear: exmYear, exSession: exmSess },
              dataType: "json",
              success: function(data) {
                // debugger
                //console.log(data);
                dataTab = $('#exInfoTable').DataTable({
                  "aaData": data,
                  "columns": [{
                      "data": "id"
                    },
                    {
                      "data": "subject_name"
                    },
                    {
                      "data": "candidate_name"
                    },
                    {
                      "data": "roll_no"
                    },
                    {
                      "data": "bmdc_reg_no"
                    },
                    {
                      "data": "exam_year"
                    },
                    {
                      "data": "exam_session"
                    },
                    {
                      "data": "mobile"
                    },
                    {
                      "data": function(data, type, row, meta) {
                        var uri = "";
                        urie = "{{ route('edit-exam-info-update','lid')}}";
                        urid = "{{ route('exam-info-delete','lid')}}";
                        urie = urie.replace('lid', data.id);
                        urid = urid.replace('lid', data.id);
                        return '<a href="' + urie + '" class = "editor-edit"> Edit</a> | <a href="' + urid + '" class="delete">Delete</a > ';
                      },
                      "className": "text-indigo-600 hover:text-indigo-900",
                      "orderable": false,
                    },
                  ],
                  "columnDefs": [{
                    "targets": [0],
                    "visible": false,
                  }, ]
                });
              }
            });
          //   dataTab.destroy();
          }
      
        
      </script>
    </div>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->
@endsection