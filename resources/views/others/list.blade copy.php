<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">

  <title>BCPS GOLDEN JUBILEE</title>

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
      $('#listmcps').DataTable();
      $("#myTab a:first").tab("show");
    
    });

    function getModalData(id, memType) {
      $.ajax({
        type: 'GET',
        data: { memId: id, memTyp: memType },
        url: '{{URL::to('/jubilee-member-info')}}', 
        success: function(result) {
          $(".modal-body").html(result);
        },
      });
    }

  </script>

</head>

<body>
  <header>
    <div class="container">
      <img class="img-responsive" src="{{ asset('public/images/golden.jpg'); }}" alt="BCPS" width="100%" height="150" />
    </div>
  </header>

  <main>
    <div class="container d-flex flex-column">
      <h3 class="text-center">Registered Fellows/Member List</h3>

      <div class="">
        <ul class="nav nav-tabs" id="myTab">
          <li class="nav-item">
            <a href="#fcps" class="nav-link active" data-bs-toggle="tab">FCPS(Fellows) List</a>
          </li>
          <li class="nav-item">
            <a href="#mcps" class="nav-link" data-bs-toggle="tab">MCPS(Member) List</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="fcps">
            <h4 class="mt-2">Registered List of Fellows</h4>
            <div class="fcps-list">
              <table id="listfcps" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Fellow ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Institute</th>
                    <th>Department</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>2011/04/25</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bcpsModal"
                        onclick="getModalData('1', 'fcps')">
                        View
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>2011/04/25</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bcpsModal"
                        onclick="getModalData('1', 'fcps')">
                        View
                      </button>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Fellow ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Institute</th>
                    <th>Department</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="mcps">
            <h4 class="mt-2">Registered List of Members</h4>
            <div class="mcps-list">

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

  <!-- Modal -->
  <div class="modal fade" id="bcpsModal" tabindex="-1" aria-labelledby="bcpsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bcpsModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>