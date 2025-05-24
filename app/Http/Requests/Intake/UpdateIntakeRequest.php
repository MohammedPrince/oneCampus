<?php

namespace App\Http\Requests\Intake;

use App\Models\Intake;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIntakeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {




    return [
        'intake_id' => [
            'required',
            'integer',
        ],
        'intake_name_en' => [
            'required',
            'string',
            'max:255',
        //     Rule::unique('tbl_intake', 'intake_name_en')
        //    ->ignore($intake_name_en?->intake_id, 'intake_id')
        //         ->whereNull('deleted_at')
        ],
        'intake_name_ar' => [
            'required',
            'regex:/^[\p{Arabic}\s]+$/u',
            'max:255',
            // Rule::unique('tbl_intake', 'intake_name_ar')
            //     ->ignore($intake?->intake_id, 'intake_id')
            //     ->whereNull('deleted_at')
        ],
    ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'intake_name_en.required' => 'The English intake name is required.',
            'intake_name_ar.required' => 'The Arabic intake name is required.',

        ];
    }
}
