<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionTypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'component_name' => ['required', 'string'],
            'component_description' => ['nullable', 'string'],
            'required' => ['nullable', 'boolean'],
            'value' => ['nullable'],
            'values' => ['nullable', 'array'],
            'options' => ['nullable', 'array'],
        ];
    }
}
