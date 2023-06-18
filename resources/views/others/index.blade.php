<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">



  <title>BCPS GOLDEN JUBILEE</title>

  <link rel="icon" href="{{ asset('public/images/favicon.ico'); }}" type="image/x-icon">



  <!-- Fonts -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

  </script>



  <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



</head>



<body>

  <header>



    <div class="container">

      <img src="{{ asset('public/images/golden.jpg'); }}" alt="BCPS" width="100%" height="150" />

    </div>



  </header>

  <main>



    <div class="container">



      <div class="notice">

        <p class="text">The Organizing Committee for Golden Jubilee Celebration of Bangladesh College of

          Physicians and Surgeons (BCPS) is delighted to inform you that the College is going

          to organize a 3-day program for all the fellows and members on the occasion of 50 th

          anniversary of establishment of BCPS. We are looking forward to a gorgeous event

          consisting of social interactions, intellectual discussions, reminiscence, displays,

          demonstrations and cultural program. Hope to welcome you soon.</p>

      </div>



      <div class="instructions">
        <div class="row">
          <div class="col">
            <h6 class="fw-bold">Registration Fees:</h6>

            <table class="table table-bordered">

              <tr>

                <td rowspan="2">Upto 30 April, 2022</td>

                <td>Single Registration</td>

                <td>Tk. 2,000/-</td>

              </tr>

              <tr>

                <td>Registration with spouse</td>

                <td>Tk. 4,000/-</td>

              </tr>

             

            </table>
          </div>
          <div class="col">
            <h6 class="fw-bold">Date & Venue:</h6>
            <table class="table table-bordered">

              <tr>

                <td class="fw-bold">Date:</td>

                <td>05-06, June 2022</td>

              </tr>

              <tr>

                <td class="fw-bold">Venue:</td>

                <td>
                  Bangabandhu International Conference Centre (BICC), <br>
                  Sher-e Bangla Nagar, Dhaka. <br>
                  BCPS Campus, Mohakhali, Dhaka
                </td>

              </tr>

            </table>
          </div>
        </div>

        <div class="text-danger fw-bold row">

          <h6>* There will be no registration after 30 th April, 2022.</h6>

          <h6>** There will be no spot registration.</h6>

          <h6>*** No accompanying person other than spouse will be allowed.</h6>

          <h6>**** Spouse will only be allowed during cultural event and dinner.</h6>

        </div>

      </div>

      <div class="mt-4">

        <h6>Procedure of Online Registration:</h6>

        <ul>

          <li class="fw-bold">

            At first, the participant will have to deposit the Registration Fee in any branch

            of the following bank in the mentioned account:

            <ul class="text-info">

              <li class="text-success fw-bold">Bank Name: Agrani Bank Limited</li>

              <li class="text-success fw-bold">Branch Name: ICDDRB</li>
              
              <li class="text-success fw-bold">Routing Number: 010262117</li>

              <li class="text-success fw-bold">A/C Title/Name: BCPS Golden Jubilee</li>

              <li class="text-success fw-bold">Account No: 0200018199695</li>

            </ul>

          </li>

          <li class="fw-bold">After deposition of Registration Fee, the participant needs to scan and upload

            the following document during online registration:

            <ul class="text-info">

              <li class="text-success fw-bold">Scanned copy of Bank deposit slip (Width 600 X Height 300) of

                Registration fees (please write your Name, Mobile Number and

                Fellow/Member number in the Bank deposit slip during

                deposition of money in the Bank)

              </li>

              <li class="text-success fw-bold">

                Scanned copy / Soft copy of Passport Size Photo (JPG/PNG

                Format; Size 300 x 300)

              </li>

            </ul>

          </li>

        </ul>

      </div>



      <div class="d-flex justify-content-center">

        <a class="btn btn-success fw-bold" href="{{ route('bcps-golden-jubilee') }}">Apply Online</a> &nbsp; &nbsp;

        <a class="btn btn-success fw-bold" href="{{ route('golden-jubilee-list') }}">Registered Applicant List</a>

      </div>



    </div>



  </main>

  <footer class="container px-3 bg-primary bg-gradient text-white mt-3">

    <div class="container d-flex justify-content-between justify-content-lg-between">

      <p class="mt-1 mb-1">Copyright &copy;

        2022, Bangladesh College of Physicians and Surgeons, All rights reserved.

      </p>

      <p class="mt-1 mb-1">Design & Developed By: IT Department, BCPS</p>

    </div>

  </footer>

</body>



</html>