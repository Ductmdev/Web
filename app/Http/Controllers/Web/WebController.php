<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $phoneCategoryId = 1; 
        $phoneProducts = Product::where('product_category_id', $phoneCategoryId)->get();
        $laptopCategoryId = 2; 
        $laptopProducts = Product::where('product_category_id', $laptopCategoryId)->get();
        $categories = Category::all();
        $sliders = Slider::all();

        return view('FrontEnd.index', ['phoneProducts' => $phoneProducts, 'laptopProducts' => $laptopProducts, 'categories' => $categories, 'sliders' => $sliders]);
    }

    public function faq()
    {
        $categories = Category::all();

        return view('FrontEnd/faq/faq', ['categories' => $categories]);
    }
    public function contact()
    {
        $categories = Category::all();
        
        return view('FrontEnd/contact/contact', ['categories' => $categories]);
    }
}
