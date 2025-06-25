@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Modified Fellow List</h4>
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
                        <h5 class="card-title">Update Modified Fellow List</h5>
                        <form action="{{ route('bulk-fellows-update') }}" method="POST">
                            @csrf
                            <x-alert />
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
                                                <tbody>
                                                    @foreach ($fellows as $fellow)
                                                        <tr>
                                                            <td>{{ $fellow->fellow_status_mame }}</td>
                                                            <td>{{ $fellow->fellow_id }}</td>
                                                            <td>{{ $fellow->name }}</td>
                                                            <td>{{ $fellow->subject_name }}</td>
                                                            <td>{{ $fellow->mobile }}</td>
                                                            <td>{{ $fellow->e_mail }}</td>
                                                            <td>{{ $fellow->deceased }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-left p-2">
                                        <button type="submit" class="btn btn-primary">Update Fellows</button>
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
        $(document).ready(function() {
            $('#fellowInfoTable').DataTable({
                "order": [
                    [0, "asc"]
                ]
            });
        });
    </script>
@endsection
