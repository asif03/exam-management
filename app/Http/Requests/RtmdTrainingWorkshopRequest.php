<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RtmdTrainingWorkshopRequest extends FormRequest
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
            'fellow_id'      => 'required|max:15',
            'subject_id'     => 'required',
            'candidate_name' => 'required|max:255',
            'mobile'         => 'required|max:15',
            'email'          => 'required|max:255',
            'bank_name'      => 'required|max:255',
            'bank_branch'    => 'required|max:255',
            'money_receipt'  => 'required|max:55',
            'money_rec_file' => 'required|max:500',
        ];
    }
}