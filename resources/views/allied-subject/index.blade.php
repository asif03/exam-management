@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Allied Subjects List</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Allied Subject List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 d-flex justify-content-end">
            <a href="{{ route('allied-subjects.create') }}" class="btn btn-primary btn-rounded mt-2">
                <i class="icon-link"></i> Link Allied Subjects
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
                    <h5 class="card-title">Allied Subject List</h5>

                    <form id="sub-sw-form" method="POST" data-toggle="validator" role="form"
                        onsubmit="return submitForm(this);">
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
                    <h5 class="card-title mt-2 text-info">List of Allied Subject:</h5>
                    <div class="row">
                        <div class="col">
                            <div class="p-2 border border-info border-1 rounded">
                                <div class="table-responsive">
                                    <table id="subjectList"
                                        class="table border table-striped table-bordered text-nowrap"
                                        style="width:100%">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
</div>
@endsection