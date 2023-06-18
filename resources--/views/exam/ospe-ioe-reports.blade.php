@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">OSPE/IOE/OSCE Seheduling Reports</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Scheduling Reports</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form id="sub-sw-form" action="{{ route('convocation-picture-pdf') }}" method="POST"
                    data-toggle="validator" role="form" onsubmit="return submitForm(this);">
                    @csrf
                    <x-alert />
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-1">
                                <select class="form-select" name="examType" id="examType" required
                                    aria-label="Floating label select">
                                    <option value="">Select</option>
                                    @foreach($examtype as $xmtype)
                                    <option value="{{ $xmtype->id }}">{{ $xmtype->exam_type}}</option>
                                    @endforeach
                                </select>
                                <label for="examType">Exam Type</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-1">
                                <select class="form-select" name="examYear" id="examYear" required
                                    aria-label="Floating label select">

                                    <option value="@php echo date('Y'); @endphp">@php echo date('Y'); @endphp</option>
                                    @foreach(range(date('Y')-1, date('Y') - 5) as $y)
                                    <option value="{{ $y }}">{{ $y}}</option>
                                    @endforeach
                                </select>
                                <label for="examYear">Year</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating mb-1">
                                <select class="form-select" name="examSession" id="examSession" required>
                                    <option value="">Select</option>
                                    <option value="JAN">January</option>
                                    <option value="JUL">July</option>
                                </select>
                                <label for="session">Session</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-1">
                                <select class="form-select" name="motherSubject" id="motherSubject" required onchange=""
                                    aria-label="Floating label select example">
                                    <option value="">Select</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                                    @endforeach
                                </select>
                                <label for="motherSubject">Subject</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col text-center p-2">
                            <button type="button" class="btn btn-primary" onclick="viewSchedule()">View Schedule
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <table id="scheduleList" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Exam Type</th>
                            <th>Subject</th>
                            <th>Block Name</th>
                            <th>Hall</th>
                            <th>Exam Date</th>
                            <th>Exam Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLongTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scheduleModalLongTitle">View Schedule Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                        dataTab = $('#scheduleList').DataTable({
                            responsive: true,
                            columnDefs: [
                                {
                                    targets: 0,
                                    visible: false
                                }]
                        });
                    });

                    function viewSchedule() {

											
                        let exam_type = $("#examType").val();
                        if (!exam_type) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please Select Exam Type!',
                            });
                            return false;
                        }

                        let exam_year = $("#examYear").val();
                        if (!exam_year) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please Select Year!',
                            });
                            return false;
                        }
                        let exam_session = $("#examSession").val();
                        if (!exam_session) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please Select Session!',
                            });
                            return false;
                        }
                        let subject = $("#motherSubject").val();
                        if (!subject) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Please Select Subject!',
                            });
                            return false;
                        }

                        $.ajax({
                            type: "post",
                            url: "{{ URL::to('exam/view-ospeioe-list') }}",
                            data: {
                                '_token': '{{ csrf_token() }}',
                                exam_type: exam_type,
                                exam_year: exam_year,
                                exam_session: exam_session,
                                subject: subject
                            },
                            dataType: "json",
                            success: function (data) {
                                dataTab = $('#scheduleList').DataTable({
                                    "aaData": data,
                                    "columns": [{
                                        "data": "id"
                                    },
                                        {
                                            "data": "exam_type"
                                        },
                                        {
                                            "data": "subject_name"
                                        },
                                        {
                                            "data": "block_name"
                                        },
                                        {
                                            "data": "hall_name"
                                        },
                                        {
                                            "data": "exam_date"
                                        },
                                        {
                                            "data": "exam_start_time"
                                        },
                                        {
                                            "data": function (data) {
                                                let url = '{{route("edit-ospe-ioe-details-schedule","")}}';
                                                let finalUrl = url + '/' + data.id;
                                                
                                                return '<button type="button" class="btn btn-outline-primary btn-xs" data-toggle="modal" onclick="showSchedule(' + data.id + ')" data-target="#openModal"><i class="fas fa-eye"></i></button>'
                                                    + '<a class="btn btn-outline-primary btn-xs" href="' + finalUrl + '"><i class="fas fa-edit"></i></a>';
                                            },
                                            "className": "",
                                            "orderable": false,
                                        }

                                    ],
                                    "columnDefs": [{
                                        "targets": [0],
                                        "visible": false,
                                    }]
                                });
                            },
                            error: function (jqXHR, exception) {
                                var msg = '';
                                if (jqXHR.status === 0) {
                                    msg = 'Not connect.\n Verify Network.';
                                } else if (jqXHR.status == 404) {
                                    msg = 'Requested page not found. [404]';
                                } else if (jqXHR.status == 500) {
                                    msg = 'Internal Server Error [500].';
                                } else if (exception === 'parsererror') {
                                    msg = 'Requested JSON parse failed.';
                                } else if (exception === 'timeout') {
                                    msg = 'Time out error.';
                                } else if (exception === 'abort') {
                                    msg = 'Ajax request aborted.';
                                } else {
                                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                }
                                alert(msg);
                            },
                        });

                        dataTab.destroy();
                    }

                    function showSchedule(scheduleId) {
                        $.ajax({
                            type: "get",
                            url: "{{ URL::to('exam/view-schedule') }}/" + scheduleId,
                            data: "",
                            success: function (data) {
                                //alert(data);
                                $(".modal-body").html(data);
                            }
                        });
                    }
            </script>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection