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

    public function getOrders($search = null, $perPage = 5)
    {
        return $this->orderRepository->getAllOrders($search, $perPage);
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
