<!doctype html>
<html lang="en">

<head>
  <title>Training/Workshop</title>
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
          <img src="{{ asset('public/images/convocation.jpg'); }}" alt="BCPS Logo"
            style="float: left; width: 100%; height: 120px;" />
        </td>
      </tr>
    </table>
  </header>
  <main>
    <table width="100%">
      <tr>
        <td style="font-size: 24px; font-weight: bold; text-align: center;">
          <span style="padding: 5px;">Protocol Writing Workshop</span>
        </td>
      </tr>
      <tr>
        <td style="font-size: 18px; font-weight: bold; text-align: center;">Date: 10-12 February, 2023</td>
      </tr>
    </table>
    <table width="100%" style="margin-top: 5px; border-spacing: 0px;">
      <tr>
        <th style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center">Sl.</th>
        <th style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center">Fellow ID</th>
        <th style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center">Name</th>
        <th style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center">Mobile</th>
        <th style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center">Email</th>
        <th style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center">Amount</th>
        <th style="border:#000 1px solid; padding: 2px; font-weight: bold;" align="center">Money Receipt</th>
      </tr>
      @foreach($fellows as $fellow)
      <tr>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px; text-align:center;">{{$loop->iteration}}.
        </td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px; text-align:center;">{{$fellow->fellow_id}}
        </td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px; text-align:left;">
          {{$fellow->candidate_name}}</td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px; text-align:left;">{{$fellow->mobile}}</td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px; text-align:left;">{{$fellow->email}}</td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px; text-align:right;">{{$fellow->reg_fee}}
        </td>
        <td style="vertical-align: top; border:#000 1px solid; padding: 2px;">
          <img src="{{ asset('storage') }}/{{ $fellow->money_rec_file }}" alt="Image" width="150" height="100" />
        </td>
      </tr>
      @endforeach
    </table>
  </main>
</body>

</html>