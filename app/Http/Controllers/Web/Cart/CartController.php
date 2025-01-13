<?php

namespace App\Http\Controllers\Web\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }
    
    public function index()
    {
        $categories = $this->categoryRepository->all();
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('FrontEnd.shop.shopping-cart', ['categories' => $categories, 'total' => $total, 'subtotal' => $subtotal, 'carts' => $carts]);
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            $productId = $request->productId; 

            $product = $this->productRepository->find($productId);

            $response['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImage,
                ]
            ]);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }
    }

    public function addCartInDetails(Request $request)
    {
        if ($request->ajax()) {
            $productId = $request->productId;

            $product =  $this->productRepository->find($productId);

            $response['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImage,
                ]
            ]);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }

        return back();
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }

    public function destroy()
    {
        Cart::destroy();
    }
}
