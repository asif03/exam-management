<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamScheduleMasterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exam_type_id'  => 'required' ,
            'mother_subject_id' => 'required' ,
            'exam_year' => 'required' ,
            'exam_session' => 'required' ,
            'exam_date'  => 'required' ,
            'exam_start_time' => 'required' ,
            'exam_end_time'  => 'required' ,
            'reporting_time' => 'required' ,
            'hall_id'  => 'required' 
        ];

    }
}
