<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">

  <title>BCPS :: RTMD</title>
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
      $('#listfcps').DataTable();
    });
  </script>

</head>

<body>
  <header>
    <div class="container">
      <img class="img-responsive" src="{{ asset('public/images/convocation.jpg'); }}" alt="BCPS" width="100%"
        height="150" />
    </div>
  </header>
  <main>
    <div class="container d-flex flex-column">
      <h3 class="text-center p-2">Registered Fellows List (Protocol Writing Workshop)</h3>
      <h4 class="text-center p-2"><u>Date: 10-11 February, 2023</u></h4>
      <div class="mt-3">
        <div class="fcps-list mt-3">
          <table id="listfcps" class="table table-striped bo" style="width:100%">
            <thead>
              <tr>
                <th>Fellow ID</th>
                <th>Name</th>
                <th>Speciality</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data['fellows'] as $fellow)
              <tr>
                <td>{{ $fellow->fellow_id }}</td>
                <td>{{ $fellow->candidate_name }}</td>
                <td>{{ $fellow->subject_name }}</td>
                <td>{{ $fellow->reg_fee }}</td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Fellow ID</th>
                <th>Name</th>
                <th>Speciality</th>
                <th>Amount</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </main>
  <footer class="container px-3 bg-primary bg-gradient text-white mt-3">
    <div class="container d-flex justify-content-between justify-content-lg-between">
      <p class="mt-1 mb-1">Copyright &copy;
        <?php echo date('Y'); ?>, Bangladesh College of Physicians and Surgeons, All rights reserved.
      </p>
      <p class="mt-1 mb-1">Design & Developed By: IT Department, BCPS</p>
    </div>
  </footer>
</body>

</html>