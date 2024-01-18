<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name"=>["required","string","min:3","max:15"],
            'email' => ["required","email","unique:users,email"],
            'password' => ["required","min:6","confirmed"],
            'profile_image' =>["image","mimes:jpeg,png,jpg,gif"],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'name.string' => 'يرجى ادخال اسم صحيح',
            'name.min' => 'الاسم لا يجب ان يقل عن 3 حروف',
            'name.max' => 'الاسم لا يجب ان يكون اكثر من 15 حرف',

            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'من فضلك أدخل بريد إلكتروني صحيح',
            'email.unique' => 'البريد الالكتروني موجود مسبقا , جرب بريد اخر',

            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.string' => 'برجاء ادخال كلمة مرور صحيحه',
            'password.min' => 'كلمة المرور لا تقل عن 6 حروف',
        ];
    }
}
