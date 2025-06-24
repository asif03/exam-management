@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Fellow's Details</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Fellow's Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <a href="{{ route('upload-fellows') }}" class="btn btn-primary btn-rounded mt-2">
                    <i class="fas fa-upload"></i> Upload Fellow
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
                        <h5 class="card-title">Select Subject</h5>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-1">
                                    <select class="form-select" name="mother_subject_id" id="mother_subject_id" required
                                        onchange="toggleFellow(this.value)" aria-label="Floating label select example">
                                        <option value="">Select</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="mother_subject_id">Subject</label>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title mt-2 text-info">List of Fellows of Selected Subject:</h5>
                        <div class="row">
                            <div class="col">
                                <div class="p-2 border-info border-1 rounded">
                                    <div class="table-responsive">
                                        <table id="fellowInfoTable" class="table border table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sl.</th>
                                                    <th>Fellowship Type</th>
                                                    <th width="5%">Fellow ID</th>
                                                    <th>Name</th>
                                                    <th>Subject</th>
                                                    <th>PNR</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Deceased?</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                //var dataTab = $('#fellowInfoTable').DataTable();

                getFellows();

                function getFellows() {

                    $.ajax({
                        type: "get",
                        url: "{{ URL::to('/invisilators/get-fellows') }}",
                        dataType: "json",
                        success: function(data) {
                            dataTab = $('#fellowInfoTable').DataTable({
                                "aaData": data,
                                "order": [
                                    [1, 'asc']
                                ],
                                "columns": [{
                                        "data": "id"
                                    },
                                    {
                                        "data": "fellow_status_mame"
                                    },
                                    {
                                        "data": "fellow_id"
                                    },
                                    {
                                        "data": "name"
                                    },
                                    {
                                        "data": "subject_name"
                                    },
                                    {
                                        "data": "pnr_no"
                                    },
                                    {
                                        "data": "mobile"
                                    },
                                    {
                                        "data": "e_mail"
                                    },
                                    {
                                        "data": function(data, type, row, meta) {
                                            if (data.deceased == 'Y') {
                                                return '<span class="badge bg-danger"><i class="fa fa-user-times" aria-hidden="true"></i></span>';
                                            } else {
                                                return '<span class="badge bg-success">No</span>';
                                            }
                                        },
                                    },
                                    {
                                        "data": function(data, type, row, meta) {
                                            urie = "{{ route('fellows.edit', 'lid') }}";
                                            urie = urie.replace('lid', data.id);
                                            return '<a href="' + urie +
                                                '" ><i class="fas fa-edit"></i></a> ' +
                                                '<button class="btn-sm btn" onclick="delSchedule(' +
                                                data.id +
                                                ')"><i class="fas fa-eye"></i></i></button>';
                                        },
                                        "className": "text-indigo-600 hover:text-indigo-900",
                                        "orderable": false,
                                    },
                                ],
                                "columnDefs": [{
                                        "targets": 0,
                                        "visible": false,
                                    },
                                    {
                                        "targets": 8,
                                        "orderable": false,
                                        "searchable": false,
                                        "className": "text-center",
                                    },
                                ]
                            });
                        }
                    });
                }

                function toggleFellow(subjectId) {

                    let subject_id = subjectId;

                    if (!subject_id) {
                        alert("Please select subject first!");
                        return false;
                    }

                    $.ajax({
                        type: "get",
                        url: "{{ URL::to('/invisilators/fellow-list-by-subject') }}",
                        data: {
                            subject_id: subject_id
                        },
                        dataType: "json",
                        success: function(data) {

                            dataTab = $('#fellowInfoTable').DataTable({
                                "aaData": data,
                                "order": [
                                    [1, 'asc']
                                ],
                                "columns": [{
                                        "data": "id"
                                    },
                                    {
                                        "data": "fellow_status_mame"
                                    },
                                    {
                                        "data": "fellow_id"
                                    },
                                    {
                                        "data": "name"
                                    },
                                    {
                                        "data": "subject_name"
                                    },
                                    {
                                        "data": "pnr_no"
                                    },
                                    {
                                        "data": "mobile"
                                    },
                                    {
                                        "data": "e_mail"
                                    },
                                    {
                                        "data": function(data, type, row, meta) {
                                            if (data.deceased == 'Y') {
                                                return '<span class="badge bg-danger"><i class="fa fa-user-times" aria-hidden="true"></i></span>';
                                            } else {
                                                return '<span class="badge bg-success">No</span>';
                                            }
                                        },
                                    },
                                    {
                                        "data": function(data, type, row, meta) {
                                            urie = "{{ route('fellows.edit', 'lid') }}";
                                            urie = urie.replace('lid', data.id);
                                            return '<a href="' + urie +
                                                '" ><i class="fas fa-edit"></i></a> ' +
                                                '<button class="btn-sm btn" onclick="delSchedule(' +
                                                data.id +
                                                ')"><i class="fas fa-eye"></i></i></button>';
                                        },
                                        "className": "text-indigo-600 hover:text-indigo-900",
                                        "orderable": false,
                                    },
                                ],
                                "columnDefs": [{
                                        "targets": 0,
                                        "visible": false,
                                    },
                                    {
                                        "targets": 8,
                                        "orderable": false,
                                        "searchable": false,
                                        "className": "text-center",
                                    },
                                ]
                            });
                        }
                    });
                    dataTab.destroy();
                }
            </script>
        </div>
    </div>
@endsection
