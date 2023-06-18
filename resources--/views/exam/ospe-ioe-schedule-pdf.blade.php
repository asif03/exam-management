<!doctype html>
<html lang="en">

<head>
  <title>OSPE/IOE SCHEDULING</title>
  <style>
    /** 
      Set the margins of the page to 0, so the footer and the header
      can be of the full height and width !
    **/
    @page {
      margin: 0cm 0cm;
    }

    /** Define now the real margins of every page in the PDF **/
    body {
      margin-top: 1cm;
      margin-left: 1cm;
      margin-right: 1cm;
      margin-bottom: 1cm;
    }

    /** Define the header rules **/
    header {
      position: fixed;
      top: 0cm;
      left: 0cm;
      right: 0cm;
      height: 1cm;
    }

    /** Define the footer rules **/
    footer {
      position: fixed;
      bottom: 0cm;
      left: 0cm;
      right: 0cm;
      height: 1cm;
    }
  </style>
</head>

<body>
  <header></header>
  <main>
    <table width="100%">
      <tr>
        <td colspan="3" style="font-size: 24px; font-weight: bold; text-align: center;">
          <span style="color: #000;">Bangladesh College of Physicians & Surgeons</span>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="font-size: 18px; font-weight: bold; text-align: center;">{{ $schedule->exam_type
          }}
          EXAM, {{
          $schedule->exam_session }} {{ $schedule->exam_year }}</td>
      </tr>
      <tr>
        <td style="font-size: 16px; font-weight: bold; text-align: left;">
          Subject: {{ $schedule->subject_name }}
        </td>
        <td style="font-size: 16px; font-weight: bold; text-align: left;">
          Date: {{ $schedule->exam_date }}
        </td>
        <td style="font-size: 16px; font-weight: bold; text-align: left;">
          Time: {{ $schedule->exam_start_time }}
        </td>
      </tr>
      <tr>
        <td style="font-size: 16px; font-weight: bold; text-align: left;">
          Organization Meeting:
        </td>
        <td style="font-size: 16px; font-weight: bold; text-align: left;">
          Date: {{ $schedule->meeting_date }}
        </td>
        <td style="font-size: 16px; font-weight: bold; text-align: left;">
          Time: {{ $schedule->meeting_time }}
        </td>
      </tr>
      <tr>
        <td style="font-size: 16px; font-weight: bold; text-align: left;">
          Block: {{ $schedule->block_name }}
        </td>
        <td style="font-size: 16px; font-weight: bold; text-align: left;">
          Hall: {{ $schedule->hall_name }}
        </td>
        <td></td>
      </tr>
    </table>

    <table width="100%" style="margin-top: 10px;  border-spacing: 0px;">
      <thead>
        <tr style="border: #000 solid 1px;">
          <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">SL.</td>
          <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Fellow/PRN</td>
          <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Name & Address
          </td>
          <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Position</td>
          <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Time</td>
          <td style="border: #000 solid 1px; font-size: 14px; font-weight: bold; text-align: center;">Signature</td>
        </tr>
      </thead>
      <tbody>
        @foreach($invigilators as $invigilator)
        <tr>
          <td width="5%"
            style="border-bottom: #000 solid 1px; border-left: #000 solid 1px; border-right: #000 solid 1px; font-size: 12px; text-align: center;">
            {{ $loop->iteration }}
          </td>
          <td style="border-bottom: #000 solid 1px; border-right: #000 solid 1px; font-size: 12px; text-align: center;">
            @if($invigilator->pnr_no == '')
            {{ $invigilator->fellow_id }}
            @else
            {{ $invigilator->pnr_no }}
            @endif
          </td>
          <td width="35%"
            style="border-bottom: #000 solid 1px; border-right: #000 solid 1px; font-size: 12px; text-align: left;">
            {{ $invigilator->name }}<br />
            {{ $invigilator->office_add }} <br />
            {{ $invigilator->mobile }}
          </td>
          <td style="border-bottom: #000 solid 1px; border-right: #000 solid 1px; font-size: 12px; text-align: center;">
            {{ $invigilator->position_name }}
          </td>
          <td style="border-bottom: #000 solid 1px; border-right: #000 solid 1px; font-size: 12px; text-align: left;">
          </td>
          <td style="border-bottom: #000 solid 1px; border-right: #000 solid 1px; font-size: 12px; text-align: left;">
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <table width="100%" style="margin-top: 100px;">
      <tr>
        <td width="50%" style="text-align: left;">----------------------------------</td>
        <td width="50%" style="text-align: right;"></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: left;">(Signature of Controller of Exam)</td>
      </tr>
    </table>
  </main>
  <footer></footer>
</body>

</html>