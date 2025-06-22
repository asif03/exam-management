@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Link Allied Subject</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Link Allied Subject</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <a href="{{ route('allied-subjects.index') }}" class="btn btn-primary btn-rounded mt-2">
                    <i class="fas fa-list"></i> Allied Subjects
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
                        <h5 class="card-title">Link New Subject</h5>
                        <form action="{{ route('allied-subjects.store') }}" method="POST">
                            @csrf
                            <x-alert />
                            <div class="row">
                                <div class="col">
                                    <div class="p-2 border-info border-1 rounded">
                                        <div class="table-responsive">
                                            <table id="fellowInfoTable" class="table border table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sl.</th>
                                                        <th width="5%">Fellow ID</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($fellows as $fellow)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $fellow->fellow_id }}</td>
                                                            <td>{{ $fellow->fellow_name }}</td>
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
        $(document).ready(function() {
            $('#fellowInfoTable').DataTable({
                "order": [
                    [0, "asc"]
                ]
            });
        });
    </script>
@endsection
