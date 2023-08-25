<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
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
            'salary' => 'required',
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
            // 'achivement_doc' => 'required',
            // 'certification_doc' => 'required',
        ];
    }
}
