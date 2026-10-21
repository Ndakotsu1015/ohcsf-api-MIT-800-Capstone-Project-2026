<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DeploymentStoreRequest extends FormRequest
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

        if (!isset($this->employee_id)) {
            // Validation for employees table
            $validatedData = [
                'passport_file' => ['nullable', 'string', 'max:2055'],
                'title' => 'required|in:Mr,Mrs,Miss',
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'date_of_birth' => [
                    'required',
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
                'gender' => 'required|in:Male,Female',
                'marital_status' => 'required|in:Single,Married,Divorced,Widowed',
                'residential_address' => 'required|string',
                'permanent_address' => 'required|string',
                'phone_number' => 'required|string|max:20|unique:employees,phone_number',
                'nationality' => 'required|string|max:100',
                'nin' => ['required', 'string', 'max:12', 'unique:employees,nin'],
                'lga_id' => 'required|exists:lgas,id',
                'email_address' => ['required', 'email', 'max:255', 'unique:employees,email_address'],
                'ippis_no' => ['required', 'string', 'max:7', 'unique:employees,IPPIS_no'],
                'employee_no' => 'required|string|max:50',
            ];
        }

        // Validation for deployments table
        return array_merge($validatedData, [
            'designation_id' => 'required|exists:designations,id',
            'unit_id' => 'required|exists:units,id',
            'division_id' => 'required|exists:divisions,id',
            'department_id' => 'required|exists:departments,id',
            'branch_id' => 'required|exists:branches,id',
            'agency_id' => 'nullable|exists:agencies,id',
            'ministry_id' => 'required|exists:ministries,id',
            'employee_id' => 'sometimes|exists:employees,id',
            'expected_assumption_date' => 'nullable|date',
            'assumption_date' => 'nullable|date',
            'cadre_id' => 'required|exists:cadres,id',
            'grade_level_id' => 'required|exists:grade_levels,id',
            'qualification' => 'nullable|array',
            'qualification.*.qualification' => 'nullable|string',
            'qualification.*.institution' => 'nullable|string',
            'qualification.*.year' => 'nullable',
            'certification' => 'nullable|array',

            'certification.*.certification' => 'nullable|string',
            'certification.*.year' => 'nullable',
            'is_redeployed' => 'sometimes|boolean',
            'request_type' => 'sometimes|in:General,Special,Compassionate',
            'reason' => 'nullable|string',
            'request_letter_file' => 'nullable|string',
            'status' => 'sometimes|in:Approved,Pending,Rejected'
        ]);
    }
}
