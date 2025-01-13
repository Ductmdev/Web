<?php

namespace App\Services\Product;

use App\Http\Requests\Product\AddProductRequest;
use App\Http\Requests\Product\EditProductRequest;

interface IProductService
{
    public function getAllProducts($search = null, $perPage = 5);

    public function getAllBrandsAndCategories();

    public function createProduct(AddProductRequest $request);

    public function updateProduct(EditProductRequest $request);

    public function deleteProduct($id);

    public function getProductById($id);
}