<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MWREf5MyUHpCgWX7KmM9imGB39pnl7ZOwqCLRaNm">

    <title>BRIEFING REGISTRATION FORM 2022</title>
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
    {{-- <h1>Date: 18/19 September, 2022</h1>
    <div class="row mt-3">
        <h5>Payment Method and Details</h5>
    </div> --}}
    <main>
        <div class="container">

            <form id="xm-info-updt" action="{{ route('save-briefing-program') }}" method="POST"
                enctype="multipart/form-data" data-toggle="validator" role="form" onsubmit="return submitForm(this);">
                @csrf
                <x-alert />

                <div class="row mt-2">
                    <div class="form-check mb-1 ms-1">
                        <label class="form-check-label d-flex flex-column justify-content-center">
                            <h3 style="text-align: center; width: 100%;">(Applicable for the trainees who passed FCPS Part-I
                                in {{$sess}}, 2022 session)</h3>
                            @if($sess =='JAN')
                            <h4 style="text-align: center; color:blueviolet; width: 100%;">Date: 18/19 September, 2022
                            </h4><br />
                            @else
                            <h4 style="text-align: center; color:blueviolet; width: 100%;">Date: 25/26 September, 2022
                            </h4><br />
                            @endif
                        </label>
                    </div>
                </div>

                <div class="row">
                    <input type="hidden" class="form-control" name="exam_session" id="exam_session" value="{{$sess}}"
                        required maxlength="3">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" name="candidate_name" id="candidate_name" value=""
                                required maxlength="250">
                            <label for="candidate_name">Name of Participant <sup class="text-danger"
                                    style="font-weight: bold;">*</sup> </label>
                        </div>
                    </div>

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
                            <select class="form-select" name="subject_id" id="subject_id" onchange="" required
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

                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-1">
                            <input class="form-control" type="text" name="mobile" id="mobile" value="" required>
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

                <div class="text-center p-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>


        <script>
            var date = new Date();
            var currentMonth = date.getMonth();
            var currentYear = date.getFullYear();
            var targetMonth = 3;
            var targetYear = 2022;

            $(document).ready(function () {
            
            });

            function submitForm() {
                if (!$('#candidate_name').val()) {
                    alert("Name Can't be Empty.");
                    return false;
                }else if($('#mobile').val()){
                    let pattern = /(\+88|88)?-?01[1-9](\d){8}/;
                    let pattern2 = /01[1-9](\d){8}/;
                    var mob=$('#mobile').val();
                    if(pattern.test(mob)){
                    if((pattern2.test(mob)) && (mob.length == 11)){
                        return true;
                    }else{
                        alert("This is not a valid mobile number..");
                        return false;
                    }
                    }else{
                        alert("This is not a valid mobile number.");
                        return false;
                    }
            } else{
                    return confirm('Do you want to save?');
                }
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