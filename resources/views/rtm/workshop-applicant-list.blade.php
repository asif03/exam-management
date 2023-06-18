@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Workshop</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Training/Workshop</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Main row -->
      <div class="row">
        <div class="container d-flex flex-column">
          <h3 class="text-center">Registered Fellows List</h3>
          <div class="mt-3">


            <div class="tab-content">
              <div class="tab-pane fade show active" id="fcps">
                <div class="fcps-list mt-3">
                  <table id="listfcps" class="table table-striped bo" style="width:100%">
                    <thead>
                      <tr>
                        <th>Fellow ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Entry Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data['fellows'] as $fellow)
                      <tr>
                        <td>{{ $fellow->fellow_id }}</td>
                        <td>{{ Str::upper($fellow->candidate_name) }}</td>
                        <td>{{ $fellow->mobile }}</td>
                        <td>{{ $fellow->email }}</td>
                        <td>{{ $fellow->reg_fee }}</td>
                        @if ($fellow->created_at!='')
                        <td>{{ $fellow->created_at->format('d-m-Y') }}</td>
                        @else
                        <td></td>
                        @endif
                        <td>
                          <button type="button" class="btn btn-outline-primary btn-xs" data-toggle="modal"
                            onclick="showApplicant({{ $fellow->id }})" data-target="#openModal"><i
                              class="fas fa-eye"></i>
                          </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Fellow ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Entry Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Applicant Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>

          <script>
            $(document).ready(function() {
              $('#listfcps').DataTable({
                  "order": [[ 5, "desc" ]]
              });
            });

            function showApplicant(applicantId){
              $.ajax({
                type: "get",
                url: "{{ URL::to('applicantview') }}/" + applicantId,
                data: "",
                success: function(data) {
                  $(".modal-body").html(data);
                }
              });
            }
          </script>
        </div>
      </div>
      <!-- /.row (main row) -->
      <div class="row">
        <div class="col-md-6  mt-3 mb-3">
          <form id="sub-sw-form" action="{{ route('download-list-pdf') }}" method="POST" data-toggle="validator"
            role="form">
            @csrf
            <div class="row">
              <div class="col text-center p-2">
                <button type="submit" class="btn btn-primary">Download as PDF</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6 mt-3 mb-3">
          <form id="sub-sw-form" action="{{ route('download-list-excel') }}" method="POST" data-toggle="validator"
            role="form">
            @csrf
            <div class="row">
              <div class="col text-center p-2">
                <button type="submit" class="btn btn-primary">Download as Excel</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection