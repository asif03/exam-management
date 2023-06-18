<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">
  <title>Bangladesh College of Physicians and Surgeons (BCPS)</title>

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
      <img src="{{ asset('public/images/briefing_program.jpg'); }}" alt="BCPS" width="100%" height="150" />
    </div>
  </header>

  <main>
    <div class="container">
      <div class="mt-4">
        <h6>Procedure of Online Registration:</h6>
        <ul>
          <li class="fw-bold mt-1">
            Apply online who passed FCPS Part-I in Jan, 2022:
            <a class="btn btn-primary fw-bold" href="{{ route('form-briefing-program', 'JAN') }}">Apply Online who
              Passed in Jan,
              2022</a>
          </li>
          <li class="fw-bold mt-3">
            Apply online who passed FCPS Part-I in Jul, 2022:
            <a class="btn btn-success fw-bold" href="{{ route('form-briefing-program', 'JUL') }}">Apply Online who
              Passed in Jul,
              2022</a>
          </li>
        </ul>
      </div>

      <div class="d-flex justify-content-center mt-4">
        <a class="btn btn-warning fw-bold" href="{{ route('briefing-program-list') }}">Registered Applicant List</a>
      </div>
      
      <div class="d-flex justify-content-center mt-4">
        <h5 class="text-danger">Last date of Registration: 14-Sep-2022</h5>
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