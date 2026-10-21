<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'passport_file' => ['nullable', 'mimes:jpg,png', 'max:2048'],
            'title' => 'required|in:Mr,Mrs,Miss',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'marital_status' => 'required|in:Single,Married,Divorced,Widowed',
            'residential_address' => 'required|string',
            'permanent_address' => 'required|string',
            'phone_number' => 'required|string|max:20',
            'nationality' => 'required|string|max:100',
            'nin' => 'required|string|unique:employees,nin|max:20',
            'lga_id' => 'required|exists:lgas,id',
            'email_address' => 'required|email|unique:employees,email_address|max:255',
            'ippis_no' => 'required|string|unique:employees,ippis_no|max:50',
            'employee_no' => 'required|string|max:50',
        ];
    }
}
