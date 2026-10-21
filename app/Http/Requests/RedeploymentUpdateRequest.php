<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedeploymentUpdateRequest extends FormRequest
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
            'unit_id' => ['required', 'integer', 'exists:Unit,id'],
            'designation_id' => ['required', 'integer', 'exists:Designation,id'],
            'request_type' => ['required', 'in:Special,Compassionate'],
            'deployment_id' => ['required', 'integer', 'exists:Deployment,id'],
            'benefit' => ['nullable', 'string'],
            'request_letter_file' => ['nullable', 'string'],
            'effective_date' => ['required', 'date'],
            'end_date_report' => ['nullable', 'date'],
            'remarks' => ['nullable', 'string'],
            'status' => ['nullable', 'in:Approved,Pending,Rejected'],
        ];
    }
}
