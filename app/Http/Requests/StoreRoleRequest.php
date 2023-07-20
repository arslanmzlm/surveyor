<?php

namespace App\Http\Requests;

use App\Helpers\Mutators;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'abilities' => ['required', 'array'],
            'abilities.*' => ['required', 'exists:abilities,id'],
        ];
    }
}
