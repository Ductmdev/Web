<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'brand_id' => 'required',
            'product_category_id' => 'required',
            'name' => 'required',
            'content' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'sku' => 'required',
            'qty' => 'required',
            'featured' => 'required',
            'state' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'brand_id.required' => 'Thương hiệu sản phẩm chưa được chọn',
            'product_category_id.required' => 'Danh mục sản phản chưa được chọn',
            'name.required' => 'Tên sản phẩm không được để trống',
            'content.required' => 'Nội dung sản phẩm không được để trống',
            'price.required' => 'Giá sản phẩm chưa được nhập',
            'weight.required' => 'Cân nặng sản phẩm chưa được nhập',
            'sku.required' => 'Mã sản phẩm không được để trống',
            'qty.required' => 'Số lượng sản phẩm không được để trống',
            'featured.required' => 'Featured chưa được chọn',
            'state.required' => 'Trạng thái sản phẩm chưa được chọn',
            'description.required' => 'Mô tả sản phẩm chưa được chọn'
        ];
    }
}
