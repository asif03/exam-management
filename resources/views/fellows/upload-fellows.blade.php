@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1"> Fellow's Information</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Upload fellow's information
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 d-flex justify-content-end gap-2">
                <a href="{{ route('fellows.create') }}" class="btn btn-primary btn-rounded mt-2">
                    <i class="fa fa-user-plus" aria-hidden="true"></i> Add New Fellow List
                </a>
                <a href="{{ route('bulk-fellows-edit') }}" class="btn btn-primary btn-rounded mt-2">
                    <i class="fa fa-user-md" aria-hidden="true"></i> Update Fellow's List
                </a>
                <a href="{{ route('fellows.create') }}" class="btn btn-primary btn-rounded mt-2">
                    <i class="fas fa-list"></i> Fellow's List
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
                        <h4 class="card-title">Upload Fellow File</h4>
                        <h6 class="card-subtitle">Must use <code>xlsx</code></h6>
                        <x-alert />
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <p class="text-sm font-bold text-primary">Excel Must Contains the following fields with same
                                    headings
                                    bellow:
                                </p>
                                <ul class="text-sm list-disc ml-5">
                                    <li>1st Column: Fellow ID</li>
                                    <li>2nd Column: Fellow Name</li>
                                    <li>3rd Column: Fellowship Date</li>
                                    <li>4th Column: Subject</li>
                                    <li>5th Column: Institute</li>
                                    <li>6th Column: Designation</li>
                                    <li>7th Column: Fellow Type</li>
                                    <li>8th Column: Mailing Address</li>
                                    <li>9th Column: Office/Residence address</li>
                                    <li>10th Column: Mobile</li>
                                    <li>11th Column: Phone Office</li>
                                    <li>12th Column: Phone Home</li>
                                    <li>13th Column: Fax</li>
                                    <li>14th Column: Email</li>
                                    <li>15th Column: Lifetime</li>
                                    <li>16th Column: Deceased</li>
                                    <li>17th Column: Retired</li>
                                    <li>18th Column: Gender</li>
                                    <li>19th Column: UpdateAt</li>
                                </ul>
                                <p class="text-sm font-bold text-primary">N.B: No other Column(s)/Extra Sheets contains in
                                    Excel.</p>
                            </div>
                            <div class="md:col-span-2">
                                <form class="mt-3" action="{{ route('import-fellows') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col">
                                            <input class="form-control" type="file" id="fellowExcelFile"
                                                name="fellowExcelFile" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
