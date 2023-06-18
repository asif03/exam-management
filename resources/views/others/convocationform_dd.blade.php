<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">

    <title>BCPS 14TH CONVOCATION</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <style>
		sup{
			color:red;
		}
	</style>

</head>

<body>
    <header>

        <div class="container">
            <img src="{{ asset('public/images/convocation_header.jpg'); }}" alt="BCPS" width="100%" height="150" />
            <h3 class="text-center p-1 text-danger border rounded fst-italic">Registration Form</h3>
        </div>

    </header>
    <main>

        <div class="container">

            <form id="convoc-info" action="{{ route('conv-4teen-save') }}" method="POST" enctype="multipart/form-data"
                data-toggle="validator" role="form" onsubmit="return submitForm(this);">
                @csrf
                <x-alert />

                <div class="row mb-2">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input rad" type="radio" name="mem_fellow_radio"
                                id="mem_fellow_radio" value="fcps" onchange="getSubject('FCPS')" checked>
                            <label class="form-check-label">
                                FCPS
                            </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input rad" type="radio" name="mem_fellow_radio"
                                id="mem_fellow_radio" value="mcps" onchange="getSubject('MCPS')">
                            <label class="form-check-label">
                                MCPS
                            </label>
                        </div>

                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-floating mb-1">
                            <select class="form-select" name="subject_id" id="subject_id" onchange="" required
                                aria-label="Floating label select example">

                            </select>
                            <label for="subject_id">Subject <sup class="text-danger" style="font-weight: bold;">*</sup>
                            </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <select class="form-select" name="exam_year" id="exam_year" required onchange=""
                                aria-label="Floating label select example">
                                <option selected value="">Select</option>
                                <option value="@php echo date('Y'); @endphp">@php echo date('Y'); @endphp</option>
                                @foreach(range(date('Y')-1, date('Y') - 5) as $y)
                                <option value="{{ $y }}">{{ $y}}</option>
                                @endforeach
                            </select>
                            <label for="exam_year">Year <sup class="text-danger" style="font-weight: bold;">*</sup></label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <select class="form-select" name="exam_session" id="exam_session" required onchange=""
                                aria-label="Floating label select example">
                                <option selected value="">Select</option>
                                <option value="JAN">January</option>
                                <option value="JUL">July</option>
                            </select>
                            <label for="exam_session">Session <sup class="text-danger" style="font-weight: bold;">*</sup></label>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="number" class="form-control" name="fellow_id" id="fellow_id" required value=""
                                maxlength="250">
                            <label id="fello_member_label" for="fellow_id">Fellow ID <sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="candidate_name" id="candidate_name" value=""
                                required maxlength="250">
                            <label for="candidate_name">Name (Capital Letter) <sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control " name="father_name" id="father_name" value=""
                                required maxlength="250">
                            <label for="father_name">Name of Father/Spouse<sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control " name="mailing_addr" id="mailing_addr" value=""
                                required maxlength="250">
                            <label for="mailing_addr">Address of communication<sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input class="form-control " name="mobile" id="mobile" value="" type="number"
                                pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                                maxlength="15" required>
                            <label for="mobile">Mobile No.<sup class="text-danger"
                                    style="font-weight: bold;">*</sup></label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="email" class="form-control " name="email" id="email" value="" maxlength="50"
                                required>
                            <label for="email">Email<sup class="text-danger" style="font-weight: bold;">*</sup></label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2 ms-1 me-1">
                    <div class="p-2 border border-danger border-2 rounded">
                        <!--<h3> Registration Fee: 11000 BDT</h5> -->

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                    <th scope="col" width="80%">Registration Fee</th>
                                    <th scope="col" width="20%">11000 BDT</th>
                                </tr>

                                <tr>
                                    <th scope="col" width="80%">Option</th>
                                    <th scope="col" width="20%">Yes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Accompanied By Spouse/One Guardian</td>
                                    <td><input class="form-check-input" type="checkbox" value="on" name="is_spouse_chk"
                                            id="is_spouse_chk" onchange="billingDeal()">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Original Certificate received before?</td>
                                    <td><input class="form-check-input roleClass" type="checkbox" value="on"
                                            name="is_origin_cert_rec" id="is_origin_cert_rec">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Provesional Certificate received before?</td>
                                    <td><input class="form-check-input roleClass" type="checkbox" value="on"
                                            name="is_prov_cert_rec" id="is_prov_cert_rec">
                                    </td>
                                </tr>

                            </tbody>

                            <tfoot>
                                <tr class="table-success">
                                    <th>
                                        <h5 id = "reg_fee_text">Your Registration Fee: </h5>
                                    </th>
                                    <th>
                                        <h5><label id="totalAmount" style="color: #ff0000">11000 BDT</label></h5>
                                    </th>
                                </tr>
                            </tfoot>

                        </table>

                        <input hidden class="form-control" name="reg_fee" id="reg_fee" value="" type="number">
                    </div>

                    <div class="row mt-2">
                        <div class="form-check mb-1">
                            <label class="form-check-label">
                                <h5>Accompanying Person: Spouse/One Guardian(Only one accompanied person will be
                                    accepted)</h5>
                            </label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" name="spouse_name" id="spouse_name" value=""
                                    maxlength="45" readonly>
                                <label for="spouse_name">Name</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating mb-1">
                                <input class="form-control" name="spouse_relation" id="spouse_relation" value=""
                                    type="text" readonly>
                                <label for="spouse_relation">Relation</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h5>Payment Method and Details</h5>
                    </div>


                    <div class="row">

                        <div class="col">
                            <div class="form-floating mb-1">
                                <select class="form-select" name="payment_mode" id="payment_mode" required onchange=""
                                    aria-label="Floating label select example">
                                    <option selected value="online">Online (Agrani Bank - A/C No: 0200002426749)</option>
                                    <option value="bankdraft">Bank Draft</option>
                                    <option value="payorder">Pay Order</option>
                                </select>
                                <label for="payment_mode">Payment Type</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" name="money_receipt_no" id="money_receipt_no"
                                    value="" maxlength="250">
                                <label for="money_receipt_no">Transaction/Money Receipt No.<sup class="text-danger"
                                        style="font-weight: bold;">*</sup></label>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" name="bank_name" id="bank_name" value=""
                                    required maxlength="250">
                                <label for="bank_name">Bank Name<sup class="text-danger"
                                        style="font-weight: bold;">*</sup></label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" name="bank_branch" id="bank_branch" value=""
                                    required maxlength="250">
                                <label for="bank_branch">Branch Name<sup class="text-danger"
                                        style="font-weight: bold;">*</sup></label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" name="date_submission" id="date_submission"
                                    required maxlength="250">
                                <label for="date_submission">Date<sup class="text-danger"
                                        style="font-weight: bold;">*</sup></label>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Money Receipt <sup class="text-danger"
                                        style="font-weight: bold;">*</sup> <label class="text-danger">(Image must be
                                        .jpg &
                                        size: 600x300)</label></label>
                                <input class="form-control form-control-sm" name="money_rec_file" id="money_rec_file"
                                    type="file" onchange="ValidateSingleInput(this, 1);">
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Participant Picture <sup class="text-danger"
                                        style="font-weight: bold;">*</sup><label class="text-danger">
                                        (Image must be .jpg &
                                        size: 300x300)</label></label>
                                <input class="form-control form-control-sm" name="img_up_file" id="img_up_file"
                                    type="file" onchange="ValidateSingleInput(this, 2);">
                            </div>
                        </div>

                    </div>

                    <div class="text-center p-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>

        </div>


        <script>
            var date = new Date();

            let mn = parseInt(date.getMonth())+1;
            mn = mn.toString().length==1 ? '0' + mn : mn;
            var formattedDate = date.getDate()+"/"+mn+"/"+date.getFullYear();
            var currency = " BDT";
            var initialAmount = 11000;
            $("#reg_fee").val(initialAmount);
            $("#date_submission").val(formattedDate);
            var isOriginalChecked = false;

            $(document).ready(function () {
        
                getSubject("FCPS");
            });



          function getSubject(degtype){
    
                    if(degtype) {
                        $.ajax({
                            type: "get",
                            url: "{{URL::to('/subject-by-type') }}", 
                            data: { degtype: degtype },
                            success: function(data) {
                                $('select[name="subject_id"]').empty();
                                $('select[name="subject_id"]').append('<option value="">Select</option>');

                                $.each(data, function( i ) {
                                    $('select[name="subject_id"]').append('<option value="'+ data[i].id +'">'+ data[i].subject_name +'</option>');
                                });
                            }
                        });
                    }else{
                        $('select[name="subject_id"]').empty();
                    }
           }



            $('.roleClass').on('change', function () {
                $('.roleClass').not(this).prop('checked', false);
                billingDeal();
            });

            function billingDeal(){
                var totalAmount = 0;
                var callSpouseAmount = 0;
                var spouseAmount = 0;
                
                if ($('#is_spouse_chk').is(':checked')) {
                    spouseAmount = 2000;
                    totalAmount = initialAmount + spouseAmount;
                    $('#spouse_name').prop('readonly', false);
                    $('#spouse_relation').prop('readonly', false);

                    $('#reg_fee_text').text("Your Registration Fee (With Accompanying Person) :");

                } else {
                    spouseAmount = 0;
                    totalAmount = initialAmount + spouseAmount;
                    $('#spouse_name').prop('readonly', true);
                    $('#spouse_relation').prop('readonly', true);
                    $('#reg_fee_text').text("Your Registration Fee :");
                }
 
                if ($('#is_prov_cert_rec').is(':checked')) {
                    initialAmount = 4000;
                    totalAmount = initialAmount + spouseAmount;

                    $('#bank_name').prop('readonly', false);
                    $('#bank_branch').prop('readonly', false);
                    $('#money_receipt_no').prop('readonly', false);

                } else if ($('#is_origin_cert_rec').is(':checked')) {

                    initialAmount = 0;
                    totalAmount = initialAmount + spouseAmount;
                    isOriginalChecked = true;

                    $('#bank_name').prop('readonly', true);
                    $('#bank_branch').prop('readonly', true);
                    $('#money_receipt_no').prop('readonly', true);

                } else {
                    initialAmount = 11000;
                    totalAmount = initialAmount + spouseAmount;
                    $('#bank_name').prop('readonly', false);
                    $('#bank_branch').prop('readonly', false);
                    $('#money_receipt_no').prop('readonly', false);
                }

                $('#totalAmount').text(totalAmount + currency);
                $("#reg_fee").val(totalAmount);
            }
   
            function submitForm() {
                var fellow_id_val = $('#fellow_id').val();
                var subject_id_val = $('#subject_id').val();

                if(initialAmount != 0){
                    if (!$('#bank_name').val()) {
                    altMsg("Bank Name", 1);
                    return false;
                    } else if (!$('#bank_branch').val()) {
                    altMsg("Branch Name", 1);
                    return false;
                    } else if (!$('#money_receipt_no').val()) {
                        altMsg("Transaction/Money Receipt No.", 1);
                        return false;
                    } else if ($('#money_rec_file').get(0).files.length === 0) {
                        altMsg("Money Receipt Image", 2);
                        return false;
                    }
                }
        
                 else if (!$('#fellow_id').val()) {
                    altMsg("Fellow Id or Member Id", 1);
                    return false;
                } else if (!$('#candidate_name').val()) {
                    altMsg("Name", 1);
                    return false;
                } else if (!$('#father_name').val()) {
                    altMsg("Father/Spouse Name", 1);
                    return false;
                } else if (!$('#mailing_addr').val()) {
                    altMsg("Address of communication", 1);
                    return false;
                } else if (!$('#mobile').val()) {
                    altMsg("Mobile No. Name", 1);
                    return false;
                } else if (!$('#email').val()) {
                    altMsg("Email Name", 1);
                    return false;
                }else if (!$('#subject_id').val()) {
                    altMsg("Subject Name", 1);
                    return false;
                }else if (!$('#exam_year').val()) {
                    altMsg("Year", 1);
                    return false;
                }else if (!$('#exam_session').val()) {
                    altMsg("Session", 1);
                    return false;
                } else if ($('#img_up_file').get(0).files.length === 0) {
                    altMsg("Participant Image", 2);
                    return false;
                }
                else {
                    return confirm('Do you want to save?');
                }
            }

            function altMsg(msgBody, optn){
                var extmsg = "";
                if(optn == 1){
                    extmsg = " Can't be Empty.";
                }else if(optn == 2){
                    extmsg = " Not Selected.";
                }
              return alert(msgBody+""+extmsg);
            }

            $("input[name='mem_fellow_radio']").on("change", function () {
                if ($(this).val() == "fcps") {
                    document.getElementById("fello_member_label").innerHTML =
			"<label>Fellow ID<sup> *</sup></label>";
                } else if ($(this).val() == "mcps") {
                    document.getElementById("fello_member_label").innerHTML =
			"<label>Member ID<sup> *</sup></label>";
                }
            });

            var _validFileExtensions = [".jpg", ".png"];

            function ValidateSingleInput(oInput, opt1) {
                if (oInput.type == "file") {

                    var sFileName = oInput.value;
                    if (sFileName.length > 0) {
                        var blnValid = false;
                        for (var j = 0; j < _validFileExtensions.length; j++) {
                            var sCurExtension = _validFileExtensions[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length)
                                .toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }

                        if (!blnValid) {
                            alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions
                                .join(", "));
                            oInput.value = "";
                            return false;
                        }

                        if (blnValid) {
                            var reader = new FileReader();
                            //Read the contents of Image File.
                            reader.readAsDataURL(oInput.files[0]);
                            reader.onload = function (e) {
                                //Initiate the JavaScript Image object.
                                var image = new Image();
                                //Set the Base64 string return from FileReader as source.
                                image.src = e.target.result;
                                //Validate the File Height and Width.
                                image.onload = function () {
                                    var height = this.height;
                                    var width = this.width;
                                    if (opt1 == 1) {
                                        if (height > 300 || width > 600) {
                                            alert("Width & Height must be 600px X 300px.");
                                            oInput.value = "";
                                            return false;
                                        }
                                    } else if (opt1 == 2) {
                                        if (height > 300 || width > 300) {
                                            alert("Width & Height must be 300px X 300px");
                                            oInput.value = "";
                                            return false;
                                        }
                                    }

                                    //alert("Uploaded image has valid Height and Width.");
                                    return true;
                                };
                            }
                        }

                    }
                }
                return true;
            }
        </script>

    </main>
    <footer class="px-3 bg-primary bg-gradient text-white container">
        <div class="container d-flex justify-content-between justify-content-lg-between">
            <p class="mt-1 mb-1">Copyright &copy;
                2022, Bangladesh College of Physicians and Surgeons, All rights reserved.
            </p>
            <p class="mt-1 mb-1">Design & Developed By: IT Department, BCPS</p>
        </div>
    </footer>
</body>

</html>