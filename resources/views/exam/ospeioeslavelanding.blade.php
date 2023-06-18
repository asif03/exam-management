@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">OSPE/OSCE/IOE Schedule Details</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Schedule Details</li>
                    </ol>
                </nav>
            </div>
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
                    <h5 class="card-title">Entry Schedule Details</h5>
                    <form id="ospe-ioe-form-details" data-toggle="validator" role="form">
                        @csrf
                        <x-alert />
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-1">
                                    <select class="form-select" name="mother_subject_id" id="mother_subject_id" required
                                        onchange="toggleFellow(this)" aria-label="Floating label select example">
                                        <option value="">Select</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subject_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label for="mother_subject_id">Mother Subject</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-1">
                                    <select class="form-select" name="scheduler_id" id="scheduler_id" required
                                        onchange="" aria-label="Floating label select example">
                                    </select>
                                    <label for="scheduler_id">Scheduler ID</label>
                                    <input type="hidden" class="form-control" name="exam_end_time1" id="exam_end_time1"
                                        value="" required maxlength="150">
                                </div>
                            </div>
                        </div>
                    </form>
                    <h5 class="card-title mt-2 text-info">List of Fellows of Selected Subject:</h5>
                    <div class="row">
                        <div class="col">
                            <div class="p-2 border border-info border-1 rounded">
                                <div class="table-responsive">
                                    <table id="fellowInfoTable" class="table border table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th width="5%">Fellow ID</th>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>PNR</th>
                                                <th>Mobile</th>
                                                <th>Role</th>
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
            var dataTab = $('#fellowInfoTable').DataTable();
            var map = new Map();
            var keys = [];
            var times = [];

            $(document).ready(function () {
                getScheduleRoles();
            });

            function getScheduleRoles() {
                $.ajax({
                    type: "get",
                    url: "{{URL::to('/exam/ospeioe/getschsduleroles') }}",
                    data: null,
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (i) {
                            keys.push(data[i].id);
                            times.push(data[i].position_name);
                        });
                    }
                });
            }

            function buildDropdown(map, rowid) {
                var dropdown = "<select id ='dropdown" + rowid + "'>";
                for (var key of map.keys()) {
                    var option = "<option value=\"" + key + "\">" + map.get(key) + "</option>";
                    dropdown = dropdown + option;
                }
                dropdown = dropdown + "</select>";
                return dropdown;
            }

            function toggleFellow(subjt) {
                for (var i = 0; i < keys.length; i++) {
                    map.set(keys[i], times[i]);
                }
                getschedulebySubject(subjt);
                getListFn(subjt);
            }

            function getschedulebySubject(subjt) {
                let subject_id = subjt.value;
                if (!subject_id) {
                    alert("Please select subject first!");
                    return false;
                }
                if (subject_id) {
                    $.ajax({
                        type: "get",
                        url: "{{URL::to('/exam/get-mastersch-mother-sub') }}",
                        data: {subject_id: subject_id},
                        dataType: "json",
                        success: function (data) {
                            $('select[name="scheduler_id"]').empty();
                            $('select[name="scheduler_id"]').append('<option value="">Select</option>');
                            $.each(data, function (i) {
                                $('select[name="scheduler_id"]').append('<option value="' + data[i].id +
                                    '">' + data[i].exam_type_id + ' | ' + data[i].exam_date +
                                    ' | ' + data[i].exam_start_time + ' | ' + data[i].hall_id + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="scheduler_id"]').empty();
                }
            }

            function saveDetails(dataval, felloId) {
                var myFormData = $("#ospe-ioe-form-details").serializeArray();
                let schedule_master_id2 = myFormData[2].value;
                if (!schedule_master_id2) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Choose a schedule first!',
                        });
                    return false;
                }

                let schedule_master_id = Number(myFormData[2].value);
                let fellow_id = dataval;
                let role_id = Number($('#dropdown' + dataval).val());
                let _token = myFormData[0].value;
                let active = 1;

                $.ajax({
                    url: "{{URL::to('/exam/save-sch-detail') }}",
                    type: "POST",
                    data: {
                        schedule_master_id: schedule_master_id,
                        fellow_id: fellow_id,
                        role_id: role_id,
                        active: active,
                        _token: _token
                    },
                    success: function (response) {
                        if (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data saved successfully!'
                            });
                        }
                    },
                    error: function (error) {
                        //alert(text(response.responseJSON.errors.schedule_master_id));
                    }
                });
            }

            function getListFn(subjt) {
                let subject_id = subjt.value;
                if (!subject_id) {
                    alert("Please select subject first!");
                    return false;
                }

                $.ajax({
                    type: "get",
                    url: "{{URL::to('/exam/fellow-by-subject')}}",
                    data: {subject_id: subject_id},
                    dataType: "json",
                    success: function (data) {
                        dataTab = $('#fellowInfoTable').DataTable({
                            "aaData": data,
                            "order": [[1, 'desc']],
                            "columns": [
                                {
                                    "data": "id"
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
                                    "data": ""
                                },
                                {
                                    "data": function (data, type, row, meta) {
                                        urie = "";
                                        return '<button class = "btn btn-primary editor-edit btn-sm" onclick="saveDetails(' + data.id + ',' + data.fellow_id + ')" > Save</button>  ';
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
                                    targets: [6],
                                    render: function (data, type, row) {
                                        var databack = buildDropdown(map, row.id);
                                        return databack;
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
</div>
@endsection