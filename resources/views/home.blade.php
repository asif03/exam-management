@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
                @php
                if ($currentHour >= 5 && $currentHour < 12) { $greeting='Good Morning' ; } elseif ($currentHour>= 12 &&
                    $currentHour < 18) { $greeting='Good Afternoon' ; } else { $greeting='Good Evening' ; } echo
                        $greeting; @endphp {{ Auth::user()->name }}!
            </h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-end">
                <select
                    class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                    <option selected>
                        @php
                        echo date('d-M-Y');
                        @endphp
                    </option>
                </select>
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
                    <div class="alert alert-primary text-center">
                        <strong>Welcome To BCPS ERP Solution!</strong>
                    </div>
                    <div class="card-body d-flex flex-row p-2">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @foreach($modules as $module)
                        @if($module->dashboard!=null)
                        <div class="card d-flex flex-column align-items-center m-1" style="width: 13rem;">
                            <a href="{{ route($module->dashboard) }}" class="p-1">
                                <img class="img-fluid" src="{{ asset('public/images/'.$module->icon_path) }}"
                                    alt="{{ $module->module_name }}" title="{{ $module->module_name }}">
                            </a>
                            <div class="card-body text-center">
                                <a href="{{ route($module->dashboard) }}">
                                    <h5 class="card-title">{{ $module->display_name }}</h5>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection