<?php

namespace App\Http\Controllers\Admin\ProductDetail;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductDetail\AddProductDetailRequest;
use App\Http\Requests\ProductDetail\EditProductDetailRequest;
use App\Repositories\Product\ProductRepository;
use App\Services\ProductDetail\IProductDetailService;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    protected $productDetailService;

    public function __construct(IProductDetailService $productDetailService)
    {
        $this->productDetailService = $productDetailService;
    }

    public function index(Request $request)
    {
        $productDetails = $this->productDetailService->getProductDetails($request);

        return view('Admin.product.detail.product-detail', [
            'productDetails' => $productDetails, 
            'productId' => $request->id
        ]);
    }

    public function create(Request $request)
    {
        $productName =resolve(ProductRepository::class)->find($request->id)->name;

        return view('Admin.product.detail.product-detail-create', [
            'productName' => $productName, 
            'product_id' => $request->id
        ]);
    }

    public function store(AddProductDetailRequest $request)
    {
        $this->productDetailService->createProductDetail($request);

        return redirect("/quantri/product/product-detail/{$request->id}")->with('alert', 'Thêm thành công chi tiết sản phẩm');
    }

    public function edit(Request $request)
    {
        $productDetail = $this->productDetailService->getProductDetails($request->id);

        return view('Admin.product.detail.product-detail-edit', ['productDetail' => $productDetail]);
    }

    public function update(EditProductDetailRequest $request)
    {
        $this->productDetailService->updateProductDetail($request);

        return redirect("/quantri/product/product-detail/{$request->id}")->with("alert", "Đã sửa thành công");
    }

    public function destroy(Request $request)
    {
        $this->productDetailService->deleteProductDetail($request->id);
        
        return redirect("/quantri/product/product-detail/{$request->id}")->with('alert', 'Đã xóa thành công');
    }
}
