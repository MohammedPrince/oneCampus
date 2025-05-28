<?php

namespace App\Http\Requests\Batch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BatchStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            

            'batch' => "required|string|max:255",
            'branch_id' => 'required|integer',
            'faculty_id' => 'required|integer',
            'major_id' => 'required|integer',
            'max_sem' => 'required|numeric|between:1,10',
            'active_sem' => 'required|numeric|between:1,10',
            'graduate_status' => 'required|in:1,2',
        ];
    }

}

