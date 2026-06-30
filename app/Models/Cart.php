<?php

namespace App\Models;

class Cart
{
    private static $cartWithRelations = null;


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
    self::$cartWithRelations = null;
}

    public static function getWithRelations()
    {
        if (self::$cartWithRelations !== null) {
            return self::$cartWithRelations;
        }

        $cart = session('cart');
        if ($cart == null) {
            return $cart;
        }

        $productIds = collect($cart)
            ->pluck('product.id')
            ->filter()
            ->unique()
            ->values();

        if ($productIds->isEmpty()) {
            return $cart;
        }

        $products = Products::select('id', 'category_id', 'name', 'image')
            ->with([
                'categories:id,name',
                'product_variations:id,product_id,variation_id,price',
                'product_variations.variation:id,name',
            ])
            ->whereIn('id', $productIds)
            ->get()
            ->keyBy('id');

        foreach ($cart as $key => $item) {
            $product = $products->get($item['product']->id);
            if ($product) {
                $cart[$key]['product'] = $product;
            }
        }

        session(['cart' => $cart]);
        self::$cartWithRelations = $cart;
        return $cart;
    }


    public static function remove($product_id,$variation_id)
    {
        $cart = session('cart');
        unset($cart[$product_id . '-' . $variation_id]);
        session(['cart' => $cart]);
        self::$cartWithRelations = null;
    }

    public static function clear()
    {
        session()->forget('cart');
        Cart::setCouponCode(null);
        Cart::setDiscountAmount(0);
        session()->forget('accessory_id');
        self::$cartWithRelations = null;
    }

    public static function update($product_id, $variation_id = 1, $quantity)
    {
        $cart = session('cart');
        $cart[$product_id . '-' . $variation_id]['quantity'] = $quantity;
        session(['cart' => $cart]);
        self::$cartWithRelations = null;
        return;
    }

    public static function get()
    {
        return self::getWithRelations();
    }
    public static function clearCart()
    {
        session()->forget('cart');
        self::$cartWithRelations = null;
    }

    public static function setAccessory($accessory_id)
    {
        session()->forget('accessory_id');
        session()->put('accessory_id', $accessory_id);
    }

    public static function getSubtotal()
    {
        $subTotal = 0;
        $cart = self::getWithRelations();
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
        $accessory_price = session('accessory_id') ? Accessory::where('id', session('accessory_id'))->first('price') : 0;
        $total = self::getSubtotal() - self::getDiscountAmount() + ($accessory_price ? $accessory_price['price'] : 0);
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
