<?php

namespace App\Http\Requests\Intake;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIntakeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  // Modify based on your authorization logic (if needed).
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'intake_name_en' => 'required|string|max:25|unique:tbl_intake,intake_name_en,'.$this->intake->intake_id,
            'intake_name_ar' => 'required|string|max:25|unique:tbl_intake,intake_name_ar,'.$this->intake->intake_id,
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'intake_name_en.required' => 'The English intake name is required.',
            'intake_name_ar.required' => 'The Arabic intake name is required.',
            'intake_year.required' => 'The intake year is required.',
            'intake_year.digits' => 'The intake year must be a valid 4-digit year.',
        ];
    }
}
