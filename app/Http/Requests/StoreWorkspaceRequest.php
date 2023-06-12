<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkspaceRequest extends FormRequest
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
            'groups' => ['required', 'array'],
            'groups.*.name' => ['required', 'string'],
            'groups.*.size' => ['required', 'numeric', 'gte:0'],
        ];
    }
}
