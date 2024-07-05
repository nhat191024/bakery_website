<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\About_us;

use App\Service\client\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $service;
    
    public function __construct(){
        $this->service = new CartService();
    }

    public function index(){
        return $this->service->index();
    }

    public function addToCart(Request $request){
        return $this->service->addToCart( $request );
    }

    public function removeFromCart(Request $request){
        return $this->service->removeFromCart( $request );
    }

    public function getCart(){
        return $this->service->getCart();
    }

    public function getCartCount(){
        return $this->service->getCartCount();
    }

    public function getCartTotal(){
        return $this->service->getCartTotal();
    }   
}
