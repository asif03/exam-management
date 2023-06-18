<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamInfoUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exam_year'  => 'required|max:4' ,
            'exam_session' => 'required|max:3' ,
            'roll_no' => 'required|max:50',
            'bmdc_reg_no' => 'required|max:50' ,
            'candidate_name' => 'required|max:255' ,
            'subject_id' => 'required|max:20' ,
            'training_institute_id' => 'required|max:20' ,
            'other_training_institute_name' => 'max:255' ,
            'trainer_name' => 'max:255' ,
            'course_institute_id' => 'required|max:255' ,
            'other_course_institute_name' => 'max:255' ,
            'course_year' => 'required|max:4' ,
            'course_director' => 'required|max:255' ,
            'present_posting' => 'required|max:500' ,
            'institute_head' => 'required|max:255' ,
            'mobile' => 'required|max:11' ,
            'remarks' => 'max:500' ,
        ];
    }


}
