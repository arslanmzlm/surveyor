<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
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
            'logo' => ['nullable'],
            'patients' => ['nullable', 'array'],
            'patients.*.id' => ['nullable', 'exists:patients,id'],
            'patients.*.name' => ['nullable', 'string'],
            'patients.*.phone' => ['nullable', 'string', 'min:10'],
            'patients.*.contact_phone' => ['nullable', 'string', 'min:10'],
            'surveys' => ['nullable', 'array'],
            'surveys.*.id' => ['nullable', 'exists:surveys,id'],
            'surveys.*.name' => ['required', 'string'],
            'surveys.*.template_id' => ['required', 'exists:templates,id'],
            'surveys.*.survey_at' => ['required', 'date', 'after:today'],
        ];
    }
}
