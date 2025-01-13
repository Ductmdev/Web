<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "level" => "required",
            "password_confirmation" => "required",
            "description" => "required|string|max:500",
            "company_name" => "required|string|max:255",
            "country" => "required|string|max:255",
            "street_address" => "required|string|max:255",
            "postcode_zip" => "required|string|max:20",
            "town_city" => "required|string|max:255",
            "phone" => "required|string|max:20"
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
            "password.confirmed" => "Mật khẩu xác nhập không khớp",
            "password_confirmation.required" => "Mật khẩu xác nhận không được để trống",
            "password.min" => "Mật khẩu tối thiểu 8 ký tự",
            "password.regex" => "Mật khẩu phải chứa ít nhất một chữ hoa, một chữ thường, một số và ký tự đặc biệt",
            "image.required" => "Avatar chưa được chọn không",
            "level.required" => "Bạn chưa chọn level",
            "description.required" => "Mô tả chưa được ghi",
            "company_name.required" => "Tên công ty không được để trống",
            "country.required" => "Quốc gia không được để trống",
            "street_address.required" => "Địa chỉ không được để trống",
            "postcode_zip.required" => "Mã zip không được để trống",
            "town_city.required" => "Thành phố không được để trống",
            "phone.required" => "Số điện thoại không được để trống",
        ];
    }
}
