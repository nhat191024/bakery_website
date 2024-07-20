<?php

namespace App\Helper;

use App\Models\Products;
use App\Models\Variation;
use Carbon\Carbon;

class Helper
{
    public const DELIVERY_SHIP = 1;
    public const DELIVERY_COUNTER = 2;
    public const PAYMENT_CASH = 1;
    public const PAYMENT_TRANSFER = 2;
    public const BILL_UNPAID = 0;
    public const BILL_PAID = 1;
    public const BILL_CANCEL = 2;
    public const DELIVERY_METHOD = [
        '1' => 'Ship tận nơi',
        '2' => 'Lấy tại quầy'
    ];
    public const PAYMENT_METHOD = [
        '1' => 'Tiền mặt',
        '2' => 'Chuyển khoản'
    ];
    public const BILL_STATUS = [
        '0' => 'Chưa thanh toán',
        '1' => 'Đã thanh toán',
        '2' => 'Đã huỷ bỏ'
    ];

    public static function getWithTrashedProductById($id)
    {
        return Products::where('id', $id)->withTrashed()->first();
    }
    public static function getWithTrashedVariationById($id)
    {
        return Variation::where('id', $id)->withTrashed()->first();
    }

    public static function getTimePassedBy($created_at)
    {
        $now = Carbon::now();
        $createdAt = Carbon::parse($created_at);
        $diff = $createdAt->diffForHumans($now);
        $diff = str_replace(' seconds', ' giây', $diff);
        $diff = str_replace(' second', ' giây', $diff);
        $diff = str_replace(' minutes', ' phút', $diff);
        $diff = str_replace(' minute', ' phút', $diff);
        $diff = str_replace(' hours', ' giờ', $diff);
        $diff = str_replace(' hour', ' giờ', $diff);
        $diff = str_replace(' months', ' tháng', $diff);
        $diff = str_replace(' month', ' tháng', $diff);
        $diff = str_replace(' years', ' năm', $diff);
        $diff = str_replace(' year', ' năm', $diff);
        $diff = str_replace(' ago', ' trước', $diff);
        $diff = str_replace(' before', ' trước', $diff);
        $diff = str_replace(' later', ' tới', $diff);
        $diff = str_replace(' after', ' tới', $diff);
        return $diff;
    }
}
