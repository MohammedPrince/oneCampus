<?php

namespace App\Http\Requests\Major;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMajorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'major_name_en' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/',
                'max:255',
            ],

            'major_name_ar' => [
                'required',
                'regex:/^[\p{Arabic}\s]+$/u',
                'max:255',
            ],
            'major_abbreviation' => [   
                'required',
                'string',
                'max:255',
            ],
            'credits_required' => 'required|integer',
            
            'major_ministry_code' => [
                'required',
                'string',
                'max:255',
            ],
            'major_mode' => 'required|between:1,10',
            'degree_type' => 'required|string',
            'faculty_id' => 'required|exists:tbl_faculty,faculty_id',
            'number_of_semesters' => 'required|between:1,10',
            'program_duration' => 'required|between:1,10',
        ];
    }
    public function messages()
    {
        return [
            'major_name_ar.required' => 'major_name_ar must be in Arabic characters.',
            'major_name_en.required' => 'major_name_en must be in English characters.',
            // Add more messages if needed
        ];
    }
    

}
