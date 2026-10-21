<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProbateActivityStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => ['required', 'string'],
            'has_payment' => ['required'],
            'allow_admin_payment' => ['required'],
            'allow_agent:payment' => ['required'],
            'allow_admin_portal' => ['required'],
            'status' => ['required', 'in:Active,In-Active'],
            'code' => ['required', 'string'],
            'print_template_id' => ['nullable', 'integer', 'exists:print_templates,id'],
            'revenue_service_fee_id' => ['required', 'integer', 'exists:revenue_service_fees,id'],
        ];
    }
}
