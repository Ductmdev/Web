<?php

namespace App\Repositories\Order;

use App\Repositories\Base\IBaseRepository;

interface IOrderRepository extends IBaseRepository
{
    public function getAllOrders($search = null, $perPage = 5);
    public function getOrderById($id);
    public function getTotalOrders();
    public function updateOrderStatus($order, $status);
}