<?php

namespace App\Http\Controllers\Web\Shop;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;


class ShopController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $brandRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        BrandRepository $brandRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->brandRepository = $brandRepository;
    }
    public function index()
    {
        $perPage = 9; 
        $currentPage = request()->query('page', 1); 

        $totalProducts = $this->productRepository->count(); 

        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalProducts);

        $products = $this->productRepository->paginate($perPage);

        $categories = $this->brandRepository->all();
        $brands = $this->brandRepository->all();

        return view('FrontEnd.shop.shop', [
            "products" => $products,
            "startResult" => $startResult,
            "endResult" => $endResult,
            "totalResults" => $totalProducts,
            "categories" => $categories,
            "brands" => $brands
        ]);
    }
    public function show(Request $request)
    {
        $id = $request->id;

        $product = $this->productRepository->getProductWithCategoryById($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $relatedProducts = $this->productRepository->getRelatedProducts($product->product_category_id, $id);
    
        $categories = $this->categoryRepository->all();
    
        return view('FrontEnd.shop.product', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'categories' => $categories,
        ]);
    }
    public function category($categoryName)
    {
        $perPage = 9; 
        $currentPage = request()->query('page', 1);

        $category = $this->categoryRepository->findByName($categoryName);
        
        if (!$category) {
            abort(404);
        }

        $totalProducts = $this->productRepository->countByCategoryId($category->id);
        
        $products = $this->productRepository->getByCategoryIdPaginated($category->id, $perPage, 'id', 'asc');
        
        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalProducts);

        $categories = $this->categoryRepository->all();
        $brands = $this->brandRepository->all();
        
        return view('FrontEnd.shop.shop', [
            'products' => $products,
            'currentCategory' => $category,
            'categories' => $categories,
            'brands' => $brands,
            'startResult' => $startResult,
            'endResult' => $endResult,
            'totalResults' => $totalProducts,
        ]);
    }

    public function brand(Request $request)
    {
        $perPage = 9;
        $currentPage = $request->query('page', 1); 
        $brands = $this->brandRepository->all();

        $selectedBrands = $request->input('brands', []);

        $products = $this->productRepository->getProductsByBrands($selectedBrands, $perPage, $currentPage);

        $totalProducts = $this->productRepository->countProductsByBrands($selectedBrands);
        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalProducts);

        $categories = $this->categoryRepository->all();
    
        return view('FrontEnd.shop.shop', [
            'products' => $products,
            'startResult' => $startResult,
            'endResult' => $endResult,
            'totalResults' => $totalProducts,
            'categories' => $categories,
            'brands' => $brands,
            'selectedBrands' => $selectedBrands, 
        ]);
    }

    public function filterPrice(Request $request)
    {
        $perPage = 9; 
        $currentPage = $request->query('page', 1);

        $minPrice = floatval(str_replace('$', '', $request->input('price_min')));
        $maxPrice = floatval(str_replace('$', '', $request->input('price_max')));
    
        $products = $this->productRepository->getProductsByPriceRange($minPrice, $maxPrice, $perPage, $currentPage);

        $totalResults = $this->productRepository->countProductsByPriceRange($minPrice, $maxPrice);
        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalResults);

        $categories = $this->categoryRepository->all();
        $brands = $this->brandRepository->all();
    
        return view('FrontEnd.shop.shop', [
            'products' => $products,
            'startResult' => $startResult,
            'endResult' => $endResult,
            'totalResults' => $totalResults,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function filterRam(Request $request)
    {
        $perPage = 9; 
        $currentPage = $request->query('page', 1); 
        $selectedRam = $request->input('ram');

        $products = $this->productRepository->getProductsByRam($selectedRam, $perPage, $currentPage);

        $totalResults = $this->productRepository->countProductsByRam($selectedRam);
        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalResults);

        $categories = $this->categoryRepository->all();
        $brands = $this->brandRepository->all();
    
        return view('FrontEnd.shop.shop', [
            'products' => $products,
            'startResult' => $startResult,
            'endResult' => $endResult,
            'totalResults' => $totalResults,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
    public function filterColor(Request $request)
    {
        $perPage = 9; 
        $currentPage = $request->query('page', 1); 
        $selectedColor = $request->input('color'); 
        $products = $this->productRepository->getProductsByColor($selectedColor, $perPage, $currentPage);
    
        $totalResults = $products->total();
        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalResults);

        $categories = $this->categoryRepository->all();
        $brands = $this->brandRepository->all();
    
        return view('FrontEnd.shop.shop', [
            'products' => $products,
            'startResult' => $startResult,
            'endResult' => $endResult,
            'totalResults' => $totalResults,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
}
