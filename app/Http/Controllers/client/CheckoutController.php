<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\About_us;

use App\Service\client\CartService;
use App\Service\client\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $checkoutService;

    public function __construct()
    {
        $this->checkoutService = new CheckoutService();
    }

    public function index()
    {
        return $this->checkoutService->index();
    }

    public function confirmOrder(Request $request)
    {
        return $this->checkoutService->confirmOrder($request);
    }
}
