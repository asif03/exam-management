@if(session()->has('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session()->get('success') }}</strong>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ session()->get('error') }}</strong>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            @foreach ($errors->all() as $error)
            <p class="ml-6">{{ $error }}</p>
            @endforeach
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
@endif