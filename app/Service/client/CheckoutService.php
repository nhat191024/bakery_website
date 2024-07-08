<?php

namespace App\Service\client;

use App\Models\Bill_details;
use App\Models\Bills;
use App\Models\Cart;
use App\Models\Product_variation;
use App\Models\Products;
use App\Models\Vouchers;
use Illuminate\View\View;

class CheckoutService
{

    public function index()
    {
        return view('client.checkout.checkout')
        ->with([
            'cart' => Cart::get(),
            'subTotal' => Cart::getSubtotal(),
            'discount' => Cart::getDiscountAmount(),
            'total' => Cart::getTotal(),
        ]);
    }

    public function confirmOrder($request)
    {
        dd($request->all());
        return 'received: '.$request->all();
    }
}
