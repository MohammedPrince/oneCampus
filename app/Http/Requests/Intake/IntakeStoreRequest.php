<?php

namespace App\Http\Requests\Intake;

use Illuminate\Foundation\Http\FormRequest;

class IntakeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Set this to true unless you're adding custom auth logic.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for storing an intake.
     */
    public function rules(): array
    {
   return [

        'intake_name_en' => [
            'required',
            'string',
            'regex:/^[A-Za-z\s]+$/', 
            'max:255',
        ],
        'intake_name_ar' => [
            'required',
            'regex:/^[\p{Arabic}\s]+$/u',
            'max:255',
        ],
    ];

}

}
