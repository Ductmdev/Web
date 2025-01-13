<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Order\IOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(IOrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $perPage = 5;
        $currentPage = request()->query('page', 1);

        $totalOrders = $this->orderService->getTotalOrders();

        $startResult = ($currentPage - 1) * $perPage + 1;
        $endResult = min($startResult + $perPage - 1, $totalOrders);

        $orders = $this->orderService->getOrders($request->search, $perPage);

        return view('Admin.order.order', [
            "orders" => $orders,
            "startResult" => $startResult,
            "endResult" => $endResult,
            "totalResults" => $totalOrders,
        ]);
    }

    public function show(Request $request)
    {
        $order = $this->orderService->getOrderDetails($request->id);
        
        return view('Admin.order.order-show', ['order' => $order]);
    }

    public function edit(Request $request)
    {
        $order = $this->orderService->getOrderDetails($request->id);

        return view('Admin.order.order-edit', ['order' => $order]);
    }

    public function update(Request $request)
    {
        $order = $this->orderService->getOrderDetails($request->id);
        $this->orderService->updateOrderStatus($order, $request->status);

        return redirect("/quantri/order");
    }

}
