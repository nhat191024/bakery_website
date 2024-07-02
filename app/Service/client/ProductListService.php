<?php

namespace App\Service\client;
use App\Models\Products;

class ProductListService
{
    private $products;
    public function index()
    {
        $this->products = Products::all();
        return view('client.shop.productList')->with('products', $this->products);
    }
}

