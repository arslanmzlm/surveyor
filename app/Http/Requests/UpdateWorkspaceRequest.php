<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkspaceRequest extends FormRequest
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
            'logo' => ['nullable'],
            'groups' => ['required', 'array'],
            'groups.*.id' => ['nullable', 'exists:groups,id'],
            'groups.*.name' => ['required', 'string'],
            'groups.*.size' => ['required', 'numeric', 'gte:0'],
            'groups.*.logo' => ['nullable'],
        ];
    }
}
