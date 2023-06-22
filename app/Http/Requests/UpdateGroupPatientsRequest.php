<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupPatientsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'size' => ['required', 'numeric', 'gte:0'],
            'patients' => ['required', 'array'],
            'patients.*.id' => ['nullable', 'exists:patients,id'],
            'patients.*.name' => ['nullable', 'string'],
            'patients.*.phone' => ['nullable', 'string'],
            'patients.*.contact_phone' => ['nullable', 'string'],
        ];
    }
}
