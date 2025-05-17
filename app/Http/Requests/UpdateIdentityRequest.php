<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIdentityRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can change this if you want to implement user-based authorization
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:employee_profiles,id',
            'name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'The ID field is required.',
            'id.exists' => 'The selected ID does not exist.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name may not be greater than 255 characters.',
        ];
    }
}
