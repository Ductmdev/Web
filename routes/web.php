<?php

use App\Http\Controllers\Admin\ADController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\ProductDetail\ProductDetailController;
use App\Http\Controllers\Admin\ProductImage\ProductImageController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Web\Account\AccountController;
use App\Http\Controllers\Web\Blog\BlogController;
use App\Http\Controllers\Web\Cart\CartController;
use App\Http\Controllers\Web\CheckOut\CheckOutController;
use App\Http\Controllers\Web\Shop\ShopController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(["prefix" => "/"], function () {
    Route::get('/', [WebController::class, "index"]);
    Route::get('/faq', [WebController::class, "faq"]);
    Route::get('/contact', [WebController::class, "contact"]);

    Route::group(['prefix' => '/shop'], function () {
        Route::get('/', [ShopController::class, "index"]);
        Route::get('/product-detail/{id}', [ShopController::class, "show"]);

        Route::group(['prefix' => '/filter'], function () {
            Route::get('/category/{categoryName}', [
                ShopController::class,
                "category"
            ]);
            Route::post('/brand', [ShopController::class, "brand"]);
            Route::get('/filterPrice', [ShopController::class, "filterPrice"]);
            Route::get('/filterRam', [ShopController::class, "filterRam"]);
            Route::get('/filterColor', [ShopController::class, "filterColor"]);
        });
    });

    Route::group(['prefix' => '/cart'], function () {
        Route::get('/', [CartController::class, "index"]);
        Route::get('/create', [CartController::class, "create"]);
        Route::get('/delete', [CartController::class, 'delete']);
        Route::get('/destroy', [CartController::class, 'destroy']);
        Route::get('/update', [CartController::class, 'update']);
        Route::get('/addCartInDetails', [CartController::class, 'addCartInDetails']);
    });

    Route::group(['prefix' => '/checkout', "middleware" => "checkmember"], function () {
        Route::get('/', [CheckOutController::class, "index"]);
        Route::post('/', [CheckOutController::class, 'create']);
        Route::get('/result', [CheckOutController::class, "result"]);
        Route::get('/vnPayCheck', [CheckOutController::class, 'vnPayCheck']);
        Route::post('/vnPayment', [CheckOutController::class, 'vnPayment']);
    });

    Route::group(['prefix' => '/account'], function () {
        Route::get('/login', [AccountController::class, "login"]);
        Route::post('/login', [AccountController::class, "checkLogin"]);
        Route::get('/logout', [AccountController::class, "logout"]);
        Route::get('/register', [AccountController::class, "register"]);
        Route::post('/postRegister', [AccountController::class, "postRegister"]);

        Route::group(['prefix' => '/myorder', "middleware" => "checkmember"], function () {
            Route::get('/', [AccountController::class, 'myOrderIndex']);
            Route::get('/detail/{id}', [AccountController::class, 'myOrderShow']);
            Route::post('/cancel/{id}', [AccountController::class, 'myOrderCancel']);
        });
        Route::group(['prefix' => '/profile', "middleware" => "checkmember"], function () {
            Route::get('/', [AccountController::class, "profile"]);
            Route::post('/', [AccountController::class, "editProfile"]);
        });

        Route::group(['prefix' => '/changepass', "middleware" => "checkmember"], function () {
            Route::get('/', [AccountController::class, "changePass"]);
            Route::post('/', [AccountController::class, "editChangePass"]);
        });
    });
    Route::group(['prefix' => '/blog'], function () {
        Route::get('/', [BlogController::class, "index"]);
        Route::get('/blog-detail', [BlogController::class, "show"]);
    });
});


Route::group(['prefix' => '/quantri'], function () {

    Route::group(['prefix' => '/dashboard'], function () {
        Route::get('/', [DashboardController::class, "index"]);
    });

    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [ProductController::class, "index"]);
        Route::get('/create', [ProductController::class, "create"]);
        Route::get('/show/{id}', [ProductController::class, "show"]);
        Route::post('/store', [ProductController::class, "store"]);
        Route::get('/edit/{id}', [ProductController::class, "edit"]);
        Route::post('/update/{id}', [ProductController::class, "update"]);
        Route::post('/destroy/{id}', [ProductController::class, "destroy"]);

        Route::group(['prefix' => 'product-detail'], function () {
            Route::get('/{id}', [ProductDetailController::class, "index"]);
            Route::get('/create/{id}', [ProductDetailController::class, "create"]);
            Route::post('/store', [ProductDetailController::class, "store"]);
            Route::get('/edit/{id}', [ProductDetailController::class, "edit"]);
            Route::post('/update/{id}', [ProductDetailController::class, "update"]);
            Route::post('/destroy/{id}', [ProductDetailController::class, "destroy"]);
        });

        Route::group(['prefix' => '/product-image'], function () {
            Route::get('/{id}', [ProductImageController::class, "index"]);
            Route::post('/store', [ProductImageController::class, "store"]);
            Route::post('/destroy/{id}', [ProductImageController::class, "destroy"]);
        });
    });
    Route::group(['prefix' => '/category'], function () {
        Route::get('/', [CategoryController::class, "index"]);
        Route::get('/create', [CategoryController::class, "create"]);
        Route::post('/store', [CategoryController::class, "store"]);
        Route::get('/edit/{id}', [CategoryController::class, "edit"]);
        Route::post('/update/{id}', [CategoryController::class, "update"]);
        Route::post('/destroy/{id}', [CategoryController::class, "destroy"]);
    });
    Route::group(['prefix' => '/brand'], function () {
        Route::get('/', [BrandController::class, "index"]);
        Route::get('/create', [BrandController::class, "create"]);
        Route::post('/store', [BrandController::class, "store"]);
        Route::get('/edit/{id}', [BrandController::class, "edit"]);
        Route::post('/update/{id}', [BrandController::class, "update"]);
        Route::post('/destroy/{id}', [BrandController::class, "destroy"]);
    });

    Route::group(['prefix' => '/slider'], function () {
        Route::get('/', [SliderController::class, "index"]);
        Route::get('/create', [SliderController::class, "create"]);
        Route::post('/store', [SliderController::class, "store"]);
        Route::get('/edit/{id}', [SliderController::class, "edit"]);
        Route::post('/update/{id}', [SliderController::class, "update"]);
        Route::post('/destroy/{id}', [SliderController::class, "destroy"]);
    });

    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [UserController::class, "index"]);
        Route::get('/create', [UserController::class, "create"]);
        Route::get('/detail/{id}', [UserController::class, "show"]);
        Route::post('/store', [UserController::class, "store"]);
        Route::get('/edit/{id}', [UserController::class, "edit"]);
        Route::post('/update/{id}', [UserController::class, "update"]);
        Route::post('/destroy/{id}', [UserController::class, "destroy"]);
    });
    Route::group(['prefix' => '/order'], function () {
        Route::get('/', [OrderController::class, "index"]);
        Route::get('/show/{id}', [OrderController::class, "show"]);
        Route::get('/edit/{id}', [OrderController::class, "edit"]);
        Route::post('/update/{id}', [OrderController::class, "update"]);
    });

    Route::group(["prefix" => "/login"], function () {
        Route::get("/", [AdminController::class, "getLogin"])->withoutMiddleware('CheckAdminLogin');
        Route::post("/", [AdminController::class, "postLogin"])->withoutMiddleware('CheckAdminLogin');
    });
    Route::get('/logout', [AdminController::class, "logout"]);
});
