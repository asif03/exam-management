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

            <form id="xm-info-updt" action="{{ route('jubilee-store') }}" method="POST" enctype="multipart/form-data"
                data-toggle="validator" role="form" onsubmit="return submitForm(this);">
                @csrf
                <x-alert />

                <div class="row mb-2">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input rad" type="radio" name="mem_fellow_radio"
                                id="mem_fellow_radio" value="fcps" checked>
                            <label class="form-check-label">
                                FCPS
                            </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input rad" type="radio" name="mem_fellow_radio"
                                id="mem_fellow_radio" value="mcps">
                            <label class="form-check-label">
                                MCPS
                            </label>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="fellow_id" id="fellow_id"
                                value="" required maxlength="250">
                            <label id="fello_member_label" for="fellow_id">Fellow ID <sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <select class="form-select" name="subject_id" id="subject_id" required onchange=""
                                aria-label="Floating label select example">
                                <option value="">Select</option>
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option>
                                @endforeach
                            </select>
                            <label for="subject_id">Subject <sup class="text-danger" style="font-weight: bold;">*</sup>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <h6>Designation<sup class="text-danger" style="font-weight: bold;">*</sup> </h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input roleClass" type="checkbox" value="prof" name="profession"
                                id="profession">
                            <label class="form-check-label">
                                Professor
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input roleClass" type="checkbox" value="associateprof"
                                name="profession" id="profession">
                            <label class="form-check-label">
                                Asso. Professor
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input roleClass" type="checkbox" value="asstprof" name="profession"
                                id="profession">
                            <label class="form-check-label">
                                Asst. Professor
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input roleClass" type="checkbox" value="consult" name="profession"
                                id="profession">
                            <label class="form-check-label">
                                Consultant
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input roleClass" type="checkbox" value="other" name="profession"
                                id="profession" checked>
                            <label class="form-check-label">
                                Other
                            </label>
                        </div>
                    </div>

                    <div class="col">
                        <h6>Gender</h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                            <label class="form-check-label">
                                Male
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                            <label class="form-check-label">
                                Female
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control text-uppercase" name="candidate_name"
                                id="candidate_name" value="" required maxlength="250">
                            <label for="candidate_name">Name of Candidate <sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control " name="institute" id="institute" value=""
                                maxlength="250">
                            <label for="institute">Institution</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control " name="department" id="department" value=""
                                maxlength="250">
                            <label for="department">Department</label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control " name="mailing_addr" id="mailing_addr" value=""
                                required maxlength="250">
                            <label for="mailing_addr">Mailing Address<sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input class="form-control " name="mobile" id="mobile" value="" type="number"
                                pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" required
                                maxlength="15">
                            <label for="mobile">Mobile No<sup class="text-danger"
                                    style="font-weight: bold;">*</sup></label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="email" class="form-control " name="email" id="email" value="" maxlength="50">
                            <label for="email">Email</label>
                        </div>
                    </div>

                </div>

                <div class="row mt-2">
                    <div class="form-check mb-1 ms-3">
                        <input class="form-check-input" type="checkbox" name="is_spouse_chk" id="isSpouseChk">
                        <label class="form-check-label">
                            <h5>Accompanying Person: Spouse Only (For cultural program and dinner only)</h5>
                        </label>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="spouse_name" id="spouse_name" value=""
                                required maxlength="45" readonly>
                            <label for="spouse_name">Spouse Name</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input class="form-control" name="spouse_mobile" id="spouse_mobile" value="" type="number"
                                pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" readonly>
                            <label for="spouse_mobile">Spouse Mobile No</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 ms-1 me-1">
                    <div class="p-2 border border-danger border-2 rounded">
                        <h5> Registration Fee</h5>
                        <!--<h6>bg-info  rounded</h6>-->
                        <label class="text-info fw-bold"> [[ Early Registration(Upto 31 March 2022): 2000 BDT ]]</label>
                        <br>
                        <label class="fw-bold"> [[ Late Registration(Upto 30 April 2022): 4000 BDT ]] [[
                            Spouse: 2000 BDT ]]</label>
                        <h5>Your Registration Fee: <label id="totalAmount" style="color: #ff0000">2000
                                BDT</label></h5>
                    </div>

                    <input hidden class="form-control" name="reg_fee" id="reg_fee" value="" type="number">
                </div>

                <div class="row mt-3">
                    <h5>Payment Method and Details</h5>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-1">
                            <label>A/C. Name: <span class="text-danger fw-bold">BCPS Golden Jubilee</span></label>
                        </div>
                    </div>

                    <div class="col">
                        <div class=" mb-1">
                            <label>A/C. No: <span class="text-danger fw-bold">0200018199695</span></label>
                        </div>
                    </div>

                    <div class="col">
                        <div class=" mb-1">
                            <input type="checkbox" name="payment_mode" id="paymentMode" value="1" checked>
                            <label>Payment Type: <span id="paymentDIV" style="color: #ff0000">Online Banking</span>
                            </label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="bank_name" id="bank_name" value="Agrani Bank"
                                maxlength="250" readonly>
                            <label for="bank_name">Bank Name</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="bank_branch" id="bank_branch" value=""
                                maxlength="250">
                            <label for="bank_branch">Branch Name</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="money_receipt" id="money_receipt" value=""
                                maxlength="250">
                            <label for="money_receipt">Transaction/Money Receipt No.</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">

                    <div class="col">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Money Receipt <sup class="text-danger"
                                    style="font-weight: bold;">*</sup> <label class="text-danger">(Image must be .jpg &
                                    size: 600x300)</label></label>
                            <input class="form-control form-control-sm" name="money_rec_file" id="money_rec_file"
                                type="file">
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Participant Picture<label class="text-danger">
                                    (Image must be .jpg &
                                    size: 300x300)</label></label>
                            <input class="form-control form-control-sm" name="img_up_file" id="img_up_file" type="file">
                        </div>
                    </div>

                </div>

                <div class="text-center p-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>


        <script>
            var date = new Date();
            var currency = " BDT";
            var initialAmount = 2000;
            var callSpouseAmount = 2000;
            // var callSpouseAmount = $('#spouseAmount').text().split(" ")[0];

            var spouseAmount = parseInt(callSpouseAmount);
            var currentMonth = date.getMonth();
            var currentYear = date.getFullYear();
            var targetMonth = 3;
            var targetYear = 2022;
            $("#reg_fee").val(initialAmount);

            $(document).ready(function () {
                if (currentMonth >= targetMonth && currentYear >= targetYear) {
                    $('#totalAmount').text("4000 BDT");
                    initialAmount = 4000;
                    $("#reg_fee").val(initialAmount);
                }
            });

             function submitForm() {
                if ($('#money_rec_file').get(0).files.length === 0) {
                    alert("No Money Receipt Image is selected.");
                    return false;
                }else{
                    return confirm('Do you want to save?');
                }

            }

            $('#paymentMode').on('change', function () {
                var x = document.getElementById("paymentDIV");
                if ($('#paymentMode').is(':checked')) {
                    x.innerHTML = "Online Banking";
                } else {
                    x.innerHTML = "Cash Payment";
                }
            });


            function func1() {
                if (currentMonth >= targetMonth && currentYear >= targetYear) {
                    initialAmount = 4000;
                    $("#reg_fee").val(initialAmount);
                }
            }
            setInterval("func1()", 1000);

            $('#isSpouseChk').on('change', function () {
                if ($('#isSpouseChk').is(':checked')) {
                    var totalAmount = initialAmount + spouseAmount;
                    $('#totalAmount').text(totalAmount + currency);
                    $("#reg_fee").val(totalAmount);

                    $('#spouse_name').prop('readonly', false);
                    $('#spouse_mobile').prop('readonly', false);
                } else {
                    $('#totalAmount').text(initialAmount + currency);
                    $('#spouse_name').prop('readonly', true);
                    $('#spouse_mobile').prop('readonly', true);
                    $("#reg_fee").val(initialAmount);
                }
            });

            $('.roleClass').on('change', function () {
                $('.roleClass').not(this).prop('checked', false);
            });

            $("input[name='mem_fellow_radio']").on("change", function () {
                if ($(this).val() == "fcps") {
                    $('#fello_member_label').text('Fellow ID');
                } else if ($(this).val() == "mcps") {
                    $('#fello_member_label').text('Member ID');
                }
            });

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