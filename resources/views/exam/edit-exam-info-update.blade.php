@extends('layouts.guest')

@section('content')

<div class="container">
  <h5 class="text-center p-1" style="border:2px solid DodgerBlue; background-color:powderblue;">Training Institute
    Information Update Form(Edit Form)</h5>
  <form id="xm-info-updt" action="" method="POST" data-toggle="validator" role="form">
    @csrf

    <x-alert />

    <div class="row">
      <div class="col">
        <div class="form-floating mb-1">
          <select class="form-select" name="exam_year" id="exam_year" required
            aria-label="Floating label select example" disabled>

            <option value="">Select</option>
            @foreach(range(date('Y'), date('Y') - 25) as $y)
            <!-- <option value="{{ $y }}">{{ $y}}</option> -->
            <option value="{{ $examInfo->exam_year }}" @if ($examInfo->exam_year===$y) selected
              @endif>{{ $y }}</option>
            @endforeach
          </select>
          <label for="exam_year">Year</label>
        </div>
      </div>

      <div class="col">
        <div class="form-floating mb-1">
          <select class="form-select" name="exam_session" id="exam_session" required
            aria-label="Floating label select example" disabled>
            <option selected value="JAN">January</option>
            <option value="JUL">July</option>
          </select>
          <label for="exam_session">Session</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" name="candidate_name" id="candidate_name"
            value="{{$examInfo -> candidate_name}}" required maxlength="100">
          <label for="candidate_name">Name</label>
        </div>
      </div>

      <div class="col">
        <div class="form-floating mb-1">
          <select class="form-select" name="subject_id" id="subject_id" required onchange=""
            aria-label="Floating label select example">
            <option value="">Select</option>
            @foreach($subjects as $subject)
            <!-- <option value="{{ $subject->id }}">{{ $subject->subject_name}}</option> -->
            <option value="{{ $subject->id }}" @if ($examInfo->subject_id == $subject->id) selected
              @endif>{{ $subject->subject_name }}</option>
            @endforeach
          </select>
          <label for="subject_id">Subject</label>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" name="roll_no" id="roll_no" value="{{$examInfo -> roll_no}}" required
            maxlength="15">
          <label for="roll_no">Roll No</label>
        </div>
      </div>

      <div class="col">
        <div class="form-floating mb-1">
          <input class="form-control" name="mobile" id="mobile" value="{{$examInfo -> mobile}}" required type="number"
            pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;">
          <label for="mobile">Mobile No</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" name="bmdc_reg_no" id="bmdc_reg_no"
            value="{{$examInfo -> bmdc_reg_no}}" required maxlength="50">
          <label for="bmdc_reg_no">BMDC No</label>
        </div>
      </div>

      <div class="col">
        <div class="form-floating mb-1">
          <select class="form-select" name="course_year" id="course_year" required
            aria-label="Floating label select example">
            <option value="">Select</option>
            @foreach(range(date('Y'), date('Y') - 25) as $y)
            <!-- <option value="{{ $y }}">{{ $y}}</option> -->
            <option value="{{ $examInfo->course_year }}" @if ($examInfo->course_year===$y) selected
              @endif>{{ $y }}</option>
            @endforeach
          </select>
          <label for="course_year">Year of Course</label>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col">
        <div class="form-floating mb-1">
          <select class="form-select" name="training_institute_id" id="training_institute_id" required
            onchange="fn_tr_inst(this)" aria-label="Floating label select example">
            <option value="">Select</option>
            @foreach($institutes as $institute)
            <!-- <option value="{{ $institute->id }}">{{ $institute->institute_name}}</option> -->
            <option value="{{ $institute->id }}" @if ($examInfo->training_institute_id == $institute->id)
              selected @endif>{{ $institute->institute_name }}</option>
            @endforeach
          </select>
          <label for="training_institute_id">Last Training Institute</label>
        </div>
      </div>

      <div class="col">
        <div class="form-floating mb-1">
          <select class="form-select" name="course_institute_id" id="course_institute_id" required
            onchange="fn_course_inst(this)" aria-label="Floating label select example">
            <option value="">Select</option>
            @foreach($institutes as $institute)
            <!-- <option value="{{ $institute->id }}">{{ $institute->institute_name}}</option> -->
            <option value="{{ $institute->id }}" @if ($examInfo->course_institute_id == $institute->id)
              selected @endif>{{ $institute->institute_name }}</option>
            @endforeach
          </select>
          <label for="course_institute_id">Course Institute</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" name="other_training_institute_name"
            id="other_training_institute_name" value="{{$examInfo -> other_training_institute_name}}" maxlength="255">
          <label for="other_training_institute_name">Other Training Institute</label>
        </div>
      </div>

      <div class="col">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" name="other_course_institute_name" id="other_course_institute_name"
            value="{{$examInfo -> other_course_institute_name}}" maxlength="255">
          <label for="other_course_institute_name">Other Course Institute</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" name="institute_head" id="institute_head"
            value="{{$examInfo -> institute_head}}" required maxlength="255">
          <label for="institute_head">Head of the Institute</label>
        </div>
      </div>

      <div class="col">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" name="course_director" id="course_director"
            value="{{$examInfo -> course_director}}" required maxlength="255">
          <label for="course_director">Course Director/Head of Dept.</label>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col">
        <div class="form-floating mb-1">
          <select class="form-select" name="present_posting" id="present_posting"
            aria-label="Floating label select example">
            <option value="">Select</option>
            @foreach($institutes as $institute)
            <!-- <option value="{{ $institute->id }}">{{ $institute->institute_name}}</option> -->
            <option value="{{ $institute->id }}" @if ($examInfo->present_posting == $institute->id) selected
              @endif>{{ $institute->institute_name }}</option>
            @endforeach
          </select>
          <label for="present_posting">Present Posting Place</label>
        </div>
      </div>

      <div class="col">
        <div class="form-floating mb-1">
          <input type="text" class="form-control" name="remarks" id="remarks" value="{{$examInfo -> remarks}}"
            maxlength="500">
          <label for="remarks">Remarks (if any)</label>
        </div>
      </div>

    </div>


    <div class="text-center p-2">
      <button type="submit" id="" onclick="" class="btn btn-outline-primary">Update</button>
    </div>

  </form>

</div>

<script>
  $(document).ready(function() {
    $('#xm-info-updt').validator('update');

    $( "#other_training_institute_name" ).prop( "disabled", true );
    $( "#other_course_institute_name" ).prop( "disabled", true );
    });

    function fn_tr_inst(val){
    let yn;
    (val.value == "9999") ? yn = false : yn = true;
    $( "#other_training_institute_name" ).prop( "disabled", yn );
    $( "#other_training_institute_name" ).prop('required',!yn);
    }

    function fn_course_inst(val){
    let yn;
    (val.value == "9999") ? yn = false : yn = true;
    $( "#other_course_institute_name" ).prop( "disabled", yn );
    $( "#other_course_institute_name" ).prop('required',!yn);
    }
  
</script>


@endsection