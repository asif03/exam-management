<table width="100%">
  <tr>
    <td rowspan="3">
      <img src="{{ asset('public/images/bcps.png'); }}" alt="BCPS Logo" style="float: left;" width="100" height="100" />
    </td>
    <td style="font-size: 24px; font-weight: bold; text-align: center;">
      <span style="background-color: #000; padding: 5px; color: #FFF;">GOLDEN JUBILEE 2022</span>
    </td>
    <td rowspan="3">
      <img src="{{ asset('public/images/50years.png'); }}" alt="BCPS Logo" style="float: left;" width="100"
        height="100" />
    </td>
  </tr>
  <tr>
    <td style="font-size: 18px; font-weight: bold; text-align: center;">Date: 06<sup>th</sup> June, 2022</td>
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
    <td width="15%" height="100" style="border: solid 2px #000;">
      <img src="{{ asset('storage') }}/{{ $data['picture'] }}" alt="Image" width="120" height="130"
        style="float: right;" />
      <br>
    </td>
  </tr>
  <tr>
    <td></td>
    <td class="d-flex justify-content-center">
      <a class="btn btn-primary btn-sm" href="{{ route('jubilee-image-download', [$data['id'], 'pic']) }}">Download</a>
    </td>
  </tr>
</table>
<table width="100%" style="margin-top: 5px; border-spacing: 0px;">
  <tr>
    <td style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center" colspan="2">
      @if ($data['mem_fellow_radio'] =='fcps')
      Fellow ID: {{ $data['fellow_id'] }}
      @elseif($data['mem_fellow_radio'] =='mcps')
      Member ID: {{ $data['fellow_id'] }}
      @endif
    </td>
  </tr>
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
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">2. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Designation:</td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">
      @if ($data['profession'] =='prof')
      Professor
      @elseif($data['profession'] =='associateprof')
      Asso. Professor
      @elseif($data['profession'] =='asstprof')
      Asst. Professor
      @elseif($data['profession'] =='consult')
      Consultant
      @elseif($data['profession'] =='other')
      Other
      @endif
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">3. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Gender: </td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">
      @if ($data['gender'] =='male')
      Male
      @elseif($data['gender'] =='female')
      Female
      @endif
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">4. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Institution: </td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['institute'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">5. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Department: </td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['department'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">6. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Mailing Address: </td>
    <td colspan="3" style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['mailing_addr'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">7. </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Mobile No.: </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['mobile'] }}</td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">Email: </td>
    <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">{{ $data['email'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border-left:#000 1px solid; border-right:#000 1px solid; padding: 2px;">8.</td>
    <td colspan="3" style="vertical-align: top;">Accompanying Person: Spouse only (For cultural program and dinner only)
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
    <td style="border:#000 1px solid; padding: 2px;">Name: </td>
    <td style="border:#000 1px solid; padding: 2px;">{{ $data['spouse_name'] }}</td>
    <td style="border:#000 1px solid; padding: 2px;">Mobile: </td>
    <td style="border:#000 1px solid; padding: 2px;">{{ $data['spouse_mobile'] }}</td>
  </tr>
  <tr>
    <td style="vertical-align: top; border:#000 1px solid;">6.</td>
    <td colspan="4" style="vertical-align: top; border:#000 1px solid;">
      <span>Payment Method & Details::</span>
      <table width="100%" style="border-spacing: 0px;">
        <tr>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">Payment Type
          </td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
            @if ($data['payment_mode'] == 1)
            Online Payment
            @elseif($data['payment_mode'] == '')
            Cash Payment
            @endif</td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
            Amount:
          </td>
          <td style="border-top:#000 1px solid; border-bottom:#000 1px solid;">TK. {{ $data['reg_fee'] }}
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align: left; border-right:#000 1px solid;">Bank Name: {{ $data['bank_name'] }}
          </td>
          <td colspan="2" style="text-align: left">Branch Name: {{ $data['bank_branch'] }}</td>
        </tr>
        <tr>
          <td colspan="2" style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
            Transaction/ Money Receipt No.
          </td>
          <td colspan="2" style="border-top:#000 1px solid; border-bottom:#000 1px solid; border-right:#000 1px solid;">
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
      <br><br>
      <a class="btn btn-primary btn-sm"
        href="{{ route('jubilee-image-download', [$data['id'], 'money']) }}">Download</a>
    </td>
  </tr>
</table>