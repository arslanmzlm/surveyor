<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'is_admin' => ['nullable', 'boolean'],
            'abilities' => ['required', 'array'],
            'abilities.*' => ['required', 'exists:abilities,id'],
        ];
    }
}
