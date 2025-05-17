<?php
namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Return true if the user is authorized to make this request.
        // You can add authorization logic here if needed.
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
            'full_name_ar'     => 'required|regex:/^[\p{Arabic}\s]+$/u|max:255',
            'full_name_en'     => 'required|string|max:255',
            'personal_email'   => 'required|email|unique:employees,personal_email',
            'corporate_email'  => 'required|email|unique:employees,corporate_email',
            'phone_number'     => 'required|string|max:15',
            'whatsapp_number'  => 'required|string|max:15',
            'department_id'       => 'required|string|max:255',
            'role'             => 'required|string|max:255',
            'birth_date'       => 'required|date',
            'hire_date' => 'required|date',
            'branch_id'           => 'required|string|max:255',
            'biometric'        => 'required|string|max:255',
            'gender'           => 'required|string|max:10',
            'nationality'      => 'required|string|max:255',
            'identification_type' => 'required|in:National ID,Passport,Driving License,Other',
            'identification_id' => 'required|string|max:255',  
            'cv' => 'nullable|file|mimes:pdf,doc,docx',  
            'certificates' => 'nullable|file|mimes:pdf,doc,docx',  
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
            // Custom error messages (optional)
            'full_name_ar.required' => 'Full name in Arabic is required.',
            'full_name_en.required' => 'Full name in English is required.',
            // Add other custom messages here if needed
        ];
    }
}
