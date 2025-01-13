<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class EditAccountRequest extends FormRequest
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
            "name" => "required|string|min:3|max:255",
            "email" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.string' => 'Nhập sai kiểu định dạng',
            'name.min' => 'Độ dài tối thiểu của ký tự là 3',
            'name.max' => 'Độ dài tối thiểu của ký tự là 255',
            'email' => 'Email không được để trống',
            'image.image' => 'Không đúng định dạng ảnh'
        ];
    }
}
