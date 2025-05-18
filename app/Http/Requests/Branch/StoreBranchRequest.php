<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_name_ar' => [
                'required',
                'regex:/^[\p{Arabic}\s]+$/u',
                'max:255',
                Rule::unique('tbl_branch', 'branch_name_ar')->whereNull('deleted_at'),
            ],
            'branch_name_en' => [
                'required',
                'string',
                'max:100',
                Rule::unique('tbl_branch', 'branch_name_en')->whereNull('deleted_at'),
            ],
            'country_id'      => 'required|int|max:100',
            'branch_city'     => 'required|string|max:100',
            'branch_address'  => 'required|string|max:255',
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
