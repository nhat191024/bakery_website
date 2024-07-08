<?php

namespace App\Models;

class Cart
{


public static function add($product, $variation_id = '1', $quantity = '1')
{
    $cart = session()->get('cart', []);

    foreach($cart as $item) {
        if ($item['product']->id == $product->id && $item['variation_id'] == $variation_id) {
            Cart::update($product->id, $item['variation_id'] , $item['quantity'] += $quantity);
            return;
        }
    }

    $cart[$product->id . '-' . $variation_id] = [
        'product' => $product,
        'variation_id' => $variation_id,
        'quantity' => $quantity
    ];
    session()->put('cart', $cart);
}


    public static function remove($product_id,$variation_id)
    {
        $cart = session('cart');
        unset($cart[$product_id . '-' . $variation_id]);
        session(['cart' => $cart]);
    }

    public static function clear()
    {
        session()->forget('cart');
    }

    public static function update($product_id, $variation_id = 1, $quantity)
    {
        $cart = session('cart');
        $cart[$product_id . '-' . $variation_id]['quantity'] = $quantity;
        session(['cart' => $cart]);
        return;
    }

    public static function get()
    {
        $cart = session('cart');
        // dd($cart);
        return $cart;
    }

    public static function getSubtotal()
    {
        $subTotal = 0;
        $cart = session('cart');
        if  ($cart == null) {
            return $subTotal;
        }
        try {
            foreach ($cart as $item) {
                if (count($item['product']->product_variations) > 0) {
                    $subTotal += $item['product']->product_variations->where('variation_id', $item['variation_id'])->first()->price * $item['quantity'];
                    }
            }
            return $subTotal;
        } catch (\Throwable $th) {
        }
    }
    public static function getTotal()
    {
        $total = self::getSubtotal() - self::getDiscountAmount();
        return $total <= 0 ? 0 : $total;
    }

    public static function setDiscountAmount($amount)
    {
        session()->forget('discount_amount');
        session()->put('discount_amount', $amount);
    }

    public static function getDiscountAmount()
    {
        return session('discount_amount');
    }

    public static function getCouponCode()
    {
        return session('coupon_code');
    }

    public static function setCouponCode($code)
    {
        session()->forget('coupon_code');
        session()->put('coupon_code', $code);
    }

    public static function getCartCount()
    {
        $cart = session('cart');
        $count = 0;
        if  ($cart == null) {
            return $count;
        }
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }

}
