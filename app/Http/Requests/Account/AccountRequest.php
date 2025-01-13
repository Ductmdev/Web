<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            "name" => "required|string|min:3|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/",
            "password_confirmation" => "required",
        ];
    }


    public function messages()
    {
        return [
            "name.required" => "Họ và tên không được để trống",
            "name.string" => "Bạn nhập sai định dạng của họ và tên",
            "email.required" => "Email không được để trống",
            "email.email" => "Nhập đúng định dạng email",
            "email.unique" => "Email đã tồn tại",
            "password.required" => "Mật khẩu không được để trống",
            "password.confirmed" => "Mật khẩu xác nhận nhập không khớp",
            "password_confirmation.required" => "Mật khẩu xác nhận không được để trống",
            "password.min" => "Mật khẩu tối thiểu 8 ký tự",
            "password.regex" => "Mật khẩu phải chứa ít nhất một chữ hoa, một chữ thường, một số và ký tự đặc biệt",
        ];
    }
}
