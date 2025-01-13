<?php

namespace App\Services\Order;

interface IOrderService
{
    public function getOrders($search = null, $perPage = 5);

    public function getOrderDetails($id);

    public function getTotalOrders();

    public function updateOrderStatus($order, $status);
}