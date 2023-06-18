<!doctype html>
<html lang="en">

<head>
  <title>BCPS::14th Convocation</title>
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
    <table width="100%">
      <tr>
        <td style="font-size: 24px; font-weight: bold; text-align: center;">
          <span style="background-color: #000; padding: 5px; color: #FFF;">14th Convocation</span>
        </td>
      </tr>
      <tr>
        <td style="font-size: 18px; font-weight: bold; text-align: center;">Date: 07<sup>th</sup> June, 2022</td>
      </tr>
      <tr>
        <td style="font-size: 20px; font-weight: bold; text-align: center;">Venue: Bangabandhu International Conference
          Center</td>
      </tr>
      <tr>
        <td style="font-size: 20px; font-weight: bold; text-align: center;">Agargaon, Sher-E-Bangla Nagar, Dhaka.</td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td
          style="vertical-align: baseline; font-weight: bold; font-size: 18px; text-align: center; padding-left: 50px;">
          REGISTRATION FORM
        </td>
        <td width="18%" height="100" style="border: solid 2px #000;">
            <img src="{{ asset('storage') }}/{{ $picture }}" alt="Image" width="120" height="130" style="float: right;" />
        </td>
      </tr>
    </table>

    <table width="100%" style="margin-top: 5px; border-spacing: 0px;">
      <tr>
        <td style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center" colspan="3">
          @if ($mem_fellow_radio =='fcps')
          Fellow ID: {{ $fellow_id }}
          @elseif($mem_fellow_radio =='mcps')
          Member ID: {{ $fellow_id }}
          @endif
        </td>
      </tr>
      <tr>
        <td style="border:#000 1px solid; padding: 2px;">Subject: {{ $subject_name }}</td>
        <td style="border:#000 1px solid; padding: 2px;">Year of Passing: {{ $exam_year }}</td>
        <td style="border:#000 1px solid; padding: 2px;">Session:
          @if ($exam_session =='JAN')
          January
          @elseif($exam_session =='JUL')
          July
          @endif</td>
      </tr>
    </table>

    <table width="100%" style="margin-top: 10px;  border-spacing: 0px;">
      <tr>
        <td width="5%" style="vertical-align: top; border:#000 1px solid; padding: 2px;">1. </td>
        <td width="40%" style="vertical-align: top; border:#000 1px solid; padding: 2px;">Name (Capital Letter):</td>
        <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ strtoupper($candidate_name) }}</td>
      </tr>
      <tr>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">2. </td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Name of Father/Spouse:</td>
        <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $father_name }}</td>
      </tr>
      <tr>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">3. </td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Address of communication: </td>
        <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $mailing_addr }}</td>
      </tr>
      <tr>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">4. </td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Mobile No.: </td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $mobile }}</td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Email: </td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $email }}</td>
      </tr>
      <tr>
        <td style="vertical-align: top; border-left:#000 1px solid; border-right:#000 1px solid; padding: 2px;">5.</td>
        <td colspan="3" style="vertical-align: top;">Whether Accompanied By
          Spouse/One Guardian:<br>
          (Only one accompanied person will be accepted)
        </td>
        <td style="vertical-align: top; border-right:#000 1px solid;">
          @if ($is_spouse ==0)
          No
          @elseif($is_spouse ==1)
          Yes
          @endif</td>
      </tr>
      <tr>
        <td style="border-left:#000 1px solid; border-right:#000 1px solid; padding: 2px;"></td>
        <td style="border:#000 1px solid; padding: 2px;">Name of accompanying person: </td>
        <td style="border:#000 1px solid; padding: 2px;">{{ $spouse_name }}</td>
        <td style="border:#000 1px solid; padding: 2px;">Relation: </td>
        <td style="border:#000 1px solid; padding: 2px;">{{ $spouse_relation }}</td>
      </tr>
      <tr>
        <td style="vertical-align: top; border:#000 1px solid;">6.</td>
        <td colspan="4" style="vertical-align: top; border:#000 1px solid;">
          <span> Fee Payment Details:</span>
          <table width="100%" style="border-spacing: 0px;">
            <tr>
              <td colspan="2"
                style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">Amount:
              </td>
              <td colspan="2" style="border-top:#000 1px solid; border-bottom:#000 1px solid;">TK. {{ $reg_fee }}</td>
            </tr>
            <tr>
              <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">Bank
                Draft/Pay Order No./Receipt No.
              </td>
              <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">{{
                $money_receipt_no }}</td>
              <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">Date:
              </td>
              <td style="border-top:#000 1px solid; border-bottom:#000 1px solid;">{{ $date_submission }}</td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: left; border-right:#000 1px solid;">Bank Name: {{ $bank_name }}</td>
              <td colspan="2" style="text-align: left">Branch Name: {{ $bank_branch }}</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">7.</td>
        <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">Have you received
          provisional certificate before?</td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">
          @if ($is_prov_cert_rec == 0)
          No
          @elseif($is_prov_cert_rec == 1)
          Yes
          @endif</td>
      </tr>
      <tr>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">8. </td>
        <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">Have you received
          Orginal certificate before?</td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">
          @if ($is_origin_cert_rec == 0)
          No
          @elseif($is_origin_cert_rec == 1)
          Yes
          @endif
        </td>
      </tr>
    </table>
    <table width="100%" style="margin-top: 50px;">
      <tr>
        <td style="text-align: right;">---------------------------</td>
      </tr>
      <tr>
        <td style="text-align: right;">(Signature with Date)</td>
      </tr>
    </table>
  </main>
  <footer>
    <img src="{{ asset('public/images/convation_footer.jpg'); }}" alt="BCPS Logo" style="float: left; width: 100%;" />
  </footer>
</body>

</html>