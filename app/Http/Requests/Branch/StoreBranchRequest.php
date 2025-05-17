<?php
namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_name_ar' => 'required|regex:/^[\p{Arabic}\s]+$/u|max:255|unique:tbl_branch,branch_name_ar',
            'branch_name_en' => 'required|string|max:100|unique:tbl_branch,branch_name_en',
            'country_id' => 'required|int|max:100',
            'branch_city'    => 'required|string|max:100',
            'branch_address' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'branch_name_ar.unique' => 'The Arabic branch name already exists.',
            'branch_name_en.unique' => 'The English branch name already exists.',
        ];
    }
}