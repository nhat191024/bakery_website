<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\About_us;

use App\Service\client\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new CartService();
    }

    public function index()
    {
        return $this->service->index();
    }

    public function addToCart(Request $request)
    {
        return $this->service->addToCart( $request );
    }
    public function applyVoucher(Request $request)
    {
        return $this->service->applyVoucher( $request );
    }

    public function removeFromCart(Request $request)
    {
        return $this->service->removeFromCart( $request );
    }

    public function removeVoucher()
    {
        return $this->service->removeVoucher();
    }

    public function updateCart(Request $request)
    {
        return $this->service->updateCart($request);
    }

}
