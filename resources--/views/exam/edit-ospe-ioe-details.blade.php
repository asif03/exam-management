@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit invigilators :: {{
            $data['schedule']->exam_type }}
            EXAM, {{
            $data['schedule']->exam_session }} {{ $data['schedule']->exam_year }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('exam-dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit OSPE/IOE invigilators</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

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
      <div class="row border border-success border-1 rounded p-1">
        <x-alert />
        <table id="scheduleDetailsList" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <td>SL.</td>
              <td width="20%">Position</td>
              <td>Name & Address</td>
              <td>Fellow ID/PRN</td>
              <td>Email</td>
              <td>Mobile</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            @foreach($data['invigilators'] as $invigilator)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <select class="form-select" name="position_name" id="position_name"
                  onchange="changeInvisilatorRole(this.value, {{ $invigilator->id }})">
                  <option value="">Select</option>
                  @foreach($data['invisilatorRoles'] as $position)
                  <option value="{{ $position->id }}" @if ($position->id==$invigilator->role_id) selected @endif>
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
                </button> |
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
                <a href="{{route('download-invisilator-invitation', $invigilator->id)}}" class="btn btn-info btn-sm">
                  <i class="fas fa-file-pdf fa-lg"></i>
                </a> |
                <a href="{{route('email-invisilator-invitation', [$data['schedule']->id, $invigilator->id])}}"
                  class="btn btn-info btn-sm"><i class="fa fa-envelope-square fa-lg" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="row my-2">
        <div class="col text-center">
          <a class="btn btn-primary btn-sm" href="{{ route('schedule-download', $data['schedule']->id ) }}">Download
            Schedule</a> |
          <a class="btn btn-primary btn-sm" href="{{ route('schedule-email-all', $data['schedule']->id ) }}">Email Sent
            to All
          </a>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        $('#scheduleDetailsList').DataTable({
            "order": [[ 0, "asc" ]]
        });
      });

      function changeInvisilatorRole(positionId, invigilatorId) {
        $('#invisilator_role_'+invigilatorId).val(positionId);
      }
    </script>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection