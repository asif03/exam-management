<!doctype html>
<html lang="en">

<head>
  <title>BCPS Subject Switch Enrollment</title>
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
      margin-left: 1.5cm;
      margin-right: 1.5cm;
      margin-bottom: 1cm;
    }

    /** Define the header rules **/
    header {
      position: fixed;
      top: 0cm;
      left: 0cm;
      right: 0cm;
      height: 3.5cm;
    }

    /** Define the footer rules **/
    footer {
      position: fixed;
      bottom: 0cm;
      left: 0cm;
      right: 0cm;
      height: 2cm;
    }
  </style>
</head>

<body>
  <header>
    <table width="100%">
      <tr>
        <td>
          <img src="{{ asset('public/images/convocation.jpg'); }}" alt="BCPS Logo" style="float: left; width: 100%;" />
        </td>
      </tr>
    </table>
  </header>
  <main>
    <table width="100%" style="margin-top: 5px;">
      <tr>
        <td style="text-align: left;">BCPS No: {{ $ref_no }}</td>
        <td style="text-align: right;">Date: {{ $ref_date }}</td>
      </tr>
    </table>
    <table width="100%" style="margin-top: 100px;">
      <tr>
        <td style="font-size: 24px; font-weight: bold; text-align: center;">
          <span style="padding: 5px; text-decoration: underline;">TO WHOM IT MAY CONCERN</span>
        </td>
      </tr>
      <tr>
        <td>
          <p style="padding-top: 10px; text-align: justify;">
            Certified that {{$candidate_name}} {{$degree_type}} ({{$from_subject_id}}) has been enrolled with Bangladesh
            College of Physicians & Surgeons (BCPS) as trainee (Reg. No.: {{$registration_no}}) for appearing in FCPS
            exam. in {{$to_subject_id}} of BCPS.
          </p>
          <p style="padding-top: 5px; text-align: justify;">
            {{$gender}} will require 03 years advance training in {{$to_subject_id}} in an institute recognized by BCPS
            and has to do a thesis as per requirement of RTMD of BCPS. {{$gender}} has to approve thesis Protocol within
            6 months of entering into the training and has to submit the thesis for defense at least 1 (One) year ahead
            of final examination.
          </p>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 60px;  text-align: left;">
          <b>(Professor Md. Billal Alam)</b>
        </td>
      </tr>
      <tr>
        <td style="text-align: left;">Honorary Secretary</td>
      </tr>
      <tr>
        <td style="text-align: left;">Bangladesh College of Physicians & Surgeons (BCPS)</td>
      </tr>
    </table>



  </main>
  <footer>
    <img src="{{ asset('public/images/convation_footer.jpg'); }}" alt="BCPS Logo" style="float: left; width: 100%;" />
  </footer>
</body>

</html>