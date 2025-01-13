<?php

namespace App\Services\ProductDetail;

use Illuminate\Http\Request;

interface IProductDetailService
{
    public function getProductDetails(Request $request);

    public function createProductDetail(Request $request);

    public function updateProductDetail(Request $request);

    public function deleteProductDetail($id);
}