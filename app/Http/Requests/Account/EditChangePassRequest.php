<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class EditChangePassRequest extends FormRequest
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
            //
            "password" => "required|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/",
            "new_password" => "required|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/",
            "cf_password" => "required",
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password tối thiếu là 8 ký tự trở lên',
            'password.regex' => 'Password nhập không đúng dịnh dạng',
            'new_password.required' => 'New Password chưa được nhập',
            'new_password.min' => 'Password tối thiếu là 8 ký tự trở lên',
            'new_password.regex' => 'Password nhập không đúng dịnh dạng',
            'cf_password.required' => 'Confirm password chưa được nhập'
        ];
    }
}
