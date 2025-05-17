<?php

namespace App\Http\Requests\Batch;

use Illuminate\Foundation\Http\FormRequest;

class BatchUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'batch' => 'required|string|max:20',
            'branch_id' => 'required|integer|exists:branches,id',
            'faculty_id' => 'required|integer|exists:faculties,id',
            'major_id' => 'required|integer|exists:majors,id',
            'max_sem' => 'required|integer|min:1',
            'active_sem' => 'required|integer|min:1|max:' . $this->max_sem,
            'graduate_status' => 'required|in:1,2',
        ];
    }
}
