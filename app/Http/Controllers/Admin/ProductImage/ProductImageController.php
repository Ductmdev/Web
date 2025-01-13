<?php

namespace App\Http\Controllers\Admin\ProductImage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImage\AddProductImageRequest;
use App\Services\Product\IProductService;
use App\Services\ProductImage\IProductImageService;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    protected $productImageService;

    protected $productService;

    public function __construct(IProductImageService $productImageService, IProductService $productService)
    {
        $this->productImageService = $productImageService;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $productId = $request->id;

        $product = $this->productService->getProductById($productId);  
        $productImages = $product->productImage->toArray();
    
        return view('Admin.product.image.product-image', [
            'product' => $product,
            'productImages' => $productImages,
            'product_id' => $productId
        ]);
    }

    public function store(AddProductImageRequest $request)
    {
        if ($request->hasFile('image')) {
            $productImage = $this->productImageService->storeProductImage($request->id, $request->file('image'));
            if ($productImage) {
                return redirect("/quantri/product/show/{$request->id}")->with('success', 'Image uploaded successfully.');
            }
        }
        return redirect()->back()->withErrors(['error' => 'Image upload failed']);
    }

    public function destroy(Request $request)
    {
        $productImage = $this->productImageService->deleteProductImage($request->id);

        if ($productImage) {    
            $file_name = $productImage->path;
            if ($file_name != '') {
                unlink(public_path('admin/assets/images/products/' . $file_name));
            }

            return redirect("/quantri/product/product-image/{$request->id}")->with('success', 'Image deleted successfully.');
        }

        return redirect()->back()->withErrors(['error' => 'Image deletion failed']);
    }
}
