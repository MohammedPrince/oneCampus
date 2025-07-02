<?php
namespace App\Http\Requests\EmpBulk;

use Illuminate\Foundation\Http\FormRequest;

class BulkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Return true if the user is authorized to make this request.
        // You can add authorization logic here if needed.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'bulk_file' => 'required|file|mimes:csv,txt',
           
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // Custom error messages (optional)
            'bulk_file.required' => 'File is required.',
            
            // Add other custom messages here if needed
        ];
    }
}
