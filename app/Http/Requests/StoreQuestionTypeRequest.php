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
            'main_question_type_id' => ['required', 'exists:question_types,id'],
            'component' => ['required', 'string', 'exists:question_types,component'],
            'type' => ['required', 'string', 'exists:question_types,type'],
            'label' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'required' => ['nullable', 'boolean'],
            'value' => ['nullable'],
            'values' => ['nullable', 'array'],
            'options' => ['nullable', 'array'],
        ];
    }
}
