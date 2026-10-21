<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRedeploymentRequestsRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'unit_id' => 'required|exists:units,id',
            'employee_id' => 'required|exists:employees,id',
            'reason' => 'required|string',
            'request_letter_file' => 'required|string|max:1048',
            'status' => 'required|in:Approved,Pending,Rejected',
            'request_type' => 'required|in:Special,Compassionate',
        ];
    }
}
