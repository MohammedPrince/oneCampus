<?php
namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // In an UpdateBranchRequest
'branch_name_ar' => 'required|regex:/^[\p{Arabic}\s]+$/u|max:255|unique:tbl_branch,branch_name_ar,' . $this->id . ',branch_id',
'branch_name_en' => 'required|string|max:100|unique:tbl_branch,branch_name_en,' . $this->id . ',branch_id',
            'country_id' => 'required|int|max:100',
            'branch_city'    => 'required|string|max:100',
            'branch_address' => 'required|string|max:255',
        ];
    }
}
