<?php
namespace App\Helper;

class Helper {
    public const DELIVERY_SHIP = 1;
    public const DELIVERY_COUNTER = 0;
    public const PAYMENT_CASH = 0;
    public const PAYMENT_TRANSFER = 0;
    public const BILL_UNPAID = 0;
    public const BILL_PAID = 1;
    public const DELIVERY_METHOD = [
        '0' => 'Lấy tại quầy',
        '1' => 'Ship tận nơi'
    ];
    public const PAYMENT_METHOD = [
        '0' => 'Tiền mặt',
        '1' => 'Chuyển khoản'
    ];
    public const BILL_STATUS = [
        '0' => 'Chưa thanh toán',
        '1' => 'Đã thanh toán'
    ];
}