<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassword extends FormRequest
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
            "oldPassword"=>["required", "string"],
            "newPassword"=>["required", "confirmed","string"]
        ];
    }
    public function messages()
    {
        return [
             'oldPassword.required' => 'حقل كلمة المرور القديمه مطلوب',
             'newPassword.required' => 'حقل كلمة المرور الجديده مطلوب',
             'newPassword.confirmed' => 'كلمة المرور الجديده غير متطابقه'
        ];
    }
}
