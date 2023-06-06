<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionTypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'question_type_id' => ['required', 'exists:question_types,id'],
            'main_type_id' => ['nullable', 'exists:question_types,id'],
            'component' => ['required', 'string'],
            'component_name' => ['required', 'string'],
            'component_description' => ['nullable', 'string'],
            'required' => ['nullable', 'boolean'],
            'values' => ['nullable', 'array'],
            'options' => ['nullable', 'array'],
        ];
    }
}
