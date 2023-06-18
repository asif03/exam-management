<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlliedSubjectRequest extends FormRequest
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
            'mother_subject_id' => 'required',
            'subject_id'        => 'required',
            //'subject'           => 'unique:allied_subjects,mother_subject_id,NULL,id,account_id,1',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mother_subject_id.required' => 'Mother Subject Name must be required.',
            'subject_id.required'        => 'Subject Name must be required.',
        ];
    }
}