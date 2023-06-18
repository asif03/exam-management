@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Golden Jubilee</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Golden Jubilee</li>
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
          <h3 class="text-center">Registered Fellows/Members List</h3>
          <div class="mt-3">
            <ul class="nav nav-tabs" id="myTab">
              <li class="nav-item">
                <a href="#fcps" class="nav-link active fw-bold" data-bs-toggle="tab">FCPS(Fellows) List</a>
              </li>
              <li class="nav-item">
                <a href="#mcps" class="nav-link fw-bold" data-bs-toggle="tab">MCPS(Member) List</a>
              </li>
            </ul>

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

              <div class="tab-pane fade" id="mcps">
                <div class="mcps-list mt-3">
                  <table id="listmcps" class="table table-striped" style="width:100%">
                    <thead>
                      <tr>
                        <th>Member ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Entry Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data['members'] as $member)
                      <tr>
                        <td>{{ $member->fellow_id }}</td>
                        <td>{{ Str::upper($member->candidate_name) }}</td>
                        <td>{{ $member->mobile }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->reg_fee }}</td>
                        @if ($member->created_at!='')
                        <td>{{ $member->created_at->format('d-m-Y') }}</td>
                        @else
                        <td></td>
                        @endif
                        <td>
                          <button type="button" class="btn btn-outline-primary btn-xs" data-toggle="modal"
                            onclick="showApplicant({{ $member->id }})" data-target="#openModal"><i
                              class="fas fa-eye"></i>
                          </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>

                    <tfoot>
                      <tr>
                        <th>Member ID</th>
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
              $('#listmcps').DataTable({
                  "order": [[ 5, "desc" ]]
              });
              $("#myTab a:first").tab("show");
            });

            function showApplicant(applicantId){
              $.ajax({
                type: "get",
                url: "{{ URL::to('jubileeguest') }}/" + applicantId,
                data: "",
                success: function(data) {
                  $(".modal-body").html(data);
                }
              });
            }
          </script>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection