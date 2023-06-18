@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome To BCPS') }}</div>

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
@endsection