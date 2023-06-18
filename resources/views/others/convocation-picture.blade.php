@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Convocation Picture View</h1>
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
        <form id="sub-sw-form" action="{{ route('convocation-picture-pdf') }}" method="POST" data-toggle="validator"
          role="form" onsubmit="return submitForm(this);">
          @csrf
          <x-alert />
          <div class="row">
            <div class="col">
              <div class="form-floating mb-1">
                <select class="form-select" name="degree" id="degree" required>
                  <option value="">Select</option>
                  <option value="fcps">FCPS</option>
                  <option value="mcps">MCPS</option>
                </select>
                <label for="degree">Fellow/Member</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-1">
                <select class="form-select" name="year" id="year" required>
                  <option value="">Select</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                </select>
                <label for="year">Year</label>
              </div>
            </div>

            <div class="col">
              <div class="form-floating mb-1">
                <select class="form-select" name="session" id="session" required>
                  <option value="">Select</option>
                  <option value="JAN">January</option>
                  <option value="JUL">July</option>
                </select>
                <label for="session">Session</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col text-center p-2">
              <button type="button" class="btn btn-primary" onclick="viewImages()">View</button>
              <button type="submit" class="btn btn-primary">Download PDF</button>
            </div>
          </div>
        </form>
      </div>
      <div class="row" id="picturelst"></div>
      <script>
        function viewImages() {
      
          let degree_type = $("#degree").val();
          if(!degree_type){
            alert("Please Select Fellow Or Member.");
            return false;
          }

          let year = $("#year").val();
          if(!year){
            alert("Please Select Year.");
            return false;
          }

          let session = $("#session").val();
          if(!session){
            alert("Please Select Session.");
            return false;
          }

          $.ajax({
            type: "post",
            url: "{{ URL::to('convocation-image-view') }}",
            data: {'_token': '{{ csrf_token() }}', degree_type: degree_type, year: year, session: session},
            success: function(result) {
              $("#picturelst").html(result);
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
        }
      </script>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection