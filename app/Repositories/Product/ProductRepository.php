<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Category\CategoryRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function getModel(): string
    {
        return $this->model->class;
    }
    
    public function getAllProducts($search = null, $perPage = 5)
    {
        $query = $this->model::orderBy('id', 'asc');

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->paginate($perPage);
    }

    public function getProductById($id)
    {
        return $this->model->query()->with('productImage')
            ->where('id', $id)
            ->firstOrFail();
    }

    public function createProduct($data)
    {
        return $this->model->reate($data);
    }

    public function updateProduct($product, $data)
    {
        $product->update($data);
        return $product;
    }

    public function deleteProduct($product)
    {
        return $product->delete();
    }

    public function getAllBrands()
    {
        return resolve(BrandRepository::class)->all();
    }

    public function getAllCategories()
    {
        return resolve(CategoryRepository::class)->all();
    }

    public function getAllProduct()
    {
        return $this->model::all(); 
    }

    public function getProductWithCategoryById($id)
    {
        return $this->model->with('category')->find($id);
    }

    public function find($productId)
    {
        return $this->model->find($productId);
    }

    public function count()
    {
        return $this->model->count();
    }

    public function paginate($perPage)
    {
        return $this->model->orderBy("id", "asc")->paginate($perPage);
    }

    public function countByCategoryId($categoryId)
    {
        return $this->model->where('product_category_id', $categoryId)->count();
    }

    public function getByCategoryIdPaginated($categoryId, $perPage, $orderByColumn = 'id', $orderDirection = 'asc')
    {
        return $this->model->where('product_category_id', $categoryId)
            ->orderBy($orderByColumn, $orderDirection)
            ->paginate($perPage);
    }

    public function getRelatedProducts($categoryId, $excludeProductId, $limit = 4)
    {
        return $this->model->where('product_category_id', $categoryId)
            ->where('id', '!=', $excludeProductId)
            ->limit($limit)
            ->get();
    }

    public function getProductsByBrands(array $selectedBrands, $perPage, $currentPage)
    {
        $query = $this->model->orderBy("id", "asc");

        if (!empty($selectedBrands)) {
            $query->whereIn('brand_id', $selectedBrands);
        }

        return $query->paginate($perPage);
    }

    public function countProductsByBrands(array $selectedBrands)
    {
        $query = $this->model->query();

        if (!empty($selectedBrands)) {
            $query->whereIn('brand_id', $selectedBrands);
        }

        return $query->count();
    }

    public function getProductsByPriceRange($minPrice, $maxPrice, $perPage, $currentPage)
    {
        return $this->model->whereBetween('price', [$minPrice, $maxPrice])
            ->orderBy("id", "asc")
            ->paginate($perPage);
    }

    public function countProductsByPriceRange($minPrice, $maxPrice)
    {
        return $this->model->whereBetween('price', [$minPrice, $maxPrice])->count();
    }

    public function getProductsByRam($selectedRam, $perPage, $currentPage)
    {
        return $this->model->whereHas('productDetail', function ($query) use ($selectedRam) {
            $query->where('size', $selectedRam);
        })->orderBy("id", "asc")->paginate($perPage);
    }

    public function getProductsByColor($selectedColor, $perPage, $currentPage)
    {
        if (empty($selectedColor)) {
            return $this->model->orderBy('id', 'asc')->paginate($perPage);
        }

        return $this->model->whereHas('productDetail', function ($query) use ($selectedColor) {
            $query->where('color', $selectedColor);
        })
        ->orderBy('id', 'asc')
        ->paginate($perPage);
    }

    public function countProductsByRam($selectedRam)
    {
        return $this->model->whereHas('productDetail', function ($query) use ($selectedRam) {
            $query->where('size', $selectedRam);
        })->count();
    }

    public function getBestSellingProducts($month, $year)
    {
        return $this->model::whereHas('orderDetails', function ($query) use ($month, $year) {
            $query->whereMonth('order_details.created_at', $month)
                ->whereYear('order_details.created_at', $year);
        })
        ->whereHas('orders', function ($query) {
            $query->whereNotIn('orders.status', ['canceled']);
        })
        ->with(['orderDetails', 'productImages' => function ($query) {
            $query->orderBy('id');
        }])
        ->join('order_details', 'products.id', '=', 'order_details.product_id')
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->select('products.id', 'products.name', 'products.discount')
        ->selectRaw('SUM(order_details.qty) as total_sold')
        ->groupBy('products.id', 'products.name', 'products.discount')
        ->orderByDesc('total_sold')
        ->limit(5)
        ->get();
    }

    public function getCancelledProducts()
    {
        return $this->model::whereHas('orderDetails', function ($query) {
            $query->whereHas('orders', function ($query) {
                $query->where('orders.status', 0); 
            });
        })
        ->with(['orderDetails', 'productImages' => function ($query) {
            $query->orderBy('id');
        }])
        ->join('order_details', 'products.id', '=', 'order_details.product_id')
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->select('products.id', 'products.name')
        ->selectRaw('SUM(order_details.qty) as total_cancelled')
        ->groupBy('products.id', 'products.name')
        ->orderByDesc('total_cancelled')
        ->limit(5)
        ->get();
    }
}