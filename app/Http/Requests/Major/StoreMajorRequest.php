<?php

namespace App\Http\Requests\Major;

use Illuminate\Foundation\Http\FormRequest;

class StoreMajorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'major_name_en' => 'required|string|max:255|unique:tbl_major,major_name_en',
            'major_name_ar' => 'required|regex:/^[\p{Arabic}\s]+$/u|max:255||unique:tbl_major,major_name_ar',
            'major_abbreviation' => 'required|string|max:255|unique:tbl_major,major_abbreviation',
            'credits_required' => 'required|integer',
            'major_ministry_code' => 'required|string|max:255|unique:tbl_major,major_ministry_code',
            'major_mode' => 'required|integer',
            'degree_type' => 'required|string',
            'faculty_id' => 'required|exists:tbl_faculty,faculty_id',
            'number_of_semesters' => 'required|integer',
            'program_duration' => 'required|integer',
        ];
    }
}
