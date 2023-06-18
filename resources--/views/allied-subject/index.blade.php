@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Allied Subjects List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Allied Subject List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="d-flex flex-row-reverse">
                    <a href="{{route('allied-subjects.create')}}" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true"></i> Link Allied Subjects
                    </a>
                </div>
            </div>
            <div class="row">
                <form id="sub-sw-form" action="{{ route('convocation-picture-pdf') }}" method="POST"
                    data-toggle="validator" role="form" onsubmit="return submitForm(this);">
                    @csrf
                    <x-alert />
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-1">
                                <select class="form-select" name="motherSubject" id="motherSubject" required
                                    aria-label="Floating label select example">
                                    <option value="">Select</option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                                    @endforeach
                                </select>
                                <label for="motherSubject">Mother Subject</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center p-2">
                            <button type="button" class="btn btn-primary" onclick="viewSubjects()">
                                View Allied Subjects
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <table id="subjectList" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mother Subject</th>
                            <th>Mother Subject SP Code</th>
                            <th>Allied Subject</th>
                            <th>Allied Subject SP Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <script>
                $(document).ready(function () {
                    dataTab = $('#subjectList').DataTable({
                        responsive: true,
                        columnDefs: [
                            {
                                targets: 0,
                                visible: false
                            }]
                    });
                });

                function viewSubjects() {
                                        
                    let motherSubjectId = $("#motherSubject").val();
                    if (!motherSubjectId) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please Select Mother Subject!',
                        });
                        return false;
                    }

                    $.ajax({
                        type: "post",
                        url: "{{ URL::to('view-allied-subjects') }}",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            mother_subject_id: motherSubjectId,
                        },
                        dataType: "json",
                        success: function (data) {
                            dataTab = $('#subjectList').DataTable({
                                "aaData": data,
                                "columns": [{
                                    "data": "id"
                                },
                                {
                                    "data": "mother_subject_name"
                                },
                                {
                                    "data": "mother_sp_code"
                                },
                                {
                                    "data": "subject_name"
                                },
                                {
                                    "data": "subject_sp_code"
                                },
                                {
                                    "data": function (data) {
                                        let url = '{{route("allied-subjects-delete","")}}';
                                        let finalUrl = url + '/' + data.id;
                                        return '<a class="btn btn-outline-danger btn-xs" href="' + finalUrl + '"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                    },
                                    "className": "",
                                    "orderable": false,
                                }],
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
            </script>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection