<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "username" => ["required", "unique:users,username,{$this->user->id}"],
            "password" => ["nullable"],
            "email" => ["required", "email", "unique:users,email,{$this->user->id}"],
            "phone" => ["required", "min:10"],
            "hospital_id" => ["nullable", "exists:hospitals,id"],
            "clinic_id" => ["nullable", "exists:clinics,id"],
        ];
    }
}
