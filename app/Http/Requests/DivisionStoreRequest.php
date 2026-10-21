<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DivisionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'department_id' => ['required', 'integer', 'exists:Department,id'],
        ];
    }
}
