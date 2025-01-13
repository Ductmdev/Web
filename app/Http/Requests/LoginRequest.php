<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            //
            "email" => "required|email",
            "password" => "required|min:3|max:20",
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Email không được để trống",
            "email.email" => "Email không hợp lệ",
            "password.required" => "Password không được để trống",
            "password.min" => "Password tối thiểu là 3 ký tự",
            "password.max" => "Password tối đa là 20 ký tự",
        ];
    }
}
