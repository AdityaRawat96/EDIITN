<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->role == 'admin' || $this->user()->id == $this->application->user_id && $this->application->status == 'pending';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',

            'gender' => 'required|string',
            'caste' => 'required|string',
            'religion' => 'required|string',

            'nationality' => 'required|string',
            'program' => 'nullable|string',
            'field' => 'required|string',
            'differently_abled' => 'required|string',
            'marital_status' => 'required|string',

            'fathers_name' => 'required|string',
            'father_occupation' => 'nullable|string',
            'fathers_annual_income' => 'required|string',
            'fathers_mobile_number' => 'required|string',

            'mothers_name' => 'required|string',
            'mother_occupation' => 'nullable|string',
            'mothers_annual_income' => 'nullable|string',
            'mothers_mobile_number' => 'nullable|string',

            'permanent_street_address1' => 'required|string',
            'permanent_street_address2' => 'required|string',
            'permanent_city' => 'required|string',
            'permanent_state' => 'required|string',
            'permanent_postal_code' => 'required|string',

            'communication_street_address1' => 'required|string',
            'communication_street_address2' => 'required|string',
            'communication_city' => 'required|string',
            'communication_state' => 'required|string',
            'communication_postal_code' => 'required|string',

            'qualification' => 'required|string',
            'university' => 'required|string',
            'degree_name' => 'required|string',
            'graduation_year' => 'required|integer',
            'percentage_grade' => 'required|string',

            'photo' => ['array', 'max:1', 'required'],
            'photo.*' => ['file', 'max:5120'],

            'address_proof' => ['array', 'max:5', 'required'],
            'address_proof.*' => ['file', 'max:5120'],

            'marksheets' => ['array', 'max:10', 'required'],
            'marksheets.*' => ['file', 'max:5120'],
        ];
    }
}