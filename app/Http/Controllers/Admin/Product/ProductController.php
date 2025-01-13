<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AddProductRequest;
use App\Http\Requests\Product\EditProductRequest;
use App\Services\Product\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $products = $this->productService->getAllProducts($request->search);

        return view('Admin.product.product', [
            'products' => $products,
            'startResult' => ($products->currentPage() - 1) * $products->perPage() + 1,
            'endResult' => min($products->currentPage() * $products->perPage(), $products->total()),
            'totalResults' => $products->total(),
        ]);
    }

    public function create()
    {
        $data = $this->productService->getAllBrandsAndCategories();
        return view('Admin.product.product-create', $data);
    }

    public function store(AddProductRequest $request)
    {
        $this->productService->createProduct($request);

        return redirect("/quantri/product")->with('alert', 'Đã thêm thành công');
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        $data = $this->productService->getAllBrandsAndCategories();

        return view('Admin.product.product-edit', compact('product') + $data);
    }

    public function update(EditProductRequest $request)
    {
        $this->productService->updateProduct($request);

        return redirect("/quantri/product")->with("alert", "Đã sửa thành công");
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);

        return redirect("/quantri/product")->with('alert', 'Đã xóa thành công');
    }
    
    public function show($id)
    {
        $products = $this->productService->getProductById($id);

        if (!$products) {
            return redirect()->route('admin.product.index')->with('error', 'Sản phẩm không tồn tại');
        }

        return view('Admin.product.product-show', ['products' => $products]);
    }
}
