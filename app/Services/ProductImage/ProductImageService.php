<?php

namespace App\Services\ProductImage;

use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductImage\IProductImageRepository;
use App\Slug\Slug;
use Illuminate\Support\Facades\File;

class ProductImageService implements IProductImageService
{
    protected $productImageRepo;

    public function __construct(IProductImageRepository $productImageRepo)
    {
        $this->productImageRepo = $productImageRepo;
    }

    public function getProductImages($productId, $perPage = 10)
    {
        return $this->productImageRepo->getProductImages($productId, $perPage);
    }

    public function storeProductImage($productId, $image)
    {
        $product = resolve(ProductRepository::class)->find($productId);

        if ($product) {
            $slug = Slug::getSlug($product->name);
            $imageName = $slug . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/assets/images/products'), $imageName);

            return $this->productImageRepo->storeProductImage($productId, $imageName);
        }

        return null;
    }

    public function deleteProductImage($imageId)
    {
        return $this->productImageRepo->deleteProductImage($imageId);
    }
}