@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">New Fellow List</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Fellows</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <a href="{{ route('fellows.index') }}" class="btn btn-primary btn-rounded mt-2">
                    <i class="fa fa-user-md" aria-hidden="true"></i> Fellow List
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
                        <h5 class="card-title">New Fellows to Import</h5>
                        <form action="{{ route('fellows.store') }}" method="POST">
                            @csrf
                            <x-alert />
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-1">
                                        <select class="form-select" name="fellowType" id="fellowType" required
                                            onchange="toggleFellow(this.value)" aria-label="Floating label select example">
                                            <option value="">Select</option>
                                            @foreach ($fellowTypes as $fellowType)
                                                <option value="{{ $fellowType->id }}">{{ $fellowType->fellow_status_mame }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="fellowType">Fellowship Type</label>
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
                                                        <th>Fellowship Type</th>
                                                        <th width="5%">Fellow ID</th>
                                                        <th>Name</th>
                                                        <th>Subject</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Deceased?</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-left p-2">
                                        <button type="submit" class="btn btn-primary">Add New Fellows</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleFellow(fellowShipType) {

            if (fellowShipType == "") {
                $('#fellowInfoTable').DataTable().clear().draw();
                return;
            }

            $.ajax({
                type: "get",
                url: "{{ URL::to('/invisilators/new-fellows-by-type') }}",
                data: {
                    fellowShipTypeId: fellowShipType
                },
                dataType: "json",
                success: function(data) {

                    dataTab = $('#fellowInfoTable').DataTable({
                        "aaData": data,
                        "order": [
                            [1, 'asc']
                        ],
                        "columns": [{
                                "data": function(data, type, row, meta) {
                                    if (data.fellow_type_id == 1) {
                                        return 'Fellow With Exam';
                                    } else if (data.fellow_type_id == 2) {
                                        return 'Fellow Without Exam';
                                    } else if (data.fellow_type_id == 3) {
                                        return 'Honorary Fellow';
                                    }
                                },
                            },
                            {
                                "data": "fellow_id"
                            },
                            {
                                "data": "fellow_name"
                            },
                            {
                                "data": "sub"
                            },
                            {
                                "data": "mobile"
                            },
                            {
                                "data": "email"
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

                        ],
                        "columnDefs": [{
                            "targets": 6,
                            "orderable": false,
                            "searchable": false,
                            "className": "text-center",
                        }, ]
                    });
                }
            });
            dataTab.destroy();
        }
    </script>
@endsection
