<?php

namespace App\Http\Requests;

use App\Helpers\Mutators;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "first_name" => ["required"],
            "surname" => ["required"],
            "username" => ["required", "unique:users"],
            "password" => ["required"],
            "email" => ["required", "email", "unique:users"],
            "phone" => ["required"],
            "hospital_id" => ["nullable", "exists:hospitals,id"],
            "clinic_id" => ["nullable", "exists:clinics,id"],
        ];
    }

    /**
     * Get the validator instance for the request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getValidatorInstance(): \Illuminate\Contracts\Validation\Validator
    {
        $this->merge([
            'phone' => Mutators::cleanPhone($this->phone),
        ]);

        return parent::getValidatorInstance();
    }
}
