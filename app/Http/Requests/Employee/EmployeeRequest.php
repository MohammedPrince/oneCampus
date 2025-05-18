<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name_ar'     => 'required|regex:/^[\p{Arabic}\s]+$/u|max:255',
            'full_name_en'     => 'required|string|max:255',
            'personal_email'   => [
                'required',
                'email',
                Rule::unique('tbl_employee_main_info', 'personal_email')->whereNull('deleted_at'),
            ],
            'corporate_email'  => [
                'required',
                'email',
                Rule::unique('tbl_employee_main_info', 'corporate_email')->whereNull('deleted_at'),
            ],
            'phone_number'     => 'required|string|max:15',
            'whatsapp_number'  => 'required|string|max:15',
            'department_id'    => 'required|string|max:255',
            'role'             => 'required|string|max:255',
            'birth_date'       => 'required|date',
            'hire_date'        => 'required|date',
            'branch_id'        => 'required|string|max:255',
            'biometric'        => 'required|string|max:255',
            'gender'           => 'required|string|max:10',
            'nationality'      => 'required|string|max:255',
            'identification_type' => 'required|in:National ID,Passport,Driving License,Other',
              'identification_id'  => [
                'required',
                'string',
                Rule::unique('tbl_employee_profile', 'identification_id')->whereNull('deleted_at'),
            ],
           
            'cv'              => 'nullable|file|mimes:pdf,doc,docx',
            'certificates'    => 'nullable|file|mimes:pdf,doc,docx',
        ];
    }

    public function messages()
    {
        return [
            'full_name_ar.required' => 'Full name in Arabic is required.',
            'full_name_en.required' => 'Full name in English is required.',
            // Add more messages if needed
        ];
    }
}
