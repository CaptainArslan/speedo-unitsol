<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'first_name' => 'required|string|min:2|max:200',
            // 'middle_name' => 'required|string|min:2|max:200',
            'last_name' => 'required|string|min:2|max:200',
            'contact_number' => 'required|min:7|max:200',
            'mobile_number' => 'required|min:7|max:200',
            'passport_number' => 'required|min:7|max:200',
            'salary' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'nationality_id' => 'required',
            'designation_id' => 'required',
            'contract_start_date' => 'required',
            'contract_end_date' => 'required|after_or_equal:contract_start_date',
            'address' => 'required',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:6', 'confirmed',
            // 'image' => 'required',
            // 'emirate_front' => 'required',
            // 'emirate_back' => 'required',
            // 'nda' => 'required',
            // 'employee_contract' => 'required',
            // 'employee_image' => 'required',
            // 'insurance_doc' => 'required',
        ];
    }
}
