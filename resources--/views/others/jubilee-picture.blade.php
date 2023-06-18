@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Golden Jubilee Picture View</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Picture View</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        @php $rowId = 0; @endphp
        @foreach($data['fellows'] as $fellow)
        @if($rowId%5==0)
      </div>
      <div class="row">
        <div class="col p-2">
          @else
          <div class="col p-2">
            @endif
            <table class="table border rounded-3">
              <tr>
                <td align="center">
                  <img src="{{ asset('storage') }}/{{ $fellow->img_up_file }}" alt="Image" width="100" height="120" />
                </td>
              </tr>
              <tr>
                <td>Fellow ID: {{$fellow->fellow_id}}</td>
              </tr>
              <tr>
                <td>{{$fellow->candidate_name}}</td>
              </tr>
            </table>
          </div>
          @php $rowId = $rowId+1; @endphp
          @endforeach
        </div>
        <div class="row">
          {{ $data['fellows']->links() }}
        </div>
        <div class="mb-3">
          <a class="btn btn-primary" href="jubilee-picture-pdf?page=@php echo $_REQUEST['page']; @endphp">Download
            Page-@php echo $_REQUEST['page']; @endphp</a>
        </div>
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection