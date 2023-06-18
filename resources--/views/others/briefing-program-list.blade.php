<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">

  <title>BCPS::Briefing Program</title>
  <link rel="icon" href="{{ asset('public/images/favicon.ico'); }}" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

  <script>
    $(document).ready(function() {
    $('#listjan').DataTable();
    $('#listjul').DataTable();
    $("#myTab a:first").tab("show");
  });
  </script>
</head>

<body>
  <header>
    <div class="container">
      <img class="img-responsive" src="{{ asset('public/images/briefing_program.jpg'); }}" alt="BCPS" width="100%"
        height="150" />
    </div>
  </header>

  <main>
    <div class="container d-flex flex-column">
      <h3 class="text-center">Registered Candidate List of Briefing Program</h3>

      <div class="mt-3">
        <ul class="nav nav-tabs" id="myTab">
          <li class="nav-item">
            <a href="#fcps" class="nav-link active fw-bold" data-bs-toggle="tab">Jan, 2022 List</a>
          </li>
          <li class="nav-item">
            <a href="#mcps" class="nav-link fw-bold" data-bs-toggle="tab">Jul, 2022 List</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="fcps">
            <div class="fcps-list mt-3">
              <table id="listjan" class="table table-striped bo" style="width:100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Subject</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data['janCandidates'] as $candidate)
                  <tr>
                    <td>{{ $candidate->candidate_name }}</td>
                    <td>{{ $candidate->mailing_addr }}</td>
                    <td>{{ $candidate->subject_name }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Subject</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="tab-pane fade" id="mcps">
            <div class="mcps-list mt-3">
              <table id="listjul" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Subject</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data['julCandidates'] as $candidate)
                  <tr>
                    <td>{{ $candidate->candidate_name }}</td>
                    <td>{{ $candidate->mailing_addr }}</td>
                    <td>{{ $candidate->subject_name }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Subject</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
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