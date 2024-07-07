<?php

namespace App\Service\client;

use App\Models\Bill_details;
use App\Models\Bills;
use App\Models\Cart;
use App\Models\Product_variation;
use App\Models\Products;
use App\Models\Vouchers;
use Illuminate\View\View;

class CartService
{
    public function index()
    {
        return view('client.cart.cartProducts')->with([
            'cart' => Cart::get(),
            'subTotal' => Cart::getSubtotal(),
            'discount' => Cart::getDiscountAmount(),
            'total' => Cart::getTotal(),
        ]);
    }

    public function updateCart($request)
    {
        Cart::update($request->input('product_id'), $request->input('quantity'));
        $price = Product_variation::where('product_id', $request->input('product_id'))
            ->where('variation_id', $request->input('variant_id'))
            ->first('price');
        return [
            'subTotal' => Cart::getSubtotal(),
            'discount' => $this->calculateVoucher(Cart::getCouponCode()),
            'price' => $price['price'],
        ];
    }

    public function addToCart($request)
    {
        $productId = $request->product_id;
        $product = Products::find($productId);
        $quantity = $request->quantity;
        $variation_id = $request->variation_id;

        if ($product == null) {
            return redirect()->back()->with('message', 'Sản phẩm không tồn tại!',);
        }
        if ($quantity == null || $quantity <= 0) {
            $quantity = 1;
        }
        if ($quantity > 100) {
            $quantity = 100;
        }

        Cart::add($product, $variation_id, $quantity);
        return Cart::getCartCount();
    }


    public function applyVoucher($request)
    {
        $vcode = $request->input('voucher_code');
        $discount = $this->calculateVoucher($vcode);
        return $discount;
    }
    public function calculateVoucher($vcode)
    {
        $discount = 0;
        $voucher = Vouchers::where('code', $vcode)->first();
        $now = date('Y-m-d H:i:s');
        Cart::setDiscountAmount($discount);
        Cart::setCouponCode('');
        if ($vcode == null) {
            return -1;
        }
        if ($voucher == null) {
            return -2;
        }
        if ($voucher->status == 0) {
            return -3;
        }
        if ($voucher->quantity <= 0) {
            return -4;
        }
        if ($voucher->start_date > $now) {
            return -5;
        }
        if ($voucher->end_date < $now) {
            return -6;
        }
        if (Cart::getSubtotal() < $voucher->min_price) {
            return -7;
        }
        $discount = $voucher->discount_amount;
        Cart::setDiscountAmount($discount);
        Cart::setCouponCode($vcode);
        return $discount;
    }

    public function removeFromCart($request)
    {
        $product_id = $request->input('product_id');
        if ($product_id == null) {
            return $this->clearCart();
        }
        Cart::remove($product_id);
        $this->calculateVoucher(Cart::getCouponCode());
        return Cart::getDiscountAmount();
    }

    public function removeVoucher()
    {
        Cart::setCouponCode(null);
        Cart::setDiscountAmount(0);
        return Cart::getDiscountAmount();
    }

    public function clearCart()
    {
        Cart::clear();
        return 'cart cleared';
    }
}
