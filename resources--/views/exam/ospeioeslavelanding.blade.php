@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">OSPE IOE Scheduler Details </h1>
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
    <section class="content">
        <div class="container-fluid">
            <form id="ospe-ioe-form-details" data-toggle="validator" role="form" onsubmit="">
                @csrf
                <x-alert />
                <!-- Main row -->

                <div class="p-2 border border-success border-2 rounded">

                    <div class="row">

                        <div class="col">
                            <div class="form-floating mb-1">
                                <select class="form-select" name="mother_subject_id" id="mother_subject_id" required
                                    onchange="toggleFellow(this)" aria-label="Floating label select example">
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
                                <select class="form-select" name="scheduler_id" id="scheduler_id" required onchange=""
                                    aria-label="Floating label select example">
                                </select>
                                <label for="scheduler_id">Scheduler ID</label>
                                <input type="hidden" class="form-control" name="exam_end_time1" id="exam_end_time1"
                                    value="" required maxlength="150">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            {{-- <div class="text-center p-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div> --}}
                        </div>

                    </div>

                </div>
            </form>


            <div class="p-2 border border-danger border-2 rounded">
                <table id="fellowInfoTable" class="table table-hover table-warning">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fellow Id</th>
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

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


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
                    alert("Choose a schedule first!");
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
                            alert("Data saved successfully!");
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
                    //url: '/exam-info-data',
                    data: {subject_id: subject_id},
                    dataType: "json",
                    success: function (data) {

                        dataTab = $('#fellowInfoTable').DataTable({
                            "aaData": data,
                            order: [[1, 'desc']],
                            "columns": [{
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
                                        return '<button class = "editor-edit" onclick="saveDetails(' + data.id + ',' + data.fellow_id + ')" > Save</button>  ';
                                    },
                                    "className": "text-indigo-600 hover:text-indigo-900",
                                    "orderable": false,
                                },
                            ],
                            "columnDefs": [{
                                "targets": [0],
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
<!-- /.content-wrapper -->
@endsection