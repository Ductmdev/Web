<?php

namespace App\Services\Dashboard;

use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\User\UserRepository;

class DashboardService implements IDashboardService
{
    protected $orderRepository;
    protected $productRepository;
    protected $userRepository;

    public function __construct(
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        UserRepository $userRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }

    public function getDashboardData()
    {
        $orders = $this->orderRepository->getAllOrders();
        $products = $this->productRepository->getAllProduct();
        $users = $this->userRepository->getAllUsers();
        $month = now()->month;
        $year = now()->year;

        $bestSellingProducts = $this->productRepository->getBestSellingProducts($month, $year);

        $countCancelledOrders = $this->orderRepository->countCancelledOrders();

        $cancelledProducts = $this->productRepository->getCancelledProducts();

        return [
            'orders' => $orders,
            'products' => $products,
            'users' => $users,
            'bestSellingProducts' => $bestSellingProducts,
            'countCancelledOrders' => $countCancelledOrders,
            'cancelledProducts' => $cancelledProducts
        ];
    }
}