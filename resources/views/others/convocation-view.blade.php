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
    <td style="vertical-align: baseline; font-weight: bold; font-size: 18px; text-align: center; padding-left: 50px;">
      REGISTRATION FORM
    </td>
    <td width="15%" height="100" style="border: solid 2px #000;">
      <img src="{{ asset('storage') }}/{{ $data['picture'] }}" alt="Image" width="120" height="130"
        style="float: right;" />
      <br>
    </td>
  </tr>
  <tr>
    <td></td>
    <td class="d-flex justify-content-center">
      <a class="btn btn-primary btn-sm"
        href="{{ route('convocation-image-download', [$data['id'], 'pic']) }}">Download</a>
    </td>
  </tr>
</table>

<table width="100%" style="margin-top: 5px; border-spacing: 0px;">
  <tr>
    <td style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center" colspan="3">
      @if ($data['mem_fellow_radio'] =='fcps')
      Fellow ID: {{ $data['fellow_id'] }}
      @elseif($data['mem_fellow_radio'] =='mcps')
      Member ID: {{ $data['fellow_id'] }}
      @endif
    </td>
  </tr>
  <tr>
    <td style="border:#000 1px solid; padding: 2px;">Subject: {{ $data['subject_name'] }}</td>
    <td style="border:#000 1px solid; padding: 2px;">Year of Passing: {{ $data['exam_year'] }}</td>
    <td style="border:#000 1px solid; padding: 2px;">Session:
      @if ($data['exam_session'] =='JAN')
      January
      @elseif($data['exam_session'] =='JUL')
      July
      @endif</td>
  </tr>
</table>

<table width="100%" style="margin-top: 10px;  border-spacing: 0px;">
  <tr>
    <td width="5%" style="vertical-align: top; border:#000 1px solid; padding: 2px;">1. </td>
    <td width="40%" style="vertical-align: top; border:#000 1px solid; padding: 2px;">Name (Capital Letter):</td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['candidate_name'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">2. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Name of Father/Spouse:</td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['father_name'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">3. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Address of communication: </td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['mailing_addr'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">4. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Mobile No.: </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['mobile'] }}</td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Email: </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['email'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border-left:#000 1px solid; border-right:#000 1px solid; padding: 2px;">5.</td>
    <td colspan="3" style="vertical-align: top;">Whether Accompanied By
      Spouse/One Guardian:<br>
      (Only one accompanied person will be accepted)
    </td>
    <td style="vertical-align: top; border-right:#000 1px solid;">
      @if ($data['is_spouse'] ==0)
      No
      @elseif($data['is_spouse'] ==1)
      Yes
      @endif</td>
  </tr>
  <tr>
    <td style="border-left:#000 1px solid; border-right:#000 1px solid; padding: 2px;"></td>
    <td style="border:#000 1px solid; padding: 2px;">Name of accompanying person: </td>
    <td style="border:#000 1px solid; padding: 2px;">{{ $data['spouse_name'] }}</td>
    <td style="border:#000 1px solid; padding: 2px;">Relation: </td>
    <td style="border:#000 1px solid; padding: 2px;">{{ $data['spouse_relation'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid;">6.</td>
    <td colspan="4" style="vertical-align: top; border:#000 1px solid;">
      <span> Fee Payment Details:</span>
      <table width="100%" style="border-spacing: 0px;">
        <tr>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">Payment Type
          </td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
            @if ($data['payment_mode'] == 'online')
            Online A/C
            @elseif($data['payment_mode'] == 'payorder')
            Pay Order
            @elseif($data['payment_mode'] == 'bankdraft')
            Bank Draft
            @endif</td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
            Amount:
          </td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid;">TK. {{ $data['reg_fee'] }}
          </td>
        </tr>
        <tr>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">Bank
            Draft/Pay Order No./Receipt No.
          </td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">{{
            $data['money_receipt_no'] }}</td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">Date:
          </td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid;">{{ $data['date_submission'] }}</td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: left; border-right:#000 1px solid;">Bank Name: {{ $data['bank_name'] }}
          </td>
          <td colspan="2" style="text-align: left">Branch Name: {{ $data['bank_branch'] }}</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">7.</td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">Have you received
      provisional certificate before?</td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">
      @if ($data['is_prov_cert_rec'] == 0)
      No
      @elseif($data['is_prov_cert_rec'] == 1)
      Yes
      @endif</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">8. </td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">Have you received
      Orginal certificate before?</td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">
      @if ($data['is_origin_cert_rec'] == 0)
      No
      @elseif($data['is_origin_cert_rec'] == 1)
      Yes
      @endif
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">9. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Money Receipt:</td>
    <td colspan="3" align="center" style="vertical-align: top; border:#000 1px solid; padding: 2px;">
      <img src="{{ asset('storage') }}/{{ $data['money_receipt'] }}" alt="Image" width="500" height="250"
        style="float: right;" />
      <br><br>
      <a class="btn btn-primary btn-sm"
        href="{{ route('convocation-image-download', [$data['id'], 'money']) }}">Download</a>
    </td>
  </tr>
</table>