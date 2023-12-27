<?php

namespace App\Http\Requests;

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
            "name" => ["required"],
            "surname" => ["required"],
            "username" => ["required", "unique:users"],
            "password" => ["required"],
            "email" => ["required", "email", "unique:users"],
            "phone" => ["required", "min:10"],
            "hospital_id" => ["nullable", "exists:hospitals,id"],
            "clinic_id" => ["nullable", "exists:clinics,id"],
        ];
    }
}
