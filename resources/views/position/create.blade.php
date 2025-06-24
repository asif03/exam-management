@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Invisilator's Role Info</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Edit Position Info</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 d-flex justify-content-end">
                <a href="{{ route('exam-schedule-roles.index') }}" class="btn btn-primary btn-rounded mt-2">
                    <i class="fas fa-list"></i> Role List
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
                        <h5 class="card-title">New Invisilator's role</h5>
                        <x-alert />
                        <form action="{{ route('exam-schedule-roles.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control" name="position_name" id="position_name"
                                            value="{{ old('position_name') }}" required>
                                        <label for="position_name">Position Name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control" name="descirption" id="descirption"
                                            value="{{ old('descirption') }}">
                                        <label for="descirption">Remarks (If Any)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-left p-2">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
