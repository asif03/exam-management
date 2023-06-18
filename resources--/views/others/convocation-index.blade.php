<!DOCTYPE html>
<html lang="en">

<head>
  <title id="titleId">BCPS::14th Convocation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
    id="bootstrap-css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="container">

    <div class="row">
      <div class="col-sm-12" style="background-color:#59aaea; "></div>
      <img src="{{ asset('public/images/convocation_header.jpg'); }}" alt="BCPS" width="100%" height="150" />
    </div>

    <div class="row border">
      <div class="col-12">
        <div class="row p-1">
          <div class="col-md-8 mx-auto text-center">
            <div class="header-title">
              <h4 id="1sth4Id" class="wv-heading-title" style="color: #428BCA;">
                Registration Instruction</h4>
            </div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-md-5 mx-auto text-center">
            <button type="button" class="btn border-0">
              <img src="{{ asset('public/images/convocation_instruction.jpg'); }}" alt="Instruction" data-toggle="modal"
                data-target="#openModal" width="400px" height="450px" />

              <p class="text-danger pt-2 font-italic font-weight-bold">Click on image for Zoom In View</p>
            </button>
          </div>
          <div class="col-md-7">
            <a class="btn btn-success fw-bold" href="{{ route('convocation4teen') }}">Apply Online</a> &nbsp; &nbsp;

            <!--<a class="btn btn-success fw-bold" href="{{ route('convocation-list') }}">Registered Applicant List</a>-->
            <br/><br/>
            <a class="btn btn-info fw-bold" href="https://bcps.edu.bd/document/FCPS_Convocation_List.pdf">Convocation Recipient (FCPS)</a> &nbsp; &nbsp;
            <br/><br/>
            <a class="btn btn-info fw-bold" href="https://bcps.edu.bd/document/MCPS_Convocation_List.pdf">Convocation Recipient (MCPS)</a>

          </div>
        </div>
      </div>
    </div>

    <div class="row p-1 bg-primary text-light">
      <div class="col text-left">
        &copy
        <?php echo date('Y'); ?>, Bangladesh College of Physicians and Surgeons, All rights reserved.
      </div>
      <div class="col text-right">Design & Developed By: IT Department, BCPS.</div>
    </div>
  </div> <!-- last of container div -->


  <!-- Modal -->
  <div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Instruction</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ asset('public/images/convocation_instruction.jpg'); }}" alt="Instruction" width="100%"
            height="100%" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</body>

</html>