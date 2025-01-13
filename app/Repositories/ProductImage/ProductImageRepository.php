<?php

namespace App\Repositories\ProductImage;

use App\Models\ProductImage;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductImage\IProductImageRepository;

class ProductImageRepository extends BaseRepository implements IProductImageRepository
{
    public function getModel(): string
    {
        return ProductImage::class;
    }

    public function getProductImages($productId, $perPage = 10)
    {
        return $this->model->where('product_id', $productId)->paginate($perPage);
    }

    public function storeProductImage($productId, $imageName)
    {
        $productImage = new ProductImage();
        $productImage->path = $imageName;
        $productImage->product_id = $productId;
        $productImage->save();

        return $productImage;
    }

    public function deleteProductImage($imageId)
    {
        $productImage = $this->model->find($imageId);

        if ($productImage) {
            $productImage->delete();
            return $productImage;
        }

        return null;
    }
}