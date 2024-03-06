<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>["required"],
            "email"=>["required","unique:doctors,email"],
            "password"=>["required"],
            "ssn"=>["required","unique:doctors,ssn"],
            "mobile_number"=>["required","unique:doctors,mobile_number"],
            "university"=>["required"],
            "graduation_year"=>["required"],
            "profile_image"=>["required"],
            "ssn_image"=>["required"],
            "card_image"=>["required"],

        ];
    }
}
