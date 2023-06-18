<table width="100%">
  <tr>
    <td style="font-size: 24px; font-weight: bold; text-align: center;">
      <span style="background-color: #000; padding: 5px; color: #FFF;">Protocol Writing Workshop</span>
    </td>
  </tr>
  <tr>
    <td style="font-size: 20px; font-weight: bold; text-align: center;">Bangladesh College of
      Physicians & Surgeons
      (BCPS)</td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td style="vertical-align: baseline; font-weight: bold; font-size: 18px; text-align: center; padding-left: 100px;">
      REGISTRATION FORM
    </td>
  </tr>
</table>
<table width="100%" style="margin-top: 5px; border-spacing: 0px;">
  <tr>
    <td style="border:#000 1px solid; padding: 2px;">Subject: </td>
    <td style="border:#000 1px solid; padding: 2px;">{{ $data['subject_name'] }}</td>
  </tr>
</table>
<table width="100%" style="margin-top: 10px;  border-spacing: 0px;">
  <tr>
    <td width="5%" style="vertical-align: top; border:#000 1px solid; padding: 2px;">1. </td>
    <td width="40%" style="vertical-align: top; border:#000 1px solid; padding: 2px;">Name (Capital Letter):</td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['candidate_name'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">7. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Mobile No.: </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['mobile'] }}</td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Email: </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['email'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid;">6.</td>
    <td colspan="4" style="vertical-align: top; border:#000 1px solid;">
      <span>Payment Details::</span>
      <table width="100%" style="border-spacing: 0px;">
        <tr>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
            Amount:
          </td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid;">TK. {{ $data['reg_fee'] }}
          </td>
        </tr>
        <tr>
          <td style="text-align: left; border-right:#000 1px solid;">Bank Name: {{ $data['bank_name'] }}
          </td>
          <td style="text-align: left">Branch Name: {{ $data['bank_branch'] }}</td>
        </tr>
        <tr>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
            Transaction/ Money Receipt No.
          </td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
            {{ $data['money_receipt_no'] }}
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">9. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Money Receipt:</td>
    <td colspan="3" align="center" style="vertical-align: top; border:#000 1px solid; padding: 2px;">
      <img src="{{ asset('storage') }}/{{ $data['money_receipt'] }}" alt="Image" width="500" height="250"
        style="float: right;" />
    </td>
  </tr>
</table>