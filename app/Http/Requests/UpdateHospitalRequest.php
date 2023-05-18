<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHospitalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'county_id' => ['required', 'integer', 'exists:counties,id']
        ];
    }
}
