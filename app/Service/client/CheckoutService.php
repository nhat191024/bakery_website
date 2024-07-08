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
        $bill = Bills::create([
            'order_date' => now(),
            'full_name' => $request->fullName,
            'address' => $request->address . ', ' . $request->ward . ', ' . $request->district . ', ' . "Hà Nội",
            'phone_number' => $request->phone,
            'email' => $request->email,
            'voucher_code' => Cart::getCouponCode() ? Cart::getCouponCode() : null,
            'delivery_method' => $request->delivery,
            'payment_method' => $request->payment,
            'total_amount' => Cart::getTotal() ? Cart::getTotal() : 0,
            'status' => 1,
        ]);

        $cart = Cart::get();
        foreach ($cart as $item) {
            foreach ($item['product']['product_variations'] as $variation) {
                if ($item['variation_id'] == $variation['variation_id']) {
                    $billDetail = Bill_details::create([
                        'bill_id' => $bill->id,
                        'product_id' => $item['product']['id'],
                        'variation_id' => $item['variation_id'],
                        'quantity' => $item['quantity'],
                        'price' => $variation['price'],
                    ]);
                }
            }
        }
        if ($billDetail) {
            Cart::clear();
            return response()->json([
                'message' => 'success'
            ], 200);
        }
    }
}
