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
        <td colspan="2" style="font-size: 24px; font-weight: bold; text-align: center;">{{$fellow_type}}</td>
      </tr>
      <tr>
        <td style="font-size: 24px; font-weight: bold; text-align: left;">Year: {{$year}}</td>
        <td style="font-size: 24px; font-weight: bold; text-align: right;">Session: {{$session_type}}</td>
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        @php $rowId = 0; @endphp
        @foreach($fellows as $fellow)
        @if($rowId%5==0)
      </tr>
      <tr>
        <td>
          @else
        <td>
          @endif
          <table class="table border rounded-3">
            <tr>
              <td align="center">
                <img src="{{ asset('storage') }}/{{ $fellow->img_up_file }}" alt="Image" width="100" height="120" />
              </td>
            </tr>
            <tr>
              <td style="font-size: 14px; text-align: center;">Fellow ID: {{$fellow->fellow_id}}</td>
            </tr>
            <tr>
              <td style="font-size: 14px; text-align: center;">{{strtoupper($fellow->candidate_name)}}</td>
            </tr>
          </table>
        </td>
        @php $rowId = $rowId+1; @endphp
        @endforeach
      </tr>
    </table>
  </main>
</body>

</html>