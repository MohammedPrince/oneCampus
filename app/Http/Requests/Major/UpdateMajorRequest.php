<?php

namespace App\Http\Requests\Major;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMajorRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust if needed
    }

    public function rules()
    {
        // $majorId = $this->major->major_id ?? null;
        return [
            
            'major_id' => 'required|integer',

            'major_name_en' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('tbl_major', 'major_name_en')
                //     ->ignore($majorId, 'major_id')
                //     ->whereNull('deleted_at'),
            ],
            'major_name_ar' => [
                'required',
                'regex:/^[\p{Arabic}\s]+$/u',
                'max:255',
                // Rule::unique('tbl_major', 'major_name_ar')
                //     ->ignore($majorId, 'major_id')
                //     ->whereNull('deleted_at'),
            ],
            'major_abbreviation' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('tbl_major', 'major_abbreviation')
                //     ->ignore($majorId, 'major_id')
                //     ->whereNull('deleted_at'),
            ],
            'credits_required' => 'required|integer',
            'major_ministry_code' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('tbl_major', 'major_ministry_code')
                //     ->ignore($majorId, 'major_id')
                //     ->whereNull('deleted_at'),
            ],
            'major_mode' => 'required|integer',
            'degree_type' => 'required|integer',
            'faculty_id' => 'required|exists:tbl_faculty,faculty_id',
            'number_of_semesters' => 'required|integer',
            'program_duration' => 'required|integer',

        ];
    }
     public function messages()
    {
        return [
            'major_name_ar.required' => 'Major name in Arabic is required.',
            'major_name_en.required' => 'Major name in English is required.',
            'major_abbreviation.required' => 'major abbreviation Is required',
            'major_ministry_code.required' =>'major ministry code is required'            // Add more messages if needed
        ];
    }
}
