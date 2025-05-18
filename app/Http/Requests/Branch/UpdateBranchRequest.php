<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBranchRequest extends FormRequest
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
                Rule::unique('tbl_branch', 'branch_name_ar')
                    ->ignore($this->id, 'branch_id')
                    ->whereNull('deleted_at'),
            ],
            'branch_name_en' => [
                'required',
                'string',
                'max:100',
                Rule::unique('tbl_branch', 'branch_name_en')
                    ->ignore($this->id, 'branch_id')
                    ->whereNull('deleted_at'),
            ],
            'country_id' => 'required|int|max:100',
            'branch_city' => 'required|string|max:100',
            'branch_address' => 'required|string|max:255',
        ];
    }
}
