<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">

  <title>BCPS GOLDEN JUBILEE ADMIN</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- jquery -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js" defer></script>

</head>

<body>
  <header>
    <div class="px-3 py-2 bg-primary bg-gradient text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-start justify-content-start justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 px-2 my-lg-0 text-white text-decoration-none">
            <img class="bi me-2" src="" alt="BCPS" width="60" height="42" />
          </a>
          <h3>Bangladesh College of Physicians & Surgeons</h3>
          </br>
        </div>
      </div>
    </div>
  </header>
  <main>

<div class="container">
  <div class="row p-2">
    <div class="col text-center">
          <div class="form-floating mb-1">
            <select class="form-select" name="perticipant_type" id="perticipant_type" required
              aria-label="Floating label select example" onchange="loadDataByType()">
              <option selected value="FCPS">fcps</option>
              <option value="MCPS">mcps</option>
            </select>
            <label for="perticipant_type">Perticipant Type</label>
          </div>
      </div>

        <div class="col text-center">
          <div class="form-floating mb-1">
          <a class="btn btn-outline-danger" href="{{ route('gold-file') }}">Excel Report</a>
          </div>
        </div>
  </div>
  

  <table id="goldInfoTable" class="table table-hover table-dark p-2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Fellow/Member ID</th>
        <th>Name</th>
        <th>Mobile No</th>
        <th>Money Receipt No</th>
        <th>Amount</th>
        <th>Spouse</th>
        <th>Payment Mode</th>
        <th>Bank Branch</th>
        <th>Verified?</th>
        <th>Money Rec Popup</th>
        <!--<th>Action</th>-->
      </tr>
    </thead>
  </table>

</div>
   
    
</main>

  <div id="exampleModalHiDiv" class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">

              <button type="button" class="btn-close modal-heade" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">

              <div id="infoDisplay">
                  
              </div>

              <div id="imgDisplay">
                  
              </div>

              </div>
            </div>
          </div>
        </div>
    </div>


  <script>
  $(document).ready(function() {
    getListFn();
  });

    function getListFn() {
      let perticipant_type = $( "#perticipant_type" ).val();
      if(!perticipant_type){
          alert("Please Select Perticipant Type");
            return false;
      }
      $.ajax({
        type: "get",
         url: '{{URL::to('/fellow-list')}}', 
        //url: '/exam-info-data', 
        data: { perticipant_type: perticipant_type},
        dataType: "json",
        success: function(data) {
          dataTab = $('#goldInfoTable').DataTable({
            "aaData": data,
            "columns": [{
                "data": "id"
              },
              {
                "data": "fellow_id"
              },
              {
                "data": "candidate_name"
              },
              {
                "data": "mobile"  
              },
              {
                "data": "money_receipt"
              },
              {
                "data": "reg_fee"  
              },
              {
                "data": "is_spouse_chk" //6
              },
              {
                "data": "payment_mode"  //7
              },
              {
                "data": "bank_branch"  
              },
              {
                "data": "verified" //9 
              },
              {
              "data": function (data, type, row, meta) {
                var str = data.id + "|" + data.fellow_id+ "|" +data.reg_fee+ "|" + data.money_receipt+ "|" +data.money_rec_file;
                return '<a  href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="setDataToForm(' + '\'' + str + '\')">Image</a>';
                //return '<a  href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="setDataToForm(' + '\'' + data.money_receipt + '\',' + '\'' + data.money_rec_file + '\')">Image</a>';
                  }
              },
             /* {
                "data": function(data, type, row, meta) {
                  var uri = "";
                  return " ";
                //   urie = "{{ route('edit-exam-info-update','lid')}}";
                //   urid = "{{ route('exam-info-delete','lid')}}";
                //   urie = urie.replace('lid', data.id);
                //   urid = urid.replace('lid', data.id);
                //   return '<a href="' + urie + '" class = "editor-edit"> Edit</a> | <a href="' + urid + '" class="delete">Delete</a > ';
                },
                "className": "text-indigo-600 hover:text-indigo-900",
                "orderable": false,
              }, */
            ],
            "columnDefs": [{
              "targets": [0],
              "visible": false,
            },
            { targets : [9],
              render : function (data, type, row) {
                return data == 'N' ? 'No' : 'Yes';
              }
          },
          { targets : [7],
              render : function (data, type, row) {
                return data == '1' ? 'Online Payment' : 'Cash Payment' ;
          }
         },
          { targets : [6],
              render : function (data, type, row) {
                return data == '0' ? 'No' : 'Yes';
          }
        },
        { targets : [6],
              render : function (data, type, row) {
                //return data == '0' ? 'No' : 'Yes';
                if(data == '0'){
                  //$(row).addClass("text-danger");
                  return "No"; 
                }else{
                  return "Yes";
                }
              } 
          }
          ]
          });
        }
      });
       dataTab.destroy();
    }

    function loadDataByType(){
    getListFn();
  }

      function setDataToForm(str_item) {
        var res = str_item.split("|");
      
        var felow_id = res[1];
        var reg_fee = res[2];
        var money_receipt = res[3];
        var money_rec_file = res[4];

        $('#infoDisplay').html('[Felow/Member Id: '+felow_id+"]"+" [Registration fee: "+reg_fee+"]"+" [Money Receipt No: "+money_receipt+"]");
        poUpContent(money_rec_file);
      }

      function poUpContent(imglink2){
        $('#theImg').remove();
     
        var isrc = "{{asset("storage")}}";
        //var isrc2 = "{{asset("storage/uploads/jubilee/1646279294_1467_rsz_tiger.jpg")}}";
        $('#imgDisplay').prepend($('<img>',{id:'theImg',src:isrc+"/"+imglink2}));
    }
    //   function displayHideImg(){
    //     $('#imgDisplayShowHide').hide();
    //   }

</script>

</body>

</html>