<?php

namespace App\Services\Order;

interface IOrderService
{
    public function getOrders($search = null, $currentPage = 1, $perPage = 5);

    public function getOrderDetails($id);

    public function getTotalOrders();

    public function updateOrderStatus($order, $status);
}