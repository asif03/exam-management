<table width="100%">
  <tr>
    <td colspan="3" style="font-size: 24px; font-weight: bold; text-align: center;">
      <span style="color: #000;">Bangladesh College of Physicians & Surgeons</span>
    </td>
  </tr>
  <tr>
    <td colspan="3" style="font-size: 18px; font-weight: bold; text-align: center;">{{ $data['schedule']->exam_type }}
      EXAM, {{
      $data['schedule']->exam_session }} {{ $data['schedule']->exam_year }}</td>
  </tr>
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
    <td style="font-size: 16px; font-weight: bold; text-align: left;">
      Hall: {{ $data['schedule']->hall_name }}
    </td>
    <td><a class="btn btn-primary btn-sm" href="{{ route('schedule-download', $data['schedule']->id ) }}">Download
        Schedule</a></td>
  </tr>
</table>

<table width="100%" style="margin-top: 10px;  border-spacing: 0px;">
  <thead>
    <tr style="border: #000 solid 1px;">
      <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">SL.</td>
      <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Fellow ID/PRN</td>
      <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Name & Address</td>
      <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Position</td>
      <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Time</td>
      <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Signature</td>
    </tr>
  </thead>
  <tbody>
    @foreach($data['invigilators'] as $invigilator)
    <tr>
      <td style="border: #000 solid 1px; font-size: 12px; text-align: center;">
        {{ $loop->iteration }}
      </td>
      <td style="border: #000 solid 1px; font-size: 12px; text-align: center;">
        @if($invigilator->pnr_no == '')
        {{ $invigilator->fellow_id }}
        @else
        {{ $invigilator->pnr_no }}
        @endif
      </td>
      <td style="border: #000 solid 1px; font-size: 12px; text-align: left; width: 35%;">
        {{ $invigilator->name }} <br />
        {{ $invigilator->office_add }}
      </td>
      <td style="border: #000 solid 1px; font-size: 12px; text-align: center;">
        {{ $invigilator->position_name }}
      </td>
      <td style="border: #000 solid 1px; font-size: 12px; text-align: left;"></td>
      <td style="border: #000 solid 1px; font-size: 12px; text-align: left;"></td>
    </tr>
    @endforeach
  </tbody>
</table>