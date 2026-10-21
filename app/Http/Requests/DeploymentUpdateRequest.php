<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DeploymentUpdateRequest extends FormRequest
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
        $validatedData = [];

        if (isset($this->employee_id)) {
            // Validation for employees table (only if employee_id is not provided)
            $validatedData = [
                'passport_file' => ['nullable', 'string', 'max:2055'],
                'title' => 'sometimes|in:Mr,Mrs,Miss',
                'first_name' => 'sometimes|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'sometimes|string|max:255',
                'date_of_birth' => [
                    'sometimes',
                    'date',
                    function ($attribute, $value, $fail) {
                        $dateOfBirth = Carbon::parse($value);
                        $minAgeDate = Carbon::today()->subYears(18);
                        $maxAgeDate = Carbon::today()->subYears(65);

                        if ($dateOfBirth->gt($minAgeDate)) {
                            $fail("You must be at least 18 years old.");
                        }
                        if ($dateOfBirth->lt($maxAgeDate)) {
                            $fail("You cannot be older than 65 years.");
                        }
                    },
                ],
                'gender' => 'sometimes|in:Male,Female',
                'marital_status' => 'sometimes|in:Single,Married,Divorced,Widowed',
                'residential_address' => 'sometimes|string',
                'permanent_address' => 'sometimes|string',
                'phone_number' => 'sometimes|string|max:20,' . $this->route('deployment'),
                'nationality' => 'sometimes|string|max:100',
                'nin' => ['sometimes', 'string', 'max:12,' . $this->route('deployment')],
                'lga_id' => 'sometimes|exists:lgas,id',
                'email_address' => ['sometimes', 'email', 'max:255,' . $this->route('deployment')],
                'ippis_no' => ['sometimes', 'string', 'max:7' . $this->route('deployment')],
                'employee_no' => 'sometimes|string|max:50',
            ];
        }

        // Validation for deployments table
        return array_merge($validatedData, [
            'designation_id' => 'sometimes|exists:designations,id',
            'unit_id' => 'sometimes|exists:units,id',
            'employee_id' => 'sometimes|exists:employees,id',
            'expected_assumption_date' => 'sometimes|date',
            'assumption_date' => 'sometimes|date',
            'cadre_id' => 'required|exists:cadres,id',
            'grade_level_id' => 'required|exists:grade_levels,id',
            'qualification' => 'nullable|array',
            'qualification.*.qualification' => 'required_with:qualification|string',
            'qualification.*.institution' => 'required_with:qualification|string',
            'qualification.*.year' => 'required_with:qualification',
            'certification' => 'nullable|array',
            'certification.*.certification' => 'required_with:certification|string',
            'certification.*.year' => 'required_with:certification',
            'is_redeployed' => 'sometimes|boolean',
            'request_type' => 'sometimes|in:General,Special,Compassionate',
            'reason' => 'nullable|string',
            'request_letter_file' => 'nullable|string',
            'status' => 'sometimes|in:Approved,Pending,Rejected',
        ]);
    }
}
