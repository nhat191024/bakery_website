<?php

namespace App\Service\client;

use App\Models\Products;

class ProductDetailService

{
    public function index($productId)
    {
        $lang = session()->get('language');

        $product = Products::with([
            'categories:id,name',
            'product_variations.variation:id,name',
        ])
            ->withCount('bill_details')
            ->find($productId);

        if (!$product || !$product->categories) {
            return redirect()->route('client.shop.productList');
        }

        $relatedProducts = Products::with('product_variations:id,product_id,price')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->paginate(3);

        return view('client.shop.productDetail')
            ->with('product', $product)
            ->with('products', $relatedProducts)
            ->with('lang', $lang);
    }
}
