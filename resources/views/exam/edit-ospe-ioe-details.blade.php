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
              <a class="btn btn-primary btn-sm btn-rounded"
                href="{{ route('schedule-download', $data['schedule']->id ) }}"><i class="fas fa-download"></i>
                Schedule</a> &nbsp;
              <a class="btn btn-info btn-sm btn-rounded"
                href="{{ route('schedule-email-all', $data['schedule']->id ) }}"><i class="far fa-envelope"></i> Email
                to All
              </a> &nbsp;
              <a class="btn btn-warning btn-sm btn-rounded text-white"
                href="{{ route('schedule-sms-all', $data['schedule']->id ) }}"><i class="fas fa-mobile-alt"></i> SMS
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
                        <th>SL.</th>
                        <th width="15%">Position</th>
                        <th width="25%">Name & Address</th>
                        <th width="10%">Fellow ID/PRN</th>
                        <th>Email / Sent?</th>
                        <th>Mobile / Sent?</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="fs-6">
                      @foreach($data['invigilators'] as $invigilator)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td width="15%">
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
                        <td width="25%">
                          <b>{{ $invigilator->name }}</b> <br />
                          {{ $invigilator->office_add }}
                        </td>
                        <td width="10%">@if ($invigilator->pnr_no == '')
                          {{ $invigilator->fellow_id }}
                          @else
                          {{ $invigilator->pnr_no }}
                          @endif
                        </td>
                        <td align="center">
                          {{ $invigilator->e_mail }}
                          <br>
                          @if ($invigilator->email_sent == 'Y')
                          <span class="badge rounded-pill text-bg-success">Sent</span>
                          @elseif($invigilator->email_sent == 'N')
                          <span class="badge rounded-pill text-bg-danger">Not Send Yet</span>
                          @endif
                        </td>
                        <td align="center">
                          {{ $invigilator->mobile }}
                          <br>
                          @if ($invigilator->sms_sent == 'Y')
                          <span class="badge rounded-pill text-bg-success">Sent</span>
                          @elseif($invigilator->sms_sent == 'N')
                          <span class="badge rounded-pill text-bg-danger">Not Send Yet</span>
                          @endif
                        </td>
                        <td class="d-flex flex-row justify-content-between align-items-center">
                          <button class="btn-sm btn btn-danger btn-rounded"
                            onclick="event.preventDefault();document.getElementById('form-delete-{{ $invigilator->id }}').submit()">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                          </button>&nbsp;
                          <form class="hidden" id="{{'form-delete-'.$invigilator->id}}"
                            action="{{ route('delete-invisilator', $invigilator->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          </form>
                          <button class="btn btn-secondary btn-sm btn-rounded"
                            onclick="event.preventDefault();document.getElementById('form-update-{{ $invigilator->id }}').submit()">
                            <i class="fa fa-save fa-lg" aria-hidden="true"></i> Update
                          </button>&nbsp;
                          <form class="hidden" id="{{'form-update-'.$invigilator->id}}"
                            action="{{ route('update-invisilator', $invigilator->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="invisilator_role_{{$invigilator->id}}"
                              id="invisilator_role_{{$invigilator->id}}" value="{{ $invigilator->role_id }}">
                          </form>
                          <a href="{{route('download-invisilator-invitation', $invigilator->id)}}"
                            class="btn btn-info btn-sm btn-rounded"><i class="fas fa-download"></i> pdf
                          </a>&nbsp;
                          <a href="{{route('email-invisilator-invitation', [$data['schedule']->id, $invigilator->id])}}"
                            class="btn-sm btn btn-warning btn-rounded text-white"><i class="far fa-envelope"></i>
                          </a>&nbsp;
                          <a href="{{route('sms-invisilator-invitation', [$data['schedule']->id, $invigilator->id])}}"
                            class="btn-sm btn btn-warning btn-rounded text-white"><i class="fas fa-mobile-alt"></i></a>
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