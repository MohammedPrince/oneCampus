<?php

namespace App\Http\Requests\Faculty;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFacultyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
            // $facultyId = $this->route('faculty'); // this is just the ID

        return [
            'faculty_name_en' => [
                'required',
                'string',
                'max:100',
        //      Rule::unique('tbl_faculty', 'faculty_name_en')
        // //    ->ignore($facultyId, 'faculty_id')
        //    ->whereNull('deleted_at'),
            ],
            'faculty_name_ar' => [
                'required',
                'regex:/^[\p{Arabic}\s]+$/u',
                'max:255',
            //    Rule::unique('tbl_faculty', 'faculty_name_ar')
            // //   ->ignore($facultyId, 'faculty_id')
            //   ->whereNull('deleted_at'),
            ],
            'abbreviation' => [
                'required',
                'string',
                'max:10',
                // Rule::unique('tbl_faculty', 'abbreviation')
                // // ->ignore($facultyId, 'faculty_id')
                // ->whereNull('deleted_at'),
            ],
            'branch_id' => 'required',
            'status'    => 'nullable|boolean',
        ];
    }
     public function messages(): array
    {
        return [
            'faculty_name_en.required' => 'Faculty name in English is required.',
            'faculty_name_ar.required' => 'Faculty name in Arabic is required.',
            // Add more custom messages if needed
        ];
    }
}
