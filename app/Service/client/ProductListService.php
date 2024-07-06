<?php

namespace App\Service\client;

use App\Models\Categories;
use App\Models\Products;

class  ProductListService
{
    private $products;
    private $categories;
    public function index($categoryId = null)
    {
        $this->products = Products::paginate(12);
        $this->categories = Categories::all();

        if ($categoryId != null) {
            $this->products = Products::when($categoryId, function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })->paginate(12);
        }

        return view('client.shop.productList')
            ->with('products', $this->products)
            ->with('categories', $this->categories);
    }
}
