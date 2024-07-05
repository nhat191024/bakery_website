<?php
namespace App\Service\client;

use App\Models\Bill_details;
use App\Models\Bills;

class CartService
{
    public function index()
    {
        return view('client.cart.cartProducts');
    }
    
    public function addToCart($request)
    {
        return view('client.cart.cartProducts');
    }

    public function removeFromCart($request)
    {
        return view('client.cart.cartProducts');
    }

    public function getCart()
    {
        return view('client.cart.cartProducts');
    }

    public function getCartCount()
    {
        return view('client.cart.cartProducts');
    }

    public function getCartTotal()
    {
        return view('client.cart.cartProducts');
    }

}