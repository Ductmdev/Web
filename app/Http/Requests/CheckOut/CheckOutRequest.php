<?php

namespace App\Http\Requests\CheckOut;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'street_address' => 'required',
            'town_city' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Tên không được để trống',
            'last_name.required' => 'Họ không được để trống',
            'country.required' => 'Quốc gia không được để trống',
            'street_address.required' => 'Địa chỉ không được để trống',
            'town_city.required' => 'Thành phố không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email của bạn nhập sai định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
        ];
    }
}
