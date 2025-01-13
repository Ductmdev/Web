<?php

namespace App\Services\ProductDetail;

use App\Repositories\ProductDetail\IProductDetailRepository;
use Illuminate\Http\Request;

class ProductDetailService implements IProductDetailService
{
    protected $productDetailRepository;

    public function __construct(IProductDetailRepository $productDetailRepository)
    {
        $this->productDetailRepository = $productDetailRepository;
    }

    public function getProductDetails(Request $request)
    {
        $productId = $request->id;
        $productDetails = $this->productDetailRepository->getByProductId($productId);

        if ($request->has('search')) {
            $search = $request->input('search');
            $productDetails = $productDetails->filter(function ($detail) use ($search) {
                return stripos($detail->color, $search) !== false;
            });
        }

        return $productDetails;
    }

    public function createProductDetail(Request $request)
    {
        $data = $request->only(['color', 'size', 'qty']);
        $data['product_id'] = $request->id;

        return $this->productDetailRepository->create($data);
    }

    public function updateProductDetail(Request $request)
    {
        $data = $request->only(['color', 'size', 'qty']);
        return $this->productDetailRepository->update($request->id, $data);
    }

    public function deleteProductDetail($id)
    {
        return $this->productDetailRepository->delete($id);
    }
}