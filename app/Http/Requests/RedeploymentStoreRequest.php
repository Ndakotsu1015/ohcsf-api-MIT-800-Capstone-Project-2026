<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedeploymentStoreRequest extends FormRequest
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
            'unit_id' => ['required', 'integer', 'exists:units,id'],
            'devision_id' => ['required', 'integer', 'exists:divisions,id'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
            'agency_id' => ['nullable', 'integer', 'exists:agencies,id'],
            'ministry_id' => ['required', 'integer', 'exists:ministries,id'],
            'cadre_id' => ['required', 'integer', 'exists:cadres,id'],
            'grade_level_id' => ['required', 'integer', 'exists:grade_levels,id'],
            'designation_id' => ['required', 'integer', 'exists:designations,id'],
            'request_type' => ['required', 'in:Special,Compassionate'],
            'deployment_id' => ['required', 'integer', 'exists:deployments,id'],
            'benefit' => ['nullable', 'string'],
            'request_letter_file' => ['nullable', 'string'],
            'effective_date' => ['required', 'date'],
            'end_date_report' => ['nullable', 'date'],
            'remarks' => ['nullable', 'string'],
            'status' => ['nullable', 'in:Approved,Pending,Rejected'],
        ];
    }
}
