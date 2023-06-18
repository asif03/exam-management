<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
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
      margin-top: 3.5cm;
      margin-left: 1cm;
      margin-right: 1cm;
      margin-bottom: 1cm;
    }

    /** Define the header rules **/
    header {
      position: fixed;
      top: 0cm;
      left: 1cm;
      right: 1cm;
      height: 3.5cm;
    }

    /** Define the footer rules **/
    footer {
      position: fixed;
      bottom: 0cm;
      left: 1cm;
      right: 1cm;
      height: 1cm;
    }
  </style>
</head>

<body>
  <header>
    <table width="100%">
      <tr>
        <td width="25%" rowspan="2" align="center" vertical-align="top">
          <img src="{{ asset('public/images/bcps-logo.jpg') }}" width="60" height="60" alt="Logo" />
        </td>
        <td colspan="2" style="text-align: left; padding-left: 30px;">
          <span style="font-size: 16px; font-weight: bold; text-align: center;">
            Bangladesh College of Physicians and Surgeons
          </span><br>
          <span style="font-size: 10px; text-align: center; padding-left: 30px;">
            67, Shaheed Tajuddin Ahmed Sarani, Mohakhali, Dhaka-1212, Bangladesh
          </span>
        </td>
      </tr>
      <tr>
        <td style="text-align: center;" width="50%">
          <span style="font-size: 12px; font-weight: bold;">Examinations Department</span><br>
          <span style="font-size: 16px; font-weight: bold; font-style: italic;">Confidential</span><br>
          <span style="font-size: 7px; font-weight: bold; font-style: italic;">(No part of this assignment can be
            disclosed publicly)</span>
        </td>
        <td style="font-size: 8px; text-align: left;" width="25%">
          PABX: 880-2-9825005-6,880-2-9856616-7<br>
          8821501, 9884194, 9891865.<br>
          Fax: 880-2-9828928 <br>
          Mobile: 01713068213, 01713068214, 01755-615337 <br>
          Email: examdept@bcps.edu.bd <br>
          Website: www.bcpsbd.org
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 11px; text-align: left;">
          BCPS No-442/Exam/Session-{{$schedule->exam_session }}-{{ $schedule->exam_year }}/</td>
        <td style="font-size: 11px; text-align: left;">Date : @php echo date('d-m-Y'); @endphp</td>
      </tr>
    </table>
  </header>
  <main>
    @foreach($invigilators as $invigilator)
    <table width="100%">
      <tr>
        <td style="font-size: 14px; text-align: left;">
          {{ $invigilator->name }}
        </td>
      </tr>
      <tr>
        <td style="font-size: 14px; text-align: left; width: 35%;">{!! nl2br(e($invigilator->office_add)) !!}</td>
      </tr>
      <tr>
        <td style="font-size: 14px; text-align: left;">{{ $invigilator->mobile }}</td>
      </tr>
      <tr>
        <td style="font-size: 14px; text-align: left;">{{ $invigilator->pnr_no }}</td>
      </tr>
    </table>
    <br>
    <table width="100%" style="float: left;">
      <tr>
        <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 15px;">Dear Sir,</td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 5px;">
          In connection with the conduction of the functions of {{ $schedule->exam_type }} in FCPS Part-II
          {{ $schedule->subject_name }}, it is my great pleasure to offer you an appointment as a
          {{ $invigilator->position_name }}. For this purpose, you will be required to come to the
          Examinations Department of the college on {{ date('d-m-Y', strtotime($schedule->exam_date)) }} at {{
          $schedule->exam_start_time }}.
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 15px;">
          Kindly note that the appointment involves an “essential category” business and therefore absences without
          intimation may cause serious setback. If you are in any way unable to respond kindly let us know at least 3
          days before the Exam.
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 5px;">
          The college will take care of your personal utilities during your stay in the college.
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 5px;">Your active cooperation is
          solicited.</td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 5px;">Yours in appreciation,</td>
      </tr>
      <tr>
        <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 5px;">With kind regards.</td>
      </tr>
      <tr>
        <td style="font-size: 14px; text-align: left; padding-top: 5px;" colspan="2">
          <img src="{{ asset('public/images/signature-controller.jpg') }}" width="40" height="40" alt="Signature"> <br>
          <span style="text-align: left; font-weight:bold;">Professor Md. Billal Alam</span> <br>
          Honorary Controller of Examinations, BCPS.

        </td>
      </tr>

      <tr>
        <td colspan="2"
          style="font-weight: bold; font-size: 12px; text-align: left; padding-top: 25px; text-decoration: underline;">
          NB:</td>
      </tr>
      <tr>
        <td style="font-size: 14px; text-align: left; vertical-align: top; padding-top: 15px;" width="2%">a) </td>
        <td style="font-size: 14px; text-align: left; vertical-align: top; padding-top: 15px;">
          Kindly make sure that none of your close relations are examinees in the said examination. (** a. Husband’s /
          Wife’s brother(fvB), sister, b. son, c. Daughter, d. Brother-in-law, e.
          Sister-in-law, f. daughter-in-law, g. son –in-law, h. son and daughter of
          brother/sister’s, i. Paternal and maternal uncle / aunt). In that case the offer will not stand valid and you
          are requested to inform this
          office immediately.
        </td>
      </tr>
      <tr>
        <td style="font-size: 14px; text-align: left; vertical-align: top; padding-top: 15px;">b) </td>
        <td style="font-size: 14px; text-align: left; vertical-align: top; padding-top: 15px;">
          Carrying Mobile Phone, Camera, Pen drive, CD and any other portable electronic devices with you into the
          tabulation room is strictly forbidden. If you bring one please leave it to Senior Assistant Controller of
          Exams before entering the specified venue.
        </td>
      </tr>
      <tr>
        <td style="font-size: 14px; text-align: left; vertical-align: top; padding-top: 15px;">c) </td>
        <td style="font-size: 14px; text-align: left; vertical-align: top; padding-top: 15px;">
          Please abide by the rules, maintain confidentiality and not to disclose to any person or discuss in public
          forum matter (s) pertaining to any process of examinations or assessment
        </td>
      </tr>
    </table>
    @endforeach
  </main>
  <footer style="font-size: 14px; text-align: center; font-style: italic; line-height: 16px;">
    * Mobile phones are to be kept out of use to ensure uninterrupted work and confidentiality.
    <br>
    Designed & Developed By: IT Department, BCPS.
  </footer>
</body>

</html>