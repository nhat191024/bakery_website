<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Products;

class HomePageController extends Controller
{
    // Bảng product
    public function index()
    {
        $products = Products::orderBy('created_at', 'desc')->take(8)->get();
        $messages = Message::orderBy('created_at', 'asc')->take(5)->get();
        return view('client.homePage', compact('products', 'messages'));
    }
}
