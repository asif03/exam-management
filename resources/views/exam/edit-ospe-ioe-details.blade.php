@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Assign Invisilators Info</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">Change Assignment of Invisilator</li>
          </ol>
        </nav>
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
          <div class="row">
            <div class="col-12">
              <h5 class="card-title">Edit invigilators :: {{
                $data['schedule']->exam_type }}
                EXAM, {{
                $data['schedule']->exam_session }} {{ $data['schedule']->exam_year }}
              </h5>
            </div>
          </div>

          <div class="row m-1">
            <table width="100%">
              <tr>
                <td style="font-size: 16px; font-weight: bold; text-align: left;">
                  Subject: {{ $data['schedule']->subject_name }}
                </td>
                <td style="font-size: 16px; font-weight: bold; text-align: left;">
                  Date: {{ $data['schedule']->exam_date }}
                </td>
                <td style="font-size: 16px; font-weight: bold; text-align: left;">
                  Time: {{ $data['schedule']->exam_start_time }}
                </td>
              </tr>
              <tr>
                <td style="font-size: 16px; font-weight: bold; text-align: left;">
                  Organization Meeting:
                </td>
                <td style="font-size: 16px; font-weight: bold; text-align: left;">
                  Date: {{ $data['schedule']->meeting_date }}
                </td>
                <td style="font-size: 16px; font-weight: bold; text-align: left;">
                  Time: {{ $data['schedule']->meeting_time }}
                </td>
              </tr>
              <tr>
                <td style="font-size: 16px; font-weight: bold; text-align: left;">
                  Block: {{ $data['schedule']->block_name }}
                </td>
                <td colspan="2" style="font-size: 16px; font-weight: bold; text-align: left;">
                  Hall: {{ $data['schedule']->hall_name }}
                </td>
              </tr>
            </table>
          </div>
          <div class="row m-1">
            <div class="col-6 d-flex justify-content-start">
              <h5 class="card-title text-info">List of Schedules of Selected Subject:</h5>
            </div>
            <div class="col-6 d-flex justify-content-end">
              <a class="btn btn-primary btn-sm" href="{{ route('schedule-download', $data['schedule']->id ) }}">Download
                Schedule</a> |
              <a class="btn btn-primary btn-sm" href="{{ route('schedule-email-all', $data['schedule']->id ) }}">Email
                Sent
                to All
              </a>|
              <a class="btn btn-primary btn-sm" href="{{ route('schedule-sms-all', $data['schedule']->id ) }}">SMS
                Sent
                to All
              </a>
            </div>
          </div>
          <x-alert />
          <div class="row">
            <div class="col">
              <div class="p-2 border border-info border-1 rounded">
                <div class="table-responsive">
                  <table id="scheduleDetailsList" class="table border table-striped table-bordered"
                    style="width: 100%;">
                    <thead>
                      <tr>
                        <td>SL.</td>
                        <td>Position</td>
                        <td>Name & Address</td>
                        <td>Fellow ID/PRN</td>
                        <td>Email</td>
                        <td>Mobile</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                    <tbody class="fs-6">
                      @foreach($data['invigilators'] as $invigilator)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                          <select class="form-select" name="position_name" id="position_name"
                            onchange="changeInvisilatorRole(this.value, {{ $invigilator->id }})">
                            <option value="">Select</option>
                            @foreach($data['invisilatorRoles'] as $position)
                            <option value="{{ $position->id }}" @if ($position->id==$invigilator->role_id) selected
                              @endif>
                              {{ $position->position_name }}
                            </option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <b>{{ $invigilator->name }}</b> <br />
                          {{ $invigilator->office_add }}
                        </td>
                        <td>@if ($invigilator->pnr_no == '')
                          {{ $invigilator->fellow_id }}
                          @else
                          {{ $invigilator->pnr_no }}
                          @endif
                        </td>
                        <td>{{ $invigilator->e_mail }}</td>
                        <td>{{ $invigilator->mobile }}</td>
                        <td class="d-flex flex-row">
                          <button class="btn btn-danger btn-sm"
                            onclick="event.preventDefault();document.getElementById('form-delete-{{ $invigilator->id }}').submit()">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </button>&nbsp;|&nbsp;
                          <form class="hidden" id="{{'form-delete-'.$invigilator->id}}"
                            action="{{ route('delete-invisilator', $invigilator->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          </form>
                          <button class="btn btn-info btn-sm"
                            onclick="event.preventDefault();document.getElementById('form-update-{{ $invigilator->id }}').submit()">
                            <i class="fa fa-save fa-lg" aria-hidden="true"></i>
                          </button> |
                          <form class="hidden" id="{{'form-update-'.$invigilator->id}}"
                            action="{{ route('update-invisilator', $invigilator->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="invisilator_role_{{$invigilator->id}}"
                              id="invisilator_role_{{$invigilator->id}}" value="{{ $invigilator->role_id }}">
                          </form>
                          <a href="{{route('download-invisilator-invitation', $invigilator->id)}}"
                            class="btn btn-info btn-sm">
                            <i class="fas fa-file-pdf fa-lg"></i>
                          </a>&nbsp;|&nbsp;
                          <a href="{{route('email-invisilator-invitation', [$data['schedule']->id, $invigilator->id])}}"
                            class="btn btn-warning waves-effect waves-light btn-sm"><span class="btn-label"><i
                                class="far fa-envelope"></i></span>Mail
                          </a>&nbsp;|&nbsp;
                          <a href="{{route('sms-invisilator-invitation', [$data['schedule']->id, $invigilator->id])}}"
                            class="btn btn-warning waves-effect waves-light btn-sm"><span class="btn-label"><i
                                class="fas fa-mobile-alt"></i></span>sms
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#scheduleDetailsList').DataTable({
          "order": [[ 0, "asc" ]],
          "columns": [
            null,
            {"width": "40%" },
            null,
            null,
            null,
            null,
            null
          ]
      });
    });

    function changeInvisilatorRole(positionId, invigilatorId) {
      $('#invisilator_role_'+invigilatorId).val(positionId);
    }
  </script>
</div>
@endsection