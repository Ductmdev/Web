<?php

namespace App\Repositories\ProductImage;

use App\Repositories\Base\IBaseRepository;

interface IProductImageRepository extends IBaseRepository
{
    public function getProductImages($productId, $perPage = 10);

    public function storeProductImage($productId, $imageName);

    public function deleteProductImage($imageId);
}