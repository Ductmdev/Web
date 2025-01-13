<?php

namespace App\Services\Product;

use App\Http\Requests\Product\AddProductRequest;
use App\Http\Requests\Product\EditProductRequest;
use App\Repositories\Product\IProductRepository;

class ProductService implements IProductService
{
    protected $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts($search = null, $perPage = 5)
    {
        return $this->productRepository->getAllProducts($search, $perPage);
    }

      public function getProductById($id)
    {
        return $this->productRepository->getProductById($id);
    }

    public function getAllBrandsAndCategories()
    {
        return [
            'brands' => $this->productRepository->getAllBrands(),
            'categories' => $this->productRepository->getAllCategories(),
        ];
    }

    public function createProduct(AddProductRequest $request)
    {
        return $this->productRepository->createProduct($request->validated());
    }

    public function updateProduct(EditProductRequest $request)
    {
        $product = $this->productRepository->getProductById($request->id);
        return $this->productRepository->updateProduct($product, $request->validated());
    }

    public function deleteProduct($id)
    {
        $product = $this->productRepository->getProductById($id);
        return $this->productRepository->deleteProduct($product);
    }
}