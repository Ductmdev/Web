<?php

namespace App\Utilities;

class Constant
{
    const order_status_ReceiveOrders = 1;
    const order_status_Unconfirmed = 2;
    const order_status_Confirmed = 3;
    const order_status_Paid = 4;
    const order_status_Processing = 5;
    const order_status_Shippinng = 6;
    const order_status_Finish = 7;
    const order_status_Cancel = 0;



    public static $order_status = [
        self::order_status_ReceiveOrders => 'Nhận đơn đặt hàng',
        self::order_status_Unconfirmed => 'Chưa xác nhận',
        self::order_status_Confirmed => 'Thành công',
        self::order_status_Paid => 'Đã trả',
        self::order_status_Processing => 'Xử lý',
        self::order_status_Shippinng => 'Vận chuyển',
        self::order_status_Finish => 'Kết thúc',
        self::order_status_Cancel => 'Hủy bỏ',


    ];

    const user_level_host = 0;
    const user_level_admin = 1;
    const user_level_client = 2;

    public static $user_level = [
        self::user_level_host => 'Host',
        self::user_level_admin => 'Admin',
        self::user_level_client => 'Client',
    ];

    const comment_status_hide = 0;
    const comment_status_show = 1;
    public static $comment_status = [
        self::comment_status_hide => 'Hide',
        self::comment_status_show => 'Show',
    ];

    const comment_status_fixed = 0;
    const comment_status_percent = 1;
    public static $coupon_status = [
        self::comment_status_fixed => 'Fixed',
        self::comment_status_percent => 'Percent',
    ];
}
