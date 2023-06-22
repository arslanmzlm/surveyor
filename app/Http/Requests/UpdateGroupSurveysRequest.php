<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupSurveysRequest extends FormRequest
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
            'surveys' => ['required', 'array'],
            'surveys.*.id' => ['nullable', 'exists:surveys,id'],
            'surveys.*.name' => ['required', 'string'],
            'surveys.*.template_id' => ['required', 'exists:templates,id'],
            'surveys.*.survey_at' => ['required', 'date', 'after:today'],
        ];
    }
}
