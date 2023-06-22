@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show alert-block" role="alert">
    <strong>Success - </strong> {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show alert-block" role="alert">
    <strong>Error - </strong> {{ session()->get('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show alert-block" role="alert">
    <div class="d-flex">
        <div class="toast-body">
            @foreach ($errors->all() as $error)
            <p class="ml-6">{{ $error }}</p>
            @endforeach
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif