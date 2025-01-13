<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\Base\BaseRepository;

class OrderRepository extends BaseRepository implements IOrderRepository
{

    public function getModel(): string
    {
        return Order::class;
    }
   
    public function getAllOrders($search = null, $perPage = 5)
    {
        $orders = $this->model->orderBy("id", "asc");

        if ($search) {
            $orders->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        return $orders->paginate($perPage);
    }

    public function getOrderById($id)
    {
        return $this->model::with('orderDetails')->find($id);
    }

    public function getTotalOrders($search = null)
    {
        $query = $this->model->query();

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        return $query->count();
    }

    public function updateOrderStatus($order, $status)
    {
        $order->status = $status;
        $order->save();
    }

    public function getAllOrder()
    {
        return $this->model->all();
    }

    public function countCancelledOrders()
    {
        return $this->model->where('status', 0)->count();
    }
    
    public function getOrdersByUserId($user_id)
    {
        return $this->model->with('orderDetails')
            ->where('user_id', $user_id)
            ->get();
    }

    public function getOrderByVpn($vnp_TxnRef)
    {
        return $this->model->with('orderDetails')
        ->find($vnp_TxnRef);
    }
}
