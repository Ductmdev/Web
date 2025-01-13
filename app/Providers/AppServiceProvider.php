<?php

namespace App\Providers;

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Base\IBaseRepository;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\IBrandRepository;
use App\Repositories\Category\ICategoryRepository;
use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\Dashboard\IDashboardRepository;
use App\Repositories\Order\IOrderRepository ;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\IProductRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductDetail\IProductDetailRepository;
use App\Repositories\ProductDetail\ProductDetailRepository;
use App\Repositories\ProductImage\IProductImageRepository;
use App\Repositories\ProductImage\ProductImageRepository;
use App\Repositories\Slider\ISliderRepository;
use App\Repositories\Slider\SliderRepository;
use App\Repositories\User\IUserRepository;
use App\Repositories\User\UserRepository;
use App\Services\Brand\BrandService ;
use App\Services\Brand\IBrandService;
use App\Services\Category\CategoryService;
use App\Services\Category\ICategoryService;
use App\Services\Dashboard\DashboardService;
use App\Services\Dashboard\IDashboardService;
use App\Services\Order\IOrderService;
use App\Services\Order\OrderService;
use App\Services\Product\IProductService;
use App\Services\Product\ProductService;
use App\Services\ProductDetail\IProductDetailService;
use App\Services\ProductDetail\ProductDetailService;
use App\Services\ProductImage\IProductImageService;
use App\Services\ProductImage\ProductImageService;
use App\Services\Slider\ISliderService;
use App\Services\Slider\SliderService;
use App\Services\User\IUserService;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $services = [
        IBaseRepository::class => BaseRepository::class,
        IBrandRepository::class => BrandRepository::class,
        ICategoryRepository::class => CategoryController::class,
        IOrderRepository::class => OrderRepository::class,
        IProductRepository::class => ProductRepository::class,
        IProductDetailRepository::class => ProductDetailRepository::class,
        IProductImageRepository::class => ProductImageRepository::class,
        ISliderRepository::class => SliderRepository::class,
        IUserRepository::class => UserRepository::class,
        /*Service*/
        IBrandService::class => BrandService::class,
        IDashboardService::class => DashboardService::class,
        IOrderService::class => OrderService::class,
        IProductService::class => ProductService::class,
        IProductDetailService::class => ProductDetailService::class,
        IProductImageService::class => ProductImageService::class,
        ISliderService::class => SliderService::class,
        IUserService::class => UserService::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->services as $serviceInterface => $service) {
            $this->app->bind($serviceInterface, $service);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
