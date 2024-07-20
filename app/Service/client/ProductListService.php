<?php

namespace App\Service\client;

use App\Models\Categories;
use App\Models\Products;

class  ProductListService
{
    public function index($categoryId = null)
    {
        $products = Products::paginate(12);
        $categories = Categories::all();
        $lang = session()->get('language');

        if ($categoryId != null) {
            $products = Products::when($categoryId, function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })->paginate(12);
        }

        return view('client.shop.productList', compact('products', 'categories', 'lang'));
    }
}
