<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'passport_file' => 'nullable|string',
            'title' => 'sometimes|in:Mr,Mrs,Miss',
            'first_name' => 'sometimes|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'date_of_birth' => 'sometimes|date',
            'gender' => 'sometimes|in:Male,Female',
            'marital_status' => 'sometimes|in:Single,Married,Divorced,Widowed',
            'residential_address' => 'sometimes|string',
            'permanent_address' => 'sometimes|string',
            'phone_number' => 'sometimes|string|max:20',
            'nationality' => 'sometimes|string|max:100',
            'nin' => 'sometimes|string|unique:employees,nin,' . $this->deployment->id . '|max:20',
            'lga_id' => 'sometimes|exists:lgas,id',
            'email_address' => 'sometimes|email|unique:employees,email_address,' . $this->deployment->id . '|max:255',
            'ippis_no' => 'sometimes|string|unique:employees,ippis_no,' . $this->deployment->id . '|max:7',
            'employee_no' => 'sometimes|string|max:50',
        ];
    }
}
