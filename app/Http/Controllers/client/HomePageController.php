<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Message;
use App\Models\Products;
use App\Models\Promotions;
use App\Models\Product_variation;
use App\Models\Categories;


class HomePageController extends Controller
{
    // Bảng product
    public function index()
    {
        $products = Products::orderBy('created_at', 'desc')->take(8)->get();
        $categoriesL = Categories::orderBy('id','asc')->take(2)->get();
        $categoriesR = Categories::orderBy('id','desc')->take(2)->get();
        $messages = Message::orderBy('created_at', 'asc')->take(5)->get();
        $images = Banners::all();
        $promotions = Promotions::with('Products')->orderBy('product_id', 'asc')->take(1)->get();
        $price = Product_variation::with('product.promotions')->orderBy('product_id', 'asc')->value('price');
        return view('client.homePage', compact('products', 'messages', 'images','price', 'promotions','categoriesL','categoriesR'));
    }
}
