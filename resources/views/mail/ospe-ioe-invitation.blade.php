<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BCPS :: Invitation Letter of {{ $schedule->exam_type }}</title>
</head>

<body>
  <table width="100%" style="float: left;">
    <tr>
      <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 15px;">Dear Sir,</td>
    </tr>
    <tr>
      <td colspan="2" style="font-size: 14px; text-align: left; padding-top: 5px;">
        In connection with the conduction of the functions of {{ $schedule->exam_type }} in
        {{ $schedule->subject_name }}, it is my great pleasure to offer you an appointment as a
        {{ $invigilator->position_name }}. For this purpose, you will be required to come to the
        {{ $schedule->block_name }}, {{ $schedule->hall_name }} of the College on {{ date('d-m-Y',
        strtotime($schedule->exam_date)) }} at {{ date('h:i a', strtotime($schedule->exam_start_time)) }}.
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
        <span style="text-align: left; font-weight:bold;">Professor Md. Billal Alam</span> <br>
        Controller of Examinations, BCPS.
      </td>
    </tr>
  </table>
</body>

</html>