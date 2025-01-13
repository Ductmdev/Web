<?php

namespace App\Http\Controllers\Web\CheckOut;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckOut\CheckOutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductRepository;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    protected $categoryRepository;
    protected $orderRepository;
    protected $productRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
    ) 
    {
        $this->categoryRepository = $categoryRepository;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $categories = $this->categoryRepository->all();

        return view('FrontEnd.checkout.check-out', ['categories' => $categories, 'total' => $total, 'subtotal' => $subtotal, 'carts' => $carts]);
    }

    public function create(CheckOutRequest $request)
    {
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->company_name = $request->company_name;
        $order->country = $request->country;
        $order->street_address = $request->street_address;
        $order->postcode_zip = $request->postcode_zip;
        $order->town_city = $request->town_city;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->payment_type = $request->payment_type;
        $order->status = Constant::order_status_ReceiveOrders;
        $order->save();
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->price * $cart->qty,
            ];

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $data['order_id'];
            $orderDetail->product_id = $data['product_id'];
            $orderDetail->qty = $data['qty'];
            $orderDetail->amount = $data['amount'];
            $orderDetail->total = $data['total'];
            $orderDetail->save();

            $product =  $this->productRepository->find($cart->id);
            $product->qty -= $cart->qty;
            $product->save();
        }

        if ($request->payment_type == 'pay_later') {
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal);

            Cart::destroy();

            return redirect('/checkout/result')->with('alert', 'Thanh toán thành công ! Vui lòng kiểm tra email');
        }

        if ($request->payment_type == 'online_payment') {
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id,
                'vnp_OrderInfo' => 'Mô tả đơn hàng ở đây',
                'vnp_Amount' => Cart::total(0, ',', '.') * 100000,

            ]);

            return redirect()->to($data_url);
        }
    }

    public function vnPayCheck(Request $request)
    {
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); 
        $vnp_TxnRef = $request->get('vnp_TxnRef'); 
        $vnp_Amount = $request->get('vnp_Amount'); 

        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 00) {
                $order = $this->orderRepository->getOrderByVpn($vnp_TxnRef);
                $total = Cart::total(0, '.', '');
                $subtotal = Cart::subtotal(0, '.', '');
                $this->sendEmail($order, $total, $subtotal);
                Cart::destroy();

                return redirect('checkout/result')->with('alert', 'Thanh toán thành công ! Vui lòng kiểm tra thông tin Email.');
            } else {
                $orderDel = $this->orderRepository->find($vnp_TxnRef);
                $orderDel->delete();

                return redirect('checkout/result')->with('alert', 'Thanh toán thất bại ! Vui lòng kiểm tra lại');
            }
        }
    }

    private function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('FrontEnd.checkout.email', compact('order', 'total', 'subtotal'), function ($message) use ($email_to) {
            $message->from('duogbachdev@gmail.com', 'DphoneS Shop');
            $message->to($email_to, $email_to);
            $message->subject('Order notification');
        });
    }

    public function result()
    {
        $categories = $this->categoryRepository->all();
        
        return view('FrontEnd.checkout.result', ['categories' => $categories]);
    }
}
