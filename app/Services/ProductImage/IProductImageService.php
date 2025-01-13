<?php

namespace App\Services\ProductImage;

interface IProductImageService
{
    public function getProductImages($productId, $perPage = 10);

    public function storeProductImage($productId, $image);

    public function deleteProductImage($imageId);
}