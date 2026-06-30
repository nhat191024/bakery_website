<?php

namespace App\Service\client;

use App\Models\Categories;
use App\Models\Products;

class  ProductListService
{
    public function index($categoryId = null)
    {
        $lang = session()->get('language');
        $products = Products::select('id', 'category_id', 'name', 'name_en', 'image', 'created_at')
            ->with('product_variations:id,product_id,price')
            ->when($categoryId, function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Categories::select('id', 'name', 'name_en')->get();

        return view('client.shop.productList', compact('products', 'categories', 'lang'));
    }
}
