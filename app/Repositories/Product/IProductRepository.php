<?php

namespace App\Repositories\Product;

use App\Repositories\Base\IBaseRepository;

interface IProductRepository extends IBaseRepository
{
    public function getAllProducts($search = null, $perPage = 5);

    public function getProductById($id);

    public function createProduct($data);

    public function updateProduct($product, $data);

    public function deleteProduct($product);

    public function getAllBrands();

    public function getAllCategories();
}