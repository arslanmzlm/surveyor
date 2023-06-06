<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTemplateRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'questions' => ['required', 'array'],
            'questions.*.component' => ['required', 'exists:question_types,component'],
            'questions.*.question_type_id' => ['required', 'exists:question_types,id'],
            'questions.*.label' => ['required', 'string'],
            'questions.*.description' => ['required', 'string'],
            'questions.*.required' => ['nullable', 'boolean'],
            'questions.*.order' => ['required', 'numeric'],
            'questions.*.values' => ['nullable', 'array'],
            'questions.*.options' => ['nullable', 'array'],
        ];
    }
}
