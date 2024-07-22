<?php

namespace App\Service\client;

use App\Models\Accessory;
use App\Models\Bill_details;
use App\Models\Bills;
use App\Models\Cart;
use App\Models\Vouchers;

use App\Service\main\MailService;

class CheckoutService
{
    private $mailService;
    private $currentLocale;

    public function __construct()
    {
        $this->mailService = new MailService();
    }

    public function index()
    {
        $lang = session()->get('language');
        if (Cart::getCartCount() == 0) {
            return redirect(route('client.shop.productList'));
        }
        return view('client.checkout.checkout')
            ->with([
                'cart' => Cart::get(),
                'subTotal' => Cart::getSubtotal(),
                'discount' => Cart::getDiscountAmount(),
                'total' => Cart::getTotal(),
                'accessories' => Accessory::get(),
                'lang' => $lang,
            ]);
    }

    public function confirmOrder($request)
    {
        $accessory_id = $request->accessory_id;
        $accessory_price = $accessory_id ? Accessory::where('id', $accessory_id)->first('price') : null;

        if ($accessory_price != null) {
            Cart::setAccessory($accessory_id);
        }

        $bill = Bills::create([
            'order_date' => now(),
            'full_name' => $request->fullName,
            'address' => $request->address . ', ' . $request->ward . ', ' . $request->district . ', ' . "Hà Nội",
            'phone_number' => $request->phone,
            'email' => $request->email,
            'voucher_code' => Cart::getCouponCode() ? Cart::getCouponCode() : null,
            'delivery_method' => $request->delivery,
            'payment_method' => $request->payment,
            'total_amount' => (Cart::getTotal() ? Cart::getTotal() : 0),
            'accessory_id' => $accessory_id,
            'status' => 0,
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
        $QR = "?accountName=TRINH%20THI%20DUNG&amount=" . Cart::getTotal() . "&addInfo=Odouceurs " . $bill->id;

        $this->mailService->customerSend(
            $request->email,
            $request->fullName,
            $bill->id,
            $request->email,
            $request->phone,
            $request->address . ', ' . $request->ward . ', ' . $request->district . ', ' . "Hà Nội",
            $request->payment,
            $request->delivery,
            $bill->created_at,
            $cart,
            Cart::getDiscountAmount(),
            Cart::getTotal(),
            $bill->accessory,
            $QR
        );

        $this->mailService->adminSend(
            'odouceurs@gmail.com',
            $request->fullName,
            $bill->id,
            $request->email,
            $request->phone,
            $request->address . ', ' . $request->ward . ', ' . $request->district . ', ' . "Hà Nội",
            $request->payment,
            $request->delivery,
            $bill->created_at,
            $cart,
            Cart::getDiscountAmount(),
            Cart::getTotal(),
            $bill->accessory
        );

        if ($billDetail) {
            $quantity = 0;
            if (Cart::getCouponCode()) {
                $quantity = Vouchers::where('code', Cart::getCouponCode())->first('quantity')->quantity;
            }
            if ($quantity > 0) {
                Vouchers::where('code', Cart::getCouponCode())->decrement('quantity');
            }
            Cart::clear();
            return [
                'message' => 'success',
                'QR' => $QR,
            ];
        }
    }
}
