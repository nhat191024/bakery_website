<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\About_us;

use App\Service\client\CartService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('client.checkout.checkout');
    }
}
