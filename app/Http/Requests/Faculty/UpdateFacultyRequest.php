<?php
namespace App\Http\Requests\Faculty;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFacultyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'faculty_name_en' => 'required|string|max:100|unique:tbl_faculty,faculty_name_en,'.$this->faculty->faculty_id,
            'faculty_name_ar' => 'required|regex:/^[\p{Arabic}\s]+$/u|max:255|unique:tbl_faculty,faculty_name_ar,'.$this->faculty->faculty_id,
            'abbreviation'    => 'required|string|max:10|unique:tbl_faculty,abbreviation,'.$this->faculty->faculty_id,
            'branch_id'       => 'required|exists:tbl_branch,branch_id',
            'status'          => 'nullable|boolean',
        ];
    }
}
