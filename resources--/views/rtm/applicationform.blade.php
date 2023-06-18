<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">

    <title>BCPS :: RTMD</title>
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
            <img src="{{ asset('public/images/convocation.jpg'); }}" alt="BCPS" width="100%" height="150" />
        </div>
        <div class="container">
            <h3 class="py-2 text-center">Registration Form for attending "Protocol Writing Workshop"</h3>
            <h4 class="py-2 text-center"><u>Date: 10-11 February, 2023</u></h4>
            <h5 class="py-2 text-center" style="color: red;">(Only 40 Persons are allowed to apply.)</h5>
        </div>
    </header>
    <main>
        <div class="container">
            <form id="xm-info-updt" action="{{ route('rtmd-save-workshop') }}" method="POST"
                enctype="multipart/form-data" data-toggle="validator" role="form" onsubmit="return submitForm(this);">
                @csrf
                <x-alert />
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="fellow_id" id="fellow_id" required value=""
                                maxlength="250">
                            <label id="fello_member_label" for="fellow_id">Fellow ID <sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <select class="form-select" name="subject_id" id="subject_id" onchange="" required
                                aria-label="Floating label select example">
                                <option value="">Select</option>
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                                @endforeach
                            </select>
                            <label for="subject_id">Speciality <sup class="text-danger"
                                    style="font-weight: bold;">*</sup>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="candidate_name" id="candidate_name" value=""
                                required maxlength="250">
                            <label for="candidate_name">Name of Participant <sup class="text-danger"
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
                            <label for="mobile">Mobile No<sup class="text-danger"
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

                <div class="row mt-1">
                    <h6>Payment Details</h6>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="reg_fee" id="reg_fee" value="5000" required
                                readonly>
                            <label for="bank_branch">Reg. Fee<sup class="text-danger"
                                    style="font-weight: bold;">*</sup></label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <select class="form-select" name="bank_name" id="bank_name" required
                                aria-label="Floating label select example">
                                <option value="">Select</option>
                                @foreach($banks as $bank)
                                <option value="{{ $bank->bank_name }}">{{ $bank->bank_name}}</option>
                                @endforeach
                            </select>
                            <label for="subject_id">Bank Name <sup class="text-danger"
                                    style="font-weight: bold;">*</sup>
                            </label>
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
                </div>

                <div class="row mt-2">
                    <div class="col-md-5">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="money_receipt" id="money_receipt" value=""
                                required maxlength="250">
                            <label for="money_receipt">Transaction/Money Receipt No.<sup class="text-danger"
                                    style="font-weight: bold;">*</sup></label>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Money Receipt <sup class="text-danger"
                                    style="font-weight: bold;">*</sup> <label class="text-danger">(Image must be
                                    .jpg &
                                    size: 600x300)</label></label>
                            <input class="form-control form-control-sm" name="money_rec_file" id="money_rec_file"
                                type="file" onchange="ValidateSingleInput(this, 1);">
                        </div>
                    </div>
                </div>

                <div class="text-center p-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        <script>
            function submitForm() {
                 var fellow_id_val = $('#fellow_id').val();
                 var subject_id_val = $('#subject_id').val();

                if ($('#money_rec_file').get(0).files.length === 0) {
                    alert("No Money Receipt Image is selected.");
                    return false;
                }
                else if (!$('#fellow_id').val()) {
                    alert("Fellow ID can't be empty.");
                    return false;
                }
                else if (!$('#subject_id').val()) {
                    alert("Specility can't be empty.");
                    return false;
                }
                else if (!$('#bank_branch').val()) {
                    alert("Branch Name Can't be Empty.");
                    return false;
                }
                else if (!$('#money_receipt').val()) {
                    alert("Transaction/Money Receipt No. can't be empty.");
                    return false;
                }
                else{
                    return confirm('Do you want to save?');
                }

            }
         
            var _validFileExtensions = [".jpg", ".png"];    
            
            function ValidateSingleInput(oInput, opt1) {
                if (oInput.type == "file") {

                    var sFileName = oInput.value;
                    if (sFileName.length > 0) {
                        var blnValid = false;
                        for (var j = 0; j < _validFileExtensions.length; j++) {
                            var sCurExtension = _validFileExtensions[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }
                        
                        if (!blnValid) {
                            alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                            oInput.value = "";
                            return false;
                        }

                        /*if(blnValid){
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
                                if(opt1==1){
                                    if (height > 300 || width > 600) {
                                    alert("Height and Width must be 300px X 600px.");
                                    oInput.value = "";
                                    return false;
                                }
                                }else if(opt1==2){
                                    if (height > 300 || width > 300) {
                                    alert("Height and Width must be 300px X 300px");
                                    oInput.value = "";
                                    return false;
                                }
                                }
                                
                                //alert("Uploaded image has valid Height and Width.");
                                return true;
                            };
                        }*/
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
                <?php echo date('Y'); ?>, Bangladesh College of Physicians and Surgeons, All rights reserved.
            </p>
            <p class="mt-1 mb-1">Design & Developed By: IT Department, BCPS</p>
        </div>
    </footer>
</body>

</html>