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
        $lang = session()->get('language');
        $products = Products::orderBy('created_at', 'desc')->take(8)->get();
        $categoriesL = Categories::orderBy('id', 'asc')->take(2)->get();
        $categoriesR = Categories::orderBy('id', 'desc')->take(2)->get();
        $messages = Message::orderBy('created_at', 'asc')->take(5)->get();
        $imagesCategoryL = [];
        $imagesCategoryR = [];
        foreach ($categoriesL as $category) {
            $product = Products::where('category_id', $category->id)->inRandomOrder()->first();
            if ($product && $product->image) {
                $imagesCategoryL[$category->id] = $product->image;
            } else {
                $imagesCategoryL[$category->id] = 'product-22.webp';
            }
        }
        foreach ($categoriesR as $categoryR) {
            $product = Products::where('category_id', $categoryR->id)->inRandomOrder()->first();
            if ($product && $product->image) {
                $imagesCategoryR[$categoryR->id] = $product->image;
            } else {
                $imagesCategoryR[$categoryR->id] = 'product-22.webp';
            }
        }
        $banners = Banners::all();
        $promotions = Promotions::with('Products')->orderBy('product_id', 'asc')->take(1)->get();
        $price = Product_variation::with('product.promotions')->orderBy('product_id', 'asc')->value('price');
        return view('client.homePage', compact('products', 'messages', 'banners', 'price', 'promotions', 'categoriesL', 'categoriesR', 'imagesCategoryL', 'imagesCategoryR', 'lang'));
    }
}
