<?php

namespace App\Services\Order;

use App\Repositories\Order\IOrderRepository;

class OrderService implements IOrderService
{
    protected $orderRepository;

    public function __construct(IOrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrders($search = null, $currentPage = 1, $perPage = 5)
    {
        $totalOrders = $this->getTotalOrders($search);

        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalOrders);

        $orders = $this->getOrders($search, $perPage, $currentPage);

    return [
        'orders' => $orders,
        'startResult' => $startResult,
        'endResult' => $endResult,
        'totalOrders' => $totalOrders,
    ];
    
        // return $this->orderRepository->getAllOrders($search, $perPage);
    }

    public function getOrderDetails($id)
    {
        return $this->orderRepository->getOrderById($id);
    }

    public function getTotalOrders()
    {
        return $this->orderRepository->getTotalOrders();
    }

    public function updateOrderStatus($order, $status)
    {
        return $this->orderRepository->updateOrderStatus($order, $status);
    }
}
